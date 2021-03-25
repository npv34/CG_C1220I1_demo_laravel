<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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
Route::get('', [\App\Http\Controllers\frontend\HomeController::class,'index']);

Route::get('cart/{id}/add-to-cart', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.addToCart');
Route::get('cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::get('cart/{id}/remove-product', [\App\Http\Controllers\CartController::class, 'removeProduct'])->name('cart.removeProduct');

Route::prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/create', [UserController::class, 'store'])->name('users.store');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/{id}/edit', [UserController::class, 'update'])->name('users.update');
        Route::get('/{id}/delete', [UserController::class, 'delete'])->name('users.delete');
    });
});

Route::get('login',[AuthController::class,'showFormLogin'])->name('login');
Route::post('login',[AuthController::class,'login'])->name('auth.login');

Route::get('register', [AuthController::class, 'showFormRegister'])->name('auth.showFormRegister');
Route::post('register', [AuthController::class, 'register'])->name('auth.register')->middleware('checkAge');
