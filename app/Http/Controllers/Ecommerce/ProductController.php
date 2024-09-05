<?php

namespace App\Http\Controllers\Ecommerce;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\Brand;
use App\Models\Ecommerce\Color;
use App\Models\Ecommerce\ProductImage;
use App\Models\Ecommerce\ProductVariant;
use App\Models\Ecommerce\ProductSpecification;
use App\Models\Ecommerce\ProductDetail;

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
        $product = null;
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::all();
        return view('ecommerce.backend.products.create', compact('product', 'categories', 'brands', 'colors'));
    }

    public function store(Request $request) 
    {
        // Determine if this is an update
        $productId = $request->input('product_id');

        // Validate the request
        $validatedData = $request->validate([
            'product_name' => [
                'required',
                'string',
                'max:255',
                // Ensure uniqueness excluding the current product ID
                Rule::unique('products', 'product_name')->ignore($productId, 'id'),
            ],
            'description' => 'nullable|string',
        ]);

        // Determine product to update or create
        $product = $productId ? Product::findOrFail($productId) : new Product();

        // Assign product attributes
        $product->product_name = $request->input('product_name');
        $product->main_image = ImageHelper::uploadImage($request->file('main_image'), 'images/product', $product->main_image);
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->description = $request->input('description');
        $product->short_description = $request->input('short_description');
        $product->manufacturer_name = $request->input('manufacturer_name');
        $product->price = $request->input('price');
        $product->discount = $request->input('discount');
        $product->tags = json_encode(explode(',', $request->input('tags'))) ?? null;
        $product->publish_schedule = $request->input('publish_schedule');
        $product->visibility = $request->input('visibility');
        $product->status = $request->input('status');
        $product->meta_title = $request->input('meta_title');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->meta_description = $request->input('meta_description');
        $product->user_id = Auth::user()->id;

        // Save the product
        $product->save();
    
        // Handle Images file uploads
        if ($request->hasFile('product_images')) {
            foreach ($request->file('product_images') as $file) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => ImageHelper::uploadImage($file, 'images/product/gallery', null),
                ]);
            }
        }

        foreach ($request->input('variants') as $key => $variant) {
            // Safely extract the id from the variant array
            $variantId = $variant['id'] ?? null;
        
            // Find the existing variant by ID, if ID is provided
            $currentVariant = $variantId ? ProductVariant::find($variantId) : null;
            $currentImagePath = $currentVariant ? $currentVariant->img_path : null;
        
            // Retrieve the new image file from the request, if available
            $requestImg = $request->file("variants.{$key}.img_path");
        
            // Prepare the product variant data
            $productVariant = [
                'product_id' => $product->id,
                'img_path' => ImageHelper::uploadImage($requestImg, 'images/product/variant', $currentImagePath),
                'color_id' => $variant['color_id'] ?? null,
                'size' => $variant['size'] ?? null,
                'price' => $variant['price'] ?? null,
                'quantity' => $variant['quantity'] ?? null,
            ];
        
            // Update or create the product variant
            ProductVariant::updateOrCreate(['id' => $variantId], $productVariant);
        }
        
        

        // Store product specifications
        if ($request->has('specifications')) {
            foreach ($request->input('specifications') as $specification) {
                $productSpecification = [
                    'product_id' => $product->id,
                    'specification_name' => $specification['specification_name'] ?? null,
                    'specification_value' => $specification['specification_value'] ?? null,
                ];

                // Update or create the product specification
                ProductSpecification::updateOrCreate(['id' => $specification['id'] ?? null], $productSpecification);
            }
        }

        // Store product details
        if ($request->has('details')) {
            foreach ($request->input('details') as $detail) {
                $productDetail = [
                    'product_id' => $product->id,
                    'detail_name' => $detail['detail_name'] ?? null,
                    'detail_value' => $detail['detail_value'] ?? null,
                ];
                // Update or create the product specification
                ProductDetail::updateOrCreate(['id' => $detail['id'] ?? null], $productDetail);
            }
        }

        return redirect()->back()->with('success', 'Product created successfully.');
        // return redirect()->route("products.index")->with('success', 'Product created successfully.');
    }
    
    public function show($id)
    {
        // Fetch the product with its related data
        $product = Product::with(['variants', 'specifications', 'details'])->findOrFail($id);
        return view('ecommerce.backend.products.show', compact('product'));
    }
    
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::all();
        return view('ecommerce.backend.products.create', compact('$product', 'categories', 'brands', 'colors'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }


    public function productImagesDestroy($id)
    {
        $data = ProductImage::findOrFail($id);

        // Delete the image file from storage if it exists
        if (File::exists(public_path($data->image_path))) {
            File::delete(public_path($data->image_path));
        }
        $data->delete();
        return response()->json(['success' => true]);
    }
    public function productVariantDestroy($id)
    {
        $data = ProductVariant::findOrFail($id);
        // Delete the image file from storage if it exists
        if (File::exists(public_path($data->image_path))) {
            File::delete(public_path($data->image_path));
        }
        $data->delete();

        return response()->json(['success' => true]);
    }
    public function productSpecificationDestroy($id)
    {
        $data = ProductSpecification::findOrFail($id);
        $data->delete();

        return response()->json(['success' => true]);
    }
    public function productDetailDestroy($id)
    {
        $data = ProductDetail::findOrFail($id);
        $data->delete();

        return response()->json(['success' => true]);
    }

}
