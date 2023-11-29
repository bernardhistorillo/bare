@extends('layouts.app')

@section('title', 'About')

@section('content')
<div>
    <div class="bg-color-2 text-center p-2">
        <p class="cerebri-sans-pro-regular text-white font-size-100 letter-spacing-5 mb-0">PRE-SALE COMING SOON</p>
    </div>

    <div class="background-image-cover" style="background-image:url('{{ asset('img/home/hero.webp') }}')">
        @include('home.includes.nav')

        <div class="container" style="padding-top:84px"></div>
    </div>

    <div class="bg-white">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center">
                <div class="py-5">
                    <div class="py-4 py-sm-5">
                        <p class="cerebri-sans-pro-regular line-height-100 text-center text-color-2 font-size-260 font-size-sm-340 font-size-md-440 font-size-lg-460 font-size-xl-480 font-size-xxl-500">Bare Necessity</p>
                        <p class="cerebri-sans-pro-regular line-height-100 text-center text-color-2 font-size-260 font-size-sm-340 font-size-md-440 font-size-lg-460 font-size-xl-480 font-size-xxl-500">Bare Confidence</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="background-image-cover" style="background-image:url('{{ asset('img/about/bg-1.webp') }}')">
        <div class="container py-sm-4">
            <div class="row justify-content-center align-items-center py-5" style="min-height:calc(50vh)">
                <div class="col-md-10 col-lg-8 col-xl-7 py-5">
                    <p class="cerebri-sans-pro-regular text-center text-white font-size-110 font-size-md-120 font-size-lg-130 font-size-xl-140 font-size-xxl-150 mb-4">It all started with a simple desire – to be unburdened by traditional undergarments that didn't align with our comfort and confidence. We understand the frustration of feeling suffocated by clothing that just don't "get" you. That's why we started this journey - making comfort accessible to everyone.</p>
                    <p class="cerebri-sans-pro-regular text-center text-white font-size-110 font-size-md-120 font-size-lg-130 font-size-xl-140 font-size-xxl-150 mb-4">Bare is more than a brand; it's a movement. A movement that seeks to free you from the constraints of uncomfortable bras and panties. We've been there, and we know the feeling. That's why we offer you a range of products that are designed to enhance your experience, without sacrificing style.</p>
                    <p class="cerebri-sans-pro-regular text-center text-white font-size-110 font-size-md-120 font-size-lg-130 font-size-xl-140 font-size-xxl-150 mb-0">While we're starting with nipple covers, our vision extends far beyond. Our product range, carefully designed with you in mind, includes underwear, loungewear, and shapewear, all tailored to empower you in every way possible.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-11 col-lg-10 col-xl-10 col-xxl-9">
                    <div class="pb-5">
                        <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-280 font-size-sm-300 font-size-md-350 font-size-lg-390 font-size-xl-420 font-size-xxl-450 line-height-130 letter-spacing-10 mb-4">MISSION</p>
                        <p class="text-color-3 cerebri-sans-pro-regular text-center font-size-130 font-size-lg-150 letter-spacing-5 line-height-130 mb-5">At Bare, our mission is to redefine the way people experience comfort, style, and self-expression. We are committed to providing products that offer comfort and confidence, effortlessly blending style and comfort, and celebrating individuality.</p>
                    </div>

                    <div>
                        <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-280 font-size-sm-300 font-size-md-350 font-size-lg-390 font-size-xl-420 font-size-xxl-450 line-height-130 letter-spacing-10 mb-4">VISION</p>
                        <p class="text-color-3 cerebri-sans-pro-regular text-center font-size-130 font-size-lg-150 letter-spacing-5 line-height-130 mb-0">Our vision is a world where everyone feels empowered to embrace their unique individuality through their clothing choices. We aspire to be a leading force in the fashion industry, known for our commitment to providing high-quality, comfortable, and stylish solutions that foster comfortable confidence and effortless style.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white">
        <div class="container-fluid">
            <div class="row min-vh-100 align-items-stretch justify-content-end">
                <div class="col-md-6" id="action-left-section">
                    <div class="h-100 d-flex align-items-center pb-5 py-md-5">
                        <div class="py-5 pe-lg-4 pe-xxl-5">
                            <div class="pe-md-4 pe-xxl-5">
                                <p class="text-color-2 cerebri-sans-pro-regular text-center text-md-start font-size-280 font-size-sm-300 font-size-md-280 font-size-xl-380 line-height-110 mb-4">Dare to be bare</p>
                                <p class="text-color-2 cerebri-sans-pro-medium text-center text-md-start font-size-90 font-size-lg-100 line-height-170 letter-spacing-10 mb-5">Want to learn more about fashion-forward ideas? Check out our blog, where we share stories, insights, and tips that will inspire you to make informed choices about your comfort and style. Your journey towards feeling confident, secure, and comfortable begins with knowledge. Visit our blog and become a part of our community today.</p>

                                <div class="text-center text-md-start">
                                    <a href="{{ route('blog.index') }}" class="btn btn-custom-4 cerebri-sans-pro-bold letter-spacing-5 font-size-120 font-size-lg-130 font-size-xl-140 tw-pt-[8px] lg:tw-pt-[10px] px-4">READ MORE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 background-image-cover p-0" id="action-right-section" style="background-image:url('{{ asset('img/about/img-2.webp') }}')"></div>
            </div>
        </div>
    </div>
</div>

@include('home.includes.footer')

@endsection
