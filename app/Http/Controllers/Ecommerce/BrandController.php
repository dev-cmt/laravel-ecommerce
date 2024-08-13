<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(10);
        return view('ecommerce.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('ecommerce.brands.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|string|max:255',
            'url_slug' => 'required|string|max:255|unique:brands',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        Brand::create($validatedData);

        return redirect()->route('brands.index')->with('success', 'Brand created successfully.');
    }

    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        return view('ecommerce.brands.show', compact('brand'));
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('ecommerce.brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $validatedData = $request->validate([
            'brand_name' => 'required|string|max:255',
            'url_slug' => 'required|string|max:255|unique:brands,url_slug,' . $id,
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

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
