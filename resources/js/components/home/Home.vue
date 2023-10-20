<template>
    <div>
        <div class="bg-color-2 text-center p-2">
            <p class="cerebri-sans-pro-regular text-white font-size-100 letter-spacing-5 mb-0">PRE-SALE COMING SOON</p>
        </div>

        <div class="background-image-cover" id="hero-section" style="background-image:url('img/home/hero.webp')">
            <Navigation></Navigation>

            <div class="container">
                <div class="d-flex justify-content-center align-items-center h-100" style="min-height: calc(100vh - 40px); padding-top:84px">
                    <div class="row justify-content-center mb-3">
                        <div class="col-lg-9">
                            <div class="bg-color-4 p-5">
                                <div class="row justify-content-center">
                                    <div class="col-sm-10 col-md-7 col-lg-7 col-xl-6 col-xxl-5">
                                        <div class="mb-4 mb-sm-5">
                                            <img src="img/home/bare-white.png" class="w-100" alt="{{ appName }}" />
                                        </div>

                                        <p class="cerebri-sans-pro-medium text-white text-center font-size-160 font-size-sm-220 line-height-110 letter-spacing-10 mb-2">Bare Necessity</p>
                                        <p class="cerebri-sans-pro-medium text-white text-center font-size-160 font-size-sm-220 line-height-110 letter-spacing-10 mb-5">Bare Confidence</p>

                                        <div class="text-center">
                                            <router-link :to="{ name: 'shop' }" class="btn btn-custom-3 px-4 py-3">
                                                <div class="cerebri-sans-pro-bold letter-spacing-10 font-size-170 font-size-sm-240 line-height-80" style="padding-top:6px">SHOP NOW</div>
                                            </router-link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-color-5 py-5">
            <div class="container pt-5">
                <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-230 font-size-sm-260 mb-4 mb-xl-3 mb-xxl-0">MOST LOVED</p>

                <div class="row justify-content-center pt-4">
                    <div class="col-10 col-sm-6 col-lg-3 p-xl-4 p-xxl-5 mb-5">
                        <div class="">
                            <div class="mb-4">
                                <img src="img/shop/product-1.webp" class="w-100" alt="Product" />
                            </div>

                            <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-1">COCOA</p>
                            <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-3">PHP 000.00</p>

                            <div class="">
                                <button class="btn btn-custom-4 cerebri-sans-pro-bold letter-spacing-5 font-size-lg-130 font-size-xl-140 w-100" style="padding-top:8px">ADD TO CART</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-10 col-sm-6 col-lg-3 p-xl-4 p-xxl-5 mb-5">
                        <div class="">
                            <div class="mb-4">
                                <img src="img/shop/product-2.webp" class="w-100" alt="Product" />
                            </div>

                            <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-1">CARAMEL</p>
                            <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-3">PHP 000.00</p>

                            <div class="">
                                <button class="btn btn-custom-4 cerebri-sans-pro-bold letter-spacing-5 font-size-lg-130 font-size-xl-140 w-100" style="padding-top:8px">ADD TO CART</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-10 col-sm-6 col-lg-3 p-xl-4 p-xxl-5 mb-5">
                        <div class="">
                            <div class="mb-4">
                                <img src="img/shop/product-3.webp" class="w-100" alt="Product" />
                            </div>

                            <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-1">TAUPE</p>
                            <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-3">PHP 000.00</p>

                            <div class="">
                                <button class="btn btn-custom-4 cerebri-sans-pro-bold letter-spacing-5 font-size-lg-130 font-size-xl-140 w-100" style="padding-top:8px">ADD TO CART</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-10 col-sm-6 col-lg-3 p-xl-4 p-xxl-5 mb-5">
                        <div class="">
                            <div class="mb-4">
                                <img src="img/shop/product-4.webp" class="w-100" alt="Product" />
                            </div>

                            <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-1">CLAY</p>
                            <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-3">PHP 000.00</p>

                            <div class="">
                                <button class="btn btn-custom-4 cerebri-sans-pro-bold letter-spacing-5 font-size-lg-130 font-size-xl-140 w-100" style="padding-top:8px">ADD TO CART</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-color-6">
            <div class="container-fluid">
                <div class="row min-vh-100 align-items-stretch">
                    <div class="col-md-6 background-image-cover p-0" id="about-left-section" style="background-image:url('img/home/about.webp')"></div>

                    <div class="col-md-6" id="about-right-section">
                        <div class="h-100 d-flex align-items-center ps-md-4 ps-lg-5">
                            <div class="py-5">
                                <div class="ps-xl-4 ps-xxl-5 py-5">
                                    <p class="text-white cerebri-sans-pro-regular text-center text-md-start font-size-280 font-size-sm-300 font-size-md-350 font-size-lg-500 line-height-130 mb-lg-0">About</p>
                                    <p class="text-white cerebri-sans-pro-regular text-center text-md-start font-size-130 font-size-lg-150 letter-spacing-10">LOREM IPSUM DOLOR</p>
                                    <p class="text-white cerebri-sans-pro-medium text-center text-md-start font-size-90 font-size-lg-100 line-height-170 letter-spacing-10 mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure </p>

                                    <div class="text-center text-md-start">
                                        <button class="btn btn-custom-5 font-size-150 font-size-lg-200 cerebri-sans-pro-bold letter-spacing-10 line-height-110 px-3" style="padding-top:10px">READ MORE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <HomeSection></HomeSection>
        <Testimonials></Testimonials>
        <Action></Action>
    </div>

    <Footer></Footer>
    <Modals ref="modalsRef"></Modals>
</template>

<script>
import metaInfoMixin from '../../mixins/metaInfoMixin';
import Modals from './includes/Modals.vue';
import Navigation from "./includes/Navigation.vue";
import HomeSection from "./includes/HomeSection.vue";
import Testimonials from "./includes/Testimonials.vue";
import Action from "./includes/Action.vue";
import Footer from "./includes/Footer.vue";

export default {
    name: 'Home',
    components: { Modals, Navigation, HomeSection, Testimonials, Action, Footer },
    mixins: [metaInfoMixin],
    data() {
        return {

        }
    },
    mounted() {

    },
    methods: {

    }
};
</script>
