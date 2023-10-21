@extends('layouts.app')

@section('title', 'Sign Up Now!')

@section('content')
<div class="position-relative background-image-cover" style="background-image:url('{{ asset('img/home/woman.webp') }}')">
    <div class="position-absolute bg-color-1 w-100 h-100" style="top:0; left:0; opacity:0.5; z-index:1"></div>

    <div class="container position-relative" style="top:0; left:0; opacity:0.9; z-index:2">
        <div class="d-flex justify-content-center align-items-center min-vh-100 py-5">
            <div class="w-100">
                <div class="text-center mb-4 pb-2">
                    <img src="{{ asset('img/home/bare-white.png') }}" class="d-inline" width="150" alt="{{ config('app.name') }}" />
                </div>

                <h1 class="text-white helvetica-neue-light text-center line-height-140 line-height-sm-130 font-size-220 font-size-sm-220 font-size-md-230 font-size-lg-260 font-size-xl-320 font-size-xxl-350 mb-5">Sign Up & Get 20% Discount<br class="d-none d-sm-block d-lg-none"/> On Our Launch!</h1>

                <div class="row justify-content-center">
                    <div class="col-sm-10 col-md-9 col-lg-7 col-xl-6 col-xxl-5">

                        <form id="email-subscription-form" class="mb-4">
                            <input type="hidden" name="url" value="{{ route('contact.subscribeEmail') }}" />
                            <input type="hidden" name="type" value="general" />

                            <input type="text" name="name" class="form-control form-control-1 mb-3 py-2" style="height:45px" placeholder="Your first name" required />
                            <input type="email" name="email" class="form-control form-control-1 mb-3 py-2" style="height:45px" placeholder="Your email address" required />

                            <div class="mb-5 pb-3">
                                <button type="submit" class="btn btn-custom-1 w-100 py-2" style="height:50px">KEEP ME POSTED!</button>
                            </div>
                        </form>

                        <a href="mailto:help@wearebare.co" class="d-flex align-items-center justify-content-center text-decoration-none">
                            <div class="d-flex align-items-center justify-content-center bg-white rounded-circle email-icon">
                                <div class="line-height-90">
                                    <i class="fa-solid fa-envelope text-color-1 font-size-md-120 font-size-xl-120"></i>
                                </div>
                            </div>
                            <div class="text-white font-size-100 font-size-sm-110 font-size-md-120 font-size-lg-130 font-size-xl-130 ps-3">help@wearebare.co</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
