<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', [WelcomeController::class, 'dashboard'])->name("overview");

Route::get('/products', [WelcomeController::class, 'index'])->name('products.welcome');

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

Route::post('/product/store', [ProductController::class,'store']);

require __DIR__.'/auth.php';

