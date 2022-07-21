<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Http\Requests\CheckoutRequest;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Exception;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    public function index(Request $request)

    {
        $products = Product::with(['galleries'])->latest()->limit(8)->get();

        return view('landingpage.home', compact('products'));
    }

    public function shop_list(Request $request){

        $products = Product::with(['galleries'])->latest()->limit(50)->get();

        return view('landingpage.pages.shop', compact('products'));
    }

    public function success(Request $request)
    {
        return view('landingpage.pages.success');
    }

    public function search(Request $request)
	{
		// menangkap data pencarian
		$search = $request->search;
    	// mengambil data dari table product sesuai pencarian data
		$products = Product::where('name', 'like', "%" . $search . "%")->paginate(50);


        // mengirim data product ke view index
        // if($request->ajax()){

        //     $output="";
		//     $products = Product::where('name', 'like', "%".$request->search."%")->get()->paginate(5);
        //     if($products){
        //        foreach ($products as  $product) {
        //         $output.=
        //         '<div class="col-lg-3 col-md-6">
        //         <div class="product__item">
        //         <div class="product__item__pic set-bg" data-setbg="'. $product->galleries()->exists() ? Storage::url($product->galleries->first()->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' .'">
        //         <div class="label new">New</div>
        //         <ul class="product__hover">
        //         <li><a href="'. $product->galleries()->exists() ? Storage::url($product->galleries->first()->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' .'" class="image-popup"><span class="arrow_expand"></span></a></li>
        //         <li><a href="'. route('detail', $product->slug) .'"><span class="icon_bag_alt"></span></a></li>
        //         </ul>
        //         </div>
        //         </div>
        //         </div>';
        //        }
        //        return $output;
        //     }
		return view('landingpage.pages.shop', compact('products'));

    }

    public function details(Request $request, $slug)
    {
        $product = Product::with(['galleries'])->where('slug', $slug)->firstOrFail();
        $recomendations = Product::with(['galleries'])->inRandomOrder()->limit(4)->get();

        return view('landingpage.pages.productdetails', compact('product', 'recomendations'));
    }

    public function products(Request $request, $slug)
    {
        $product = Product::with(['galleries'])->where('slug', $slug)->firstOrFail();
        $recomendations = Product::with(['galleries'])->inRandomOrder()->limit(4)->get();

        return view('landingpage.pages.shopcart', compact('product', 'recomendations'));
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

    public function checkout(CheckoutRequest $request)
    {
        $data = $request->all();

        // ambil dulu data cart
        $carts = Cart::with(['product'])->where('users_id', Auth::user()->id)->get();

        // baru masukan ke transaksi
        $data['users_id'] = Auth::user()->id;
        $data['total_price'] = $carts->sum('product.price');

        // buat data transaksi
        $transaction = Transaction::create($data);

        // buat transaksi item
        foreach ($carts as $cart) {
            $items[] = TransactionItem::create([
                'transactions_id' => $transaction->id,
                'users_id' => $cart->users_id,
                'products_id' => $cart->products_id,
            ]);
        }

        // hapus data cart habis transaksi
        Cart::where('users_id', Auth::user()->id)->delete();

        // konfigurasi midtrans
        // ngambil dari services.php
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // Setup variable midtrans
        $midtrans = [
            'transaction_details' => [
                'order_id' => 'TRIXIE-' . $transaction->id,
                'gross_amount' => (int) $transaction->total_price
            ],
            'customer_details' => [
                'first_name' => $transaction->name,
                'email' => $transaction->email,
            ],
            'enabled_payments' => ['gopay', 'bank_transfer', 'alfamart', 'shopeepay', 'indomaret'],
            'vtweb' => []
        ];

        // payment proses
        try {
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

            $transaction->payment_url = $paymentUrl;
            $transaction->save();

            return redirect($paymentUrl);

        }
        catch (Exception $e) {
            echo $e->getMessage();
        }

    }

}
