<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\Brand;
use App\Models\Ecommerce\Color;
use App\Models\Ecommerce\ProductImage;
use App\Models\Ecommerce\ProductVariant;
use App\Models\Ecommerce\ProductSpecification;
use App\Models\Ecommerce\ProductDetail;

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
        $product = Product::get();
        return view('ecommerce.frontend.shop', compact('product'));
    }
    public function shopDetails(Request $request, $id)
    {
        $product = Product::find($id);

        return view('ecommerce.frontend.shop-details', compact('product'));
    }
}
