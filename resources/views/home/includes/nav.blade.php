<nav class="navbar fixed-top navbar-expand-lg bg-color-3 navbar-dark">
    <div class="container d-flex justify-content-between position-relative">
        <a class="navbar-brand py-2" href="{{ route('home.index') }}">
            <img src="{{ asset('img/home/bare-white.png') }}" class="tw-duration-500" alt="{{ config('app.name') }}">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto font-weight-300 font-size-100 justify-content-center">
                <li class="nav-item mt-md-2 mt-lg-0">
                    <a class="nav-link font-size-lg-120 font-size-xl-140 letter-spacing-5 text-white cerebri-sans-pro-regular px-md-3 px-xl-4" aria-current="page" href="{{ route('home.index') }}">HOME</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link font-size-lg-120 font-size-xl-140 letter-spacing-5 text-white cerebri-sans-pro-regular px-md-3 px-xl-4" href="{{ route('shop.index') }}">SHOP</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link font-size-lg-120 font-size-xl-140 letter-spacing-5 text-white cerebri-sans-pro-regular px-md-3 px-xl-4" href="{{ route('about.index') }}">ABOUT</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link font-size-lg-120 font-size-xl-140 letter-spacing-5 text-white cerebri-sans-pro-regular px-md-3 px-xl-4" href="{{ route('contact.index') }}">CONTACT</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link font-size-lg-120 font-size-xl-140 letter-spacing-5 text-white cerebri-sans-pro-regular px-md-3 px-xl-4" href="{{ route('blog.index') }}">BLOG</a>
                </li>
            </ul>
        </div>

        <div class="ms-3" id="nav-buttons" style="width:145.55px">
            <div class="d-flex justify-content-end">
                @if(Auth::check())
                <div class="dropdown">
                    <button class="dropdown-toggle dropdown-toggle-user" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-light fa-circle-user text-white font-size-140 font-size-sm-180"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item cerebri-sans-pro-regular" href="{{ route('orders.index') }}">
                                <i class="fa-regular fa-bag-shopping me-2"></i>
                                My Purchases
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item cerebri-sans-pro-regular" href="{{ route('logout.index') }}">
                                <i class="fa-regular fa-right-from-bracket me-2"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
                @else
                <div class="">
                    <a href="{{ route('login.index') }}" class="text-white">
                        <i class="fa-light fa-right-to-bracket text-white font-size-140 font-size-sm-180"></i>
                    </a>
                </div>
                @endif

                <div class="ps-4 ps-sm-5">
                    <a href="{{ route('cart.index') }}" class="text-white position-relative">
                        @php $cartQuantity = cartQuantity(); @endphp
                        <div class="position-absolute cerebri-sans-pro-regular tw-pt-[2px] d-flex justify-content-center align-items-center bg-color-10 tw-min-w-[20px] tw-min-h-[20px] tw-top-[-20px] tw-right-[-15px] font-size-90 px-2 tw-rounded-[10px] {{ $cartQuantity == 0 ? 'd-none' : '' }}" id="cart-quantity-badge">{{ $cartQuantity }}</div>

                        <i class="fa-light fa-cart-shopping text-white font-size-140 font-size-sm-180"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
