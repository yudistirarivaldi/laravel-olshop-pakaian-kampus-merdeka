<?php

namespace App\Exports;

use App\Models\Transaction as ModelsTransaction;
use App\Transaction;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransactionExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function  collection()
    {
        // return transaction all
        $data  = ModelsTransaction::all();

        return $data;
    }

    public function headings(): array{
        return [
            'id', 'user_id','Nama', 'Email', 'Address', 'Phone', 'Courier', 'Payment', 'Payment_url' , 'Total Price', 'Status'
        ];
    }
}
