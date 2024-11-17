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
use App\Models\Ecommerce\Cart;
use App\Models\Ecommerce\Wishlist;
use App\Models\Ecommerce\Compare;
use App\Models\Ecommerce\ShippingMethod;

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
    public function userProfile(Request $request): View
    {
        return view('ecommerce.frontend.profile');
    }
    
    public function shop(Request $request)
    {
        $query = Product::query();

        // Apply price range filter if provided
        if ($request->filled(['minPrice', 'maxPrice'])) {
            $minPrice = (float) $request->input('minPrice');
            $maxPrice = (float) $request->input('maxPrice');

            if (is_numeric($minPrice) && is_numeric($maxPrice)) {
                $query->whereRaw('price - (price * discount / 100) BETWEEN ? AND ?', [$minPrice, $maxPrice]);
            }
        }

        // Apply category filter if provided
        if ($request->has('categories')) {
            $categories = $request->input('categories');
            if (is_array($categories) && !empty($categories)) {
                $query->whereIn('category_id', $categories);
            }
        }

        // Apply color filter if provided
        if ($request->has('colors')) {
            $colors = $request->input('colors');
            if (is_array($colors) && !empty($colors)) {
                $query->whereHas('variants', function ($q) use ($colors) {
                    $q->whereIn('color_id', $colors);
                });
            }
        }
        $products = $query->paginate(2);
        

        // Check if the request is an AJAX request
        if ($request->ajax()) {
            return view('ecommerce.frontend.partials.product-list', compact('products'))->render();
        }

        // For non-AJAX requests (initial page load), return the full shop view
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
    public function coupon(Request $request): View
    {
        return view('ecommerce.frontend.coupon');
    }
    public function contact(Request $request): View
    {
        return view('ecommerce.frontend.contact');
    }
    public function about(Request $request): View
    {
        return view('ecommerce.frontend.about');
    }
    public function cart(Request $request): View
    {
        $shipping = ShippingMethod::with('shippingZones')->get();
        $carts = Cart::where('user_id', Auth::id())->with('product')->get();
        return view('ecommerce.frontend.cart', compact('carts', 'shipping'));
    }
    public function checkout(Request $request): View
    {
        $data = Cart::where('user_id', Auth::id())->get();
        return view('ecommerce.frontend.checkout', compact('data'));
    }
    public function wishlist(Request $request): View
    {
        $data = Product::get();
        return view('ecommerce.frontend.wishlist', compact('data'));
    }
    public function compare(Request $request): View
    {
        $data = Compare::get();
        return view('ecommerce.frontend.compare', compact('data'));
    }
    public function itemActionStore(Request $request)
    {
        $action = $request->input('action_name');
        $userId = Auth::id(); // Get the authenticated user's ID
        $productId = $request->input('product_id');
        $productVariantId = $request->input('product_variant_id');

        // If not authenticated, store info in the session
        if (!Auth::check()) {
            $this->storeInSession($action, $request);
            return response()->json(['message' => 'You must be logged in to add items to your wishlist.'], 401);
        }

        $product = Product::findOrFail($productId);

        switch ($action) {
            case "cart":
                return $this->handleCartAction($userId, $productId, $productVariantId);
            
            case "wishlist":
                return $this->handleWishlistAction($userId, $productId, $productVariantId, $product);
            
            case "compare":
                return $this->handleCompareAction($userId, $productId);

            default:
                return response()->json(['message' => 'Invalid action.'], 400);
        }
    }

    private function storeInSession($action, Request $request)
    {
        switch ($action) {
            case "cart":
                session()->put('cart', [
                    'product_id' => $request->input('product_id'),
                    'product_variant_id' => $request->input('product_variant_id'),
                ]);
                break;

            case "wishlist":
                session()->put('wishlist', [
                    'product_id' => $request->input('product_id'),
                    'product_variant_id' => $request->input('product_variant_id'),
                ]);
                break;

            case "compare":
                session()->put('compare', [
                    'product_id' => $request->input('product_id'),
                ]);
                break;
        }
        session()->put('returnUrl', url()->previous());
    }

    private function handleCartAction($userId, $productId, $productVariantId)
    {
        $cartEntry = Cart::where('user_id', $userId)
                        ->where('product_id', $productId)
                        ->where('product_variant_id', $productVariantId)
                        ->first();

        if ($cartEntry) {
            $cartEntry->delete();
            $message = 'Removed from cart successfully!';
        } else {
            Cart::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'product_variant_id' => $productVariantId,
                'quantity' => 1,
            ]);
            $message = 'Added to cart successfully!';
        }

        $userCartCount = Cart::where('user_id', $userId)->count();

        return response()->json(['message' => $message, 'count_cart' => $userCartCount], 200);
    }

    private function handleWishlistAction($userId, $productId, $productVariantId, $product)
    {
        $wishlistEntry = Wishlist::where('user_id', $userId)
                                ->where('product_id', $productId)
                                ->where('product_variant_id', $productVariantId)
                                ->first();

        if ($wishlistEntry) {
            $wishlistEntry->delete();
            $product->decrement('wishlist_count');
            $message = 'Removed from wishlist successfully!';
        } else {
            Wishlist::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'product_variant_id' => $productVariantId,
            ]);
            $product->increment('wishlist_count');
            $message = 'Added to wishlist successfully!';
        }

        $userWishlistCount = Wishlist::where('user_id', $userId)->count();

        return response()->json(['message' => $message, 'count_wishlist' => $userWishlistCount], 200);
    }

    private function handleCompareAction($userId, $productId)
    {
        $compareEntry = Compare::where('user_id', $userId)
                            ->where('product_id', $productId)
                            ->first();

        if ($compareEntry) {
            $compareEntry->delete();
            $message = 'Removed from compare successfully!';
        } else {
            Compare::create([
                'user_id' => $userId,
                'product_id' => $productId,
            ]);
            $message = 'Added to compare successfully!';
        }

        return response()->json(['message' => $message], 200);
    }



    

    /**------------------------------------------------------------------------------
     * FUNTION: REVIEW
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
    /**------------------------------------------------------------------------------
     * FUNTION: AJAX DATA CALL
     * ------------------------------------------------------------------------------
     */
    public function getCarts(Request $request)
    {
        $data = Cart::where('user_id', Auth::id())->with('product')->get()->toArray();
        return response()->json($data);
    }
}
