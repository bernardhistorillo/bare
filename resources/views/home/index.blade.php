@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div>
    <div class="bg-color-2 text-center p-2">
        <p class="cerebri-sans-pro-regular text-white font-size-100 letter-spacing-5 mb-0">PRE-SALE COMING SOON</p>
    </div>

    <div class="background-image-cover" id="hero-section" style="background-image:url('{{ asset('img/home/hero.webp') }}')">
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
            <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-230 font-size-sm-260 mb-4 mb-xl-3 mb-xxl-0">MOST LOVED</p>

            <div class="row justify-content-center pt-4">
                <div class="col-10 col-sm-6 col-lg-3 p-xl-4 p-xxl-5 mb-5">
                    <div class="">
                        <div class="mb-4">
                            <img src="{{ asset('img/shop/product-1.webp') }}" class="w-100" alt="Product" />
                        </div>

                        <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-1">COCOA</p>
                        <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-3">PHP 000.00</p>

                        <div class="">
                            <button class="btn btn-custom-4 cerebri-sans-pro-bold letter-spacing-5 font-size-lg-130 font-size-xl-140 w-100" style="padding-top:8px">ADD TO CART</button>
                        </div>
                    </div>
                </div>

                <div class="col-10 col-sm-6 col-lg-3 p-xl-4 p-xxl-5 mb-5">
                    <div class="">
                        <div class="mb-4">
                            <img src="{{ asset('img/shop/product-2.webp') }}" class="w-100" alt="Product" />
                        </div>

                        <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-1">CARAMEL</p>
                        <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-3">PHP 000.00</p>

                        <div class="">
                            <button class="btn btn-custom-4 cerebri-sans-pro-bold letter-spacing-5 font-size-lg-130 font-size-xl-140 w-100" style="padding-top:8px">ADD TO CART</button>
                        </div>
                    </div>
                </div>

                <div class="col-10 col-sm-6 col-lg-3 p-xl-4 p-xxl-5 mb-5">
                    <div class="">
                        <div class="mb-4">
                            <img src="{{ asset('img/shop/product-3.webp') }}" class="w-100" alt="Product" />
                        </div>

                        <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-1">TAUPE</p>
                        <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-3">PHP 000.00</p>

                        <div class="">
                            <button class="btn btn-custom-4 cerebri-sans-pro-bold letter-spacing-5 font-size-lg-130 font-size-xl-140 w-100" style="padding-top:8px">ADD TO CART</button>
                        </div>
                    </div>
                </div>

                <div class="col-10 col-sm-6 col-lg-3 p-xl-4 p-xxl-5 mb-5">
                    <div class="">
                        <div class="mb-4">
                            <img src="{{ asset('img/shop/product-4.webp') }}" class="w-100" alt="Product" />
                        </div>

                        <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-1">CLAY</p>
                        <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-3">PHP 000.00</p>

                        <div class="">
                            <button class="btn btn-custom-4 cerebri-sans-pro-bold letter-spacing-5 font-size-lg-130 font-size-xl-140 w-100" style="padding-top:8px">ADD TO CART</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-color-6">
        <div class="container-fluid">
            <div class="row min-vh-100 align-items-stretch">
                <div class="col-md-6 background-image-cover p-0" id="about-left-section" style="background-image:url('{{ asset('img/home/about.webp') }}')"></div>

                <div class="col-md-6" id="about-right-section">
                    <div class="h-100 d-flex align-items-center ps-md-4 ps-lg-5">
                        <div class="py-5">
                            <div class="ps-xl-4 ps-xxl-5 py-5">
                                <p class="text-white cerebri-sans-pro-regular text-center text-md-start font-size-280 font-size-sm-300 font-size-md-350 font-size-lg-500 line-height-130 mb-lg-0">About</p>
                                <p class="text-white cerebri-sans-pro-regular text-center text-md-start font-size-130 font-size-lg-150 letter-spacing-10">LOREM IPSUM DOLOR</p>
                                <p class="text-white cerebri-sans-pro-medium text-center text-md-start font-size-90 font-size-lg-100 line-height-170 letter-spacing-10 mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure </p>

                                <div class="text-center text-md-start">
                                    <button class="btn btn-custom-5 font-size-150 font-size-lg-200 cerebri-sans-pro-bold letter-spacing-10 line-height-110 px-3" style="padding-top:10px">READ MORE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-color-5 py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-9 col-lg-9 col-xl-8 col-xxl-7">
                    <p class="text-color-2 cerebri-sans-pro-regular text-center font-size-280 font-size-sm-300 font-size-md-350 font-size-lg-500 line-height-130 mb-4">Lorem ipsum dolor sit amet</p>
                    <p class="text-color-3 cerebri-sans-pro-regular text-center font-size-130 font-size-lg-150 letter-spacing-10 mb-5">LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT, SED DO EIUSMOD TEMPOR INCIDIDUNT UT LABORE ET DOLORE MAGNA ALIQUA. UT ENIM AD MINIM VENIAM, QUIS NOSTRUD EXERCITATION ULLAMCO LABORIS NISI UT ALIQUIP EX EA COMMODO CONSEQUAT. DUIS AUTE IRURE</p>

                    <div class="text-center">
                        <button class="btn btn-custom-4 font-size-180 font-size-md-200 font-size-lg-250 cerebri-sans-pro-bold letter-spacing-10 line-height-110 px-3" style="padding-top:0.35em">SHOP NOW</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="background-image-cover py-5" style="background-image:url('{{ asset('img/home/testimonial-bg.webp') }}')">
        <div class="container py-5">
            <div class="d-flex justify-content-center align-items-center text-center mb-5 pb-5">
                <div class="text-white line-height-90 cerebri-sans-pro-regular font-size-280 font-size-sm-300 font-size-md-350 font-size-lg-500 pe-3">BE</div>

                <div>
                    <img src="{{ asset('img/home/bare-white.png') }}" id="testimonial-bare" />
                </div>
            </div>

            <div class="row justify-content-center pt-4">
                <div class="col-12 col-md-6 col-lg-4 mb-5 mb-lg-0 pb-5 pb-lg-0">
                    <div class="card border-radius-0 mb-4 mb-lg-0" style="border:1px solid #a24e4e">
                        <div class="card-body position-relative px-4 py-5 p-sm-5">
                            <div class="position-absolute text-center w-100" style="top:-70px; left:0">
                                <div class="rounded-circle d-inline-block bg-color-2" style="height:140px; width:140px"></div>
                            </div>

                            <div class="pt-5">
                                <p class="text-color-4 text-center cerebri-sans-pro-regular font-size-110 mb-5">Boost your product and service's credibility by adding testimonials from your clients. People love recommendations so feedback from others who've tried it is invaluable.</p>
                                <p class="text-color-4 text-center cerebri-sans-pro-medium font-size-140 mb-0">Ellen Downing</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-5 mb-lg-0 pb-5 pb-lg-0">
                    <div class="card border-radius-0 mb-4 mb-lg-0" style="border:1px solid #a24e4e">
                        <div class="card-body position-relative px-4 py-5 p-sm-5">
                            <div class="position-absolute text-center w-100" style="top:-70px; left:0">
                                <div class="rounded-circle d-inline-block bg-color-2" style="height:140px; width:140px"></div>
                            </div>

                            <div class="pt-5">
                                <p class="text-color-4 text-center cerebri-sans-pro-regular font-size-110 mb-5">Boost your product and service's credibility by adding testimonials from your clients. People love recommendations so feedback from others who've tried it is invaluable.</p>
                                <p class="text-color-4 text-center cerebri-sans-pro-medium font-size-140 mb-0">Ellen Downing</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-radius-0" style="border:1px solid #a24e4e">
                        <div class="card-body position-relative px-4 py-5 p-sm-5">
                            <div class="position-absolute text-center w-100" style="top:-70px; left:0">
                                <div class="rounded-circle d-inline-block bg-color-2" style="height:140px; width:140px"></div>
                            </div>

                            <div class="pt-5">
                                <p class="text-color-4 text-center cerebri-sans-pro-regular font-size-110 mb-5">Boost your product and service's credibility by adding testimonials from your clients. People love recommendations so feedback from others who've tried it is invaluable.</p>
                                <p class="text-color-4 text-center cerebri-sans-pro-medium font-size-140 mb-0">Ellen Downing</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-color-5">
        <div class="container-fluid">
            <div class="row min-vh-100 align-items-stretch justify-content-end">
                <div class="col-md-6" id="action-left-section">
                    <div class="h-100 d-flex align-items-center py-5">
                        <div class="py-5 pe-lg-4 pe-xxl-5">
                            <div class="pe-md-4 pe-xxl-5 py-5">
                                <p class="text-color-2 cerebri-sans-pro-regular text-center text-md-start font-size-280 font-size-sm-300 font-size-md-280 font-size-xl-380 line-height-110 mb-4">Lorem ipsum<br> dolor sit amet</p>
                                <p class="text-color-2 cerebri-sans-pro-medium text-center text-md-start font-size-90 font-size-lg-100 line-height-170 letter-spacing-10 mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure </p>

                                <div class="text-center text-md-start">
                                    <button class="btn btn-custom-4 font-size-180 font-size-md-200 font-size-xl-250 cerebri-sans-pro-bold letter-spacing-10 line-height-110 px-3" style="padding-top:0.35em">SHOP NOW</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 background-image-cover p-0" id="action-right-section" style="background-image:url('{{ asset('img/home/action.webp') }}')"></div>
            </div>
        </div>
    </div>
</div>

@include('home.includes.footer')

@endsection
