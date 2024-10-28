<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\Ecommerce\CategoryController;
use App\Http\Controllers\Ecommerce\BrandController;
use App\Http\Controllers\Ecommerce\ColorController;
use App\Http\Controllers\Ecommerce\ProductController;
use App\Http\Controllers\Ecommerce\OrderController;
use App\Http\Controllers\Ecommerce\ShippingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [HomeController::class, 'welcome'])->name('home');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/shop-details/{id}/{url_slug}', [HomeController::class, 'shopDetails'])->name('shop-details');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog-details', [HomeController::class, 'blogDetails'])->name('blog-details');
Route::get('/coupon', [HomeController::class, 'coupon'])->name('coupon');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::post('/product/review', [HomeController::class, 'storeReview'])->name('product.review.store');
Route::get('/load-more-reviews', [HomeController::class, 'loadMoreReviews'])->name('load-more-reviews');

Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-condition', [HomeController::class, 'termsCondition'])->name('terms-condition');

Route::middleware('auth')->group(function () {
    Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
    Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
    Route::get('/wishlist', [HomeController::class, 'wishlist'])->name('wishlist');
    Route::get('/compare', [HomeController::class, 'compare'])->name('compare');
    Route::post('/item-action/store', [HomeController::class, 'itemActionStore'])->name('item-action.store');


    Route::get('/order-complete.', [HomeController::class, 'orderComplete.'])->name('order-complete');
    Route::get('/order-history', [HomeController::class, 'orderHistory.'])->name('order-history');
    Route::get('/order-details.', [HomeController::class, 'orderDetails.'])->name('order-details');
    Route::get('/order-track', [HomeController::class, 'orderTrack.'])->name('order-track');

    Route::get('/user-profile', [HomeController::class, 'userProfile'])->name('user-profile');
    Route::get('/get-carts', [HomeController::class, 'getCarts'])->name('get-carts');
});

Route::get('/app-download', function () {
    $filePath = public_path('app.apk');
    return response()->download($filePath, 'app.apk');
})->name('app.download');

/**-------------------------------------------------------------------------
 * KEY : SOCIAL AUTH
 * -------------------------------------------------------------------------
 */
Route::get('auth/{provider}', [SocialAuthController::class, 'redirectToProvider'])->name('social.login');
Route::get('auth/{provider}/callback', [SocialAuthController::class, 'handleProviderCallback'])->name('social.callback');

/**-------------------------------------------------------------------------
 * KEY : DASHBOARD PROFILE
 * -------------------------------------------------------------------------
 */
Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile-index', [ProfileController::class, 'profileIndex'])->name('profile.index');
    Route::get('/profile-settings', [ProfileController::class, 'profileSettings'])->name('profile.settings');
    Route::post('/profile-update/image', [ProfileController::class, 'updateImage'])->name('profile.updateImage');
    Route::post('/profile-update', [ProfileController::class, 'profileUpdate'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
});

/**-------------------------------------------------------------------------
 * KEY : ECOMMERCE
 * -------------------------------------------------------------------------
 */

Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('colors', ColorController::class);

    //--------------------ProductController
    Route::resource('products', ProductController::class);
    Route::post('products/{id}/add-variant', [ProductController::class, 'addVariant'])->name('products.addVariant');
    Route::post('products/{id}/add-image', [ProductController::class, 'addImage'])->name('products.addImage');
    Route::post('products/{id}/add-detail', [ProductController::class, 'addDetail'])->name('products.addDetail');
    Route::post('products/{id}/add-specification', [ProductController::class, 'addSpecification'])->name('products.addSpecification');
    Route::post('products/{id}/add-review', [ProductController::class, 'addReview'])->name('products.addReview');
    Route::delete('products/{id}/product-images', [ProductController::class, 'productImagesDestroy'])->name('product-images.destroy');
    Route::delete('products/{id}/product-variant', [ProductController::class, 'productVariantDestroy'])->name('product-variant.destroy');
    Route::delete('products/{id}/product-specification', [ProductController::class, 'productSpecificationDestroy'])->name('product-specification.destroy');
    Route::delete('products/{id}/product-detail', [ProductController::class, 'productDetailDestroy'])->name('product-detail.destroy');


    //--------------------OrderController
    Route::resource('orders', OrderController::class);
    Route::get('/order-index', [OrderController::class, 'orderIndex'])->name('order.index');
    Route::get('/order-details', [OrderController::class, 'orderDetailsView'])->name('order.details');
});

Route::prefix('shipping')->middleware(['auth', 'verified'])->group(function () {
    // -----------------------------
    // Shipping Methods Routes
    // -----------------------------
    Route::get('methods', [ShippingController::class, 'index'])->name('shipping.methods.index'); // List all shipping methods
    Route::get('methods/create', [ShippingController::class, 'create'])->name('shipping.methods.create'); // Show form to create a new shipping method
    Route::post('methods', [ShippingController::class, 'store'])->name('shipping.methods.store'); // Store a new shipping method
    Route::get('methods/{shippingMethod}/edit', [ShippingController::class, 'edit'])->name('shipping.methods.edit'); // Show form to edit a shipping method
    Route::put('methods/{shippingMethod}', [ShippingController::class, 'update'])->name('shipping.methods.update'); // Update a shipping method
    Route::delete('methods/{shippingMethod}', [ShippingController::class, 'destroy'])->name('shipping.methods.destroy'); // Delete a shipping method

    Route::post('zones', [ShippingController::class, 'storeZone'])->name('shipping_zones.store');
});


Route::get('/get-session', function () {
    // session()->forget('previous_url');
    // session()->forget('two_step_url');
    // session()->put('name', 'Motiuir');
    // dd(session()->all());
    // session()->flush();
});


require __DIR__.'/auth.php';
