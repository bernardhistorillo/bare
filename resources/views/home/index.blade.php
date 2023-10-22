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

            <div class="justify-content-center pt-4 autoplay tw-px-[40px] sm:tw-px-[40px] md:tw-px-[50px] lg:tw-px-[40px]">
                @foreach($groupedProducts as $groupedProduct)
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 p-1 p-sm-2 p-md-3 p-lg-3 p-xl-4 mb-5">
                    <div class="">
                        <div class="mb-4">
                            <img src="{{ $groupedProduct['photo'] }}" class="w-100" alt="Product" />
                        </div>

                        <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-130 font-size-md-140 letter-spacing-5 mb-1">{{ strtoupper($groupedProduct['name']) }}</p>
                        <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-130 font-size-md-140 letter-spacing-5 mb-3">PHP {{ number_format($groupedProduct['price'],2) }}</p>

                        <div class="">
                            <button class="btn btn-custom-4 cerebri-sans-pro-bold letter-spacing-5 font-size-lg-130 font-size-xl-140 w-100" style="padding-top:8px">ADD TO CART</button>
                        </div>
                    </div>
                </div>
                @endforeach
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
                                <p class="text-white cerebri-sans-pro-regular text-center text-md-start font-size-130 font-size-lg-150 letter-spacing-10">BARE NECESSITY, BARE CONFIDENCE</p>
                                <p class="text-white cerebri-sans-pro-medium text-center text-md-start font-size-90 font-size-lg-100 line-height-170 letter-spacing-10 mb-5">It all started with a simple desire – to be unburdened by traditional undergarments that didn't align with our comfort and confidence. We understand the frustration of feeling suffocated by clothing that just don't "get" you. That's why we started this journey - making comfort accessible to everyone.</p>

                                <div class="text-center text-md-start">
                                    <a href="{{ route('about.index') }}" class="btn btn-custom-5 font-size-150 font-size-lg-200 cerebri-sans-pro-bold letter-spacing-10 line-height-110 px-3" style="padding-top:10px">LEARN MORE</a>
                                </div>
                            </div>
                        </div>
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
