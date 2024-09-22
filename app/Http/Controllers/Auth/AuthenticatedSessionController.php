<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Ecommerce\Cart;
use App\Models\Ecommerce\Wishlist;
use App\Models\Ecommerce\Compare;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Authenticate the user
        $request->authenticate();
        $request->session()->regenerate();

        // Check and process any session data after login
        return $this->sessionCheck() ?? redirect()->intended(RouteServiceProvider::HOME); /**CH ADD - $this->sessionCheck()*/
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



    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
