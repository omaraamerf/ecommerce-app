<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HomeController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/shop', [HomeController::class, 'index'])->name('shop.index');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {

    Route::resource('products', ProductController::class);


    Route::middleware(['admin'])->group(function () {
        Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
        Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
        Route::post('roles/{role}/permissions', [RoleController::class, 'attachPermission'])->name('roles.permissions.attach');
        Route::delete('roles/{role}/permissions', [RoleController::class, 'detachPermission'])->name('roles.permissions.detach');
    });
});
require __DIR__.'/auth.php';
