<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\Authenticate;
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


Route::get('/', [ClientController::class, 'index'])->name('client.home');
Route::get('/danh-muc/{id}', [ClientController::class, 'category'])->name('client.category');
Route::get('/san-pham/{id}', [ClientController::class, 'product'])->name('client.product');
Route::get('/dang-ky', [ClientAuthController::class, 'viewRegister'])->name('client.view_register');
Route::post('/dang-ky', [ClientAuthController::class, 'storeRegister'])->name('client.store_register');
Route::get('/dang-nhap', [ClientAuthController::class, 'viewLogin'])->name('client.view_login');
Route::post('/dang-nhap', [ClientAuthController::class, 'checkLogin'])->name('client.check_login');
Route::middleware(Authenticate::class)->group(function () {
    Route::get('/gio-hang', [ClientController::class, 'cart'])->name('client.cart');
    Route::post('/add-cart', [ClientController::class, 'addCart'])->name('client.add_cart');
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
