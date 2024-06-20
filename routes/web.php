<?php

use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\FeatureController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\theme\ThemeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',ThemeController::class)->name('theme.home');
Route::get('categories/{name}', [App\Http\Controllers\theme\CategoryController::class, 'show'])->name('categories.show');


Route::prefix('dashboard')->group(function (){
    Route::get('/',HomeController::class)->name('dashboard.home');
    Route::resource('posts',PostController::class);
    Route::resource('brands',BrandController::class)->except(['show']);
    Route::resource('categories',CategoryController::class)->except(['show']);
    Route::resource('features',FeatureController::class)->except(['show']);
    Route::resource('sliders',SliderController::class)->except(['show']);
    Route::resource('products',ProductController::class)->except(['show']);
    Route::get('/get-subcategories/{category_id}', [CategoryController::class, 'getSubcategories']);
});
