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

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::get('/reservations/reserve', [ReservationController::class, 'create'])->name('reserve');
Route::get('/products/menu', [ProductController::class, 'list'])->name('menu');
Route::get('/about', [AboutController::class, 'about'])->name('about');