<div class="modal fade" ref="modalLogin" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius:0">
            <div class="modal-body p-4">
                <div class="position-relative">
                    <div class="position-absolute" style="top:0; right:0">
                        <button @click="closeModalLogin" type="button" class="btn-close font-size-90" aria-label="Close"></button>
                    </div>
                </div>

                <p>Please log in to continue.</p>

                <form ref="loginForm" @submit.prevent="login" class="mb-4">
                    <input type="hidden" name="url" value="" />

                    <input type="text" name="email" class="form-control mb-2" placeholder="Email Address" required />
                    <input type="password" name="password" class="form-control mb-3" placeholder="Password" required />

                    <button type="submit" ref="loginButton" class="btn btn-custom-1 font-weight-500 px-4 confirm">Log In</button>
                </form>

                <a href="#" @click="showModalRegister" class="link-color-1">Not registered yet? Sign up today!</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" ref="modalRegister" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius:0">
            <div class="modal-body p-4">
                <div class="position-relative">
                    <div class="position-absolute" style="top:0; right:0">
                        <button @click="closeModalRegister" type="button" class="btn-close font-size-90" aria-label="Close"></button>
                    </div>
                </div>

                <p>Please log in to continue.</p>

                <form ref="registerForm" @submit.prevent="login" class="mb-4">
                    <input type="text" name="name" class="form-control mb-2" placeholder="First Name" required />
                    <input type="text" name="email" class="form-control mb-2" placeholder="Email Address" required />
                    <input type="password" name="password" class="form-control mb-3" placeholder="Password" required />

                    <button type="submit" class="btn btn-custom-1 font-weight-500 px-4 confirm">Login</button>
                </form>

                <a href="#" @click="showModalLogin" class="link-color-1">Already registered? Sign in here.</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" ref="modalSuccess" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content" style="border-radius:0">
            <div class="modal-body">
                <div class="text-center mt-3 mb-4">
                    <i class="fas fa-circle-check font-size-400 text-color-1"></i>
                </div>
                <div class="text-center mb-1" v-html="modalSuccessMessage"></div>
            </div>
            <div class="modal-footer justify-content-center" style="border-color:#808080">
                <button @click="closeModalSuccess" type="button" class="btn btn-custom-1 font-weight-500 px-4">Okay</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" ref="modalError" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content" style="border-radius:20px">
            <div class="modal-body">
                <div class="text-center mt-3 mb-3">
                    <i class="fas fa-exclamation-circle font-size-400 text-color-1"></i>
                </div>
                <div class="text-center mb-1" v-html="modalErrorMessage"></div>
            </div>
            <div class="modal-footer justify-content-center" style="border-color:#808080">
                <button @click="closeModalError" type="button" class="btn btn-custom-1 px-4">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" ref="modalWarning" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content" style="border-radius:0">
            <div class="modal-header" style="z-index:1; border:0">
                <button @click="closeModalWarning" type="button" class="btn-close" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="margin-top:-45px">
                <div class="text-center mt-3 mb-4">
                    <i class="fas fa-circle-exclamation font-size-400 text-color-1"></i>
                </div>
                <div class="text-center font-weight-600 mb-1" v-html="modalWarningMessage"></div>
            </div>
            <div class="modal-footer justify-content-center" style="border-color:#808080">
                <button @click="closeModalWarning" type="button" class="btn btn-custom-2 font-weight-500 px-4">Cancel</button>
                <button type="button" class="btn btn-custom-1 font-weight-500 px-4 confirm">Confirm</button>
            </div>
        </div>
    </div>
</div>
