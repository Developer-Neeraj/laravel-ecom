<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get("admin", [AdminController::class, "index"]);

Route::post("admin/auth", [AdminController::class, "auth"])->name('admin.auth');

Route::group(["middleware"=>"admin_auth"], function() {
    Route::get('admin/dashboard', [AdminController::class, "dashboard"]);

    Route::get('admin/category', [CategoriesController::class, "index"]);
    Route::get('admin/category/manage_category', [CategoriesController::class, "manage_category"]);
    Route::get('admin/category/manage_category/{id}', [CategoriesController::class, "manage_category"]);
    Route::get('admin/category/manage_category/{type}/{id}', [CategoriesController::class, "status"]);
    Route::post('admin/category/manage_category_process', [CategoriesController::class, "manage_category_process"])->name('category.manage_category_process');
    Route::get('admin/category/delete/{id}', [CategoriesController::class, "delete"]);

    Route::get('admin/coupon', [CouponController::class, "index"]);
    Route::get('admin/coupon/manage_coupon', [CouponController::class, "manage_coupon"]);
    Route::get('admin/coupon/manage_coupon/{id}', [CouponController::class, "manage_coupon"]);
    Route::get('admin/coupon/manage_coupon/{type}/{id}', [CouponController::class, "status"]);
    Route::post('admin/coupon/manage_coupon_process', [CouponController::class, "manage_coupon_process"])->name('category.manage_coupon_process');
    Route::get('admin/coupon/delete/{id}', [CouponController::class, "delete"]);
    
    Route::get('admin/size', [SizeController::class, "index"]);
    Route::get('admin/size/manage_size', [SizeController::class, "manage_size"]);
    Route::get('admin/size/manage_size/{id}', [SizeController::class, "manage_size"]);
    Route::get('admin/size/manage_size/{type}/{id}', [SizeController::class, "status"]);
    Route::post('admin/size/manage_size_process', [SizeController::class, "manage_size_process"])->name('category.manage_size_process');
    Route::get('admin/size/delete/{id}', [SizeController::class, "delete"]);
    
    Route::get('admin/color', [ColorController::class, "index"]);
    Route::get('admin/color/manage_color', [ColorController::class, "manage_color"]);
    Route::get('admin/color/manage_color/{id}', [ColorController::class, "manage_color"]);
    Route::get('admin/color/manage_color/{type}/{id}', [ColorController::class, "status"]);
    Route::post('admin/color/manage_color_process', [ColorController::class, "manage_color_process"])->name('category.manage_color_process');
    Route::get('admin/color/delete/{id}', [ColorController::class, "delete"]);

    Route::get('admin/product', [ProductController::class, "index"]);
    Route::get('admin/product/manage_product', [ProductController::class, "manage_product"]);
    Route::get('admin/product/manage_product/{id}', [ProductController::class, "manage_product"]);
    Route::get('admin/product/manage_product/{type}/{id}', [ProductController::class, "status"]);
    Route::post('admin/product/manage_product_process', [ProductController::class, "manage_product_process"])->name('category.manage_product_process');
    Route::get('admin/product/delete/{id}', [ProductController::class, "delete"]);

    Route::get('admin/logout', function() {
        session()->forget("admin_login");
        session()->forget("Login_id");
        session()->flash("error", "Logout Success");
        return redirect('admin');
    });
});
