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

        if(!$categoryName) {
            abort(404);
        }

        $items = Product::where('category', $categoryName)
            ->where('status', 1)
            ->orderBy('id')
            ->get();

        $groupedProducts = Product::groupedProducts($items);

        return view('shop.category', compact('category', 'categoryName', 'groupedProducts'));
    }

    public function product($category, $product) {
        $categoryName = $this->getCategory($category);

        if(!$categoryName) {
            abort(404);
        }

        $items = Product::where('category', $categoryName)
            ->where('name', 'LIKE', $product)
            ->orderBy('id')
            ->get();

        $product = Product::groupedProducts($items)[0];

        return view('shop.product', compact('category', 'categoryName', 'product'));
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

    public function addToCart(Request $request) {
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

    public function search(Request $request) {
        $request->validate([
            'keyword' => 'required',
        ]);

        $keyword = $request->keyword;

        $items = Product::where(function($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
                $query->orWhere('category', 'LIKE', '%' . $keyword . '%');
                $query->orWhere('description', 'LIKE', '%' . $keyword . '%');
                $query->orWhere('variations', 'LIKE', '%' . $keyword . '%');
            })
            ->where('status', 1)
            ->orderBy('id')
            ->get();

        $groupedProducts = Product::groupedProducts($items);

        return response()->json([
            'content' => (string)view('shop.includes.searchResults', compact('groupedProducts', 'keyword'))
        ]);
    }
}
