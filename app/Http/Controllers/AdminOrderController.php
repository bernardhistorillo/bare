<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class AdminOrderController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $data = Order::leftJoin('users', 'user_id', 'users.id')
                ->leftJoinSub(
                    DB::table('order_statuses')
                        ->selectRaw('MAX(id) as id, order_id')
                        ->groupBy('order_id'),
                    'latest_status', 'orders.id', '=', 'latest_status.order_id'
                )
                ->with('orderItems.product')
                ->leftJoin('order_statuses', 'order_statuses.id', '=', 'latest_status.id')
                ->select('orders.*', 'users.name', 'users.email', 'order_statuses.status', 'order_statuses.created_at as order_status_created_at');

            return DataTables::of($data)
                ->addColumn('date_time', function ($row) {
                    return \Carbon\Carbon::parse($row->created_at)->setTimezone('Asia/Manila')->isoFormat('llll');
                })
                ->addColumn('delivery_details', function ($row) {
                    return '<p class="font-size-90 mb-0">' . $row->full_name . '</p>
                            <p class="font-size-90 mb-0">' . $row->contact_number . '</p>
                            <p class="font-size-90 mb-0">' . $row->fullAddress() . '</p>';
                })
                ->addColumn('price', function ($row) {
                    return '<div class="d-flex align-items-center"><div class="pe-1"><i class="fa fa-peso-sign"></i></div><div>' . number_format($row->price, 2) . '</div></div>';
                })
                ->addColumn('actions', function ($row) {
                    $content = '
                        <div class="text-center"><button class="btn btn-custom-1 btn-sm font-size-80 mb-1 view-order-items" style="min-width:93px">View Items</button></div>
                        <div class="text-center"><button class="btn btn-custom-1 btn-sm font-size-80" style="min-width:93px">Update Status</button></div>

                        <div class="order-items-table-container d-none">
                            <p class="text-color-1 mb-3">Reference: ' . $row['reference'] . '</p>

                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-color-1 cerebri-sans-pro-regular aign-middle font-size-90">Product</th>
                                            <th class="text-color-1 cerebri-sans-pro-regular aign-middle font-size-90 text-center">Unit Price</th>
                                            <th class="text-color-1 cerebri-sans-pro-regular aign-middle font-size-90 text-center">Quantity</th>
                                            <th class="text-color-1 cerebri-sans-pro-regular aign-middle font-size-90 text-center">Item Subtotal</th>
                                       </tr>
                                    </thead>
                                    <tbody>';
                                        foreach($row['orderItems'] as $orderItem) {
                                            $content .= '<tr>
                                            <td class="align-middle">
                                                <div class="d-flex align-items-center">
                                                    <div class="pe-3">
                                                        <img src="' . $orderItem['product']['photo'] . '" style="width:60px; max-width:60px" />
                                                    </div>
                                                    <div>
                                                        <p class="cerebri-sans-pro-regular mb-0">' . $orderItem['product']['name'] . '</p>
                                                        <p class="text-color-6 font-size-70 cerebri-sans-pro-regular font-weight-300">';

                                            $variations = json_decode($orderItem['product']['variations'], true);

                                            end($variations);
                                            $lastKey = key($variations);
                                            reset($variations);

                                            foreach ($variations as $key => $variation) {
                                                $content .= '<span class="font-weight-500">' . $key . ':</span> ' . $variation . (($key == $lastKey) ? ',&nbsp; ' : '');
                                            }
                                            $content .= '                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <div class="pe-1 tw-pb-[2px]">
                                                        <i class="fa-regular fa-peso-sign"></i>
                                                    </div>
                                                    <div class="cerebri-sans-pro-regular font-size-90 text-center">' . number_format($orderItem['price'], 2) . '</div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <div class="cerebri-sans-pro-regular font-size-90 text-center">' . number_format($orderItem['quantity']) . '</div>
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <div class="pe-1 tw-pb-[2px]">
                                                        <i class="fa-regular fa-peso-sign"></i>
                                                    </div>
                                                    <div class="cerebri-sans-pro-regular font-size-90 text-center">' . number_format($orderItem['price'] * $orderItem['quantity'], 2) . '</div>
                                                </div>
                                            </td>
                                        </tr>';
                                        }
                    $content .= '</tbody>
                                </table>
                            </div>
                        </div>';

                    return $content;
                })
                ->rawColumns(['date_time', 'delivery_details', 'price', 'actions'])
                ->make(true);
        }

        return view('admin.orders.index');
    }
}
