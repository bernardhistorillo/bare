<template>
    <div class="position-relative background-image-cover" style="background-image:url('img/home/woman.webp')">
        <div class="position-absolute bg-color-1 w-100 h-100" style="top:0; left:0; opacity:0.5; z-index:1"></div>

        <div class="container position-relative" style="top:0; left:0; opacity:0.9; z-index:2">
            <div class="d-flex justify-content-center align-items-center min-vh-100 py-5">
                <div class="w-100">
                    <div class="text-center mb-4 pb-2">
                        <img src="img/home/bare-white.png" width="150" alt="{{ config('app.name') }}" />
                    </div>

                    <h1 class="text-white helvetica-neue-light text-center line-height-140 line-height-sm-130 font-size-220 font-size-sm-220 font-size-md-230 font-size-lg-260 font-size-xl-320 font-size-xxl-350 mb-5">Sign Up & Get 20% Discount<br class="d-none d-sm-block d-lg-none"/> On Our Launch!</h1>

                    <div class="row justify-content-center">
                        <div class="col-sm-10 col-md-9 col-lg-7 col-xl-6 col-xxl-5">

                            <form ref="subscribeToNewsletterForm" @submit.prevent="subscribeToNewsletter" class="mb-4">
                                <input type="hidden" name="type" value="general" />

                                <input v-model="subscribeToNewsletterName" type="text" name="name" class="form-control form-control-1 mb-3 py-2" style="height:45px" placeholder="Your first name" />
                                <input v-model="subscribeToNewsletterEmail" type="email" name="email" class="form-control form-control-1 mb-3 py-2" style="height:45px" placeholder="Your email address" />

                                <div class="mb-5 pb-3">
                                    <button type="submit" class="btn btn-custom-1 w-100 py-2" :disabled="isSubscribeToNewsletterButtonDisabled" style="height:50px">{{ subscribeToNewsletterButtonText }}</button>
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

    <modals ref="modalsRef"></modals>
</template>

<script>
import metaInfoMixin from '../../mixins/metaInfoMixin';
import Modals from '../home/includes/Modals.vue';

export default {
    components: { Modals },
    mixins: [metaInfoMixin],
    data() {
        return {
            routeName: null,
            appUrl: null,
            pageIsLoaded: false,
            isScrolled: false,
            source: null,

            subscribeToNewsletterName: '',
            subscribeToNewsletterEmail: '',
            isSubscribeToNewsletterButtonDisabled: false,
            subscribeToNewsletterButtonText: 'KEEP ME POSTED!',
        }
    },
    mounted() {
        this.pageOnload();
    },
    methods: {
        pageOnload() {
            window.addEventListener("scroll", this.handleScroll);
        },

        handleScroll() {
            this.isScrolled = window.scrollY > 0;
        },

        subscribeToNewsletter() {
            this.subscribeToNewsletterButtonText = "SUBMITTING";
            this.isSubscribeToNewsletterButtonDisabled = true;

            let data = new FormData(this.$refs.subscribeToNewsletterForm);
            let url = 'contact/subscribeEmail';

            axios.post(url, data)
                .then((response) => {
                    this.subscribeToNewsletterName = "";
                    this.subscribeToNewsletterEmail = "";

                    this.$refs.modalsRef.modalSuccessMessage = "Thanks for subscribing!<br>We’ll keep you posted.";
                    this.$refs.modalsRef.modalSuccess.show();
                }).catch((error) => {
                    this.$refs.modalsRef.showRequestError(error);
                }).then(() => {
                    this.subscribeToNewsletterButtonText = "KEEP ME POSTED!";
                    this.isSubscribeToNewsletterButtonDisabled = false;
                });
        },
    }
};
</script>
