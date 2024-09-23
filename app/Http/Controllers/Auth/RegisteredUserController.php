<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Laravolt\Avatar\Facade as Avatar;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required'],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Generate avatar
        $avatar = Avatar::create($request->name)->getImageObject()->encode('png');
        $imageName = time() . '.png';
        $imagePath = public_path('profile_images/' . $imageName);
        if (!file_exists(public_path('profile_images'))) {
            mkdir(public_path('profile_images'), 0755, true);
        }
        file_put_contents($imagePath, (string) $avatar);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            
            'email_verified_at' => now(),
            'unique_id' => $this->generateUniqueUserId($request),
            'profile_images' => 'profile_images/' . $imageName,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }


    private function generateUniqueUserId($request)
    {
        $arrayName =  explode(" ", $request->input('name'));
        if(count($arrayName) > 1){
            $firstNameInitial = strtoupper(substr($arrayName[0], 0, 1)) . strtoupper(substr($arrayName[count($arrayName) - 1], 0, 1));
        }else{
            $firstNameInitial = strtoupper(substr($arrayName[0], 0, 1));
        }
        $getValue = User::count();
        $sevenNo = str_pad( $getValue, 7 - Str::length($getValue), "0", STR_PAD_LEFT);

        $uniqueUserId = $firstNameInitial . $sevenNo;

        return $uniqueUserId;
    }
    private function calculateBMI($feet, $inches, $weightKg)
    {
        $heightInMeters = (($feet * 12) + $inches) * 0.0254;
        return $weightKg / ($heightInMeters * $heightInMeters);
    }


}
