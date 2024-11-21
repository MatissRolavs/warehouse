<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UtilizedProductController;

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

    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::patch('/product/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/lowstock', [ProductController::class, 'lowstockIndex'])->name('lowstock.index');
    Route::get('/inventory', [ProductController::class, 'inventory'])->name('product.inventory');
    Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/product/{product}/buy', [ProductController::class, 'buy'])->name('product.buy');
    Route::patch('/product/{product}/buy', [ProductController::class, 'buyupdate'])->name('product.buyupdate');
    Route::get('/product/{product}/utilized', [ProductController::class, 'utilized'])->name('product.utilized');
    Route::patch('/product/{product}/utilized', [ProductController::class, 'utilizedupdate'])->name('product.utilizedupdate');
    Route::get('/utilized', [UtilizedProductController::class, 'index'])->name('utilized.index');

});

require __DIR__.'/auth.php';

