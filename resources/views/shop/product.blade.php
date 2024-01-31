@extends('layouts.app')

@section('title', $product['name'])

@section('content')
<div>
    <div class="bg-color-2 text-center p-2">
        <p class="cerebri-sans-pro-regular text-white font-size-100 letter-spacing-5 mb-0">PRE-SALE COMING SOON</p>
    </div>

    <div class="background-image-cover" id="hero-section" style="background-image:url('{{ asset('img/shop/bg-1.webp') }}')">
        @include('home.includes.nav')

        <div class="container">
            <div class="d-flex justify-content-center align-items-center h-100" style="min-height: calc(100vh - 40px); padding-top:84px">
                <div class="row justify-content-center mb-3">
                    <div class="col-lg-9">
                        <div class="bg-color-4 p-5">
                            <div class="row justify-content-center">
                                <div class="col-sm-10 col-md-7 col-lg-7 col-xl-6 col-xxl-5">
                                    <div class="mb-4 mb-sm-5">
                                        <img src="{{ asset('img/home/bare-white.png') }}" class="w-100" alt="{{ config('app.name') }}" />
                                    </div>

                                    <p class="cerebri-sans-pro-medium text-white text-center font-size-160 font-size-sm-220 line-height-110 letter-spacing-10 mb-2">Bare Necessity</p>
                                    <p class="cerebri-sans-pro-medium text-white text-center font-size-160 font-size-sm-220 line-height-110 letter-spacing-10 mb-5">Bare Confidence</p>

                                    <div class="text-center">
                                        <a href="{{ route('shop.category', 'nipple-covers') }}" class="btn btn-custom-3 cerebri-sans-pro-bold letter-spacing-5 font-size-120 font-size-lg-130 font-size-xl-140 tw-pt-[8px] lg:tw-pt-[10px] px-4">SHOP NIPPLE COVERS</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container pt-5">
            <p class="text-color-2 cerebri-sans-pro-bold letter-spacing-10 font-size-230 font-size-sm-260 mb-3">{{ strtoupper($product['name']) }}</p>

            <div class="row mb-5 pb-3">
                <div class="col-md-6 mb-5 mb-lg-0">
                    <div class="pe-4 pe-lg-5">
                        <img src="{{ $product['photo'] }}" class="w-100" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div>
                        <div class="mb-4">
                            <p class="cerebri-sans-pro-regular text-color-2 font-size-140 letter-spacing-10 mb-1">DESCRIPTION</p>
                            <p class="cerebri-sans-pro-regular text-color-5 font-size-100 font-size-xl-110 font-size-xxl-120">{{ $product['description'] }}</p>
                        </div>

                        @if($product['name'] != 'Cocoa Zip Pouch' && $product['name'] != 'Taupe Zip Pouch' && $product['name'] != 'Drawstring Bag')
                        <div class="mb-4">
                            <p class="cerebri-sans-pro-regular text-color-2 font-size-140 letter-spacing-10 mb-1">MATERIAL</p>
                            <p class="cerebri-sans-pro-regular text-color-5 font-size-100 font-size-xl-110 font-size-xxl-120">Silicone</p>
                        </div>

                        <div class="mb-4">
                            <p class="cerebri-sans-pro-regular text-color-2 font-size-140 letter-spacing-10 mb-1">TYPE</p>
                            <p class="cerebri-sans-pro-regular text-color-5 font-size-100 font-size-xl-110 font-size-xxl-120">Choice between ADHESIVE and NON-ADHESIVE</p>
                        </div>

                        <div class="mb-4">
                            <p class="cerebri-sans-pro-regular text-color-2 font-size-140 letter-spacing-10 mb-1">SIZE</p>

                            <div class="row">
                                @if($product['name'] == 'Nude' || $product['name'] == 'Taupe')
                                <div class="col-6 col-sm-4 col-lg-3 mb-3">
                                    <div class="cursor-pointer variation-card active" data-price="259.00">
                                        <p class="cerebri-sans-pro-medium tw-text-[#949494] text-center tw-pt-[5px] pb-1">6 CM</p>
                                    </div>
                                </div>
                                @endif

                                <div class="col-6 col-sm-4 col-lg-3 mb-3">
                                    <div class="cursor-pointer variation-card {{ !($product['name'] == 'Nude' || $product['name'] == 'Taupe') ? 'active' : '' }}" data-price="269.00">
                                        <p class="cerebri-sans-pro-medium tw-text-[#949494] text-center tw-pt-[5px] pb-1">8 CM</p>
                                    </div>
                                </div>

                                <div class="col-6 col-sm-4 col-lg-3 mb-3">
                                    <div class="cursor-pointer variation-card" data-price="279.00">
                                        <p class="cerebri-sans-pro-medium tw-text-[#949494] text-center tw-pt-[5px] pb-1">10 CM</p>
                                    </div>
                                </div>

                                <div class="col-6 col-sm-4 col-lg-3 mb-3">
                                    <a href="#size-guide" class="variation-card d-block">
                                        <p class="cerebri-sans-pro-medium tw-text-[#949494] text-center tw-pt-[5px] pb-1">SIZE GUIDE</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif

                        <hr class="mt-4 mb-5">

                        <p class="text-color-2 cerebri-sans-pro-bold font-size-140 letter-spacing-5 mb-3">PHP <span id="price">{{ number_format($product['price'],2) }}</span></p>

                        <div class="mb-4">
                            <form class="update-cart-form">
                                <input type="hidden" name="name" value="{{ $product['name'] }}" />
                                <input type="hidden" name="category" value="{{ $product['category'] }}" />
                                <input type="hidden" name="variations" value="{{ json_encode($product['variations']) }}" />

                                <button type="submit" class="btn btn-custom-4 cerebri-sans-pro-bold letter-spacing-5 font-size-120 font-size-lg-130 font-size-xl-140 tw-pt-[8px] lg:tw-pt-[10px] px-4">ADD TO CART</button>
                            </form>
                        </div>

                        <p class="cerebri-sans-pro-regular mb-2">Or shop on:</p>
                        <div class="row align-items-center">
                            <div class="tw-w-[75px]">
                                <a href="{{ $product['lazada_link'] }}" target="_blank" rel="noreferrer">
                                    <img src="{{ asset('img/home/lazada.webp') }}" class="w-100 tw-rounded-[30%]" alt="{{ config('app.name') }}" />
                                </a>
                            </div>

                            <div class="tw-w-[75px]">
                                <a href="{{ $product['shopee_link'] }}" target="_blank" rel="noreferrer">
                                    <img src="{{ asset('img/home/shopee.webp') }}" class="w-100 tw-rounded-[30%]" alt="{{ config('app.name') }}" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row tw-px-[4px] lg:tw-px-[0px]">
                @foreach(json_decode($product['sub_photos'], true) as $sub_photos)
                <div class="col-4 col-lg-3 px-2 px-lg-3 mb-4">
                    <a href="{{ $sub_photos }}" data-fancybox="gallery">
                        <div class="w-100 background-image-cover" style="padding-top:100%;  background-image:url('{{ $sub_photos }}')"></div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    @if($product['name'] != 'Taupe Zip Pouch' && $product['name'] != 'Cocoa Zip Pouch' && $product['name'] != 'Drawstring Bag')
    <div class="bg-white py-5 position-relative">
        <div class="position-absolute tw-mt-[-48px] tw-top-[0] tw-left-0" id="size-guide"></div>

        <div class="container pb-5">
            <p class="text-color-2 cerebri-sans-pro-bold text-center letter-spacing-10 font-size-230 font-size-sm-260 mb-3">SIZE GUIDE</p>
            <div class="row justify-content-center mb-5">
                <div class="col-lg-9 col-xl-7">
                    <p class="text-color-5 cerebri-sans-pro-regular text-center font-size-110 font-size-md-120 font-size-lg-130 font-size-xl-140 font-size-xxl-150">Here's a size guide for nipple covers based on nipple diameter and cup sizes:</p>
                </div>
            </div>

            <div class="row justify-content-center mb-5 pb-3">
                @if($product['name'] == 'Nude' || $product['name'] == 'Taupe')
                <div class="col-6 col-md-4 col-lg-4 px-lg-5">
                    <div>
                        <img src="{{ asset('img/shop/sizes/6cm.webp') }}" class="w-100" />
                    </div>
                </div>
                @endif

                <div class="col-6 col-md-4 col-lg-4 px-lg-5">
                    <div>
                        <img src="{{ asset('img/shop/sizes/8cm.webp') }}" class="w-100" />
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-4 px-lg-5 mt-3 mt-md-0">
                    <div>
                        <img src="{{ asset('img/shop/sizes/10cm.webp') }}" class="w-100" />
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-11 col-md-10 col-lg-8 col-xl-7 tw-bg-[#e1dccb] p-3">
                    <p class="cerebri-sans-pro-regular text-center tw-text-[#572231] font-size-110 font-size-md-120 font-size-lg-130 font-size-xl-140 font-size-xxl-150 mb-0">Keep in mind that cup size alone isn't the only factor to consider when choosing nipple covers. Nipple diameter and personal comfort preferences also play crucial roles. It's recommended to measure your nipple diameter to ensure the best fit. If you're unsure, it's a good idea to opt for slightly larger nipple covers to ensure full coverage and comfort.</p>
                </div>
            </div>
        </div>
    </div>
    @endif

    @include('shop.includes.travel-bags')
</div>

@include('home.includes.footer')
@include('shop.includes.modalVariation')

@endsection
