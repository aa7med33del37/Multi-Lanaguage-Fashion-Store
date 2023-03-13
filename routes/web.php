<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorSizeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Frontend
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function () {
    Auth::routes();
    Route::get('/', [FrontendController::class, 'index']);

    Route::get('/shop', [FrontendController::class, 'shop']);
    Route::get('/trending', [FrontendController::class, 'trending']);
    Route::get('/featured', [FrontendController::class, 'featured']);
    Route::get('/shop/{category_slug}', [FrontendController::class, 'shopByCategory']);
    Route::get('/shop/view/{product_slug}', [FrontendController::class, 'productView']);

    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

    Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook'])->name('auth.facebook');
    Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'profile']);
        Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
        Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
        Route::post('/profile/get-city-by-governorate', [ProfileController::class, 'getCity']);
        Route::post('/profile/new-address', [ProfileController::class, 'addNewAddress'])->name('profile.new_address');
        Route::get('/profile/address/{id}/delete', [ProfileController::class, 'deleteAddress'])->name('profile.address.delete');


        Route::get('/cart', [FrontendController::class, 'cart']);
        Route::get('/checkout', [FrontendController::class, 'checkout']);
        Route::get('/thank-you', [FrontendController::class, 'thankYou']);
        Route::get('/add-to-wishlist/{productId}', [FrontendController::class, 'addToWishlist'])->name('add_to_wishlist');
        Route::get('/wishlists', [FrontendController::class, 'wishlists']);
        Route::get('/wishlists/{id}/remove', [FrontendController::class, 'wishlistRemove'])->name('wishlist.remove');
        // Order
        Route::get('orders', [FrontendController::class, 'orders']);
        Route::get('orders/{order_id}', [FrontendController::class, 'viewOrder']);
        // Invoice
        Route::get('invoice/{order_id}', [InvoiceController::class, 'view']);
        Route::get('invoice/{order_id}/generate', [InvoiceController::class, 'generate']);

    });
});

// Admin
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function () {
    Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
        Route::get('/', [DashboardController::class, 'index']);
        // Banner Route
        Route::resource('banners', BannerController::class);
        // Category Route
        Route::resource('categories', CategoryController::class);
        // Brand Route
        Route::resource('brands', BrandController::class);
        // Product Route
        Route::resource('products', ProductController::class);
        Route::get('products/remove-image/{imageId}', [ProductController::class, 'removeImage'])->name('products.image.remove');
        Route::post('product-color/{product_color_id}', [ProductController::class, 'updateColorQty']);
        Route::get("product-color/{product_color_id}/delete", [ProductController::class, 'deleteColorQty']);
        // Order Route
        Route::resource('orders', OrderController::class);
        // Cart Route
        Route::resource('carts', CartController::class);

        // Color Route
        Route::resource('colors', ColorController::class);
        // Size Route
        Route::resource('sizes', SizeController::class);
        // Invoice Route
        Route::get('invoice/{order_id}', [InvoiceController::class, 'view']);
        Route::get('invoice/{order_id}/generate', [InvoiceController::class, 'generate']);
        Route::get('invoice/{order_id}/mail', [InvoiceController::class, 'sendMail']);

        // Setting Route
        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::get('settings/manage', [SettingController::class, 'manage'])->name('settings.manage');
        Route::get('settings/manage/{id}', [SettingController::class, 'manage'])->name('settings.manage');
        Route::post('settings/store', [SettingController::class, 'store'])->name('settings.store');
        Route::post('settings/store/{id}', [SettingController::class, 'store'])->name('settings.store');

        Route::get('users', [UserController::class, 'index']);
        Route::delete('users/{id}/delete', [UserController::class, 'delete']);
        Route::get('users/create', [UserController::class, 'create']);
        Route::post('users/store', [UserController::class, 'store']);
        Route::get('profile/{id}', [UserController::class, 'profile'])->name('admin.profile');
        Route::put('profile/{id}/update', [UserController::class, 'updateProfile'])->name('admin.profile.update');
    });
});
