<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function callback()
    {
        // set konfigutarasi midtrans notification
        // ngambil dari services.php
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // instance midtrans notification
        $notification = new Notification();

        // lempar ke variabel
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        // ngambil transaciton ID
        // dengan cara dipisahkan dengan tanda -
        $order = explode('-', $order_id); //output ['trixie', '1']

        // cari transaksi
        $transaction = Transaction::findOrFail($order[1]); //kenapa satu karena ngambil array id di atas

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
