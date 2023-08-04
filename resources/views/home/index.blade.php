@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="background-image-cover" style="background-image:url('{{ asset('img/home/bg.webp') }}')">
    @include('home.includes.nav')

    <div class="container" style="padding-top:82px">
{{--        <div class="row justify-content-center align-items-center">--}}
{{--            <div class="col-md-8 col-lg-6 col-xl-6 col-xxl-5 order-1 order-lg-0 px-0">--}}
{{--                <div class="background-image-contain" id="model" style="background-image:url('{{ asset('img/home/model.webp') }}'); background-position:50% 100%"></div>--}}
{{--            </div>--}}

{{--            <div class="col-lg-6 col-xl-6 col-xxl-7 order-0 order-lg-1 ps-lg-4 ps-xl-5 pt-4 pt-sm-5 pt-lg-0">--}}
{{--                <div class="ps-xxl-5 pt-5 pb-4 pb-sm-5 mb-3">--}}
{{--                    <h2 class="edensor text-color-1 font-size-320 font-size-sm-450 font-size-md-500 font-size-lg-420 font-size-xl-530 font-size-xxl-630 text-center text-lg-start line-height-md-100 mb-4">For skin you'll<br class="d-block d-lg-none"> love every day</h2>--}}

{{--                    <p class="text-center text-lg-start font-weight-500 font-size-120 mb-4 pb-2">A Medical and Aesthetic Dermatology Clinic<br class="d-none d-sm-block d-xl-none" /> where science<br class="d-none d-xxl-block" /> meets skin care.</p>--}}

{{--                    <div class="text-center text-lg-start">--}}
{{--                        <a class="btn btn-custom-2 font-size-100 font-weight-400 px-5 py-3 mb-4 mb-lg-0" href="https://admin.zensoft.ph/bookings/078a6755-bd72-565b-ac0e-a2fe8700c856/dailyskin-clinic" target="_blank" rel="noreferrer" style="border-radius:30px">SCHEDULE A VISIT</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 82px)">
            <div class="mb-3">
                <h2 class="edensor text-color-1 font-size-320 font-size-sm-450 font-size-md-500 font-size-lg-420 font-size-xl-530 font-size-xxl-630 text-center line-height-md-100 mb-4">For skin you'll<br class="d-block d-lg-none"> love every day</h2>

                <p class="text-center font-weight-500 font-size-sm-110 font-size-md-120 font-size-xl-140 font-size-xxl-160 mb-5 pb-4">A Medical and Aesthetic Dermatology Clinic<br class="d-none d-sm-block d-lg-none"> where science meets skin care.</p>

                <div class="text-center w-100">
                    <a class="btn btn-custom-2 font-size-100 font-weight-400 px-5 py-3 mb-4 mb-lg-0" href="https://admin.zensoft.ph/bookings/078a6755-bd72-565b-ac0e-a2fe8700c856/dailyskin-clinic" target="_blank" rel="noreferrer" style="border-radius:30px">SCHEDULE A VISIT</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="py-5">
        <h2 class="text-color-1 text-center aboreto font-size-200 mb-2">Discover The Best Treatments For You</h2>
        <p class="text-color-1 text-center font-size-120 mb-5 pb-4">We offer holistic dermatological solutions that prioritize your overall well-being</p>

        <div class="row justify-content-center align-items-center px-2">
            <div class="col-sm-6 col-lg-3 px-sm-4 mb-5 mb-lg-0" data-aos="fade-down" data-aos-delay="0">
                <a href="{{ route('services.index') }}#medical">
                    <div class="bg-color-1 w-100 mb-4 background-image-cover" style="padding-top:100%; background-image:url('{{ asset('img/home/treatments/medical.webp') }}')"></div>
                </a>

                <p class="text-center font-size-120 font-sm-110 font-size-xl-120 pt-2 mb-0">MEDICAL</p>
            </div>

            <div class="col-sm-6 col-lg-3 px-sm-4 mb-5 mb-lg-0" data-aos="fade-down" data-aos-delay="100">
                <a href="{{ route('services.index') }}#skin">
                    <div class="bg-color-1 w-100 mb-4 background-image-cover" style="padding-top:100%; background-image:url('{{ asset('img/home/treatments/skin.webp') }}')"></div>
                </a>

                <p class="text-center font-size-120 font-sm-110 font-size-xl-120 pt-2 mb-0">SKIN</p>
            </div>

            <div class="col-sm-6 col-lg-3 px-sm-4 mb-5 mb-sm-0" data-aos="fade-down" data-aos-delay="200">
                <a href="{{ route('services.index') }}#hair">
                    <div class="bg-color-1 w-100 mb-4 background-image-cover" style="padding-top:100%; background-image:url('{{ asset('img/home/treatments/hair.webp') }}')"></div>
                </a>

                <p class="text-center font-size-120 font-sm-110 font-size-xl-120 pt-2 mb-0">HAIR</p>
            </div>

            <div class="col-sm-6 col-lg-3 px-sm-4 mb-0" data-aos="fade-down" data-aos-delay="300">
                <a href="{{ route('services.index') }}#nails">
                    <div class="bg-color-1 w-100 mb-4 background-image-cover" style="padding-top:100%; background-image:url('{{ asset('img/home/treatments/nails.webp') }}')"></div>
                </a>

                <p class="text-center font-size-120 font-sm-110 font-size-xl-120 pt-2 mb-0">NAILS</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-color-2 py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-10 col-xxl-9">
                <h2 class="text-white text-center aboreto font-size-190 font-size-sm-230 font-size-md-230 font-size-lg-220 font-size-xl-260 mb-4">Evidence-based, effective, and everyday skin solutions for you</h2>
                <p class="text-color-3 text-center font-size-120 font-size-sm-130 mb-5">Our treatment plans target your skin, hair, and nail concerns at the root, thereby creating long-lasting and sustainable results rather than temporary fixes.</p>

                <div class="text-center">
                    <a class="btn btn-custom-3 font-size-100 font-weight-400 px-5 py-3" href="https://admin.zensoft.ph/bookings/078a6755-bd72-565b-ac0e-a2fe8700c856/dailyskin-clinic" target="_blank" rel="noreferrer" style="border-radius:30px">SCHEDULE A VISIT</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex flex-column position-relative" style="min-height:calc(100vh - 66px);">
    <div class="feature-section order-1 order-lg-0 w-100" style="top:0; left:0">
        <div class="row images mx-0">
            <div class="col-lg-6 px-0">
                <div class="w-100 h-100 background-image-cover" style="background-image:url('{{ asset('img/home/hydrating-facial.webp') }}')"></div>
            </div>
        </div>
    </div>

    <div class="feature-section order-0 order-lg-1 w-100" style="top:0; left:0">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="offset-lg-6 col-lg-6 px-0 py-5">
                    <div class="px-3 px-md-0 ps-lg-5">
                        <div class="ps-xl-2 ps-xxl-5">
                            <h2 class="text-color-1 text-center text-lg-start font-size-250 font-size-sm-260 font-size-md-310 font-size-lg-310 font-size-xl-380 font-size-xxl-400 edensor mb-4">Your best skin yet.</h2>

                            <p class="text-color-1 text-center text-lg-start font-size-140 font-size-sm-150 font-size-md-160 font-size-lg-170 font-size-xl-190 font-weight-500 mb-2">Hydrating Facial</p>
                            <p class="text-color-1 text-center text-lg-start font-size-120 font-size-sm-120 font-size-lg-130 pb-3 pb-lg-0 mb-4 mb-lg-5">Indulge in an ultimate pampering experience with our Hydrating Facial, designed to replenish and nourish your skin. This restores your skin’s moisture balance and promotes a radiant, supple complexion.</p>

                            <div class="text-center text-lg-start">
                                <a class="btn btn-custom-3 font-size-lg-110 font-weight-400 px-5 py-3" href="{{ route('services.index') }}" style="border-radius:30px">READ MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-color-1 py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9">
                <h2 class="text-color-1 text-center edensor font-size-250 font-size-sm-280 font-size-md-300 font-size-lg-350 font-size-xl-380 mb-5">About<br class="d-block d-sm-none"> Daily Skin Clinic</h2>

                <div class="text-center mb-5">
                    <div class="d-inline-block bg-color-2" style="width:160px; height:1px"></div>
                </div>

                <p class="text-color-1 text-center font-size-120 font-size-sm-130 mb-5">Daily Skin Clinic is a Medical and Aesthetic Dermatology clinic based in Legazpi City, Albay that aims to make everyday beautiful and healthy skin achievable for everyone. We believe that healthy skin is a reflection of a healthy body and mind so we provide comprehensive procedures that go beyond just improving your complexion. Behind the Daily Skin Clinic is a highly trained team who understands that each person's condition is unique, so we offer personalized assistance to determine the best course of action for your skin, hair, and nail concerns.</p>

                <div class="text-center">
                    <a class="btn btn-custom-2 font-size-100 font-weight-400 px-5 py-3 mb-4 mb-lg-0" href="{{ route('about.index') }}" style="border-radius:30px">LEARN MORE</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex flex-column align-items-center position-relative overflow-hidden" style="min-height:calc(100vh - 66px);">
    <div class="order-0 order-lg-1 w-100" id="doctor" style="top:0; right:0">
        <div class="row w-100 h-100 mx-0">
            <div class="offset-lg-7 col-lg-5 px-0">
                <div class="w-100 h-100 bg-color-2 background-image-cover" data-aos="fade-left" style="background-image:url('{{ asset('img/home/doctor.webp') }}'); background-position:50% 0"></div>
            </div>
        </div>
    </div>

    <div class="order-1 order-lg-0 w-100" style="z-index:1; top:0; left:0">
        <div class="container">
            <div class="row align-items-center pb-5 pt-lg-5">
                <div class="col-lg-7 px-0 py-5">
                    <div class="px-3 px-md-0 pe-lg-5">
                        <h2 class="text-color-1 text-center text-lg-start font-size-220 font-size-sm-260 font-size-md-310 font-size-lg-310 font-size-xl-380 edensor mb-0">Meet Dr. Riza Milante</h2>
                        <h2 class="text-color-2 text-center text-lg-start font-size-110 font-size-sm-130 fst-italic mb-4">FPDS, DDSP-PDS, ICDP-UEMS (Dermpath)</h2>

                        <p class="text-color-1 text-center text-lg-start font-size-lg-110 font-size-lg-120 font-size-xl-130 pb-3 pb-lg-0 mb-4">A board-certified dermatologist/dermatopathologist with extensive training in the Philippines and the USA. She graduated with a degree in Medicine, Cum Laude, at the University of Santo Tomas Faculty of Medicine and Surgery, finished residency training at the Jose R. Reyes Memorial Medical Center, and completed fellowship in Dermatopathology at the University of California San Francisco.</p>
                        <p class="text-color-1 text-center text-lg-start font-size-lg-110 font-size-lg-120 font-size-xl-130 pb-3 pb-lg-0 mb-4 mb-lg-5">With the rise of skincare and aesthetic clinics, Dr. Riza wants to offer her expertise to help people achieve beautiful and healthy skin without compromising on medical integrity.</p>

                        <div class="text-center text-lg-start">
                            <a class="btn btn-custom-2 font-size-lg-110 font-weight-400 px-5 py-3" href="{{ route('about.index') }}" target="_blank" rel="noreferrer" style="border-radius:30px">LEARN MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--<div class="background-image-contain pt-md-5 pb-5" style="background-image:url('{{ asset('img/home/bg-3.webp') }}'); background-position:0">--}}
{{--    <div class="container py-5">--}}
{{--        <h2 class="text-color-1 text-center aboreto font-size-250 font-size-sm-260 mb-5 pb-4">FEATURED IN</h2>--}}

{{--        <div class="d-flex flex-wrap justify-content-center align-items-center">--}}
{{--            <div class="mx-3 mx-md-4 mx-xxl-5 mb-5 mb-lg-0" data-aos="fade-down" data-aos-delay="0">--}}
{{--                <img src="{{ asset('img/home/featuredIn/featured-in-1.webp') }}" height="70" />--}}
{{--            </div>--}}

{{--            <div class="mx-3 mx-md-4 mx-xxl-5 mb-5 mb-lg-0" data-aos="fade-down" data-aos-delay="100">--}}
{{--                <img src="{{ asset('img/home/featuredIn/featured-in-2.webp') }}" height="70" />--}}
{{--            </div>--}}

{{--            <div class="mx-3 mx-md-4 mx-xxl-5 mb-0" data-aos="fade-down" data-aos-delay="200">--}}
{{--                <img src="{{ asset('img/home/featuredIn/featured-in-3.webp') }}" height="70" />--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

@include('home.includes.testimonials')
@include('home.includes.cta')
@include('home.includes.footer')

@endsection
