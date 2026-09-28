<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/whoami', function () {
    return 'Your Name | Block 4A | ITRACKB4 Laravel 12';
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/featured', [ProductController::class, 'featured'])->name('products.featured');

Route::get('/products/filter/{category?}', [ProductController::class, 'filter'])->name('products.filter');

Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');