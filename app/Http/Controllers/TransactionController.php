<?php

namespace App\Http\Controllers;

use App\Exports\TransactionExport;
use App\Http\Requests\TransactionRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Maatwebsite\Excel\Facades\Excel;
use PDF;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         {
        if(request()->ajax())
        {

            $query = Transaction::query();

            return DataTables::of($query)
            ->addColumn('action', function($item){
                return '
                <div class="text-center">
                    <a href="'. route('dashboard.transaction.show', $item->id) .'" class="bg-gray-800 text-white rounded-md px-2 py-1 mr-2">
                    <i class="fa fa-eye" aria-hidden="true"></i> Detail
                    </a>

                    <a href="'. route('dashboard.transaction.edit', $item->id) .'" class="bg-gray-500 text-white rounded-md px-2 py-1 mr-2">
                    <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                    </a>
                    </div>

                ';
            })
            ->editColumn('total_price', function($item){
                return number_format($item->total_price);
            })
            ->rawColumns(['action'])
            ->make();
        }
        return view('pages.dashboard.transaction.index');
    }
    }

    // create controller for pdf generate
    public function downloadPDF()
    {
        // $transaction = DB::table('transaction');
        $data = Transaction::all();
        // dd($transaction);
        $pdf = PDF::loadView('data/dataPDF',  ['data' => $data]);

        return $pdf->download(date('m/y/d').'_transaction.pdf');
    }

    // aksi untuk excel export
    public function downloadEXCEL(){

        return Excel::download(new TransactionExport, 'transaction.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    // untuk menampilkan data transaksi yang sudah di beli
    {
       if(request()->ajax())
       {
            $query = TransactionItem::with(['product'])->where('transactions_id', $transaction->id);

            return DataTables::of($query)
                // masuk ke relasi product price
                ->editColumn('product.price', function($item){
                    return number_format($item->product->price);
                })

                ->make();
       }

         return view('pages.dashboard.transaction.show', compact('transaction'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        return view('pages.dashboard.transaction.edit', compact('transaction'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, Transaction $transaction)
    {
        $data = $request->all();

        $transaction->update($data);

        toast('Update Status Transaksi Berhasil', 'success');
        return redirect()->route('dashboard.transaction.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
