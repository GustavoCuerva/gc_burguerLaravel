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
use App\Models\Product;

Route::get('/', [ProductController::class, 'index'])->name('index');

Route::prefix('/reservations')->group(function(){
    Route::get('/reserve', [ReservationController::class, 'create'])->name('reserve');
    Route::get('/reservations', [ReservationController::class, 'show'])->name('reservations');
});

Route::prefix('/products')->group(function(){
    Route::get('/menu', [ProductController::class, 'list'])->name('menu');
    Route::get('/prod/{id}', [ProductController::class, 'show'])->name('product');
    Route::get('/favorites', [ProductController::class, 'favorites_list'])->name('favorites');
});

Route::get('/about', [AboutController::class, 'about'])->name('about');

Route::prefix('dashboard')->group(function(){
    Route::get('/category', [CategoryController::class, 'create'])->name('admin.category');
});

Route::fallback(function(){
    return view('fallback');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
