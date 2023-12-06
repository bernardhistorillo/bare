@extends('layouts.admin')

@section('title', 'Admin Inventory')

@section('content')
<main class="main">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h6 class="h6 mb-0 text-gray-800">Inventory</h6>
    </div>

    <div class="animated fadeIn pb-5">
        <div class="table-responsive p-1 font-size-90">
            <div class="text-center py-5 my-5 loading-text">Loading</div>
            <table class="table table-bordered data-table d-none admin-table w-100">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Variation</th>
                        <th>Inventory</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td class="align-middle">
                            <div class="d-flex align-items-center">
                                <div class="pe-3">
                                    <img src="{{ $product['photo'] }}" style="width:60px; max-width:60px" />
                                </div>
                                <div>
                                    <p class="cerebri-sans-pro-regular mb-0 product-name">{{ $product['name'] }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">
                            <div class="text-color-6 font-size-90 cerebri-sans-pro-regular font-weight-300 product-variation">
                                @foreach(json_decode($product['variations'], true) as $key => $variation)
                                <div><span class="font-weight-500">{{ $key }}:</span> {!! $variation !!}</div>
                                @endforeach
                            </div>
                        </td>
                        <td>
                            <div class="text-center stock" data-product-id="{{ $product['id'] }}" data-stock="{{ $product['stock'] }}">{{ number_format($product['stock']) }}</div>
                        </td>
                        <td>
                            <div class="text-center">
                                <button class="btn btn-custom-1 btn-sm font-size-80 mb-1 add-stock" value="{{ $product['id'] }}" style="min-width:93px">Add Inventory</button>
{{--                                <button class="btn btn-custom-1 btn-sm font-size-80 mb-1" style="min-width:93px">History</button>--}}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

<div class="modal fade" id="modal-add-stock" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius:20px">
            <div class="modal-body position-relative py-4">
                <div class="position-absolute" style="top:20px; right:22px">
                    <i class="fa-regular fa-times cursor-pointer font-size-120" data-bs-dismiss="modal"></i>
                </div>

                <div class="font-size-110 text-center mb-3">Add Stock</div>

                <p class="" id="product-name"></p>
                <p class="font-size-80 mb-4" id="variation"></p>

                <p class="font-size-90 mb-1">Quantity:</p>
                <input type="number" class="form-control mb-4" id="quantity" placeholder="Quantity" value="1" min="1" />
            </div>

            <div class="modal-footer justify-content-center" style="border-color:#808080">
                <button type="button" class="btn btn-custom-2 font-weight-500 px-4" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-custom-1 font-weight-500 px-4" id="add-stock" data-url="{{ route('admin.inventory.addStock') }}">Submit</button>
            </div>
        </div>
    </div>
</div>
@endsection
