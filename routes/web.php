<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\TransactionController;
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

Route::view('/landingpage', 'landingpage.home');
Route::view('/', 'landingpage.home');
Route::view('/landingpage/pages/shop', 'landingpage.pages.shop');
Route::view('/landingpage/pages/productdetails', 'landingpage.pages.productdetails');
Route::view('/landingpage/pages/shopcart', 'landingpage.pages.shopcart');
Route::view('/landingpage/pages/checkout', 'landingpage.pages.checkout');
Route::view('/landingpage/pages/blogdetails', 'landingpage.pages.blogdetails');
Route::view('/landingpage/pages/blog', 'landingpage.pages.blog');
Route::view('/landingpage/pages/contact', 'landingpage.pages.contact');

Route::middleware(['auth:sanctum', 'verified'])->name('dashboard.')->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::middleware(['admin'])->group(function() {
        Route::resource('products', ProductController::class);
        Route::resource('products.gallery', ProductGalleryController::class)->shallow()->only([
            'index', 'create', 'store', 'destroy'
        ]);
        Route::resource('transaction', TransactionController::class);
    });

});
