@extends('layouts.app')

@section('title', $categoryName)

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
            <p class="text-color-2 cerebri-sans-pro-bold text-center letter-spacing-10 font-size-230 font-size-sm-260 mb-3">{{ strtoupper($categoryName) }}</p>
            <div class="row justify-content-center mb-3 mb-xl-0">
                <div class="col-lg-9 col-xl-8">
                    <p class="text-color-5 cerebri-sans-pro-regular text-center font-size-120 font-size-lg-130 letter-spacing-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
                </div>
            </div>

            <div class="row justify-content-center pt-4">
                @for($i = 0; $i < 2; $i++)
                <div class="col-10 col-sm-6 col-lg-3 p-xl-4 p-xxl-5 mb-5">
                    <div class="">
                        <a href="{{ route('shop.product', [$category, 'cocoa']) }}" class="text-decoration-none">
                            <div>
                                <div class="mb-4">
                                    <img src="{{ asset('img/shop/product-1.webp') }}" class="w-100" alt="Product" />
                                </div>

                                <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-1">COCOA</p>
                                <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-3">PHP 000.00</p>
                            </div>
                        </a>

                        <div class="">
                            <button class="btn btn-custom-4 cerebri-sans-pro-bold letter-spacing-5 font-size-lg-130 font-size-xl-140 w-100" style="padding-top:8px">ADD TO CART</button>
                        </div>
                    </div>
                </div>

                <div class="col-10 col-sm-6 col-lg-3 p-xl-4 p-xxl-5 mb-5">
                    <div class="">
                        <a href="{{ route('shop.product', [$category, 'caramel']) }}" class="text-decoration-none">
                            <div>
                                <div class="mb-4">
                                    <img src="{{ asset('img/shop/product-2.webp') }}" class="w-100" alt="Product" />
                                </div>

                                <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-1">CARAMEL</p>
                                <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-3">PHP 000.00</p>
                            </div>
                        </a>

                        <div class="">
                            <button class="btn btn-custom-4 cerebri-sans-pro-bold letter-spacing-5 font-size-lg-130 font-size-xl-140 w-100" style="padding-top:8px">ADD TO CART</button>
                        </div>
                    </div>
                </div>

                <div class="col-10 col-sm-6 col-lg-3 p-xl-4 p-xxl-5 mb-5">
                    <div class="">
                        <a href="{{ route('shop.product', [$category, 'taupe']) }}" class="text-decoration-none">
                            <div>
                                <div class="mb-4">
                                    <img src="{{ asset('img/shop/product-3.webp') }}" class="w-100" alt="Product" />
                                </div>

                                <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-1">TAUPE</p>
                                <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-3">PHP 000.00</p>
                            </div>
                        </a>

                        <div class="">
                            <button class="btn btn-custom-4 cerebri-sans-pro-bold letter-spacing-5 font-size-lg-130 font-size-xl-140 w-100" style="padding-top:8px">ADD TO CART</button>
                        </div>
                    </div>
                </div>

                <div class="col-10 col-sm-6 col-lg-3 p-xl-4 p-xxl-5 mb-5">
                    <div class="">
                        <a href="{{ route('shop.product', [$category, 'clay']) }}" class="text-decoration-none">
                            <div>
                                <div class="mb-4">
                                    <img src="{{ asset('img/shop/product-4.webp') }}" class="w-100" alt="Product" />
                                </div>

                                <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-1">CLAY</p>
                                <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-3">PHP 000.00</p>
                            </div>
                        </a>

                        <div class="">
                            <button class="btn btn-custom-4 cerebri-sans-pro-bold letter-spacing-5 font-size-lg-130 font-size-xl-140 w-100" style="padding-top:8px">ADD TO CART</button>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>

    @include('home.includes.section')
    @include('home.includes.testimonials')
    @include('home.includes.action')

</div>

@include('home.includes.footer')

@endsection