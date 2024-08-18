<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
            'category_name' => 'required|string|max:255',
            'url_slug' => 'required|string|max:255|unique:categories',
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

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validatedData = $request->validate([
            'category_name' => 'required|string|max:255',
            'url_slug' => 'required|string|max:255|unique:categories,url_slug,' . $id,
            'parent_cat_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $category->update($validatedData);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
