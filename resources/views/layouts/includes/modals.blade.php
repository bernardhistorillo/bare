<div class="modal fade" id="modal-login" ref="modalLogin" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius:0">
            <div class="modal-body p-4">
                <div class="position-relative">
                    <div class="position-absolute" style="top:0; right:0">
                        <button type="button" class="btn-close font-size-90" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>

                <p>Please log in to continue.</p>

                <form ref="loginForm" @submit.prevent="login" class="mb-4">
                    <input type="hidden" name="url" value="{{ route('login.submit') }}" />

                    <input type="text" name="email" class="form-control mb-2" placeholder="Email Address" required />
                    <input type="password" name="password" class="form-control mb-3" placeholder="Password" required />

                    <button type="submit" ref="loginButton" class="btn btn-custom-1 font-weight-500 px-4 confirm">Log In</button>
                </form>

                <a href="#" @click="showRegisterModal" class="link-color-1">Not registered yet? Sign up today!</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-register" ref="modalRegister" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius:0">
            <div class="modal-body p-4">
                <div class="position-relative">
                    <div class="position-absolute" style="top:0; right:0">
                        <button type="button" class="btn-close font-size-90" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>

                <p>Please log in to continue.</p>

                <form ref="registerForm" @submit.prevent="login" class="mb-4">
                    <input type="text" name="name" class="form-control mb-2" placeholder="First Name" required />
                    <input type="text" name="email" class="form-control mb-2" placeholder="Email Address" required />
                    <input type="password" name="password" class="form-control mb-3" placeholder="Password" required />

                    <button type="submit" class="btn btn-custom-1 font-weight-500 px-4 confirm">Login</button>
                </form>

                <a href="#" @click="showLoginModal" class="link-color-1">Already registered? Sign in here.</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-success" ref="modalSuccess" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content" style="border-radius:0">
            <div class="modal-body">
                <div class="text-center mt-3 mb-4">
                    <i class="fas fa-circle-check font-size-400 text-color-1"></i>
                </div>
                <div class="text-center mb-1">[[ modalSuccessMessage ]]</div>
            </div>
            <div class="modal-footer justify-content-center" style="border-color:#808080">
                <button type="button" class="btn btn-custom-1 font-weight-500 px-4" data-bs-dismiss="modal">Okay</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-error" ref="modalError" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content" style="border-radius:20px">
            <div class="modal-body">
                <div class="text-center mt-3 mb-3">
                    <i class="fas fa-exclamation-circle font-size-400 text-color-1"></i>
                </div>
                <div class="text-center mb-1">[[ modalErrorMessage ]]</div>
            </div>
            <div class="modal-footer justify-content-center" style="border-color:#808080">
                <button type="button" class="btn btn-custom-1 px-4" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-warning" ref="modalWarning" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content" style="border-radius:0">
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
