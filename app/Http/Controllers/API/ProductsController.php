<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 100);
        $name = $request->input('name');
        $slug = $request->input('slug');


        if($id)
        {
            $product = Product::with('galleries')->find($id);

            if($product)
                return ResponseFormatter::success($product,'Data produk berhasil diambil');
            else
                return ResponseFormatter::error(null,'Data produk tidak ada', 404);
        }


        if($slug)
        {
            $product = Product::with('galleries')
                ->where('slug', $slug)
                ->first();

            if($product)
                return ResponseFormatter::success($product,'Data produk berhasil diambil');
            else
                return ResponseFormatter::error(null,'Data produk tidak ada', 404);
        }

        $product = Product::with('galleries');

        if($name)
            $product->where('name', 'like', '%' . $name .'%');

        return ResponseFormatter::success(
            $product->paginate($limit),
            'Data list produk berhasil diambil'
        );
    }
}
