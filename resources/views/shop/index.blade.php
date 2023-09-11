@extends('layouts.app')

@section('title', 'Shop')

@section('content')
<div>
    <div class="bg-color-2 text-center p-2">
        <p class="cerebri-sans-pro-regular text-white font-size-100 letter-spacing-5 mb-0">PRE-SALE COMING SOON</p>
    </div>

    <div class="background-image-cover" id="hero-section" style="background-image:url('{{ asset('img/shop/hero.webp') }}')">
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
                                        <a href="{{ route('shop.index') }}" class="btn btn-custom-3 px-4 py-3">
                                            <div class="cerebri-sans-pro-bold letter-spacing-10 font-size-170 font-size-sm-240 line-height-80" style="padding-top:6px">SHOP NOW</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-color-5 py-5">
        <div class="container pt-5">
            <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-230 font-size-sm-260 mb-4 mb-xl-3 mb-xxl-0">SHOP ITEMS</p>

            <div class="row justify-content-center pt-4">
                <div class="col-11 col-sm-6 p-xl-4 p-xxl-5 mb-5 mb-sm-4">
                    <a href="#" class="text-decoration-none">
                        <div class="w-100 position-relative" style="padding-top:100%">
                            <div class="position-absolute background-image-cover w-100 h-100 d-flex align-items-end p-4 p-lg-5" style="top:0; left:0; background-image:url('{{ asset('img/shop/categories/category-1.webp') }}')">
                                <p class="text-white text-decoration-underline cerebri-sans-pro-bold letter-spacing-10 font-size-120 font-size-md-140 font-size-xl-180 font-size-xxl-190 mb-0">NIPPLE COVERS</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-11 col-sm-6 p-xl-4 p-xxl-5 mb-5 mb-sm-4">
                    <a href="#" class="text-decoration-none">
                        <div class="w-100 position-relative" style="padding-top:100%">
                            <div class="position-absolute background-image-cover w-100 h-100 d-flex align-items-end p-4 p-lg-5" style="top:0; left:0; background-image:url('{{ asset('img/shop/categories/category-2.webp') }}')">
                                <p class="text-white text-decoration-underline cerebri-sans-pro-bold letter-spacing-10 font-size-120 font-size-md-140 font-size-xl-180 font-size-xxl-190 mb-0">BODYSUITS</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-11 col-sm-6 p-xl-4 p-xxl-5 mb-5 mb-sm-4">
                    <a href="#" class="text-decoration-none">
                        <div class="w-100 position-relative" style="padding-top:100%">
                            <div class="position-absolute background-image-cover w-100 h-100 d-flex align-items-end p-4 p-lg-5" style="top:0; left:0; background-image:url('{{ asset('img/shop/categories/category-3.webp') }}')">
                                <p class="text-white text-decoration-underline cerebri-sans-pro-bold letter-spacing-10 font-size-120 font-size-md-140 font-size-xl-180 font-size-xxl-190 mb-0">FLAT NIPPLE<br/> COVERS FOR MEN</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-11 col-sm-6 p-xl-4 p-xxl-5 mb-5 mb-sm-4">
                    <a href="#" class="text-decoration-none">
                        <div class="w-100 position-relative" style="padding-top:100%">
                            <div class="position-absolute background-image-cover w-100 h-100 d-flex align-items-end p-4 p-lg-5" style="top:0; left:0; background-image:url('{{ asset('img/shop/categories/category-4.webp') }}')">
                                <p class="text-white text-decoration-underline cerebri-sans-pro-bold letter-spacing-10 font-size-120 font-size-md-140 font-size-xl-180 font-size-xxl-190 mb-0">TRAVEL POUCH</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="background-image-cover py-5" style="background-image:url('{{ asset('img/shop/pouch-bg.webp') }}')">
        <div class="container py-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-11 col-sm-8 col-md-7 col-lg-6">
                    <div class="card mb-5 mb-lg-0" style="border:1px solid #572231">
                        <div class="card-body p-4 p-lg-5">
                            <img src="{{ asset('img/shop/pouch.webp') }}" class="w-100" />
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="ps-md-4">
                        <div class="ps-xl-4 ps-xxl-5">
                            <p class="text-white cerebri-sans-pro-regular text-center text-lg-start font-size-280 font-size-sm-300 font-size-md-350 font-size-lg-400 font-size-xl-500 line-height-130 mb-lg-0">Bare Zip Bag</p>
                            <p class="text-white cerebri-sans-pro-regular text-center text-lg-start font-size-130 font-size-xl-150 letter-spacing-10">LOREM IPSUM DOLOR</p>
                            <p class="text-white cerebri-sans-pro-medium text-center text-lg-start font-size-90 font-size-lg-100 line-height-xl-170 letter-spacing-10 mb-3">Introducing our complimentary Ziplock Bag for Nipple Covers, designed to provide you with a convenient storage solution for your nipple covers. Made from durable material, this ziplock bag offers both practicality and visibility. With it’s compact size, it easily fits into your purse, gym bag, or suitcase, allowing you to keep your nipple covers within reach whenever you need them.</p>
                            <p class="text-white cerebri-sans-pro-medium text-center text-lg-start font-size-90 font-size-lg-100 line-height-xl-170 letter-spacing-10 mb-5">Our free Ziplock Bag for Nipple Covers is a thoughtful addition to your purchase, ensuring that you can confidently carry and store your covers with ease.</p>

                            <div class="text-center text-lg-start">
                                <button class="btn btn-custom-5 font-size-150 font-size-lg-200 cerebri-sans-pro-bold letter-spacing-10 line-height-110 px-3" style="padding-top:10px">SHOP NOW</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    <div class="bg-color-5 py-5">--}}
{{--        <div class="container pt-5">--}}
{{--            <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-230 font-size-sm-260 mb-4 mb-xl-3 mb-xxl-0">NIPPLE COVERS</p>--}}

{{--            <div class="row justify-content-center pt-4">--}}
{{--                <div class="col-10 col-sm-6 col-lg-3 p-xl-4 p-xxl-5 mb-5">--}}
{{--                    <div class="">--}}
{{--                        <div class="mb-4">--}}
{{--                            <img src="{{ asset('img/shop/product-1.webp') }}" class="w-100" alt="Product" />--}}
{{--                        </div>--}}

{{--                        <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-1">COCOA</p>--}}
{{--                        <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-3">PHP 000.00</p>--}}

{{--                        <div class="">--}}
{{--                            <button class="btn btn-custom-4 cerebri-sans-pro-bold letter-spacing-5 font-size-lg-130 font-size-xl-140 w-100" style="padding-top:8px">ADD TO CART</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-10 col-sm-6 col-lg-3 p-xl-4 p-xxl-5 mb-5">--}}
{{--                    <div class="">--}}
{{--                        <div class="mb-4">--}}
{{--                            <img src="{{ asset('img/shop/product-2.webp') }}" class="w-100" alt="Product" />--}}
{{--                        </div>--}}

{{--                        <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-1">CARAMEL</p>--}}
{{--                        <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-3">PHP 000.00</p>--}}

{{--                        <div class="">--}}
{{--                            <button class="btn btn-custom-4 cerebri-sans-pro-bold letter-spacing-5 font-size-lg-130 font-size-xl-140 w-100" style="padding-top:8px">ADD TO CART</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-10 col-sm-6 col-lg-3 p-xl-4 p-xxl-5 mb-5">--}}
{{--                    <div class="">--}}
{{--                        <div class="mb-4">--}}
{{--                            <img src="{{ asset('img/shop/product-3.webp') }}" class="w-100" alt="Product" />--}}
{{--                        </div>--}}

{{--                        <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-1">TAUPE</p>--}}
{{--                        <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-3">PHP 000.00</p>--}}

{{--                        <div class="">--}}
{{--                            <button class="btn btn-custom-4 cerebri-sans-pro-bold letter-spacing-5 font-size-lg-130 font-size-xl-140 w-100" style="padding-top:8px">ADD TO CART</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-10 col-sm-6 col-lg-3 p-xl-4 p-xxl-5 mb-5">--}}
{{--                    <div class="">--}}
{{--                        <div class="mb-4">--}}
{{--                            <img src="{{ asset('img/shop/product-4.webp') }}" class="w-100" alt="Product" />--}}
{{--                        </div>--}}

{{--                        <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-1">CLAY</p>--}}
{{--                        <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-3">PHP 000.00</p>--}}

{{--                        <div class="">--}}
{{--                            <button class="btn btn-custom-4 cerebri-sans-pro-bold letter-spacing-5 font-size-lg-130 font-size-xl-140 w-100" style="padding-top:8px">ADD TO CART</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    @include('home.includes.section')
    @include('home.includes.testimonials')
    @include('home.includes.action')

</div>

@include('home.includes.footer')

@endsection
