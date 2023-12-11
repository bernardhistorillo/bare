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

    public function setInventory(Request $request) {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
            'type' => 'required',
        ]);

        if($request->quantity < 1) {
            abort(422, 'Please enter a valid quantity.');
        }

        $stock = new Stock();
        $stock->product_id = $request->product_id;
        $stock->quantity = ($request->type == 'add') ? $request->quantity : $request->quantity * -1;
        $stock->save();

        return response()->json();
    }
}
