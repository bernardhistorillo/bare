@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="tw-bg-[#dfdad9]">
    <div class="background-image-cover" style="background-image:url('{{ asset('img/home/bg-1.webp') }}')">
        @include('home.includes.nav')

        <div class="container tw-mt-[44px]">
            <div class="d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 44px); ">
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
                                        <a href="{{ route('shop.index') }}" class="btn btn-custom-3 cerebri-sans-pro-bold letter-spacing-5 font-size-120 font-size-lg-130 font-size-xl-140 tw-pt-[8px] lg:tw-pt-[10px] px-4">SHOP NOW</a>
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
            <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-230 font-size-sm-260 mb-4 mb-xl-3 mb-xxl-0">MOST LOVED</p>

            <div class="justify-content-center pt-4 autoplay tw-px-[40px] sm:tw-px-[40px] md:tw-px-[50px] lg:tw-px-[40px]">
                @foreach($groupedProducts as $i => $groupedProduct)
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 p-1 p-sm-2 p-md-3 p-lg-3 p-xl-4 mb-5">
                    <div class="">
                        <a href="{{ route('shop.product', [str_replace(' ', '-', strtolower($groupedProduct['category'])), strtolower($groupedProduct['name'])]) }}" class="text-decoration-none">
                            <div class="position-relative hover-photo mb-4">
                                <img src="{{ $groupedProduct['photo'] }}" class="w-100" alt="Product" style="opacity:1; transition:0.5s" />

                                @foreach(json_decode($groupedProduct['sub_photos'],true) as $subPhoto)
                                <div class="position-absolute" style="top:0; left:0">
                                    <img src="{{ $subPhoto }}" style="opacity:0; transition:0.5s" alt="Product" />
                                </div>
                                @endforeach
                            </div>

                            <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-130 font-size-md-140 letter-spacing-5 mb-1">{{ strtoupper($groupedProduct['name']) }}</p>
                            <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-130 font-size-md-140 letter-spacing-5 mb-3">PHP {{ number_format($groupedProduct['price'],2) }}</p>
                        </a>

                        <div class="mb-4">
                            <form class="update-cart-form" data-index="{{ $i }}">
                                <input type="hidden" name="name" value="{{ $groupedProduct['name'] }}" />
                                <input type="hidden" name="category" value="{{ $groupedProduct['category'] }}" />
                                <input type="hidden" name="variations" value="{{ json_encode($groupedProduct['variations']) }}" />

                                <button type="submit" class="btn btn-custom-4 cerebri-sans-pro-bold letter-spacing-5 font-size-120 font-size-lg-130 font-size-xl-140 tw-pt-[8px] lg:tw-pt-[10px] w-100">ADD TO CART</button>
                            </form>
                        </div>

                        <p class="cerebri-sans-pro-regular text-center mb-2">Or shop on:</p>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-3">
                                <a href="{{ $groupedProduct['lazada_link'] }}" target="_blank" rel="noreferrer">
                                    <img src="{{ asset('img/home/lazada.webp') }}" class="w-100 tw-rounded-[30%]" alt="{{ config('app.name') }}" />
                                </a>
                            </div>

                            <div class="col-3">
                                <a href="{{ $groupedProduct['shopee_link'] }}" target="_blank" rel="noreferrer">
                                    <img src="{{ asset('img/home/shopee.webp') }}" class="w-100 tw-rounded-[30%]" alt="{{ config('app.name') }}" />
                                </a>
                            </div>
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
                <div class="col-md-6 background-image-cover p-0" id="about-left-section" style="background-image:url('{{ asset('img/home/about-1.webp') }}')"></div>

                <div class="col-md-6" id="about-right-section">
                    <div class="h-100 d-flex align-items-center ps-md-4 ps-lg-5">
                        <div class="py-5">
                            <div class="ps-xl-4 ps-xxl-5 py-5">
                                <p class="text-white cerebri-sans-pro-regular text-center text-md-start font-size-280 font-size-sm-300 font-size-md-350 font-size-lg-500 line-height-130 mb-lg-0">About</p>
                                <p class="text-white cerebri-sans-pro-regular text-center text-md-start font-size-130 font-size-lg-150 mb-3 letter-spacing-10">BARE NECESSITY, BARE CONFIDENCE</p>
                                <p class="text-white cerebri-sans-pro-regular text-center text-md-start font-size-110 font-size-md-120 font-size-lg-130 font-size-xl-140 font-size-xxl-150 mb-5">It all started with a simple desire – to be unburdened by traditional undergarments that didn't align with our comfort and confidence. We understand the frustration of feeling suffocated by clothing that just don't "get" you. That's why we started this journey - making comfort accessible to everyone.</p>

                                <div class="text-center text-md-start">
                                    <a href="{{ route('about.index') }}" class="btn btn-custom-3 cerebri-sans-pro-bold letter-spacing-5 font-size-120 font-size-lg-130 font-size-xl-140 tw-pt-[8px] lg:tw-pt-[10px] px-4" style="padding-top:10px">LEARN MORE</a>
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
