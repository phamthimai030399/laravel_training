<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify' => true]);
Route::controller(UserController::class)->group(function () {
    Route::get('/admin/user', 'list')->name('admin.user');
    Route::get('/admin/user/create', 'create')->name('user.create');
    Route::post('/admin/user/create', 'postCreate');
    Route::get('/admin/user/update/{id}', 'update')->name('users.update');
    Route::post('/admin/user/update/{id}', 'postUpdate');
    Route::get('/admin/user/delete/{id}', 'delete')->name('users.delete');
});
Route::controller(AuthController::class)->group(function () {
    Route::get('/admin/register', 'getRegister')->name('admin.register');
    Route::post('/admin/register', 'postRegister');
    Route::get('/admin/login', 'getLogin')->name('admin.login');
    Route::post('/admin/login', 'postLogin');
    Route::get('/admin/logout', 'logout')->name('users.logout');
    Route::get('/verify-register/{token}', 'verifyRegister')->name('admin.verify');
    Route::get('admin/change-password', 'confirmEmail')->name('admin.change_password');
    // Route::post('/change-password', 'changePassword')->name('admin.change_password');
});

// Route::get('admin/change-password', function () {
//     return view('change_password');
// });
