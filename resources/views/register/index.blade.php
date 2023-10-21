@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="bg-color-2 text-center p-2">
    <p class="cerebri-sans-pro-regular text-white font-size-100 letter-spacing-5 mb-0">PRE-SALE COMING SOON</p>
</div>

<div class="background-image-cover" style="background-image:url('{{ asset('img/home/hero.webp') }}')">
    @include('home.includes.nav')

    <div class="position-relative background-image-cover tw-pt-[84px]" style="background-image:url('{{ asset('img/home/woman.webp') }}')">
        <div class="position-absolute bg-color-1 w-100 h-100" style="top:0; left:0; opacity:0.5; z-index:1"></div>

        <div class="container position-relative py-5" style="top:0; left:0; opacity:0.9; z-index:2">
            <div class="d-flex justify-content-center align-items-center py-5">
                <div class="w-100">
                    <h1 class="text-white helvetica-neue-light text-center line-height-140 line-height-sm-130 font-size-160 font-size-sm-170 font-size-md-190 font-size-lg-220 font-size-xl-240 font-size-xxl-260 mb-5">Create your shopping profile.<br> Register now to get started.</h1>

                    <div class="row justify-content-center">
                        <div class="col-sm-10 col-md-9 col-lg-7 col-xl-6 col-xxl-5">

                            <form id="register-form" class="mb-4">
                                <input type="hidden" name="url" value="{{ route('register.submit') }}" />

                                <input type="text" name="name" class="form-control form-control-1 mb-3 py-2" style="height:45px" placeholder="Your name" required />
                                <input type="email" name="email" class="form-control form-control-1 mb-3 py-2" style="height:45px" placeholder="Your email address" required />
                                <input type="password" name="password" class="form-control form-control-1 mb-3 py-2" style="height:45px" placeholder="Your password" required />
                                <input type="password" name="password_confirmation" class="form-control form-control-1 mb-3 py-2" style="height:45px" placeholder="Confirm your password" required />

                                <div class="mb-5 pb-3">
                                    <button type="submit" class="btn btn-custom-1 w-100 py-2" style="height:50px">Submit</button>
                                </div>
                            </form>

                            <div class="text-center">
                                <a href="{{ route('login.index') }}" class="text-decoration-none">
                                    <div class="helvetica-neue-light text-white font-size-100 font-size-sm-110 font-size-md-120 font-size-lg-130 font-size-xl-130 ps-3">Already have an account? <span class="helvetica-neue-light text-decoration-underline">Log In!</span></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('home.includes.footer')

@endsection
