<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\Brand;
use App\Models\Ecommerce\Color;
use App\Models\Division;
use App\Models\District;
use App\Models\Union;
use App\Models\Upazila;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::withCount(['productVariant as product_count' => function($query) {
            $query->whereHas('product');
        }])->get();

        
        $divisions = Division::orderBy('name', 'asc')->get();
        $districts = District::orderBy('name', 'asc')->get();
        $upazilas = Upazila::orderBy('name', 'asc')->get();
        $unions = Union::orderBy('name', 'asc')->get();


        // Share the data with all views
        view()->share([
            'categories' => $categories,
            'brands' => $brands,
            'colors' => $colors,
            'divisions' => $divisions,
            'districts' => $districts,
            'upazilas' => $upazilas,
            'unions' => $unions,
        ]);
    }
}
