@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
<div class="background-image-cover" style="background-image:url('{{ asset('img/home/hero.webp') }}')">
    <div class="position-relative background-image-cover" style="background-image:url('{{ asset('img/home/woman.webp') }}')">
        <div class="position-absolute bg-color-1 w-100 h-100" style="top:0; left:0; opacity:0.5; z-index:1"></div>

        <div class="container position-relative" style="top:0; left:0; opacity:0.9; z-index:2">
            <div class="d-flex justify-content-center align-items-center min-vh-100 py-5">
                <div class="w-100">
                    <h1 class="text-white helvetica-neue-light text-center line-height-140 line-height-sm-130 font-size-170 font-size-sm-170 font-size-md-190 font-size-lg-220 font-size-xl-240 font-size-xxl-260 mb-5">Password Reset</h1>

                    <div class="row justify-content-center">
                        <div class="col-sm-10 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                            <form id="password-update-form" class="mb-4">
                                <input type="hidden" name="url" value="{{ route('password.update') }}" />
                                <input type="hidden" name="token" value="{{ $token }}" />

                                <input type="email" name="email" class="form-control form-control-1 mb-3 py-2" style="height:45px" placeholder="Your email address" required />

                                <div class="position-relative">
                                    <input type="password" name="password" class="form-control form-control-1 mb-3 py-2" style="height:45px" placeholder="Your new password" required />

                                    <div class="position-absolute cursor-pointer tw-top-[11px] tw-right-[15px] toggle-password-show">
                                        <i class="fa-solid fa-eye font-size-110"></i>
                                    </div>
                                </div>

                                <div class="position-relative">
                                    <input type="password" name="password_confirmation" class="form-control form-control-1 mb-3 py-2" style="height:45px" placeholder="Confirm your password" required />

                                    <div class="position-absolute cursor-pointer tw-top-[11px] tw-right-[15px] toggle-password-show">
                                        <i class="fa-solid fa-eye font-size-110"></i>
                                    </div>
                                </div>

                                <div class="mb-5">
                                    <button type="submit" class="btn btn-custom-1 w-100 py-2" style="height:50px">Reset Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
