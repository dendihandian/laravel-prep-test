<?php

use Illuminate\Support\Facades\Route;
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
    return redirect()->route('products.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('products')->name('products.')->middleware('auth')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::post('/', [ProductController::class, 'store'])->name('store');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::get('/table', [ProductController::class, 'table'])->name('table');
    Route::get('/datatable', [ProductController::class, 'datatable'])->name('datatable');
    Route::get('/factory/{count}', [ProductController::class, 'factory'])->name('factory');

    Route::prefix('{product}')->middleware('product_owner')->group(function () {
        Route::get('/', [ProductController::class, 'show'])->name('show');
        Route::patch('/', [ProductController::class, 'update'])->name('update');
        Route::delete('/', [ProductController::class, 'delete'])->name('delete');
        Route::get('/edit', [ProductController::class, 'edit'])->name('edit');
    });
});
