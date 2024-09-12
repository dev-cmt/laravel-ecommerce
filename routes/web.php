<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Ecommerce\CategoryController;
use App\Http\Controllers\Ecommerce\BrandController;
use App\Http\Controllers\Ecommerce\ColorController;
use App\Http\Controllers\Ecommerce\ProductController;
use App\Http\Controllers\Ecommerce\OrderController;
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

Route::get('/compare', [HomeController::class, 'compare'])->name('compare');
Route::get('/wishlist', [HomeController::class, 'wishlist'])->name('wishlist');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');

Route::post('/product/review', [HomeController::class, 'storeReview'])->name('product.review.store');
Route::get('/load-more-reviews', [HomeController::class, 'loadMoreReviews'])->name('load-more-reviews');

Route::get('/user-profile', [HomeController::class, 'userProfile'])->name('user-profile');



Route::get('/app-download', function () {
    $filePath = public_path('app.apk');
    return response()->download($filePath, 'app.apk');
})->name('app.download');

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


    Route::resource('orders', OrderController::class);
    Route::get('/order-index', [OrderController::class, 'orderIndex'])->name('order.index');
    Route::get('/order-details', [OrderController::class, 'orderDetailsView'])->name('order.details');
    
});

require __DIR__.'/auth.php';
