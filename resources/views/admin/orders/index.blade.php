@extends('layouts.admin')

@section('title', 'Admin Orders')

@section('content')
<main class="main">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h6 class="h6 mb-0 text-gray-800">Orders</h6>
    </div>

    <div class="animated fadeIn pb-5">
        <div class="table-responsive p-1 font-size-90">
            <div class="text-center py-5 my-5 loading-text">Loading</div>
            <table class="table table-bordered data-table d-none admin-table w-100" id="orders-table" data-url="{{ route('admin.orders.index') }}">
                <thead>
                    <tr>
                        <th>Date&nbsp;&amp; Time Placed</th>
                        <th>Reference</th>
                        <th>Account</th>
                        <th>Delivery Details</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</main>

<div class="modal fade" id="modal-view-order-items" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="border-radius:20px">
            <div class="modal-body position-relative py-4">
                <div class="position-absolute" style="top:20px; right:22px">
                    <i class="fa-regular fa-times cursor-pointer font-size-120" data-bs-dismiss="modal"></i>
                </div>

                <div id="order-items-container"></div>
            </div>
        </div>
    </div>
</div>
@endsection
