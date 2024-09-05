<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Ecommerce\Category;
use Illuminate\Validation\Rule;
use App\Helpers\ImageHelper;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('parent')->paginate(10);
        return view('ecommerce.backend.categories.index', compact('categories'));
    }

    public function create()
    {
        // $categories = Category::whereNull('parent_cat_id')->get();
        $categories = Category::where('status', 1)->get();
        return view('ecommerce.backend.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'category_name' => 'required|string|max:255|unique:categories,category_name',
            'parent_cat_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
            'img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image
        ]);

        // Handle image upload
        if ($request->hasFile('img_path')) {
            $validatedData['img_path'] = ImageHelper::uploadImage($request->file('img_path'), 'images/category');
        }
        // Add the authenticated user's ID to the validated data
        $validatedData['user_id'] = Auth::user()->id;

        // Create the category
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
                'required', 'string', 'max:255', Rule::unique('categories', 'category_name')->ignore($id),
            ],
            'parent_cat_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
            'img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image
        ]);

        // Find the category
        $category = Category::findOrFail($id);
        // Handle image upload
        if ($request->hasFile('img_path')) {
            $validatedData['img_path'] = ImageHelper::uploadImage($request->file('img_path'), 'images/category', $category->img_path);
        }

        // Add the authenticated user's ID to the validated data
        $validatedData['user_id'] = Auth::user()->id;


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
