<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
    // show data product for shop
    $product = Product::latest()->paginate(30);
    $productgallery = ProductGallery::all();

    return view('landingpage.pages.shop', compact('product', 'productgallery'));
    }
}
