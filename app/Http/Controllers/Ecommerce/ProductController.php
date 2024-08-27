<?php

namespace App\Http\Controllers\Ecommerce;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\Brand;
use App\Models\Ecommerce\ProductVariant;
use App\Models\Ecommerce\ProductImage;
use App\Models\Ecommerce\ProductDetail;
use App\Models\Ecommerce\ProductSpecification;

use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;

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
        try {
            $validated = $request->validate([
                'product_name' => 'required|string|max:255|unique:products,product_name',
                'img_path' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
                'description' => 'nullable|string',
                'category_id' => 'required|exists:categories,id',
            ], [
                'product_name.required' => 'The product title is required.',
                'product_name.unique' => 'The product title has already been taken.',
                'category_id.required' => 'The category is required.',
                'category_id.exists' => 'The selected category is invalid.',
                'img_path.image' => 'The file must be an image.',
                'img_path.mimes' => 'The image must be a file of type: jpeg, jpg, png, gif.',
                'img_path.max' => 'The image may not be greater than 2MB.',
            ]);
        
            // Save the product or perform the desired action
        
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'errors' => $e->errors(),
            ], 422);
        }
        // Create the product
        $product = Product::create([
            'product_name' => $validated['product_name'],
            'category_id' => 1,
            'description' => $validated['description'],
        ]);


        // Handle Dropzone file uploads
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $image) {
                // Upload each image using the ImageHelper
                $imagePath = ImageHelper::uploadImage($image, 'images/product/gallery', null);

                // Save the uploaded image path to the database
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $imagePath,
                ]);
            }
        }


        return redirect()->route('products.index')->with('success', 'Product created successfully.');

    }




    public function store2(Request $request){
        // Convert tags from comma-separated string to JSON array
        $tags = $request->input('tags') ? explode(',', $request->input('tags')) : [];
        // Ensure tags are properly encoded
        $tagsJson = json_encode($tags);

        // Store the product image if uploaded
        $imgPath = null;
        if ($request->hasFile('img_path')) {
            $imgPath = ImageHelper::uploadImage($request->file('img_path'), 'images/product', null);
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
            'short_description' => $request->input('short_description'),
            'manufacturer_name' => $request->input('manufacturer_name'),
            'price' => $request->input('price'),
            'discount' => $request->input('discount'),
            'tags' => $tagsJson,
            'publish_schedule' => $request->input('publish_schedule'),
            'visibility' => $request->input('visibility'),
            'status' => $request->input('status'),
            
            'meta_title' => $request->input('meta_title'),
            'meta_keywords' => $request->input('meta_keywords'),
            'meta_description' => $request->input('meta_description'),
        ]);


        // Handle Dropzone file uploads
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $image) {
                // Upload each image using the ImageHelper
                $imagePath = ImageHelper::uploadImage($image, 'images/product/gallery', null);

                // Save the uploaded image path to the database
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $imagePath,
                ]);
            }
        }

        // Store product variants
        if ($request->has('variants')) {
            foreach ($request->input('variants') as $variant) {
                if (isset($variant['image']) && $variant['image']) {
                    $imagePath = $this->uploadImage($variant['image'], 'images/variant');
                }

                ProductVariant::create([
                    'product_id' => $product->id,
                    'img_path' => $imagePath ?? null, // Image path will be null if no image is uploaded
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


        return redirect()->back()->with('success', 'Product created successfully.');
    }
     

    public function show($id)
    {
        // Fetch the product with its related data
        $product = Product::with(['variants', 'specifications', 'details'])->findOrFail($id);
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
