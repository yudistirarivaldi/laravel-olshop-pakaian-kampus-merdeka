<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyTransactionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\RegisterController;
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


//  route for landing
// Route::view('/form/transaction', 'landingpage.pages.form');

Route::view('/contact', 'landingpage.pages.contact')->name('contact');
Route::get('/', [ShopController::class, 'index'])->name('index');
Route::get('/shop_list', [ShopController::class, 'shop_list'])->name('shop_list');
Route::get('/shop', [ShopController::class, 'search'])->name('search');
route::get('/details/{slug}', [ShopController::class, 'details'])->name('detail');

// valdiasi untuk landing jadi harus login dulu untuk mengakses route ini
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/cart', [ShopController::class, 'cart'])->name('cart');
    // Route::get('/cart', ShopController::class);

    // untuk buat order cart
    Route::post('/cart/{id}', [ShopController::class, 'tambahCart'])->name('tambahCart');

    Route::delete('/cart/{id}', [ShopController::class, 'hapusCart'])->name('hapusCart');

    Route::post('/checkout', [ShopController::class, 'checkout'])->name('checkout');

    Route::get('/checkout/success', [ShopController::class, 'success'])->name('success');

    Route::resource('/register-success', RegisterController::class);


});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


// Ini Route untuk dashboard
Route::middleware(['auth:sanctum', 'verified'])->name('dashboard.')->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

        Route::middleware(['user'])->group(function() {
            Route::resource('my-transaction', MyTransactionController::class);
        });



    // Ini hanya dpa di akses oleh admin
    Route::middleware(['admin'])->group(function() {
        Route::resource('products', ProductController::class);
        Route::resource('products.gallery', ProductGalleryController::class)->shallow()->only([
            'index', 'create', 'store', 'destroy'
        ]);
        Route::resource('transaction', TransactionController::class);
        Route::resource('user', UserController::class);
    });

});

// route for generate pdf
Route::get('/generate-pdf', [TransactionController::class, 'downloadPDF']);
Route::get('/generate-excel', [TransactionController::class, 'downloadEXCEL']);
Route::view('error', 'landingpage.components.404');
