<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function placeOrder(Request $request) {
        $request->validate([
            'full_name' => 'required',
            'contact_number' => 'required',
            'zip_code' => 'required|numeric',
            'province' => 'required',
            'city' => 'required',
            'barangay' => 'required',
            'home_address' => 'required',
            'payment' => 'required|mimes:jpg,jpeg,png,bmp,tiff,pdf|max:50000',
        ]);

        do {
            $referenceCode = generateCode(8);
            $codeExists = Order::where('reference', 'LIKE', $referenceCode)
                ->first();
        } while ($codeExists);

        $cartItems = Auth::user()->cartItemsWithProducts();

        $totalPrice = 0;
        foreach($cartItems as $cartItem) {
            $totalPrice += $cartItem['quantity'] * $cartItem['price'];
        }

        $file = $request->file('payment');
        $name = $file->hashName();
        $path = '/payments/';
        Storage::disk('public')->put($path, $file, "public");
        $payment = config('filesystems.disks.public.url') . $path . $name;

        $promoCode = null;
        if(in_array(strtolower($request->promo_code), array_map('strtolower', $this->promoCodes()))) {
            $totalPrice *= 0.9;
            $promoCode = $request->promo_code;
        }

        $shippingFee = 100;

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
        $order->payment = $payment;
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

        Cart::where('user_id', Auth::user()->id)
            ->delete();

        return response()->json([
            'redirect' => route('orders.index')
        ]);
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
