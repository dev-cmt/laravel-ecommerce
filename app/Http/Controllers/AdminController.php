<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }
}
