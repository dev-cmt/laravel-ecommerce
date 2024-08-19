<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\Brand;
use App\Models\Ecommerce\ProductVariant;
use App\Models\Ecommerce\ProductImage;
use App\Models\Ecommerce\ProductDetail;
use App\Models\Ecommerce\ProductSpecification;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'brand')->paginate(10);
        return view('ecommerce.backend.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('ecommerce.backend.products.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'product_name' => 'required|string|max:255',
            'sku_code' => 'nullable|string|max:255',
            'url_slug' => 'required|string|max:255|unique:products,url_slug',
            'img_path' => 'nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
            'variants.*.color' => 'required|string|max:255',
            'variants.*.size' => 'required|string|max:255',
            'variants.*.price' => 'required|numeric|min:0',
            'images.*.image_path' => 'required|image|max:2048',
            'details.*.detail_name' => 'required|string|max:255',
            'details.*.detail_value' => 'required|string',
            'specifications.*.specification_name' => 'required|string|max:255',
            'specifications.*.specification_value' => 'required|string',
        ]);

        // Store the product image if uploaded
        $imgPath = null;
        if ($request->hasFile('img_path')) {
            $imgPath = $request->file('img_path')->store('product_images', 'public');
        }

        // Create the product
        $product = Product::create([
            'product_name' => $request->input('product_name'),
            'sku_code' => $request->input('sku_code'),
            'url_slug' => $request->input('url_slug'),
            'img_path' => $imgPath,
            'category_id' => $request->input('category_id'),
            'brand_id' => $request->input('brand_id'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'status' => $request->input('status'),
        ]);

        // Store product variants
        if ($request->has('variants')) {
            foreach ($request->input('variants') as $variant) {
                ProductVariant::create([
                    'product_id' => $product->id,
                    'color' => $variant['color'],
                    'size' => $variant['size'],
                    'price' => $variant['price'],
                ]);
            }
        }

        // Store product images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image['image_path']->store('product_images', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $imagePath,
                ]);
            }
        }

        // Store product details
        if ($request->has('details')) {
            foreach ($request->input('details') as $detail) {
                ProductDetail::create([
                    'product_id' => $product->id,
                    'detail_name' => $detail['detail_name'],
                    'detail_value' => $detail['detail_value'],
                ]);
            }
        }

        // Store product specifications
        if ($request->has('specifications')) {
            foreach ($request->input('specifications') as $specification) {
                ProductSpecification::create([
                    'product_id' => $product->id,
                    'specification_name' => $specification['specification_name'],
                    'specification_value' => $specification['specification_value'],
                ]);
            }
        }

        // Redirect to the product listing page with a success message
        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }
    
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'sku_code' => 'nullable|string|max:100',
            'url_slug' => 'required|string|max:255|unique:products,url_slug,' . $product->id,
            'img_path' => 'nullable|image|max:2048',
            'category_id' => 'required|integer|exists:categories,id',
            'brand_id' => 'required|integer|exists:brands,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
            'variants.*.color' => 'required|string|max:100',
            'variants.*.size' => 'required|string|max:100',
            'variants.*.price' => 'required|numeric|min:0',
            'images.*.image_path' => 'nullable|image|max:2048',
            'details.*.detail_name' => 'required|string|max:255',
            'details.*.detail_value' => 'required|string',
            'specifications.*.specification_name' => 'required|string|max:255',
            'specifications.*.specification_value' => 'required|string',
        ]);

        $product->update([
            'product_name' => $request->input('product_name'),
            'sku_code' => $request->input('sku_code'),
            'url_slug' => $request->input('url_slug'),
            'img_path' => $request->hasFile('img_path') ? $request->file('img_path')->store('product_images', 'public') : $product->img_path,
            'category_id' => $request->input('category_id'),
            'brand_id' => $request->input('brand_id'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'status' => $request->input('status'),
        ]);

        // Handle variants
        $product->variants()->delete();
        foreach ($request->input('variants', []) as $variant) {
            $product->variants()->create($variant);
        }

        // Handle images
        $product->images()->delete();
        foreach ($request->file('images', []) as $image) {
            $imagePath = $image['image_path']->store('product_images', 'public');
            $product->images()->create(['image_path' => $imagePath]);
        }

        // Handle details
        $product->details()->delete();
        foreach ($request->input('details', []) as $detail) {
            $product->details()->create($detail);
        }

        // Handle specifications
        $product->specifications()->delete();
        foreach ($request->input('specifications', []) as $specification) {
            $product->specifications()->create($specification);
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    

    public function show($id)
    {
        $product = Product::with('category', 'brand', 'variants', 'images', 'details', 'specifications')->findOrFail($id);
        return view('ecommerce.backend.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('ecommerce.backend.products.edit', compact('product', 'categories', 'brands'));
    }



    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
