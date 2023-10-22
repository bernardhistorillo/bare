<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
        $categoryName = $this->getCategory($category);

        if(!$category) {
            abort(404);
        }

        return view('shop.category', compact('category', 'categoryName'));
    }

    public function product($category, $product) {
        $category = $this->getCategory($category);

        if(!$category) {
            abort(404);
        }

        return view('shop.product', compact('category', 'product'));
    }

    public function getCategory($category) {
        if($category == 'nipple-covers') {
            $category = 'Nipple Covers';
        } else if($category == 'bodysuits') {
            $category = 'Bodysuits';
        } else if($category == 'flat-nipple-covers-for-men') {
            $category = 'Flat Nipple Covers For Men';
        } else if($category == 'travel-pouch') {
            $category = 'Travel Pouch';
        } else {
            $category = null;
        }

        return $category;
    }

    public function getProducts() {
        $products = Product::where('status', 1)
            ->orderBy('name')
            ->get();

        if(Auth::check()) {
            $cartItems = Cart::where('user_id', Auth::user()->id)
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
                        $cartItem = new Cart();
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
