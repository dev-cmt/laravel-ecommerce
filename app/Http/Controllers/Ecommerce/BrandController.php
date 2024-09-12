<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Ecommerce\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(10);
        return view('ecommerce.backend.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('ecommerce.backend.brands.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|string|max:255',
            'url_slug' => 'required|string|max:255|unique:brands',
            'img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);
        // Handle image upload
        if ($request->hasFile('img_path')) {
            $validatedData['img_path'] = ImageHelper::uploadImage($request->file('img_path'), 'images/brand');
        }
        // Add the authenticated user's ID to the validated data
        $validatedData['user_id'] = Auth::user()->id;

        Brand::create($validatedData);

        return redirect()->route('brands.index')->with('success', 'Brand created successfully.');
    }

    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        return view('ecommerce.backend.brands.show', compact('brand'));
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('ecommerce.backend.brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $validatedData = $request->validate([
            'brand_name' => 'required|string|max:255',
            'url_slug' => 'required|string|max:255|unique:brands,url_slug,' . $id,
            'img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        // Add the authenticated user's ID to the validated data
        $validatedData['user_id'] = Auth::user()->id;

        // Handle image upload
        if ($request->hasFile('img_path')) {
            $validatedData['img_path'] = ImageHelper::uploadImage($request->file('img_path'), 'images/brand', $brand->img_path);
        }
        
        $brand->update($validatedData);

        return redirect()->route('brands.index')->with('success', 'Brand updated successfully.');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully.');
    }
}
