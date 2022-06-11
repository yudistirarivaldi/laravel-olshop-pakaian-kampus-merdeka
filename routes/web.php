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

// Route::get('/', function () {
//     return view('welcome');
// });
// route for landingpage
Route::view('/landingpage', 'landingpage.home');
Route::view('/', 'landingpage.home');
Route::view('/landingpage/pages/shop', 'landingpage.pages.shop');
Route::view('/landingpage/pages/productdetails', 'landingpage.pages.productdetails');
Route::view('/landingpage/pages/shopcart', 'landingpage.pages.shopcart');
Route::view('/landingpage/pages/checkout', 'landingpage.pages.checkout');
Route::view('/landingpage/pages/blogdetails', 'landingpage.pages.blogdetails');
Route::view('/landingpage/pages/blog', 'landingpage.pages.blog');
Route::view('/landingpage/pages/contact', 'landingpage.pages.contact');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
