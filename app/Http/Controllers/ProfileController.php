<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Laravolt\Avatar\Facade as Avatar;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function profileIndex(Request $request): View
    {
        $user = Auth::user();
        return view('profile.profile-index', compact('user'));
    }
    public function profileSettings(Request $request): View
    {
        $user = Auth::user();
        return view('profile.profile-edit', compact('user'));
    }
    
    public function updateImage(Request $request)
    {
        $request->validate([
            'profile_images' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        // Delete old profile image if exists
        if ($user->profile_images && File::exists(public_path($user->profile_images))) {
            File::delete(public_path($user->profile_images));
        }

        // Save new profile image
        $imageName = time() . '.' . $request->file('profile_images')->getClientOriginalExtension();
        $request->file('profile_images')->move(public_path('profile_images'), $imageName);
        $user->profile_images = 'profile_images/' . $imageName;
        $user->save();

        return response()->json([
            'success' => true,
            'profile_image_url' => asset($user->profile_images),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function profileUpdate(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->blood_group = $request->blood_group;
        $user->marital_status = $request->marital_status;
        $user->phone = $request->phone;
        $user->status = $request->status;
        $user->save();

        return redirect()->back()->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
