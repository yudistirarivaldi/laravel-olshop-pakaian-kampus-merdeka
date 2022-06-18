<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;

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

// route for landingpgae
Route::view('/trixie/login', 'landingpage.components.login');
Route::view('/trixie/register', 'landingpage.components.register');
Route::view('/trixie', 'landingpage.home');
Route::view('/', 'landingpage.home');
Route::view('/success', 'landingpage.pages.success');
// Route::view('/trixie/pages/shop', 'landingpage.pages.shop');
Route::view('/trixie/pages/productdetails', 'landingpage.pages.productdetails');
Route::view('/trixie/pages/shopcart', 'landingpage.pages.shopcart');
Route::view('/trixie/pages/checkout', 'landingpage.pages.checkout');
Route::view('/trixie/pages/blogdetails', 'landingpage.pages.blogdetails');
Route::view('/trixie/pages/blog', 'landingpage.pages.blog');
Route::view('/trixie/pages/contact', 'landingpage.pages.contact');

//  route for shop
Route::resource('/trixie/pages/shop', ShopController::class);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->name('dashboard.')->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::middleware(['admin'])->group(function() {
        Route::resource('products', ProductController::class);
        Route::resource('products.gallery', ProductGalleryController::class)->shallow()->only([
            'index', 'create', 'store', 'destroy'
        ]);
        Route::resource('transaction', TransactionController::class);
        Route::resource('user', UserController::class);
    });

});
