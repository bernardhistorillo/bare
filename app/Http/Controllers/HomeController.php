<?php

namespace App\Http\Controllers;

use App\Mail\EmailReceived;
use App\Mail\EmailSent;
use App\Mail\PromoCode;
use App\Models\EmailSubscription;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index() {
        $items = Product::orderBy('products.id')
            ->where('status', 1)
            ->get();

        $groupedProducts = Product::groupedProducts($items);

//        return $groupedProducts;
        return view('home.index', compact('groupedProducts'));
    }

    public function underConstruction() {
        return view('home.underConstruction');
    }

    public function try() {
//        return Auth::user()->cartItemsWithProducts();
//
//        $products = Product::select(
//            'products.*',
//            DB::raw('COALESCE(stocks.total_quantity, 0) as total_quantity'),
//            DB::raw('COALESCE(order_items.sold_quantity, 0) as sold_quantity')
//        )
//            ->leftJoin(DB::raw('(SELECT product_id, SUM(quantity) as total_quantity FROM stocks GROUP BY product_id) as stocks'), 'products.id', '=', 'stocks.product_id')
//            ->leftJoin(DB::raw('(SELECT product_id, SUM(quantity) as sold_quantity FROM order_items JOIN order_statuses ON order_items.order_id = order_statuses.order_id WHERE order_statuses.status IN ("Ready to Ship", "Shipped", "Out for Delivery", "Delivered", "Completed") GROUP BY product_id) as order_items'), 'products.id', '=', 'order_items.product_id')
//            ->where('products.status', 1)
//            ->groupBy('products.id')
//            ->get();
//
//        foreach ($products as $product) {
//            $product->available_stock = $product->total_quantity - $product->sold_quantity;
//        }
//
//        return $products;
//
//        foreach ($products as $product) {
//            $product->available_stock = $product->total_quantity - $product->sold_quantity;
//        }
//
//        return $products;

//        return Product::find(1)->orderItems()
//            ->join('order_statuses', function($join) {
//                $join->on('order_items.order_id', 'order_statuses.order_id');
//                $join->where('is_current', '1');
//                $join->where(function($condition) {
//                    $condition->where('status', 'Ready to Ship');
//                    $condition->orWhere('status', 'Shipped');
//                    $condition->orWhere('status', 'Out for Delivery');
//                    $condition->orWhere('status', 'Delivered');
//                    $condition->orWhere('status', 'Completed');
//                });
//            })
//            ->get();

        Auth::loginUsingId(1);
        return redirect()->route('admin.login.index');
    }
}
