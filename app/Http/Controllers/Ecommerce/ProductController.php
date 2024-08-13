<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\Brand;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        $products = Product::with('category', 'brand')->paginate(10);
        return view('ecommerce.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('ecommerce.products.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'sku_code' => 'required|string|max:255|unique:products',
            'url_slug' => 'required|string|max:255|unique:products',
            'img_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('img_path')) {
            $imagePath = $request->file('img_path')->store('products', 'public');
            $validatedData['img_path'] = $imagePath;
        }

        $product = Product::create($validatedData);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified product.
     */
    public function show($id)
    {
        $product = Product::with('category', 'brand', 'variants', 'images', 'details', 'specifications', 'reviews')->findOrFail($id);
        return view('ecommerce.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('ecommerce.products.edit', compact('product', 'categories', 'brands'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'sku_code' => 'required|string|max:255|unique:products,sku_code,' . $id,
            'url_slug' => 'required|string|max:255|unique:products,url_slug,' . $id,
            'img_path' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('img_path')) {
            // Delete old image
            Storage::disk('public')->delete($product->img_path);

            $imagePath = $request->file('img_path')->store('products', 'public');
            $validatedData['img_path'] = $imagePath;
        }

        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete associated images
        Storage::disk('public')->delete($product->img_path);

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    /**
     * Handle adding product variants.
     */
    public function addVariant(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validatedData = $request->validate([
            'color' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $product->variants()->create($validatedData);

        return redirect()->route('products.show', $id)->with('success', 'Variant added successfully.');
    }

    /**
     * Handle adding product images.
     */
    public function addImage(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validatedData = $request->validate([
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('product_images', 'public');
            $product->images()->create(['image_path' => $imagePath]);
        }

        return redirect()->route('products.show', $id)->with('success', 'Image added successfully.');
    }

    /**
     * Handle adding product details.
     */
    public function addDetail(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validatedData = $request->validate([
            'detail_name' => 'required|string|max:255',
            'detail_value' => 'required|string|max:255',
        ]);

        $product->details()->create($validatedData);

        return redirect()->route('products.show', $id)->with('success', 'Detail added successfully.');
    }

    /**
     * Handle adding product specifications.
     */
    public function addSpecification(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validatedData = $request->validate([
            'specification_name' => 'required|string|max:255',
            'specification_value' => 'required|string|max:255',
        ]);

        $product->specifications()->create($validatedData);

        return redirect()->route('products.show', $id)->with('success', 'Specification added successfully.');
    }

    /**
     * Handle adding product reviews.
     */
    public function addReview(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'rating' => 'required|numeric|min:1|max:5',
            'review' => 'required|string|max:1000',
        ]);

        $product->reviews()->create($validatedData);

        return redirect()->route('products.show', $id)->with('success', 'Review added successfully.');
    }
}