<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;




Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);


// dashboard admin (hanya bisa diakses setelah login & role admin)
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard')
    ->middleware('auth');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');


Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('product', ProductController::class);
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('products/manage', [ProductController::class, 'index'])->name('products.manage');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
   Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

});



Route::get('/', [HomeController::class, 'index'])->name('home');
