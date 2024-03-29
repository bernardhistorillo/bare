<div class="bg-color-7 py-5">
    <div class="container py-3">
        <div class="row justify-content-center align-items-center">
            <div class="col-7 col-sm-5 col-md-3 mb-4 mb-md-0">
                <div class="mb-4">
                    <a href="{{ route('home.index') }}" class="text-decoration-none">
                        <img src="{{ asset('img/home/bare-white.png') }}" class="w-100" alt="{{ config('app.name') }}" />
                    </a>
                </div>

                <div class="d-flex justify-content-center justify-content-md-start align-items-center mb-4">
                    <div class="pe-4">
                        <a href="https://www.facebook.com/wearebare.co" target="_blank" class="text-white text-decoration-none">
                            <i class="fa-brands fa-facebook-f font-size-160 font-size-md-180 font-size-lg-220 font-size-xl-250"></i>
                        </a>
                    </div>

                    <div class="pe-4">
                        <a href="https://www.instagram.com/wearebare.co" target="_blank" class="text-white text-decoration-none">
                            <i class="fa-brands fa-instagram font-size-160 font-size-md-180 font-size-lg-220 font-size-xl-250"></i>
                        </a>
                    </div>

                    <div class="pe-4">
                        <a href="https://www.tiktok.com/@wearebare.co" target="_blank" class="text-white text-decoration-none">
                            <i class="fa-brands fa-tiktok font-size-160 font-size-md-180 font-size-lg-220 font-size-xl-250"></i>
                        </a>
                    </div>
                </div>

                <div class="d-flex justify-content-center justify-content-md-start align-items-center">
                    <div class="pe-4">
                        <a href="https://www.lazada.com.ph/shop/wearebare-co" target="_blank" rel="noreferrer">
                            <img src="{{ asset('img/home/lazada.webp') }}" class="tw-w-[50px] tw-rounded-[30%]" alt="{{ config('app.name') }}" />
                        </a>
                    </div>

                    <div class="">
                        <a href="https://shopee.ph/wearebare.co" target="_blank" rel="noreferrer">
                            <img src="{{ asset('img/home/shopee.webp') }}" class="tw-w-[50px] tw-rounded-[30%]" alt="{{ config('app.name') }}" />
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="d-flex justify-content-center justify-content-md-end">
                    <div>
                        <div class="d-flex justify-content-center flex-wrap mb-3 mb-sm-4">
                            <div class="ps-3 ps-sm-0 pe-3 mb-2 mb-sm-0">
                                <a class="text-decoration-none font-size-lg-120 font-size-xl-160 letter-spacing-5 text-white cerebri-sans-pro-regular" href="{{ route('home.index') }}">HOME</a>
                            </div>

                            <div class="px-3 mb-2 mb-sm-0">
                                <a class="text-decoration-none font-size-lg-120 font-size-xl-160 letter-spacing-5 text-white cerebri-sans-pro-regular" href="{{ route('shop.index') }}">SHOP</a>
                            </div>

                            <div class="px-3 mb-2 mb-sm-0">
                                <a class="text-decoration-none font-size-lg-120 font-size-xl-160 letter-spacing-5 text-white cerebri-sans-pro-regular" href="{{ route('about.index') }}">ABOUT</a>
                            </div>

                            <div class="px-3 mb-2 mb-sm-0">
                                <a class="text-decoration-none font-size-lg-120 font-size-xl-160 letter-spacing-5 text-white cerebri-sans-pro-regular" href="{{ route('contact.index') }}">CONTACT</a>
                            </div>

                            <div class="pe-3 pe-sm-0 ps-3 mb-2 mb-sm-0">
                                <a class="text-decoration-none font-size-lg-120 font-size-xl-160 letter-spacing-5 text-white cerebri-sans-pro-regular" href="{{ route('blog.index') }}">BLOG</a>
                            </div>
                        </div>

                        <div class="text-center text-md-end">
                            <div>
                                <a href="mailto:help@wearebare.co" class="text-decoration-none font-size-lg-120 font-size-xl-140 letter-spacing-10 text-white cerebri-sans-pro-regular mb-0">HELP@WEAREBARE.CO</a>
                            </div>
                            <div>
                                <a href="tel:09692300908" class="text-decoration-none font-size-lg-120 font-size-xl-140 letter-spacing-10 text-white cerebri-sans-pro-regular">0969 2300 908</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
