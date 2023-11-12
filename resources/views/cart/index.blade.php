@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<div>
    <div class="bg-color-2 text-center p-2">
        <p class="cerebri-sans-pro-regular text-white font-size-100 letter-spacing-5 mb-0">PRE-SALE COMING SOON</p>
    </div>

    <div class="background-image-cover" style="background-image:url('{{ asset('img/contact/hero.webp') }}')">
        @include('home.includes.nav')

        <div class="container" style="padding-top:84px"></div>
    </div>

    <div class="bg-color-5">
        <div class="container d-flex justify-content-center align-items-center py-5" style="min-height: calc(100vh - 124px)">
            <div class="w-100 pb-5 {{ count($cartItems) == 0 ? 'd-none' : '' }}" id="cart-container">
                <p class="text-color-2 cerebri-sans-pro-bold font-size-180 font-size-sm-220 font-size-md-260 mb-4">Shopping Cart</p>

                <div class="table-responsive mb-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-color-1 cerebri-sans-pro-regular aign-middle font-size-90">Product</th>
                                <th class="text-color-1 cerebri-sans-pro-regular aign-middle font-size-90 text-center">Unit Price</th>
                                <th class="text-color-1 cerebri-sans-pro-regular aign-middle font-size-90 text-center">Quantity</th>
                                <th class="text-color-1 cerebri-sans-pro-regular aign-middle font-size-90 text-center">Total Price</th>
                                <th class="text-color-1 cerebri-sans-pro-regular aign-middle font-size-90 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $cartItem)
                            <tr class="cart-item">
                                <td class="align-middle">
                                    <div class="d-flex align-items-center">
                                        <div class="pe-3">
                                            <img src="{{ $cartItem['photo'] }}" class="tw-w-[60px] tw-max-w-[60px]" />
                                        </div>
                                        <div>
                                            <p class="cerebri-sans-pro-regular mb-0">{{ $cartItem['name'] }}</p>
                                            <p class="text-color-6 font-size-70 cerebri-sans-pro-regular font-weight-300">
                                                @foreach(json_decode($cartItem['variations'], true) as $key => $variation)
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
                                        <div class="cerebri-sans-pro-regular font-size-90 text-center">{{ number_format($cartItem['price'],2) }}</div>
                                    </div>
                                </td>
                                <td class="cerebri-sans-pro-regular align-middle text-center">
                                    <div class="d-flex justify-content-center text-center">
                                        <div class="">
                                            <div class="d-flex">
                                                <button class="btn btn-custom-1 line-height-70 cart-quantity-decrement" style="padding-top:0; padding-bottom:2px; height:30px" type="button">
                                                    <i class="fa-regular fa-minus font-size-60"></i>
                                                </button>
                                                <input type="text" class="form-control text-center cerebri-sans-pro-regular font-size-90 tw-w-[50px] tw-min-w-[50px!important] tw-max-w-[50px] tw-h-[30px] use-numeric-no-leading-zero-rule cart-quantity" data-product-id="{{ $cartItem['product_id'] }}" value="{{ $cartItem['quantity'] }}" data-url="{{ route('cart.updateQuantity') }}" placeholder="1">
                                                <button class="btn btn-custom-1 line-height-70 cart-quantity-increment" style="padding-top:0; padding-bottom:2px; height:30px" type="button" id="button-increment">
                                                    <i class="fa-regular fa-plus font-size-60"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="pe-1 tw-pb-[2px]">
                                            <i class="fa-regular fa-peso-sign"></i>
                                        </div>
                                        <div class="cerebri-sans-pro-regular font-size-90 text-center cart-price">{{ number_format($cartItem['price'] * $cartItem['quantity'],2) }}</div>
                                    </div>
                                </td>
                                <td class="cerebri-sans-pro-regular align-middle text-center">
                                    <button class="btn btn-custom-4 font-size-80 cart-item-delete" data-product-id="{{ $cartItem['product_id'] }}" data-url="{{ route('cart.delete') }}" style="padding-top:5px; padding-bottom:3px">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center justify-content-sm-end">
                    <div class="d-flex flex-column flex-sm-row align-items-center">
                        <div class="cerebri-sans-pro-regular mb-4 mb-sm-0 pe-sm-4">Total Price:&nbsp; <i class="fa-regular fa-peso-sign"></i> <span class="cerebri-sans-pro-regular" id="cart-total-price">{{ number_format(Auth::user()->cartTotalPrice(), 2) }}</span></div>
                        <div>
                            <a href="{{ route('checkout.index') }}" class="btn btn-custom-4 px-5 py-2">Check Out</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mb-5 {{ count($cartItems) > 0 ? 'd-none' : '' }}" id="cart-empty-container">
                <div class="mb-4">
                    <i class="fa-light fa-cart-circle-exclamation font-size-400 text-color-1"></i>
                </div>

                <p class="cerebri-sans-pro-regular text-color-1 mb-4">Your cart is currently empty.<br> Browse our selection and add items to your cart to begin your purchase.</p>

                <div class="text-center mb-2">
                    <a href="{{ route('shop.index') }}" class="btn btn-custom-1 px-4 py-2">
                        <div class="cerebri-sans-pro-bold letter-spacing-10 font-size-120 line-height-80 tw-pt-[4px]">SHOP NOW</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('home.includes.footer')

@endsection
