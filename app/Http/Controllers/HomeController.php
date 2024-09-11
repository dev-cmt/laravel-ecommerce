<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\Brand;
use App\Models\Ecommerce\Color;
use App\Models\Ecommerce\ProductImage;
use App\Models\Ecommerce\ProductVariant;
use App\Models\Ecommerce\ProductSpecification;
use App\Models\Ecommerce\ProductDetail;
use App\Models\Ecommerce\ProductReview;

class HomeController extends Controller
{
    public function welcome(Request $request): View
    {
        // $product->increment('wishlist_count');
        $popularProducts = Product::orderBy('sales_count', 'desc')->take(5)->get();

        $popularProducts = Product::select('*')
        ->orderByRaw('sales_count * 0.6 + view_count * 0.3 + wishlist_count * 0.1 DESC')
        ->take(5)
        ->get();

        $user = Auth::user();
        return view('welcome', compact('user'));
    }
    public function shop(Request $request): View
    {
        $products = Product::get();

        return view('ecommerce.frontend.shop', compact('products'));
    }
    public function shopDetails(Request $request, $id)
    {
        $data = Product::find($id);

        return view('ecommerce.frontend.shop-details', compact('data'));
    }

    public function blog(Request $request): View
    {
        $data = Product::get();
        return view('ecommerce.frontend.shop', compact('data'));
    }
    public function blogDetails(Request $request): View
    {
        $data = Product::get();
        return view('ecommerce.frontend.shop', compact('data'));
    }
    public function compare(Request $request): View
    {
        $data = Product::get();
        return view('ecommerce.frontend.compare', compact('data'));
    }
    public function wishlist(Request $request): View
    {
        $data = Product::get();
        return view('ecommerce.frontend.wishlist', compact('data'));
    }
    public function cart(Request $request): View
    {
        $data = Product::get();
        return view('ecommerce.frontend.cart', compact('data'));
    }

    /**------------------------------------------------------------------------------
     * 
     * ------------------------------------------------------------------------------
     */
    public function storeReview(Request $request)
    {
        // $request->validate([
        //     'rating' => 'required|integer|min:1|max:5',
        //     'review' => 'nullable|string',
        // ]);

        ProductReview::create([
            'product_id' => $request->input('product_id'),
            'user_id' => 1, // Get the logged-in user's ID
            'rating' => $request->input('rating'),
            'review' => $request->input('review'),
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }



    public function loadMoreReviews(Request $request)
    {
        $productId = $request->get('product_id');
        $page = $request->get('page', 1);
        $reviewsPerPage = 3;

        // Get reviews for the current product
        $reviews = ProductReview::where('product_id', $productId)
                        ->skip(($page - 1) * $reviewsPerPage)
                        ->take($reviewsPerPage)
                        ->get();

        // Determine if there are more reviews to load
        $hasMore = ProductReview::where('product_id', $productId)->count() > $page * $reviewsPerPage;

        // Prepare reviews to return
        $reviewsData = $reviews->map(function($review) {
            return [
                'user_name' => $review->user->name,
                'user_image' => asset('public/frontend/img/users/user-2.jpg'),  // Adjust to actual user image path
                'rating' => $review->rating,
                'created_at' => $review->created_at->format('d M, Y'),
                'review' => $review->review,
            ];
        });

        return response()->json([
            'reviews' => $reviewsData,
            'hasMore' => $hasMore,
        ]);
    }

    public function filterProducts(Request $request)
    {
        $query = Product::query();

        // // Apply price range filter if provided
        // if ($request->has('price')) {
        //     $priceRange = explode(' - ', $request->input('price'));
        //     $query->whereBetween('price', [$priceRange[0], $priceRange[1]]);
        // }

        // Apply category filter if provided
        if ($request->has('categories')) {
            $categories = $request->input('categories');
            $query->whereIn('category_id', $categories);
        }

        // Apply color filter if provided
        if ($request->has('colors')) {
            $colors = $request->input('colors');
            $query->whereHas('variants', function ($q) use ($colors) {
                $q->whereIn('color_id', $colors);
            });
        }

        $products = $query->get();

        // return response()->json($products);

        return view('ecommerce.frontend.partials.product-list', compact('products'));
    }


}
