<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function welcome(Request $request)
    {
        $user = Auth::user();
        return view('welcome', compact('user'));
    }
    public function shop(Request $request)
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
