<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $order = new Order();
        $order->reference = $referenceCode;
        $order->user_id = Auth::user()->id;
        $order->price = $totalPrice;
        $order->full_name = $request->full_name;
        $order->contact_number = $request->contact_number;
        $order->home_address = $request->home_address;
        $order->barangay = $request->barangay;
        $order->city = $request->city;
        $order->province = $request->province;
        $order->zip_code = $request->zip_code;
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
        $orderStatus->status = 'Placed';
        $orderStatus->is_current = 1;
        $orderStatus->save();

        Cart::where('user_id', Auth::user()->id)
            ->delete();

        return response()->json([
            'redirect' => route('orders.index')
        ]);
    }
}
