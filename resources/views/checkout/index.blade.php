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

    <div class="bg-white">
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
                            <tr class="d-none" id="promo-code-discount-row">
                                <td colspan="3" class="text-end font-size-90">Promo Code Discount</td>
                                <td class="align-middle text-center font-size-90">10%</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-end font-size-90">Shipping Fee</td>
                                <td class="align-middle text-center font-size-90">
                                    <i class="fa-regular fa-peso-sign"></i> 100.00
                                </td>
                            </tr>
                            <tr class="cart-item">
                                <td colspan="3" class="text-end">Total</td>
                                <td class="align-middle text-center">
                                    <i class="fa-regular fa-peso-sign"></i> <span class="cerebri-sans-pro-bold text-color-1" id="total-price" data-sub-price="{{ Auth::user()->cartTotalPrice() }}">{{ number_format(Auth::user()->cartTotalPrice() + 100, 2) }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <form id="checkout-form">
                    <input type="hidden" name="url" value="{{ route('checkout.proceedToPayment') }}" />

                    <p class="text-color-2 cerebri-sans-pro-medium font-size-110 mb-4">Promo Code (Optional)</p>

                    <div class="row tw-mx-[-8px] mb-4 pb-2">
                        <div class="col-md-6 px-2">
                            <input type="text" name="promo_code" class="form-control form-control-1 cerebri-sans-pro-regular text-start py-2 px-3 mb-2" data-url="{{ route('checkout.checkPromoCode') }}" style="height:45px; border:3px solid #946C51; color:#946C51!important" placeholder="Promo Code" />
                            <p class="ms-1 font-size-90 d-none mb-0" id="promo-code-status"></p>
                        </div>
                    </div>

                    <p class="text-color-2 cerebri-sans-pro-medium font-size-110 mb-4">Delivery Address</p>

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

{{--                    <p class="text-color-2 cerebri-sans-pro-medium font-size-110 mb-4">Payment</p>--}}

{{--                    <ol class="ps-4 mb-5" style="list-style: decimal">--}}
{{--                        <li class="cerebri-sans-pro-regular mb-4">--}}
{{--                            With your GCash, please send a payment of <i class="fa-regular fa-peso-sign"></i> <span class="cerebri-sans-pro-bold text-color-1 total-price">{{ number_format(Auth::user()->cartTotalPrice() + 100, 2) }}</span> to <span class="cerebri-sans-pro-bold">0917 516 0239</span> or you may scan the QR code below.--}}
{{--                            <img src="{{ asset('img/checkout/gcash.webp') }}" class="tw-w-[120px] mt-2" />--}}
{{--                        </li>--}}
{{--                        <li class="cerebri-sans-pro-regular">--}}
{{--                            <p class="mb-3">Upon successful payment, please take a screenshot with the reference code and attach the photo below.</p>--}}

{{--                            <input type="file" name="payment" class="d-none" required />--}}

{{--                            <div class="d-flex align-items-center background-image-contain justify-content-center tw-w-[120px] tw-h-[200px] tw-border-[1px] tw-border-[#423225] p-3 cursor-pointer" id="attach-payment">--}}
{{--                                <div class="text-center font-size-80 cerebri-sans-pro-regular">Please click here to attach your payment screenshot.</div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    </ol>--}}

                    <div class="d-flex justify-content-center justify-content-sm-start">
                        <div class="d-flex flex-column flex-sm-row align-items-center">
                            <div>
                                <button type="submit" class="btn btn-custom-4 cerebri-sans-pro-bold letter-spacing-5 font-size-120 font-size-lg-130 font-size-xl-140 tw-pt-[8px] lg:tw-pt-[10px] px-5">PROCEED TO PAYMENT</button>
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
