@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div>
    <div class="bg-color-2 text-center p-2">
        <p class="cerebri-sans-pro-regular text-white font-size-100 letter-spacing-5 mb-0">PRE-SALE COMING SOON</p>
    </div>

    <div class="background-image-cover" style="background-image:url('{{ asset('img/contact/bg-1.webp') }}')">
        @include('home.includes.nav')

        <div class="container" style="min-height:80vh; padding-top:84px"></div>
    </div>

    <div class="bg-color-5 py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="pe-lg-4 pe-xxl-5">
                        <div class="pe-md-4 pe-xxl-5 py-lg-5">
                            <p class="text-color-2 cerebri-sans-pro-bold letter-spacing-5 text-center text-md-start font-size-240 font-size-sm-250 font-size-xl-300 font-size-xxl-350 line-height-110 mb-4">SAY IT, BARE!</p>
                            <p class="text-color-6 cerebri-sans-pro-regular text-center text-md-start font-size-sm-110 font-size-md-120 font-size-lg-130 font-size-xl-140 font-size-xxl-160 line-height-170 letter-spacing-5 mb-5">We love hearing from you. Whether you have questions, feedback, or just want to chat, our team is here to assist you. We're dedicated to making your experience with us exceptional, so don't hesitate to reach out.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="bg-color-8 p-3 p-sm-5">
                        <div class="py-4">
                            <p class="text-color-2 cerebri-sans-pro-bold letter-spacing-10 text-center text-md-start font-size-180 font-size-md-200 line-height-110 mb-3">CONTACT US</p>
                            <p class="text-color-6 cerebri-sans-pro-regular text-center text-md-start font-size-lg-110 line-height-130 letter-spacing-5 mb-3">Please contact us using the form below and allow 1-2 business days for your response.</p>

                            <form id="contact-form">
                                <input type="hidden" name="url" value="{{ route('contact.sendMessage') }}" />

                                <input type="text" name="name" class="form-control form-control-1 cerebri-sans-pro-regular text-start mb-3 py-2 px-3" style="height:45px; border:3px solid #946C51; color:#946C51!important" placeholder="Your name" required />
                                <input type="email" name="email" class="form-control form-control-1 cerebri-sans-pro-regular text-start mb-3 py-2 px-3" style="height:45px; border:3px solid #946C51; color:#946C51!important" placeholder="Your email address" required />

                                <textarea name="message" class="form-control form-control-1 cerebri-sans-pro-regular text-start mb-3 py-2 px-3 tw-h-[150px]" style="border:3px solid #946C51; color:#946C51!important" placeholder="Your message" required></textarea>

                                <div class="">
                                    <button type="submit" class="btn btn-custom-6 pb-0 font-size-120 font-size-md-140 font-size-xl-180 font-weight-600 cerebri-sans-pro-bold letter-spacing-10" style="padding-top:5px">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('home.includes.footer')

@endsection
