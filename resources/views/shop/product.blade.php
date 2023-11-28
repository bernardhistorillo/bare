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
                            <p class="cerebri-sans-pro-regular text-color-5 font-size-120 letter-spacing-5 line-height-130">{{ $product['description'] }}</p>
                        </div>

                        @if($product['name'] != 'Zip Bag' || $product['name'] == 'Zip Pouch' || $product['name'] == 'Drawstring Bag')
                        <div class="mb-4">
                            <p class="cerebri-sans-pro-regular text-color-2 font-size-140 letter-spacing-10 mb-1">MATERIAL</p>
                            <p class="cerebri-sans-pro-regular text-color-5 font-size-120 letter-spacing-5 line-height-130">Silicone</p>
                        </div>

                        <div class="mb-4">
                            <p class="cerebri-sans-pro-regular text-color-2 font-size-140 letter-spacing-10 mb-1">TYPE</p>
                            <p class="cerebri-sans-pro-regular text-color-5 font-size-120 letter-spacing-5 line-height-130">Choice between ADHESIVE and NON-ADHESIVE</p>
                        </div>

                        <div class="mb-4">
                            <p class="cerebri-sans-pro-regular text-color-2 font-size-140 letter-spacing-10 mb-1">SIZE</p>

                            <div class="row">
                                @if($product['name'] == 'Nude' || $product['name'] == 'Taupe')
                                <div class="col-lg-2">
                                    <div class="tw-bg-[#f6f3ee]">
                                        <p class="cerebri-sans-pro-medium tw-text-[#949494] text-center tw-pt-[5px] pb-1">6 CM</p>
                                    </div>
                                </div>
                                @endif

                                <div class="col-lg-2">
                                    <div class="tw-bg-[#f6f3ee]">
                                        <p class="cerebri-sans-pro-medium tw-text-[#949494] text-center tw-pt-[5px] pb-1">8 CM</p>
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="tw-bg-[#f6f3ee]">
                                        <p class="cerebri-sans-pro-medium tw-text-[#949494] text-center tw-pt-[5px] pb-1">10 CM</p>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="tw-bg-[#f6f3ee]">
                                        <p class="cerebri-sans-pro-medium tw-text-[#949494] text-center tw-pt-[5px] pb-1">SIZE GUIDE</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <hr class="my-5">

                        <p class="text-color-2 cerebri-sans-pro-bold font-size-140 letter-spacing-5 mb-3">PHP {{ number_format($product['price'],2) }}</p>

                        <div class="">
                            <form class="update-cart-form">
                                <input type="hidden" name="name" value="{{ $product['name'] }}" />
                                <input type="hidden" name="category" value="{{ $product['category'] }}" />
                                <input type="hidden" name="variations" value="{{ json_encode($product['variations']) }}" />

                                <button type="submit" class="btn btn-custom-4 cerebri-sans-pro-bold letter-spacing-5 font-size-120 font-size-lg-130 font-size-xl-140 tw-pt-[8px] lg:tw-pt-[10px] px-4">ADD TO CART</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row tw-px-[4px] lg:tw-px-[0px]">
                @foreach(json_decode($product['sub_photos'], true) as $sub_photos)
                <div class="col-4 col-lg-3 px-2 px-lg-3 mb-4">
                    <div class="w-100 background-image-cover" style="padding-top:100%;  background-image:url('{{ $sub_photos }}')"></div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    @if($product['name'] != 'Zip Bag' || $product['name'] == 'Zip Pouch' || $product['name'] == 'Drawstring Bag')
    <div class="bg-color-5 py-5">
        <div class="container pb-5">
            <p class="text-color-2 cerebri-sans-pro-bold text-center letter-spacing-10 font-size-230 font-size-sm-260 mb-3">SIZE GUIDE</p>
            <div class="row justify-content-center mb-5">
                <div class="col-lg-9 col-xl-7">
                    <p class="text-color-5 cerebri-sans-pro-regular text-center font-size-120 font-size-lg-130 letter-spacing-10">Here's a size guide for nipple covers based on nipple diameter and cup sizes:</p>
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

    <div class="background-image-cover py-5" style="background-image:url('{{ asset('img/shop/pouch-bg.webp') }}')">
        <div class="container-fluid py-5">
            <div id="carouselExample" class="carousel slide lg:tw-px-[120px] xl:tw-px-[150px]">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-11 col-sm-8 col-md-7 col-lg-6">
                                <div class="card mb-5 mb-lg-0" style="border:1px solid #572231">
                                    <div class="card-body p-4 p-lg-5">
                                        <img src="{{ asset('img/shop/products/zip-pouch.webp') }}" class="w-100" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="ps-md-4">
                                    <div class="ps-xl-4 ps-xxl-5">
                                        <p class="text-white cerebri-sans-pro-medium text-center text-lg-start font-size-180 font-size-sm-200 font-size-md-220 line-height-130 mb-3 mb-lg-2">ZIP POUCH</p>

                                        <p class="text-white cerebri-sans-pro-medium text-center text-lg-start font-size-90 font-size-lg-100 line-height-xl-170 letter-spacing-10 mb-5">Care for your nipple covers with our Dust Bags. These essential accessories ensure your covers stay clean and free from debris. Crafted from soft, breathable fabric, the drawstring closure provides a hygienic storage solution, preserving your nipple covers' quality and longevity.</p>

                                        <div class="text-center text-lg-start">
                                            <a href="{{ route('shop.category', 'nipple-covers') }}" class="btn btn-custom-5 cerebri-sans-pro-bold letter-spacing-5 font-size-120 font-size-lg-130 font-size-xl-140 tw-pt-[8px] lg:tw-pt-[10px] px-4">SHOP NIPPLE COVERS</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-11 col-sm-8 col-md-7 col-lg-6">
                                <div class="card mb-5 mb-lg-0" style="border:1px solid #572231">
                                    <div class="card-body p-4 p-lg-5">
                                        <img src="{{ asset('img/shop/products/drawstring-bag.webp') }}" class="w-100" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="ps-md-4">
                                    <div class="ps-xl-4 ps-xxl-5">
                                        <p class="text-white cerebri-sans-pro-medium text-center text-lg-start font-size-180 font-size-sm-200 font-size-md-220 line-height-130 mb-3 mb-lg-2">DRAWSTRING BAG</p>

                                        <p class="text-white cerebri-sans-pro-medium text-center text-lg-start font-size-90 font-size-lg-100 line-height-xl-170 letter-spacing-10 mb-5">Care for your nipple covers with our Dust Bags. These essential accessories ensure your covers stay clean and free from debris. Crafted from soft, breathable fabric, the drawstring closure provides a hygienic storage solution, preserving your nipple covers' quality and longevity.</p>

                                        <div class="text-center text-lg-start">
                                            <a href="{{ route('shop.category', 'nipple-covers') }}" class="btn btn-custom-5 cerebri-sans-pro-bold letter-spacing-5 font-size-120 font-size-lg-130 font-size-xl-140 tw-pt-[8px] lg:tw-pt-[10px] px-4">SHOP NIPPLE COVERS</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>

@include('home.includes.footer')
@include('shop.includes.modalVariation')

@endsection
