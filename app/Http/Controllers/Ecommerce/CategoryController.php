<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ecommerce\Category;
use Illuminate\Validation\Rule;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('parent')->paginate(10);
        return view('ecommerce.backend.categories.index', compact('categories'));
    }

    public function create()
    {
        $parentCategories = Category::whereNull('parent_cat_id')->get();
        return view('ecommerce.backend.categories.create', compact('parentCategories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|string|max:255|unique:categories,category_name',
            'parent_cat_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        Category::create($validatedData);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function show($id)
    {
        $category = Category::with('children')->findOrFail($id);
        return view('ecommerce.backend.categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $parentCategories = Category::whereNull('parent_cat_id')->get();
        return view('ecommerce.backend.categories.edit', compact('category', 'parentCategories'));
    }

    // Update the specified category in storage
    public function update(Request $request, $id)
    {
        // Validate the request
        $validatedData = $request->validate([
            'category_name' => [
                'required',
                'string',
                'max:255',
                // Ensure uniqueness excluding the current category
                Rule::unique('categories', 'category_name')->ignore($id),
            ],
            'parent_cat_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        // Find the category
        $category = Category::findOrFail($id);

        // Update the category with the validated data
        $category->update($validatedData);

        // Redirect to a desired route with a success message
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
