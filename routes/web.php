<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientAuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group whichs
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('client.')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('home');
    Route::get('/danh-muc/{id}', [ClientController::class, 'category'])->name('category');
    Route::get('/san-pham/{id}', [ClientController::class, 'product'])->name('product');
    Route::get('/dang-ky', [ClientAuthController::class, 'viewRegister'])->name('view_register');
    Route::post('/dang-ky', [ClientAuthController::class, 'storeRegister'])->name('store_register');
    Route::get('/dang-nhap', [ClientAuthController::class, 'getLogin'])->name('view_login');
    Route::post('/dang-nhap', [ClientAuthController::class, 'postLogin'])->name('check_login');
    Route::get('/dang-ky', [ClientAuthController::class, 'getRegister'])->name('register');
    Route::post('/dang-ky', [ClientAuthController::class, 'postRegister']);
    Route::middleware(UserMiddleware::class)->group(function () {
        Route::get('/gio-hang', [CartController::class, 'cart'])->name('cart');
        Route::post('/gio-hang', [CartController::class, 'updateCart'])->name('update_cart');
        Route::post('/add-cart', [CartController::class, 'addCart'])->name('add_cart');
        Route::get('/logout', [ClientAuthController::class, 'logout'])->name('logout');
    });
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/register', [AdminAuthController::class, 'getRegister'])->name('register');
    Route::post('/register', [AdminAuthController::class, 'postRegister']);
    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'postLogin']);
    Route::get('/verify-register/{token}', [AdminAuthController::class, 'verifyRegister'])->name('verify');
    Route::get('/verify-change-password/{token}', [AdminAuthController::class, 'verifyChangePassword'])->name('verify_change_password');
    Route::post('/verify-change-password/{token}', [AdminAuthController::class, 'postVerifyChangePassword'])->name('post_verify_change_password');
    Route::get('/forgot-password', [AdminAuthController::class, 'confirmEmail'])->name('forgot_password');
    Route::post('/forgot-password', [AdminAuthController::class, 'forgotPassword']);

    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::get('/change-password', [AdminAuthController::class, 'changePassword'])->name('change_password');
        Route::post('/change-password', [AdminAuthController::class, 'postChangePassword']);
        Route::get('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::resource('/user', UserController::class);
        Route::resource('/category', CategoryController::class);
        Route::resource('/product', ProductController::class);
    });
});
