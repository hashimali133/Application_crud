<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});
Route::controller(ProductController::class)->group(function () {

    Route::get('/product', 'index')->name('product.index');
    Route::get('/product/index', 'create')->name('product.create');
    Route::post('/product', 'store')->name('product.store');
    Route::get('/product/{product}/edit', 'edit')->name('product.edit');
    Route::put('/product/{product}', 'update')->name('product.update');
    Route::delete('/product/{product}', 'destroy')->name('product.destroy');
});
// Route::resource('user', [UserController::class, 'store'])->name('user.store');