<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/products', [ProductController::class, 'index'])->name('products.api.index');
Route::post('/products', [ProductController::class, 'store'])->name('products.api.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.api.show');



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

