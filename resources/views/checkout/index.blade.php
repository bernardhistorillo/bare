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
            <div class="w-100 pb-5">
                <p class="text-color-2 cerebri-sans-pro-bold font-size-180 font-size-sm-220 font-size-md-260 mb-4">Checkout</p>

                <p class="text-color-2 cerebri-sans-pro-medium font-size-110 mb-4">Products Ordered</p>

                <div class="table-responsive mb-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-color-1 cerebri-sans-pro-regular aign-middle font-size-90">Product</th>
                                <th class="text-color-1 cerebri-sans-pro-regular aign-middle font-size-90 text-center">Unit Price</th>
                                <th class="text-color-1 cerebri-sans-pro-regular aign-middle font-size-90 text-center">Quantity</th>
                                <th class="text-color-1 cerebri-sans-pro-regular aign-middle font-size-90 text-center">Item Subtotal</th>
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
                                <td class="align-middle">
                                    <div class="cerebri-sans-pro-regular font-size-90 text-center">{{ number_format($cartItem['quantity']) }}</div>
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="pe-1 tw-pb-[2px]">
                                            <i class="fa-regular fa-peso-sign"></i>
                                        </div>
                                        <div class="cerebri-sans-pro-regular font-size-90 text-center">{{ number_format($cartItem['price'] * $cartItem['quantity'],2) }}</div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <p class="text-color-2 cerebri-sans-pro-medium font-size-110 mb-4">Delivery Address</p>

                <form id="checkout-form">
                    <input type="hidden" name="url" value="{{ route('checkout.placeOrder') }}" />

                    <div class="row tw-mx-[-8px] mb-4">
                        <div class="col-md-6 px-2">
                            <input type="text" name="full_name" class="form-control form-control-1 cerebri-sans-pro-regular text-start mb-3 py-2 px-3" style="height:45px; border:3px solid #946C51; color:#946C51!important" placeholder="Full Name" required />
                        </div>

                        <div class="col-md-6 px-2">
                            <input type="text" name="contact_number" class="form-control form-control-1 cerebri-sans-pro-regular text-start mb-3 py-2 px-3" style="height:45px; border:3px solid #946C51; color:#946C51!important" placeholder="Contact Number" required />
                        </div>

                        <div class="col-md-6 px-2">
                            <input type="text" name="zip_code" class="form-control form-control-1 cerebri-sans-pro-regular text-start mb-3 py-2 px-3" style="height:45px; border:3px solid #946C51; color:#946C51!important" placeholder="Postal Code" required />
                        </div>

                        <div class="col-md-6 px-2">
                            <input type="text" name="province" class="form-control form-control-1 cerebri-sans-pro-regular text-start mb-3 py-2 px-3" style="height:45px; border:3px solid #946C51; color:#946C51!important" placeholder="Province" required />
                        </div>

                        <div class="col-md-6 px-2">
                            <input type="text" name="city" class="form-control form-control-1 cerebri-sans-pro-regular text-start mb-3 py-2 px-3" style="height:45px; border:3px solid #946C51; color:#946C51!important" placeholder="City / Municipality" required />
                        </div>

                        <div class="col-md-6 px-2">
                            <input type="text" name="barangay" class="form-control form-control-1 cerebri-sans-pro-regular text-start mb-3 py-2 px-3" style="height:45px; border:3px solid #946C51; color:#946C51!important" placeholder="Barangay" required />
                        </div>

                        <div class="col-md-12 px-2">
                            <input type="text" name="home_address" class="form-control form-control-1 cerebri-sans-pro-regular text-start mb-3 py-2 px-3" style="height:45px; border:3px solid #946C51; color:#946C51!important" placeholder="Home Address" required />
                        </div>
                    </div>

                    <div class="d-flex justify-content-center justify-content-sm-end">
                        <div class="d-flex flex-column flex-sm-row align-items-center">
                            <div class="cerebri-sans-pro-regular font-size-130 mb-4 mb-sm-0 pe-sm-4">Total Price:&nbsp; <i class="fa-regular fa-peso-sign"></i> <span class="cerebri-sans-pro-medium text-color-1">{{ number_format(Auth::user()->cartTotalPrice(), 2) }}</span></div>
                            <div>
                                <button type="submit" class="btn btn-custom-4 font-size-120 px-5 py-3">Place Order</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('home.includes.footer')

@endsection
