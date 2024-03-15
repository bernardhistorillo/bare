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
            ->orderBy('products.id')
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
            ->orderBy('products.id')
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
            ->orderBy('products.id')
            ->get();

        $groupedProducts = Product::groupedProducts($items);

        return response()->json([
            'content' => (string)view('shop.includes.searchResults', compact('groupedProducts', 'keyword'))
        ]);
    }
}
