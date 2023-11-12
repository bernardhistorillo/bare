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
