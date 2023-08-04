@extends('layouts.app')

@section('title', 'Website Under Construction')

@section('content')
<div class="bg-color-1">
    <div class="container">
        <div class="d-flex justify-content-center align-items-center min-vh-100 py-5">
            <div class="w-100">
                <div class="text-center mb-4 pb-2">
                    <img src="{{ asset('img/home/bare-white.png') }}" width="150" alt="{{ config('app.name') }}" />
                </div>

                <h1 class="text-white resotho-extralight text-center font-size-200 font-size-sm-240 font-size-md-280 font-size-lg-260 font-size-xl-280 font-size-xxl-300 mb-5">Website Under Construction</h1>

                <div class="row justify-content-center">
                    <div class="col-sm-10 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                        <form id="email-subscription-form" action="{{ route('contact.subscribeEmail') }}">
                            <input type="hidden" name="type" value="general" />

                            <input type="text" name="name" class="form-control form-control-1 mb-3 py-2" style="height:45px" placeholder="Your first name" />
                            <input type="email" name="email" class="form-control form-control-1 mb-3 py-2" style="height:45px" placeholder="Your email address" />

                            <div class="mb-5 pb-3">
                                <button type="submit" class="btn btn-custom-1 w-100 py-2" style="height:50px">KEEP ME POSTED!</button>
                            </div>
                        </form>

                        <a href="mailto:admin@wearebare.co" class="d-flex align-items-center justify-content-center text-decoration-none">
                            <div class="d-flex align-items-center justify-content-center bg-white rounded-circle email-icon">
                                <div class="line-height-90">
                                    <i class="fa-solid fa-envelope text-color-1 font-size-md-120 font-size-xl-120"></i>
                                </div>
                            </div>
                            <div class="text-white font-size-100 font-size-sm-110 font-size-md-120 font-size-lg-130 font-size-xl-130 ps-3">admin@wearebare.co</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
