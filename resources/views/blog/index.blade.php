@extends('layouts.app')

@section('title', 'Blog')

@section('content')
<div>
    <div class="bg-color-2 text-center p-2">
        <p class="cerebri-sans-pro-regular text-white font-size-100 letter-spacing-5 mb-0">PRE-SALE COMING SOON</p>
    </div>

    <div class="background-image-cover" style="background-image:url('{{ asset('img/blog/bg-2.webp') }}')">
        @include('home.includes.nav')

        <div class="container">
            <div class="row justify-content-center justify-content-md-start align-items-center tw-min-h-[calc(100vh-40px)]" style="padding-top:84px">
                <div class="col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                    <p class="text-center text-md-start cerebri-sans-pro-bold text-white tw-text-[2.1em] sm:tw-text-[2.4em] xl:tw-text-[2.8em] letter-spacing-5 mb-2">DARE TO BE BARE</p>
                    <p class="text-center text-md-start cerebri-sans-pro-regular text-white tw-text-[1.2em] sm:tw-text-[1.3em] md:tw-text-[1.5em] xl:tw-text-[1.6em] line-height-130">Want to learn more about fashion-forward ideas? Check out our blog, where we share stories, insights, and tips that will inspire you to make informed choices about your comfort and style. </p>
                </div>
            </div>
        </div>
    </div>
</div>

@include('home.includes.footer')

@endsection
