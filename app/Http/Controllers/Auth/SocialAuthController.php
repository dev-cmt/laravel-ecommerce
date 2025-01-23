<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Ecommerce\Cart;
use App\Models\Ecommerce\Wishlist;
use App\Models\Ecommerce\Compare;

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

        // Check and process any session data after login
        return $this->sessionCheck() ?? redirect()->intended(RouteServiceProvider::HOME); /**NEW ADD - $this->sessionCheck()*/
    }

    // ADD NEW THIS FUNTION
    public function sessionCheck()
    {
        // Check cart in the session
        if (session()->has('cart')) {
            $cart = session('cart');
            
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $cart['product_id'],
                'product_variant_id' => $cart['product_variant_id'],
                'quantity' => 1,
            ]);
            session()->forget('cart');
        }

        // Check wishlist in the session
        if (session()->has('wishlist')) {
            $wishlist = session('wishlist');
            
            Wishlist::create([
                'user_id' => Auth::id(),
                'product_id' => $wishlist['product_id'],
                'product_variant_id' => $wishlist['product_variant_id'],
            ]);
            session()->forget('wishlist');
        }

        // Check compare list in the session
        if (session()->has('compare')) {
            $compare = session('compare');
            
            Compare::create([
                'user_id' => Auth::id(),
                'product_id' => $compare['product_id'],
            ]);
            session()->forget('compare'); 
        }

        // Redirect to the return URL
        $returnUrl = session()->get('returnUrl');
        session()->forget('returnUrl');

        if ($returnUrl) {
            return redirect()->to($returnUrl);
        }
        
        return null;
    }



}
