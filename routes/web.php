<?php

use Illuminate\Support\Facades\Route;

// *** Controller ***
use App\Http\Controllers\ProductController;

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
    return view('welcome');
});

Route::group(
    ['prefix' => 'product'],
    function(){
        Route::get('/', [ProductController::class, 'index'])->name('product');
        Route::get('/create',[ProductController::class, 'create'])->name('product.create');
        Route::post('/store',[ProductController::class, 'store'])->name('product.store');
        Route::get('/show/{id}',[ProductController::class, 'show'])->name('product.show');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::post('/destory/{id}', [ProductController::class, 'destroy'])->name('product.destory');
    }
);
