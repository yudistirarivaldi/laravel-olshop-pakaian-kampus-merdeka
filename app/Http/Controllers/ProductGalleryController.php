<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductGalleryRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\ProductGallery;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        if(request()->ajax())
        {
            $query = ProductGallery::query();
            return DataTables::of($query)
            ->addColumn('action', function($item){
                return '
                    <form class="flex justify-center" action="'. route('dashboard.gallery.destroy', $item->id) .'" method="POST">
                        <button class="bg-red-500 text-white  rounded-md px-2 py-1 mr-2">
                            Hapus
                        </button>
                    '. method_field('delete'). csrf_field() .'
                    </form>
                ';
            })
            ->rawColumns(['action'])
            ->make();
        }
        return view('pages.dashboard.gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('pages.dashboard.gallery.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductGalleryRequest $request, Product $product)
    {
        // masukkan foto ke db
                // Proses input data gedung with foto
                $request->validate([
                    'product_id' => 'required|numeric',
                    'is_featured' => 'required|numeric',
                    'url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

                $input = $request->all();

                // logic for proses foto
                if ($image = $request->file('url')) {
                    $destinationPath = 'img/baju';
                    $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->move($destinationPath, $profileImage);
                    $input['url'] = "$profileImage";
                }

                // input create gedung function
                ProductGallery::create($input);

                toast('Success Input Data Product','success');
                // kembali ke page
                return view('pages.dashboard.gallery.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductGallery $productGallery)
    {
        // edit data from db
        return view('pages.dashboard.gallery.edit', compact('productGallery'));
        // dd($productGallery);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductGalleryRequest $request,ProductGallery $productGallery)
    {
        // proses update product galleries
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductGallery $gallery)
    {
        $gallery->delete();

        toast('Success Delete Data Gallery','success');
        return redirect()->route('dashboard.gallery.index');

    }
}
