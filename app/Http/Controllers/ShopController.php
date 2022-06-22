<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

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

     public function cart(Request $request)
    {

        // relation bersarang yaitu ngambil dara product dari gallery
        $carts = Cart::with(['product.galleries'])->where('users_id', Auth::user()->id)->get();

        return view('landingpage.pages.shopcart', compact('carts'));
    }

    public function tambahCart(Request $request, $id)
    {
        Cart::create([
            'users_id' => Auth::user()->id,
            'products_id' => $id
        ]);

        return redirect()->route('cart');
    }

    public function hapusCart(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);

        $cart->delete();

        return redirect()->route('cart');

    }

}
