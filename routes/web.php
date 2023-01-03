<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\Authenticate;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
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
Route::prefix('admin')->group(function () {
    Route::get('/register', [AuthController::class, 'getRegister'])->name('admin.register');
    Route::post('/register', [AuthController::class, 'postRegister']);
    Route::get('/login', [AuthController::class, 'getLogin'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'postLogin']);
    Route::get('/verify-register/{token}', [AuthController::class, 'verifyRegister'])->name('admin.verify');
    Route::get('/verify-change-password/{token}', [AuthController::class, 'verifyChangePassword'])->name('admin.verify_change_password');
    Route::post('/verify-change-password/{token}', [AuthController::class, 'postVerifyChangePassword'])->name('admin.post_verify_change_password');
    Route::get('/forgot-password', [AuthController::class, 'confirmEmail'])->name('admin.forgot_password');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);

    Route::middleware(Authenticate::class)->group(function () {
        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'list'])->name('admin.user');
            Route::get('/create', [UserController::class, 'create'])->name('user.create');
            Route::post('/create', [UserController::class, 'postCreate']);
            Route::get('/update/{id}', [UserController::class, 'update'])->name('users.update');
            Route::post('/update/{id}', [UserController::class, 'postUpdate']);
            Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
            Route::get('/change-password', [UserController::class, 'changePassword'])->name('admin.change_password');
            Route::post('/change-password', [UserController::class, 'postChangePassword']);
            Route::get('/logout', [AuthController::class, 'logout'])->name('users.logout');
        });

        Route::resource('/category', CategoryController::class);
    });
});






