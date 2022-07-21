<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Notification;
use App\Models\Transaction;

class MidtransController extends Controller
{
    public function callback()
    {
        // set konfigurasi midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // buat instance midtrans notifications
        $notification = new Notification();

        // assign ke variable untuk memudahkan coding
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        // get transaction id //ngambil order id yaitu dengan memecah menggunakan explode
        $order = explode('-', $order_id);

        // cari transaksi id
        $transaction = Transaction::findOrFail($order[1]); //kenapa 1 karena ngambil id dari array ['TRX','4']

        // handle notification midtrans
        if($status == 'capture') {
            if($type == 'credit_card') {
                if($fraud == 'challenge') {
                    // handle konfirmasi pembayaran
                    $transaction->status = 'PENDING';
                } else {
                    // handle pembayaran berhasil
                    $transaction->status = 'SUCCESS';
                }
            }
        }

        else if($status == 'settlement') {
            $transaction->status = 'SUCCESS';
        }

          else if($status == 'pending') {
            $transaction->status = 'PENDING';
        }

          else if($status == 'deny') {
            $transaction->status = 'PENDING';
        }

          else if($status == 'expire') {
            $transaction->status = 'CANCELLED';
        }

          else if($status == 'cancel') {
            $transaction->status = 'CANCELLED';
        }

        // simpan transaksi
        $transaction->save();

        // return response
        return response()->json([
            'meta' => [
                'code' => 200,
                'message' => 'Midtrans Notification Success'
            ]
            ]);

    }
}
