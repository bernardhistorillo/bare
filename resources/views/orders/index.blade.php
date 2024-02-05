@extends('layouts.app')

@section('title', 'My Purchases')

@section('content')
<div>
    <div class="bg-color-2 text-center p-2">
        <p class="cerebri-sans-pro-regular text-white font-size-100 letter-spacing-5 mb-0">PRE-SALE COMING SOON</p>
    </div>

    <div class="background-image-cover" style="background-image:url('{{ asset('img/contact/hero.webp') }}')">
        @include('home.includes.nav')

        <div class="container" style="padding-top:84px"></div>
    </div>

    <div class="bg-white">
        <div class="container d-flex justify-content-center align-items-center py-5" style="min-height: calc(100vh - 124px)">
            <div class="w-100 pb-5 {{ count($orders) == 0 ? 'd-none' : '' }}">
                <p class="text-color-2 cerebri-sans-pro-bold font-size-180 font-size-sm-220 font-size-md-260 mb-4">My Purchases</p>

                @foreach($orders as $i => $order)
                <div class="bg-white p-4 mb-4" style="border:1px solid rgba(66,50,37,0.2)">
                    <div class="d-flex justify-content-between mb-4">
                        <div>
                            <p class="text-color-2 cerebri-sans-pro-medium mb-1">Reference: {{ $order['reference'] }}</p>
                            <p class="text-color-2 cerebri-sans-pro-regular font-size-80 mb-0">Date Placed: {{ Carbon\Carbon::parse($order['created_at'])->setTimezone('Asia/Manila')->isoFormat('llll') }}</p>
                        </div>

                        <div>
                            <p class="text-color-2 cerebri-sans-pro-bold text-end mb-1">{{ $order['orderStatus'][0]['status'] }}</p>
                            <div class="d-flex justify-content-end align-items-center">
                                <div class="pe-1 tw-pb-[2px]">
                                    <i class="text-color-2 fa-regular fa-peso-sign"></i>
                                </div>
                                <div class="text-color-2 cerebri-sans-pro-regular font-size-80 text-center">{{ number_format($order['price'],2) }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive mb-4">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th class="text-color-1 cerebri-sans-pro-regular aign-middle font-size-90">Product</th>
                                    <th class="text-color-1 cerebri-sans-pro-regular aign-middle font-size-90 text-center">Unit Price</th>
                                    <th class="text-color-1 cerebri-sans-pro-regular aign-middle font-size-90 text-center">Quantity</th>
                                    <th class="text-color-1 cerebri-sans-pro-regular aign-middle font-size-90 text-center">Item Subtotal</th>
                               </tr>
                            </thead>
                            <tbody>
                                @foreach($order['orderItems'] as $orderItem)
                                <tr>
                                    <td class="align-middle">
                                        <div class="d-flex align-items-center">
                                            <div class="pe-3">
                                                <img src="{{ $orderItem['product']['photo'] }}" class="tw-w-[60px] tw-max-w-[60px]" />
                                            </div>
                                            <div>
                                                <p class="cerebri-sans-pro-regular mb-0">{{ $orderItem['product']['name'] }}</p>
                                                <p class="text-color-6 font-size-70 cerebri-sans-pro-regular font-weight-300">
                                                    @foreach(json_decode($orderItem['product']['variations'], true) as $key => $variation)
                                                    {!! '<span class="font-weight-500">' . $key . ':</span> ' .  $variation . ((!$loop->last) ? ',&nbsp; ' : '' ) !!}
                                                    @endforeach
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <div class="pe-1 tw-pb-[2px]">
                                                <i class="fa-regular fa-peso-sign"></i>
                                            </div>
                                            <div class="cerebri-sans-pro-regular font-size-90 text-center">{{ number_format($orderItem['price'],2) }}</div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="cerebri-sans-pro-regular font-size-90 text-center">{{ number_format($orderItem['quantity']) }}</div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <div class="pe-1 tw-pb-[2px]">
                                                <i class="fa-regular fa-peso-sign"></i>
                                            </div>
                                            <div class="cerebri-sans-pro-regular font-size-90 text-center">{{ number_format($orderItem['price'] * $orderItem['quantity'],2) }}</div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="accordion order-accordion mb-3" id="accordion-order-delivery-{{ $i }}">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed text-color-2 cerebri-sans-pro-medium" type="button" data-bs-toggle="collapse" data-bs-target="#order-delivery-{{ $i }}" aria-expanded="false" aria-controls="collapseOne">
                                    <i class="fa-regular fa-house-chimney pe-3"></i> Delivery Address
                                </button>
                            </h2>
                            <div id="order-delivery-{{ $i }}" class="accordion-collapse collapse" data-bs-parent="#accordion-order-delivery-{{ $i }}">
                                <div class="accordion-body">
                                    <div class="row tw-mx-[-8px]">
                                        <div class="col-6 col-md-4 px-2 mb-3">
                                            <p class="text-color-2 cerebri-sans-pro-regular font-size-90 mb-0">Full Name</p>
                                            <p class="cerebri-sans-pro-regular">{{ $order['full_name'] }}</p>
                                        </div>

                                        <div class="col-6 col-md-4 px-2 mb-3">
                                            <p class="text-color-2 cerebri-sans-pro-regular font-size-90 mb-0">Contact Number</p>
                                            <p class="cerebri-sans-pro-regular">{{ $order['contact_number'] }}</p>
                                        </div>

                                        <div class="col-6 col-md-4 px-2 mb-3">
                                            <p class="text-color-2 cerebri-sans-pro-regular font-size-90 mb-0">Zip Code</p>
                                            <p class="cerebri-sans-pro-regular">{{ $order['zip_code'] }}</p>
                                        </div>

                                        <div class="col-6 col-md-4 px-2 mb-3">
                                            <p class="text-color-2 cerebri-sans-pro-regular font-size-90 mb-0">Province</p>
                                            <p class="cerebri-sans-pro-regular">{{ $order['province'] }}</p>
                                        </div>

                                        <div class="col-6 col-md-4 px-2 mb-3">
                                            <p class="text-color-2 cerebri-sans-pro-regular font-size-90 mb-0">City</p>
                                            <p class="cerebri-sans-pro-regular">{{ $order['city'] }}</p>
                                        </div>

                                        <div class="col-6 col-md-4 px-2 mb-3">
                                            <p class="text-color-2 cerebri-sans-pro-regular font-size-90 mb-0">Barangay</p>
                                            <p class="cerebri-sans-pro-regular">{{ $order['barangay'] }}</p>
                                        </div>

                                        <div class="col-6 col-md-4 px-2 mb-0">
                                            <p class="text-color-2 cerebri-sans-pro-regular font-size-90 mb-0">Home Address</p>
                                            <p class="cerebri-sans-pro-regular">{{ $order['home_address'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion order-accordion mb-3" id="accordion-order-payment-{{ $i }}">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed text-color-2 cerebri-sans-pro-medium" type="button" data-bs-toggle="collapse" data-bs-target="#order-payment-{{ $i }}" aria-expanded="false" aria-controls="collapseOne">
                                    <i class="fa-regular fa-credit-card pe-3"></i> Payment
                                </button>
                            </h2>
                            <div id="order-payment-{{ $i }}" class="accordion-collapse collapse" data-bs-parent="#accordion-order-payment-{{ $i }}">
                                <div class="accordion-body">
                                    @if($order->payment())
                                    <div class="row tw-mx-[-8px]">
                                        <div class="col-6 col-md-4 px-2 mb-3">
                                            <p class="text-color-2 cerebri-sans-pro-regular font-size-90 mb-0">Source</p>
                                            <p class="cerebri-sans-pro-regular text-uppercase" style="word-break: break-word">{{ $order->payment()['attributes']['source']['type'] }}</p>
                                        </div>

                                        <div class="col-6 col-md-4 px-2 mb-3">
                                            <p class="text-color-2 cerebri-sans-pro-regular font-size-90 mb-0">Reference</p>
                                            <p class="cerebri-sans-pro-regular text-uppercase" style="word-break: break-word">{{ $order->payment()['id'] }}</p>
                                        </div>
                                    </div>

                                        @if($order->payment()['attributes']['source']['type'] == 'card')
                                    <div class="row tw-mx-[-8px]">
                                        <div class="col-6 col-md-4 px-2 mb-3">
                                            <p class="text-color-2 cerebri-sans-pro-regular font-size-90 mb-0">Brand</p>
                                            <p class="cerebri-sans-pro-regular text-uppercase" style="word-break: break-word">{{ $order->payment()['attributes']['source']['brand'] }}</p>
                                        </div>

                                        <div class="col-6 col-md-4 px-2 mb-3">
                                            <p class="text-color-2 cerebri-sans-pro-regular font-size-90 mb-0">Country</p>
                                            <p class="cerebri-sans-pro-regular text-uppercase" style="word-break: break-word">{{ $order->payment()['attributes']['source']['country'] }}</p>
                                        </div>

                                        <div class="col-6 col-md-4 px-2 mb-3">
                                            <p class="text-color-2 cerebri-sans-pro-regular font-size-90 mb-0">Last 4 Digits</p>
                                            <p class="cerebri-sans-pro-regular text-uppercase" style="word-break: break-word">{{ $order->payment()['attributes']['source']['last4'] }}</p>
                                        </div>
                                    </div>
                                        @endif

                                    <div class="row tw-mx-[-8px]">
                                        <div class="col-6 col-md-4 px-2 mb-3">
                                            <p class="text-color-2 cerebri-sans-pro-regular font-size-90 mb-0">Name</p>
                                            <p class="cerebri-sans-pro-regular" style="word-break: break-word">{{ $order->payment()['attributes']['billing']['name'] }}</p>
                                        </div>

                                        <div class="col-6 col-md-4 px-2 mb-3">
                                            <p class="text-color-2 cerebri-sans-pro-regular font-size-90 mb-0">Email</p>
                                            <p class="cerebri-sans-pro-regular" style="word-break: break-word">{{ $order->payment()['attributes']['billing']['email'] }}</p>
                                        </div>

                                        <div class="col-6 col-md-4 px-2 mb-3">
                                            <p class="text-color-2 cerebri-sans-pro-regular font-size-90 mb-0">Phone</p>
                                            <p class="cerebri-sans-pro-regular" style="word-break: break-word">{{ $order->payment()['attributes']['billing']['phone'] }}</p>
                                        </div>
                                    </div>

                                        @if($order->payment()['attributes']['source']['type'] == 'card')
                                    <div class="row tw-mx-[-8px]">
                                        <div class="col-6 col-md-4 px-2 mb-3">
                                            <p class="text-color-2 cerebri-sans-pro-regular font-size-90 mb-0">Line 1</p>
                                            <p class="cerebri-sans-pro-regular" style="word-break: break-word">{{ $order->payment()['attributes']['billing']['address']['line1'] }}</p>
                                        </div>

                                        <div class="col-6 col-md-4 px-2 mb-3">
                                            <p class="text-color-2 cerebri-sans-pro-regular font-size-90 mb-0">Line 2</p>
                                            <p class="cerebri-sans-pro-regular" style="word-break: break-word">{{ $order->payment()['attributes']['billing']['address']['line2'] }}</p>
                                        </div>

                                        <div class="col-6 col-md-4 px-2 mb-3">
                                            <p class="text-color-2 cerebri-sans-pro-regular font-size-90 mb-0">City</p>
                                            <p class="cerebri-sans-pro-regular" style="word-break: break-word">{{ $order->payment()['attributes']['billing']['address']['city'] }}</p>
                                        </div>

                                        <div class="col-6 col-md-4 px-2 mb-3">
                                            <p class="text-color-2 cerebri-sans-pro-regular font-size-90 mb-0">State</p>
                                            <p class="cerebri-sans-pro-regular" style="word-break: break-word">{{ $order->payment()['attributes']['billing']['address']['state'] }}</p>
                                        </div>

                                        <div class="col-6 col-md-4 px-2 mb-3">
                                            <p class="text-color-2 cerebri-sans-pro-regular font-size-90 mb-0">Country</p>
                                            <p class="cerebri-sans-pro-regular" style="word-break: break-word">{{ $order->payment()['attributes']['billing']['address']['country'] }}</p>
                                        </div>

                                        <div class="col-6 col-md-4 px-2 mb-3">
                                            <p class="text-color-2 cerebri-sans-pro-regular font-size-90 mb-0">Postal Code</p>
                                            <p class="cerebri-sans-pro-regular" style="word-break: break-word">{{ $order->payment()['attributes']['billing']['address']['postal_code'] }}</p>
                                        </div>
                                    </div>
                                            @endif
                                        @else
                                    <div class="row tw-mx-[-8px]">
                                        <a href="{{ $order['payment'] }}" data-fancybox="">
                                            <div class="d-flex align-items-center background-image-contain justify-content-center tw-w-[160px] tw-h-[240px] tw-border-[1px] tw-border-[#423225] p-3" style="background-image:url('{{ $order['payment'] }}')"></div>
                                        </a>
                                    </div>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion order-accordion" id="accordion-order-status-{{ $i }}">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed text-color-2 cerebri-sans-pro-medium" type="button" data-bs-toggle="collapse" data-bs-target="#order-status-{{ $i }}" aria-expanded="false" aria-controls="collapseOne">
                                    <i class="fa-regular fa-truck pe-3"></i> Order Status
                                </button>
                            </h2>
                            <div id="order-status-{{ $i }}" class="accordion-collapse collapse" data-bs-parent="#accordion-order-status-{{ $i }}">
                                <div class="accordion-body">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-color-1 cerebri-sans-pro-regular aign-middle font-size-90 text-center w-50 min-w-[108px]">Date&nbsp;&amp; Time</th>
                                                <th class="text-color-1 cerebri-sans-pro-regular aign-middle font-size-90 text-center w-50">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($order['orderStatus'] as $orderStatus)
                                            <tr class="cart-item">
                                                <td class="align-middle">
                                                    <p class="cerebri-sans-pro-regular font-size-90 text-center mb-0">{{ \Carbon\Carbon::parse($orderStatus['created_at'])->setTimezone('Asia/Manila')->isoFormat('llll') }}</p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="cerebri-sans-pro-regular font-size-90 font-weight-800 mb-1">{{ $orderStatus['status'] }}</p>
                                                    <p class="cerebri-sans-pro-regular font-size-90 mb-0">{{ orderStatusDescription($orderStatus['status']) }}</p>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center mb-5 {{ count($orders) > 0 ? 'd-none' : '' }}">
                <div class="mb-4">
                    <i class="fa-light fa-cart-circle-exclamation font-size-400 text-color-1"></i>
                </div>

                <p class="cerebri-sans-pro-regular text-color-1 mb-4">Your purchase history is currently empty.<br> Browse our selection and add items to your cart to begin your purchase.</p>

                <div class="text-center mb-2">
                    <a href="{{ route('shop.index') }}" class="btn btn-custom-1 cerebri-sans-pro-bold letter-spacing-5 font-size-120 font-size-lg-130 font-size-xl-140 tw-pt-[8px] lg:tw-pt-[10px] px-4">SHOP NOW</a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('home.includes.footer')

@endsection
