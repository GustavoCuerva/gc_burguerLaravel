<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

Route::get('/', [ProductController::class, 'index'])->name('index');

Route::prefix('/reserves')->group(function(){
    Route::get('/reserve', [ReservationController::class, 'create'])->name('reserve');
    Route::get('/reserves', [ReservationController::class, 'show'])->middleware('auth')->name('reserves');
});

Route::prefix('/products')->group(function(){
    Route::get('/menu', [ProductController::class, 'list'])->name('menu');
    Route::get('/prod/{id}', [ProductController::class, 'show'])->name('product');
    Route::get('/favorites', [ProductController::class, 'favorites_list'])->middleware('auth')->name('favorites');
});

Route::get('/about', [AboutController::class, 'about'])->name('about');

Route::prefix('dashboard')->group(function(){
    
    // Category
    Route::get('/category', [CategoryController::class, 'create'])->middleware('auth')->name('admin.category');
    Route::get('/category/{id}', [CategoryController::class, 'show_edit'])->middleware('auth')->name('edit.category');
    Route::post('/category', [CategoryController::class, 'store'])->middleware('auth')->name('store.category');
    Route::put('/category', [CategoryController::class, 'update'])->middleware('auth')->name('store.category');
    Route::delete('/category', [CategoryController::class, 'destroy'])->middleware('auth')->name('del.category');

    // Products
    Route::get('/products/{id}', [ProductController::class, 'listProducts'])->middleware('auth')->name('admin.products');
    Route::get('/products/create/{id}', [ProductController::class, 'create'])->middleware('auth')->name('create.products');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->middleware('auth')->name('edit.products');
    Route::post('/products/create', [ProductController::class, 'store'])->middleware('auth')->name('store.products');
    Route::put('/products/update', [ProductController::class, 'update'])->middleware('auth')->name('update.products');
});

Route::fallback(function(){
    return view('fallback');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
});
