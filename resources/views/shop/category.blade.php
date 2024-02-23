@extends('layouts.app')

@section('title', $categoryName)

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
            <p class="text-color-2 cerebri-sans-pro-bold text-center letter-spacing-10 font-size-230 font-size-sm-260 mb-3">{{ strtoupper($categoryName) }}</p>
            <div class="row justify-content-center mb-3 mb-xl-0">
                <div class="col-lg-9 col-xl-8">
                    @if($category == 'nipple-covers')
                    <p class="text-color-5 cerebri-sans-pro-regular text-center font-size-110 font-size-md-120 font-size-lg-130 font-size-xl-140 font-size-xxl-150">Our signature silicone nipple cover - also known as nipple concealers or nipple pasties, are designed to create a seamless and discreet appearance under your clothing. Made from hypoallergenic medical-grade silicone, they ensure both comfort and security.</p>
                    @elseif($category == 'flat-nipple-covers-for-men')
                    <p class="text-color-5 cerebri-sans-pro-regular text-center font-size-110 font-size-md-120 font-size-lg-130 font-size-xl-140 font-size-xxl-150">The flat nipple covers from Bare are meticulously crafted to ensure a comfortable fit and a smooth profile. They are designed to lay flat against the skin, creating a subtle and undetectable barrier that eliminates the visibility of nipples under clothing. Whether it’s for athletic activities, formal events, or everyday wear, these nipple covers allow men to feel confident and at ease in any situation.</p>
                    @endif
                </div>
            </div>

            <div class="row justify-content-center pt-4">
                @foreach($groupedProducts as $i => $groupedProduct)
                <div class="col-10 col-sm-6 col-lg-3 p-xl-4 p-xxl-5 mb-5">
                    <div class="">
                        <a href="{{ route('shop.product', [$category, strtolower($groupedProduct['name'])]) }}" class="text-decoration-none">
                            <div>
                                <div class="position-relative hover-photo mb-4">
                                    <img src="{{ $groupedProduct['photo'] }}" class="w-100" alt="Product" style="opacity:1; transition:0.5s" />

                                    @foreach(json_decode($groupedProduct['sub_photos'],true) as $subPhoto)
                                    <div class="position-absolute" style="top:0; left:0">
                                        <img src="{{ $subPhoto }}" style="opacity:0; transition:0.5s" alt="Product" />
                                    </div>
                                    @endforeach
                                </div>

                                <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-1">{{ strtoupper($groupedProduct['name']) }}</p>
                                <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-3">PHP {{ number_format($groupedProduct['price'],2) }}</p>
                            </div>
                        </a>

                        <div class="mb-4">
                            <form class="update-cart-form" data-index="{{ $i }}">
                                <input type="hidden" name="name" value="{{ $groupedProduct['name'] }}" />
                                <input type="hidden" name="category" value="{{ $groupedProduct['category'] }}" />
                                <input type="hidden" name="variations" value="{{ json_encode($groupedProduct['variations']) }}" />

                                <button type="submit" class="btn btn-custom-4 cerebri-sans-pro-bold letter-spacing-5 font-size-120 font-size-lg-130 font-size-xl-140 tw-pt-[8px] lg:tw-pt-[10px] w-100">ADD TO CART</button>
                            </form>
                        </div>

                        <p class="cerebri-sans-pro-regular text-center font-size-90 mb-2">Or shop on:</p>
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
</div>

@include('home.includes.footer')

@endsection
