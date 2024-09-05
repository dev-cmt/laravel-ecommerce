<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function welcome(Request $request): View
    {
        // $product->increment('wishlist_count');
        $popularProducts = Product::orderBy('sales_count', 'desc')->take(5)->get();

        $popularProducts = Product::select('*')
        ->orderByRaw('sales_count * 0.6 + view_count * 0.3 + wishlist_count * 0.1 DESC')
        ->take(5)
        ->get();

        $user = Auth::user();
        return view('welcome', compact('user'));
    }
    public function shop(Request $request): View
    {
        $user = Auth::user();
        return view('ecommerce.frontend.shop', compact('user'));
    }
    public function shopDetails(Request $request)
    {
        $user = Auth::user();
        return view('ecommerce.frontend.shop-details', compact('user'));
    }
}
