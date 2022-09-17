<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return back();
});

Route::group(['middleware' => ['auth.no-key']], function() {
    Route::get('login', [AuthController::class, 'loginPage'])->name('login');
    Route::post('loginApi', [AuthController::class, 'loginApi'])->name('loginApi');

    Route::get('register', [AuthController::class, 'registerPage'])->name('register');
    Route::post('registerApi', [AuthController::class, 'registerApi'])->name('registerApi');
});

Route::group(['middleware' => ['auth.key']], function() {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'admin'], function() {
        Route::get('/', [AdminController::class, 'index'])->name('admin');
    });
});
