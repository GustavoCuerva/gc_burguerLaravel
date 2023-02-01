<?php

use App\Actions\Fortify\UpdateUserPassword;
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
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\MailController;

Route::get('/', [ProductController::class, 'index'])->name('index');

// Reserves
Route::prefix('/reserves')->group(function(){
    Route::get('/', [ReservationController::class, 'create'])->name('reserve');
    Route::get('/reserves', [ReservationController::class, 'show'])->middleware('auth')->middleware('verified')->name('reserves');
    Route::get('/confirm/{id}', [ReservationController::class, 'emailConfirm'])->middleware('auth')->middleware('verified')->name('reserve.confirmMail');
    Route::post('/reserve', [ReservationController::class, 'store'])->middleware('auth')->middleware('verified')->name('reserve.store');
    Route::put('/confirm', [ReservationController::class, 'confirm'])->middleware('auth')->middleware('verified')->name('reserve.confirm');
    Route::put('/cancel', [ReservationController::class, 'cancel'])->middleware('auth')->middleware('verified')->name('reserve.cancel');
});

Route::get('/products/favorites/{id}', [ProductController::class, 'favorites_list'])->middleware('auth')->middleware('verified')->name('favorites');
Route::prefix('/products')->group(function(){
    Route::get('/menu/{id}', [ProductController::class, 'list'])->name('menu');
    Route::get('/{id}', [ProductController::class, 'show'])->name('product');
    Route::post('/', [ProductController::class, 'saved'])->middleware('auth')->middleware('verified')->name('saved.product');
});

Route::get('/about', [InformationController::class, 'about'])->name('about');

Route::prefix('dashboard')->group(function(){
    
    // Category
    Route::get('/category', [CategoryController::class, 'create'])->middleware('auth')->middleware('verified')->name('admin.category');
    Route::get('/category/{id}', [CategoryController::class, 'show_edit'])->middleware('auth')->middleware('verified')->name('edit.category');
    Route::post('/category', [CategoryController::class, 'store'])->middleware('auth')->middleware('verified')->name('store.category');
    Route::put('/category', [CategoryController::class, 'update'])->middleware('auth')->middleware('verified')->name('store.category');
    Route::delete('/category', [CategoryController::class, 'destroy'])->middleware('auth')->middleware('verified')->name('del.category');

    // Products
    Route::get('/products/{id}', [ProductController::class, 'listProducts'])->middleware('auth')->middleware('verified')->name('admin.products');
    Route::get('/products/create/{id}', [ProductController::class, 'create'])->middleware('auth')->middleware('verified')->name('create.products');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->middleware('auth')->middleware('verified')->name('edit.products');
    Route::post('/products/create', [ProductController::class, 'store'])->middleware('auth')->middleware('verified')->name('store.products');
    Route::put('/products/update', [ProductController::class, 'update'])->middleware('auth')->middleware('verified')->name('update.products');
    Route::delete('/products', [ProductController::class, 'destroy'])->middleware('auth')->middleware('verified')->name('delete.products');

    // Information
    Route::get('/information', [InformationController::class, 'edit'])->middleware('auth')->middleware('verified')->name('information');
    Route::put('/information', [InformationController::class, 'update'])->middleware('auth')->middleware('verified')->name('information');

    // Reserves
    Route::get('/reserves/{id}', [ReservationController::class, 'showAdmin'])->middleware('auth')->middleware('verified')->name('reserves.admin');
});

Route::post('/assessments', [AssessmentController::class, 'store'])->middleware('auth')->middleware('verified')->name('store.assessments');
Route::put('/assessments', [AssessmentController::class, 'update'])->middleware('auth')->middleware('verified')->name('update.assessments');

Route::get('/my-data', [UserController::class, 'index'])->middleware('auth')->middleware('verified')->name('my-data');
Route::put('/my-data', [UserController::class, 'update'])->middleware('auth')->middleware('verified')->name('my-data.update');
Route::delete('/my-data', [UserController::class, 'destroy'])->middleware('auth')->middleware('verified')->name('delete.user');

Route::get('/end', [UserController::class, 'close'])->middleware('auth')->middleware('verified');

// Envio de email
Route::prefix('/send-mail')->group(function(){
    Route::get('/reserve/{id}', [MailController::class, 'mailReserve'])->middleware('auth')->middleware('verified')->name('send.mail.reserve');
    Route::get('/confirm', [MailController::class, 'mailConfirmReserve'])->middleware('auth')->middleware('verified')->name('send.mail.confirm');
});

Route::get('/teste', function (){
    return view('emails.reserves.confirm');
});

Route::fallback(function(){
    return view('fallback');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->middleware('verified')->name('dashboard');
});
