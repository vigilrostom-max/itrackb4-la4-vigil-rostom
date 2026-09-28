<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/whoami', function () {
    return 'Your Name | Block 4A | ITRACKB4 Laravel 12';
});

// MY OWN ROUTES go FIRST, above the resource line.
// If they were below it, Laravel would think "featured" and "filter" are product ids.
Route::get('/products/featured', [ProductController::class, 'featured'])->name('products.featured');

Route::get('/products/filter/{category?}', [ProductController::class, 'filter'])->name('products.filter');

// ONE line that replaces the old index and show routes.
Route::resource('products', ProductController::class);