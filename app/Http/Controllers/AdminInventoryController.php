<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class AdminInventoryController extends Controller
{
    public function index(Request $request) {
        $products = Product::all();

        foreach($products as $product) {
            $product['total'] = Stock::where('product_id', $product['id'])
                ->sum('quantity');

            $product['sold'] = OrderItem::where('product_id', $product['id'])
                ->join('order_statuses', function($join) {
                    $join->on('order_items.order_id', 'order_statuses.order_id');
                    $join->where('status', 'Ready to Ship');
                    $join->orWhere('status', 'Shipped');
                    $join->orWhere('status', 'Out for Delivery');
                    $join->orWhere('status', 'Delivered');
                    $join->orWhere('status', 'Completed');
                })
                ->sum('quantity');

            $product['stock'] = $product['total'] - $product['sold'];
        }

        return view('admin.inventory.index', compact('products'));
    }

    public function history(Request $request) {


        return view('admin.inventory.history');
    }

    public function addStock(Request $request) {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

        $orderStatus = new Stock();
        $orderStatus->product_id = $request->product_id;
        $orderStatus->quantity = $request->quantity;
        $orderStatus->save();

        return response()->json();
    }
}
