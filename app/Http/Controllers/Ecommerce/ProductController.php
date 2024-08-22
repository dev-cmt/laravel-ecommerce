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

    public function store(Request $request){
        // Handle Dropzone file uploads
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $image) {
                $imagePath = $image['image_path']->store('product_images', 'public');
                ProductImage::create([
                    'product_id' => 1,
                    'image_path' => $imagePath,
                ]);
            }
        }
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
    public function store2(Request $request)
    {
        // // Validate request
        // $validatedData = $request->validate([
        //     'product_name' => 'required|string|max:255',
        //     'sku_code' => 'required|string|max:255',
        //     'url_slug' => 'nullable|string|max:255',
        //     'img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'category_id' => 'required|integer|exists:categories,id',
        //     'brand_id' => 'nullable|integer|exists:brands,id',
        //     'description' => 'nullable|string',
        //     'price' => 'nullable|numeric',
        //     'discount' => 'nullable|numeric',
        //     'tags' => 'nullable|string',
        //     'publish_schedule' => 'nullable|date',
        //     'visibility' => 'nullable|string',
        //     'status' => 'nullable|string',
        //     'variants.*.color' => 'nullable|string|max:255',
        //     'variants.*.size' => 'nullable|string|max:255',
        //     'variants.*.price' => 'nullable|numeric',
        //     'variants.*.quantity' => 'nullable|integer',
        //     'specifications.*.specification_name' => 'nullable|string|max:255',
        //     'specifications.*.specification_value' => 'nullable|string',
        //     'details.*.detail_name' => 'nullable|string|max:255',
        //     'details.*.detail_value' => 'nullable|string',
        //     'file.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validation for Dropzone images
        // ]);

        // Create the product
        $product = Product::create([
            'product_name' => $request->input('product_name'),
            'sku_code' => $request->input('sku_code'),
            'url_slug' => $request->input('url_slug'),
            'category_id' => $request->input('category_id'),
            'brand_id' => $request->input('brand_id'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'status' => $request->input('status'),
        ]);

        // Handle main image upload
        if ($request->hasFile('img_path')) {
            $product->img_path = $this->uploadImage($request->file('img_path'), 'images/product');
        }
        $product->save();

        // Handle Dropzone file uploads
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $image) {
                $imagePath = $this->uploadImage($image, 'product_images');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $imagePath,
                ]);
            }
        }

        // Store product variants
        if ($request->has('variants')) {
            foreach ($request->input('variants') as $variant) {
                $imagePath = $this->uploadImage($variant, 'images/variant');
                ProductVariant::create([
                    'product_id' => $product->id,
                    'img_path' => $imagePath ?? null,
                    'color' => $variant['color'] ?? null,
                    'size' => $variant['size'] ?? null,
                    'price' => $variant['price'] ?? null,
                    'quantity' => $variant['quantity'] ?? null,
                ]);
            }
        }

        // Store product specifications
        if ($request->has('specifications')) {
            foreach ($request->input('specifications') as $specification) {
                ProductSpecification::create([
                    'product_id' => $product->id,
                    'specification_name' => $specification['specification_name'] ?? null,
                    'specification_value' => $specification['specification_value'] ?? null,
                ]);
            }
        }

        // Store product details
        if ($request->has('details')) {
            foreach ($request->input('details') as $detail) {
                ProductDetail::create([
                    'product_id' => $product->id,
                    'detail_name' => $detail['detail_name'] ?? null,
                    'detail_value' => $detail['detail_value'] ?? null,
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    protected function uploadImage($image, $folder)
    {
        // Generate a unique name for the image
        $imageName = time() . '.' . $image->extension();

        // Move the image to the specified folder
        $image->move(public_path($folder), $imageName);

        // Return the image path
        return $folder . '/' . $imageName;
    }

     

    public function show($id)
    {
        $product = Product::with('category', 'brand', 'variants', 'images', 'details', 'specifications')->findOrFail($id);
        return view('ecommerce.backend.products.show', compact('product'));
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
