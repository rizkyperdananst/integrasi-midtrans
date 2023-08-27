<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Midtrans\Config;
use Midtrans\Snap;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function checkout(Request $request)
    {
        $request->request->add([
            'price' => $request->qty * 100000,
            'status' => 'Unpaid',
        ]);

        $order = Order::create($request->all());

        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $order->id,
                'gross_amount' => $order->price,
            ],
            'customer_details' => [
                'name' => $request->name,
                'phone' => $request->phone,
            ],
            'vtweb' => [],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // dd($snapToken);

        return view('checkout', compact('snapToken', 'order'));

    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key) {
            if($request->transaction_status == 'capture') {
                $order = Order::find($request->order_id);
                $order->update(['status' => 'Paid']);
            }
        }
    }
}
