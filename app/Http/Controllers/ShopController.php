<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    public function index() {
        return view('shop.index');
    }

    public function category($category) {
        return view('shop.category', compact('category'));
    }

    public function getProducts() {
        $products = Product::where('status', 1)
            ->orderBy('name')
            ->get();

        if(Auth::check()) {
            $cartItems = CartItem::where('user_id', Auth::user()->id)
                ->get();
        } else {
            $cartItems = session('cartItems') ? session('cartItems') : [];
        }

        foreach($products as $product) {
            foreach($cartItems as $cartItem) {
                if($product['id'] == $cartItem['product_id']) {
                    $product['cartQuantity'] = $cartItem['quantity'];
                }
            }

            if(!isset($product['cartQuantity'])) {
                $product['cartQuantity'] = 0;
            }
        }

        return response()->json([
            'products' => $products
        ]);
    }

    public function updateCart(Request $request) {
        $request->validate([
            'products' => 'required'
        ]);

        $products = json_decode($request->products, true);

        if(Auth::check()) {
            foreach($products as $product) {
                if($product['cartQuantity'] > 0) {
                    $cartItem = Auth::user()->cartItems()
                        ->where('product_id', $product['id'])
                        ->first();

                    if($cartItem) {
                        $cartItem->quantity = $product['quantity'];
                        $cartItem->update();
                    } else {
                        $cartItem = new CartItem();
                        $cartItem->product_id = $product['id'];
                        $cartItem->quantity = $product['quantity'];
                        $cartItem->save();
                    }
                } else {
                    Auth::user()->cartItems()
                        ->where('product_id', $product['id'])
                        ->delete();
                }
            }
        } else {
            $cartItems = [];

            foreach($products as $product) {
                if($product['cartQuantity'] > 0) {
                    $cartItems[] = [
                        'product_id' => $product['id'],
                        'quantity' => $product['cartQuantity'],
                    ];
                }
            }

            session(['cartItems' => $cartItems]);
        }

        return response()->json();
    }
}
