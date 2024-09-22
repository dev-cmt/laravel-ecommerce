<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SocialAuthController extends Controller
{
    // Redirect to the social provider
    public function redirectToProvider($provider) // Ensure $provider is passed here
    {
        return Socialite::driver($provider)->redirect();
    }

    // Handle the callback from the social provider
    public function handleProviderCallback($provider) // Ensure $provider is passed here as well
    {
        try {
            $socialUser = Socialite::driver($provider)->stateless()->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Unable to login using ' . $provider . '. Please try again.');
        }

        // Check if the user already exists
        $user = User::where('provider_id', $socialUser->getId())
                    ->orWhere('email', $socialUser->getEmail())
                    ->first();

        // If user doesn't exist, create a new one
        if (!$user) {
            $user = User::create([
                'name' => $socialUser->getName() ?? $socialUser->getNickname(),
                'email' => $socialUser->getEmail(),
                'provider' => $provider, // Save the provider (google, facebook, etc.)
                'provider_id' => $socialUser->getId(),
                'profile_images' => $socialUser->getAvatar(),
                'password' => bcrypt(Str::random(16)),
                'email_verified_at' => now(),
                'status' => true,
            ]);
        }

        // Log the user in
        Auth::login($user, true);

        // Redirect to the return URL
        $returnUrl = session()->get('returnUrl');
        session()->forget('returnUrl');

        if ($returnUrl) {
            return redirect()->to($returnUrl);
        }else{
            return redirect()->intended('/dashboard');
        }
    }
}
