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
}
