<div class="modal fade" id="modal-success" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content" style="border-radius:20px">
            <div class="modal-body">
                <div class="text-center mt-3 mb-4">
                    <i class="fas fa-circle-check font-size-400 text-color-1"></i>
                </div>
                <div class="text-center mb-1 message">Success!</div>
            </div>
            <div class="modal-footer justify-content-center" style="border-color:#808080">
                <button type="button" class="btn btn-custom-1 font-weight-500 px-4" data-bs-dismiss="modal">Okay</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-error" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content" style="border-radius:20px">
            <div class="modal-body">
                <div class="text-center mt-3 mb-3">
                    <i class="fas fa-exclamation-circle font-size-400 text-color-1"></i>
                </div>
                <div class="text-center mb-1 message">Success!</div>
            </div>
            <div class="modal-footer justify-content-center" style="border-color:#808080">
                <button type="button" class="btn btn-custom-1 px-4" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-warning" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content" style="border-radius:20px">
            <div class="modal-header" style="z-index:1; border:0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="margin-top:-45px">
                <div class="text-center mt-3 mb-4">
                    <i class="fas fa-circle-exclamation font-size-400 text-color-1"></i>
                </div>
                <div class="text-center font-weight-600 mb-1">Proceed?</div>
            </div>
            <div class="modal-footer justify-content-center" style="border-color:#808080">
                <button type="button" class="btn btn-custom-2 font-weight-500 px-4" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-custom-1 font-weight-500 px-4 confirm">Confirm</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-login-warning" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content" style="border-radius:0">
            <div class="modal-body">
                <div class="text-center mt-3 mb-4">
                    <i class="fas fa-right-to-bracket font-size-400 text-color-1"></i>
                </div>
                <div class="text-center mb-1 message">Please login to your account first.</div>
            </div>
            <div class="modal-footer justify-content-center" style="border-color:#808080">
                <a href="{{ route('login.index') }}" class="btn btn-custom-1 font-weight-500 px-4">Go to Login Page!</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-place-order-confirmation" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content" style="border-radius:0">
            <div class="modal-body">
                <div class="text-center mt-3 mb-4">
                    <i class="fa-regular fa-bag-shopping font-size-400 text-color-1"></i>
                </div>
                <div class="text-center mb-1 message">Ready to complete your purchase? Please confirm to place your order, or cancel to review your cart items.</div>
            </div>
            <div class="modal-footer justify-content-center" style="border-color:#808080">
                <button type="button" class="btn btn-custom-2 font-weight-500 px-4" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-custom-1 font-weight-500 px-4" id="place-order">Confirm</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-newsletter-subscription" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius:0">
            <div class="modal-body px-4 px-md-5 py-5">
                <div class="text-center">
                    <div class="position-absolute" style="top:24px; right:24px">
                        <i class="fa-solid fa-times font-size-120 cursor-pointer" data-bs-dismiss="modal"></i>
                    </div>

                    <div class="font-size-110 font-size-md-100 font-size-lg-90">
                        <p class="text-color-2 cerebri-sans-pro-medium font-size-110 font-size-md-120 font-size-lg-130 font-size-xl-140 font-size-xxl-150 mb-2">Get exclusive updates delivered directly to your inbox.</p>
                    </div>

                    <div class="font-size-90 font-size-md-80 font-size-lg-70">
                        <p class="text-color-2 cerebri-sans-pro-regular font-size-110 font-size-md-120 font-size-lg-130 font-size-xl-140 font-size-xxl-150 mb-4">Stay in the loop on our latest product launches, insider tips, special offers, and more.</p>
                    </div>
                </div>

                <form id="email-subscription-form" class="mb-4">
                    <input type="hidden" name="url" value="{{ route('contact.subscribeEmail') }}" />
                    <input type="hidden" name="type" value="general" />

                    <input type="text" name="name" class="form-control form-control-1 mb-3 py-2" style="height:45px" placeholder="Your first name" required />
                    <input type="email" name="email" class="form-control form-control-1 mb-3 py-2" style="height:45px" placeholder="Your email address" required />

                    <div class="">
                        <button type="submit" class="btn btn-custom-1 w-100 py-2" style="height:50px">KEEP ME POSTED!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-search" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:0">
            <div class="modal-body px-4 px-md-5 py-5">
                <div class="text-center">
                    <div class="position-absolute" style="top:24px; right:24px">
                        <i class="fa-solid fa-times font-size-120 cursor-pointer" data-bs-dismiss="modal"></i>
                    </div>

                    <div class="font-size-110 font-size-md-100 font-size-lg-90">
                        <p class="text-color-2 cerebri-sans-pro-medium font-size-110 font-size-md-120 font-size-lg-130 font-size-xl-140 font-size-xxl-150 mb-0">Explore & Discover</p>
                    </div>

                    <div class="font-size-90 font-size-md-80 font-size-lg-70">
                        <p class="text-color-2 cerebri-sans-pro-regular font-size-110 font-size-md-120 font-size-lg-130 font-size-xl-140 font-size-xxl-150 mb-4">Locate Your Next Favorite</p>
                    </div>
                </div>

                <form id="search-form">
                    <input type="hidden" name="url" value="{{ route('shop.search') }}" />

                    <div class="position-relative">
                        <input type="text" name="keyword" class="form-control form-control-1 mb-3 py-2" style="height:45px" placeholder="Enter keyword" required />

                        <div class="position-absolute tw-top-[11px] tw-right-[15px] d-none" id="search-spinner">
                            <i class="fa-solid fa-spin fa-spinner font-size-110"></i>
                        </div>
                    </div>
                </form>

                <div id="search-results-container"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-forgot-password" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius:0">
            <div class="modal-body px-4 px-md-5 py-5">
                <div class="text-center">
                    <div class="position-absolute" style="top:24px; right:24px">
                        <i class="fa-solid fa-times font-size-120 cursor-pointer" data-bs-dismiss="modal"></i>
                    </div>

                    <div class="font-size-110 font-size-md-100 font-size-lg-90">
                        <p class="text-color-2 cerebri-sans-pro-medium font-size-110 font-size-md-120 font-size-lg-130 font-size-xl-140 font-size-xxl-150 mb-2">Forgot Password</p>
                    </div>

                    <div class="font-size-90 font-size-md-80 font-size-lg-70">
                        <p class="text-color-2 cerebri-sans-pro-regular font-size-110 font-size-md-120 font-size-lg-130 font-size-xl-140 font-size-xxl-150 mb-4">Enter your email address below and we'll send you a link to reset your password.</p>
                    </div>
                </div>

                <form id="forgot-password-form" class="mb-4">
                    <input type="hidden" name="url" value="{{ route('password.request') }}" />

                    <input type="email" name="email" class="form-control form-control-1 mb-3 py-2" style="height:45px" placeholder="Your email address" required />

                    <div class="">
                        <button type="submit" class="btn btn-custom-1 w-100 py-2" style="height:50px">Send Password Reset Email</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
