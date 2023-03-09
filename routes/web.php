<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarModelController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'loginPost'])->name('login.post');

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return Inertia('Home');
    });

    Route::resource('brands', BrandController::class)->except(['update']);
    Route::post('brands/{brand}', [BrandController::class, 'update'])->name('brands.update');

    Route::resource('car-models', CarModelController::class)->except(['update']);
    Route::post('car-models/{carModel}', [CarModelController::class, 'update'])->name('car-models.update');

    Route::resource('product-categories', ProductCategoryController::class)->except(['update']);
    Route::post('product-categories/{productCategory}', [ProductCategoryController::class, 'update'])->name('product-categories.update');

    Route::resource('users', UserController::class);

    Route::get('/settings', [UserController::class, 'settings'])->name('settings');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


