<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Ecommerce\ProductController;
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

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/app-download', function () {
    $filePath = public_path('app.apk');
    return response()->download($filePath, 'app.apk');
})->name('app.download');

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
    Route::resource('products', ProductController::class);
    Route::post('products/{id}/add-variant', [ProductController::class, 'addVariant'])->name('products.addVariant');
    Route::post('products/{id}/add-image', [ProductController::class, 'addImage'])->name('products.addImage');
    Route::post('products/{id}/add-detail', [ProductController::class, 'addDetail'])->name('products.addDetail');
    Route::post('products/{id}/add-specification', [ProductController::class, 'addSpecification'])->name('products.addSpecification');
    Route::post('products/{id}/add-review', [ProductController::class, 'addReview'])->name('products.addReview');

});



require __DIR__.'/auth.php';
