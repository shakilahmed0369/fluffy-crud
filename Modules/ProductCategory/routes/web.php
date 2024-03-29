<?php

use Illuminate\Support\Facades\Route;
use Modules\ProductCategory\app\Http\Controllers\HelloWorldController;
use Modules\ProductCategory\app\Http\Controllers\ProductCategoryController;

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

Route::group([], function () {
    Route::resource('product-category', ProductCategoryController::class)->names('admin.product-category');
    Route::resource('admin/hello-world', HelloWorldController::class)->names('admin.hello-world');
});
