<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function index() {
        $orders = Auth::user()->recentOrders();

        return view('orders.index', compact('orders'));
    }

    public function checkPayment($reference) {
        $order = Auth::user()->orders()
            ->where('reference', $reference)
            ->first();

        abort_if(!$order, '422', 'Invalid Order');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'accept' => 'application/json',
            'Authorization' => 'Basic ' . base64_encode(config('services.paymongo.secret_key') . ':' . config('services.paymongo.password')),
        ])
            ->get('https://api.paymongo.com/v1/checkout_sessions/' . $order['checkout_session_id']);

        $response = json_decode($response, true);

        if($response['data']['attributes']['payments']) {
            foreach($response['data']['attributes']['payments'] as $payment) {
                if($payment['attributes']['status'] == 'paid') {
                    $order->payment = json_encode($payment);
                    $order->update();

                    Cart::where('user_id', Auth::user()->id)
                        ->delete();

                    OrderStatus::where('order_id', $order['id'])
                        ->update([
                            'is_current' => 0
                        ]);

                    $orderStatus = new OrderStatus();
                    $orderStatus->order_id = $order['id'];
                    $orderStatus->status = 'Payment Received';
                    $orderStatus->is_current = 1;
                    $orderStatus->save();

                    break;
                }
            }
        }

        return redirect()->route('orders.index');
    }

    public function cancelPayment($reference) {
        Auth::user()->orders()
            ->where('reference', $reference)
            ->whereNull('payment')
            ->delete();

        return redirect()->route('checkout.index');
    }
}
