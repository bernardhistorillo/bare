<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class CheckoutController extends Controller
{
    public function index() {
        $cartItems = Auth::user()->cartItemsWithProducts();

        if(count($cartItems) == 0) {
            return redirect()->route('cart.index');
        }

        return view('checkout.index', compact('cartItems'));
    }

    public function proceedToPayment(Request $request) {
        $request->validate([
            'full_name' => 'required',
            'contact_number' => 'required',
            'zip_code' => 'required|numeric',
            'province' => 'required',
            'city' => 'required',
            'barangay' => 'required',
            'home_address' => 'required',
        ]);

        $shippingFee = 100;

        do {
            $referenceCode = generateCode(8);
            $codeExists = Order::where('reference', 'LIKE', $referenceCode)
                ->first();
        } while ($codeExists);

        $cartItems = Auth::user()->cartItemsWithProducts();

        $promoCode = null;
        if(in_array(strtolower($request->promo_code), array_map('strtolower', $this->promoCodes()))) {
            $promoCode = $request->promo_code;
        }

        $totalPrice = 0;
        foreach($cartItems as $cartItem) {
            $cartItem['price'] = ($promoCode) ? $cartItem['price'] * 0.9 : $cartItem['price'];
            $totalPrice += $cartItem['quantity'] * $cartItem['price'];
        }

//        $file = $request->file('payment');
//        $name = $file->hashName();
//        $path = '/payments/';
//        Storage::disk('public')->put($path, $file, "public");
//        $payment = config('filesystems.disks.public.url') . $path . $name;

        $lineItems = [];
        foreach($cartItems as $cartItem) {
            if(substr($cartItem['description'],251, 1) == ' ') {
                $description = substr($cartItem['description'],0, 251) . ' ...';
            } else {
                $description = substr($cartItem['description'],0, 251) . '...';
            }

            if(isset(json_decode($cartItem['variations'],true)['Adhesiveness']) && isset(json_decode($cartItem['variations'],true)['Size'])) {
                $name = $cartItem['name'] . ' - ' . json_decode($cartItem['variations'],true)['Adhesiveness'] . ', ' . json_decode($cartItem['variations'],true)['Size'];
            } else {
                $name = $cartItem['name'];
            }

            $lineItems[] = [
                'currency' => 'PHP',
                'amount' => floatval($cartItem['price']) * 100,
                'description' => $description,
                'name' => $name,
                'quantity' => $cartItem['quantity'],
            ];
        }

        $lineItems[] = [
            'currency' => 'PHP',
            'amount' => $shippingFee * 100,
            'description' => 'Shipping Fee',
            'name' => 'Shipping Fee',
            'quantity' => 1,
        ];

        $data = [
            'data' => [
                'attributes' => [
                    'line_items' => $lineItems,
                    'payment_method_types' => [
                        'card',
                        'gcash',
                        'paymaya'
                    ],
                    'success_url' => route('orders.checkPayment', $referenceCode),
                    'cancel_url' => route('orders.cancelPayment', $referenceCode),
                    'description' => 'BARE products',
                    'show_description' => true,
                    'reference_number' => $referenceCode,
                    'send_email_receipt' => true,
                ],
            ]
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'accept' => 'application/json',
            'Authorization' => 'Basic ' . base64_encode(config('services.paymongo.secret_key') . ':' . config('services.paymongo.password')),
        ])
            ->post('https://api.paymongo.com/v1/checkout_sessions', $data);

        $response = json_decode($response, true);

        $order = new Order();
        $order->reference = $referenceCode;
        $order->user_id = Auth::user()->id;
        $order->price = $totalPrice + $shippingFee;
        $order->full_name = $request->full_name;
        $order->contact_number = $request->contact_number;
        $order->home_address = $request->home_address;
        $order->barangay = $request->barangay;
        $order->city = $request->city;
        $order->province = $request->province;
        $order->zip_code = $request->zip_code;
        $order->checkout_session_id = $response['data']['id'];
        $order->promo_code = $promoCode;
        $order->save();

        foreach($cartItems as $cartItem) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order['id'];
            $orderItem->product_id = $cartItem['product_id'];
            $orderItem->quantity = $cartItem['quantity'];
            $orderItem->price = $cartItem['price'];
            $orderItem->save();
        }

        $orderStatus = new OrderStatus();
        $orderStatus->order_id = $order['id'];
        $orderStatus->status = 'Pending';
        $orderStatus->is_current = 1;
        $orderStatus->save();

        return response()->json([
            'checkout_url' => $response['data']['attributes']['checkout_url'],
        ]);
    }

    public function paymentPaid(Request $request) {
        $data = $request->all();

        $order = Order::where('checkout_session_id', $data['data']['attributes']['data']['id'])
            ->first();

        foreach($data['data']['attributes']['data']['attributes']['payments'] as $payment) {
            if($payment['attributes']['status'] == 'paid') {
                $order->payment = json_encode($payment);
                $order->update();

                Cart::where('user_id', $order['user_id'])
                    ->delete();

                $orderStatus = OrderStatus::where('order_id', $order['id'])
                    ->where('status', 'Payment Received')
                    ->first();

                if(!$orderStatus) {
                    OrderStatus::where('order_id', $order['id'])
                        ->update([
                            'is_current' => 0
                        ]);

                    $orderStatus = new OrderStatus();
                    $orderStatus->order_id = $order['id'];
                    $orderStatus->status = 'Payment Received';
                    $orderStatus->is_current = 1;
                    $orderStatus->save();
                }

                break;
            }
        }
    }

    public function checkPromoCode(Request $request) {
        $request->validate([
            'promo_code' => 'required',
        ]);

        $valid = false;
        if(in_array(strtolower($request->promo_code), array_map('strtolower', $this->promoCodes()))) {
            $valid = true;
        }

        return response()->json([
            'isValid' => $valid
        ]);
    }

    public function promoCodes() {
        return [
            'BARE10'
        ];
    }
}
