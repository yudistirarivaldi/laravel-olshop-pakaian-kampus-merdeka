<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function index(Request $request)

    {

        $products = Product::with(['galleries'])->latest()->get();

        return view('landingpage.home', compact('products'));
    }

    public function details(Request $request, $slug)
    {
        $product = Product::with(['galleries'])->where('slug', $slug)->firstOrFail();
        $recomendations = Product::with(['galleries'])->inRandomOrder()->limit(4)->get();

        return view('landingpage.pages.productdetails', compact('product', 'recomendations'));
    }
    public function shop_list(Request $request){

        $products = Product::with(['galleries'])->latest()->get();

        return view('landingpage.pages.shop', compact('products'));
    }
}
