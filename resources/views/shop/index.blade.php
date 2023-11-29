@extends('layouts.app')

@section('title', 'Shop')

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

    <div class="bg-white py-5">
        <div class="container pt-5">
            <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-230 font-size-sm-260 mb-4 mb-xl-3 mb-xxl-0">SHOP ITEMS</p>

            <div class="row justify-content-center pt-4">
                <div class="col-11 col-sm-6 p-xl-4 p-xxl-5 mb-5 mb-sm-4">
                    <a href="{{ route('shop.category', 'nipple-covers') }}" class="text-decoration-none">
                        <div class="w-100 position-relative" style="padding-top:100%">
                            <div class="position-absolute background-image-cover w-100 h-100 d-flex align-items-end p-4 p-lg-5" style="top:0; left:0; background-image:url('{{ asset('img/shop/categories/category-1.webp') }}')">
                                <p class="text-white text-decoration-underline cerebri-sans-pro-bold letter-spacing-10 font-size-120 font-size-md-140 font-size-xl-180 font-size-xxl-190 mb-0">NIPPLE COVERS</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-11 col-sm-6 p-xl-4 p-xxl-5 mb-5 mb-sm-4">
                    <div class="w-100 position-relative" style="padding-top:100%">
                        <div class="position-absolute background-image-cover w-100 h-100 d-flex align-items-end p-4 p-lg-5" style="top:0; left:0; background-image:url('{{ asset('img/shop/categories/coming-soon.webp') }}')">
                            <p class="text-white text-decoration-underline cerebri-sans-pro-bold letter-spacing-10 font-size-120 font-size-md-140 font-size-xl-180 font-size-xxl-190 mb-0">COMING SOON</p>
                        </div>
                    </div>
                </div>

                <div class="col-11 col-sm-6 p-xl-4 p-xxl-5 mb-5 mb-sm-4">
                    <a href="{{ route('shop.category', 'flat-nipple-covers-for-men') }}" class="text-decoration-none">
                        <div class="w-100 position-relative" style="padding-top:100%">
                            <div class="position-absolute background-image-cover w-100 h-100 d-flex align-items-end p-4 p-lg-5" style="top:0; left:0; background-image:url('{{ asset('img/shop/categories/category-3.webp') }}')">
                                <p class="text-white text-decoration-underline cerebri-sans-pro-bold letter-spacing-10 font-size-120 font-size-md-140 font-size-xl-180 font-size-xxl-190 mb-0">FLAT NIPPLE<br/> COVERS FOR MEN</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-11 col-sm-6 p-xl-4 p-xxl-5 mb-5 mb-sm-4">
                    <a href="{{ route('shop.category', 'travel-pouch') }}" class="text-decoration-none">
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

    @include('shop.includes.travel-bags')
</div>

@include('home.includes.footer')

@endsection
