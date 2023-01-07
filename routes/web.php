<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::prefix('admin')->name('admin')->group(function () {
    Route::get('/register', [AuthController::class, 'getRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'postRegister']);
    Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin']);
    Route::get('/verify-register/{token}', [AuthController::class, 'verifyRegister'])->name('verify');
    Route::get('/verify-change-password/{token}', [AuthController::class, 'verifyChangePassword'])->name('verify_change_password');
    Route::post('/verify-change-password/{token}', [AuthController::class, 'postVerifyChangePassword'])->name('post_verify_change_password');
    Route::get('/forgot-password', [AuthController::class, 'confirmEmail'])->name('forgot_password');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
    
    Route::middleware(Authenticate::class)->group(function () {
        Route::get('/change-password', [AuthController::class, 'changePassword'])->name('change_password');
        Route::post('/change-password', [AuthController::class, 'postChangePassword']);
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::resource('/user', UserController::class);
        Route::resource('/category', CategoryController::class);
        Route::resource('/product', ProductController::class);
    });
});
