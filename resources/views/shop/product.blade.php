@extends('layouts.app')

@section('title', $product)

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

    <div class="py-5">
        <div class="container pt-5">
            <p class="text-color-2 cerebri-sans-pro-bold letter-spacing-10 font-size-230 font-size-sm-260 mb-3">{{ strtoupper($product) }}</p>

            <div class="row mb-5 pb-3">
                <div class="col-md-6 mb-5 mb-lg-0">
                    <div class="pe-4 pe-lg-5">
                        <img src="{{ asset('img/shop/product-1.webp') }}" class="w-100" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div>
                        <div class="mb-4">
                            <p class="cerebri-sans-pro-regular text-color-2 font-size-140 letter-spacing-10 mb-1">DESCRIPTION</p>
                            <p class="cerebri-sans-pro-regular text-color-5 font-size-120 letter-spacing-5 line-height-130">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
                        </div>

                        <div class="mb-4">
                            <p class="cerebri-sans-pro-regular text-color-2 font-size-140 letter-spacing-10 mb-1">MATERIAL</p>
                            <p class="cerebri-sans-pro-regular text-color-5 font-size-120 letter-spacing-5 line-height-130">Lorem ipsum dolor</p>
                        </div>

                        <div class="mb-4">
                            <p class="cerebri-sans-pro-regular text-color-2 font-size-140 letter-spacing-10 mb-1">COLOR</p>
                            <p class="cerebri-sans-pro-regular text-color-5 font-size-120 letter-spacing-5 line-height-130">Lorem ipsum dolor</p>
                        </div>

                        <div class="mb-4">
                            <p class="cerebri-sans-pro-regular text-color-2 font-size-140 letter-spacing-10 mb-1">TYPE</p>
                            <p class="cerebri-sans-pro-regular text-color-5 font-size-120 letter-spacing-5 line-height-130">Lorem ipsum dolor</p>
                        </div>

                        <div class="mb-4">
                            <p class="cerebri-sans-pro-regular text-color-2 font-size-140 letter-spacing-10 mb-1">SIZE</p>
                            <p class="cerebri-sans-pro-regular text-color-5 font-size-120 letter-spacing-5 line-height-130">Lorem ipsum dolor</p>
                        </div>

                        <p class="text-color-2 cerebri-sans-pro-bold font-size-140 letter-spacing-5 mb-3">PHP 000.00</p>

                        <div class="">
                            <button class="btn btn-custom-4 cerebri-sans-pro-bold letter-spacing-5 font-size-120 font-size-xl-130 py-0" style="padding-top:4px!important">ADD TO CART</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-3 col-lg-2 mb-4">
                    <div class="w-100 bg-color-1" style="padding-top:100%"></div>
                </div>

                <div class="col-3 col-lg-2 mb-4">
                    <div class="w-100 bg-color-1" style="padding-top:100%"></div>
                </div>

                <div class="col-3 col-lg-2 mb-4">
                    <div class="w-100 bg-color-1" style="padding-top:100%"></div>
                </div>

                <div class="col-3 col-lg-2 mb-4">
                    <div class="w-100 bg-color-1" style="padding-top:100%"></div>
                </div>

                <div class="col-3 col-lg-2 mb-4">
                    <div class="w-100 bg-color-1" style="padding-top:100%"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-color-5 py-5">
        <div class="container pt-5">
            <p class="text-color-2 cerebri-sans-pro-bold text-center letter-spacing-10 font-size-230 font-size-sm-260 mb-3">SIZE GUIDE</p>
            <div class="row justify-content-center mb-5">
                <div class="col-lg-9 col-xl-8">
                    <p class="text-color-5 cerebri-sans-pro-regular text-center font-size-120 font-size-lg-130 letter-spacing-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-5 col-md-4 col-lg-3">
                    <div>
                        <img src="{{ asset('img/shop/size-2.webp') }}" class="w-100" />
                    </div>
                </div>

                <div class="offset-1 col-5 col-md-4 offset-lg-2 col-lg-3">
                    <div>
                        <img src="{{ asset('img/shop/size-1.webp') }}" class="w-100" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('home.includes.section')
    @include('home.includes.testimonials')
    @include('home.includes.action')

</div>

@include('home.includes.footer')

@endsection
