<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        if(Auth::check()) {
            $cartItems = Auth::user()->cartItemsWithProducts();

            return view('cart.index', compact('cartItems'));
        } else {
            return redirect()->route('login.index');
        }
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'quantity' => 'required',
        ]);

        $product = Product::where('name', $request->name)
            ->where('category', $request->category)
            ->where(function($query) use ($request) {
                $i = 0;
                while($request['variation_name_' . $i]) {
                    $query->where('variations', 'LIKE', '%"' . $request['variation_name_' . $i] . '": "' . $request['variation_' . $i] . '"%');
                    $i++;
                }
            })
            ->first();

        if($product) {
            $cart = Cart::where('product_id', $product['id'])
                ->where('user_id', Auth::user()->id)
                ->first();

            if($cart) {
                $cart->quantity = $cart['quantity'] + $request->quantity;
                $cart->update();
            } else {
                $cart = new Cart();
                $cart->product_id = $product['id'];
                $cart->user_id = Auth::user()->id;
                $cart->quantity = $request->quantity;
                $cart->save();
            }
        }

        return response()->json([
            'cartQuantity' => cartQuantity()
        ]);
    }

    public function updateQuantity(Request $request) {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
        ]);

        $product = Product::find($request->product_id);

        $cart = Cart::where('product_id', $request->product_id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if($cart) {
            $cart->quantity = $request->quantity;
            $cart->update();
        } else {
            $cart = new Cart();
            $cart->product_id = $request->product_id;
            $cart->user_id = Auth::user()->id;
            $cart->quantity = $request->quantity;
            $cart->save();
        }

        return response()->json([
            'quantity' => $cart['quantity'],
            'price' => number_format($cart['quantity'] * $product['price'],2),
            'cartTotalPrice' => number_format(Auth::user()->cartTotalPrice(), 2),
            'cartQuantity' => cartQuantity(),
        ]);
    }

    public function delete(Request $request) {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        Cart::where('product_id', $request->product_id)
            ->where('user_id', Auth::user()->id)
            ->delete();

        return response()->json([
            'cartQuantity' => cartQuantity(),
            'cartTotalPrice' => number_format(Auth::user()->cartTotalPrice(), 2),
        ]);
    }
}
