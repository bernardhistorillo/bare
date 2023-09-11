<nav :class="{ 'scrolled': isScrolled }" class="navbar fixed-top navbar-expand-lg bg-color-3 navbar-dark">
    <div class="container d-flex justify-content-between position-relative">
        <a class="navbar-brand py-2" href="{{ route('home.index') }}">
            <img src="{{ asset('img/home/bare-white.png') }}" alt="{{ config('app.name') }}">
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
                    <a class="nav-link font-size-lg-120 font-size-xl-140 letter-spacing-5 text-white cerebri-sans-pro-regular px-md-3 px-xl-4" href="#">ABOUT</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link font-size-lg-120 font-size-xl-140 letter-spacing-5 text-white cerebri-sans-pro-regular px-md-3 px-xl-4" href="#">CONTACT</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link font-size-lg-120 font-size-xl-140 letter-spacing-5 text-white cerebri-sans-pro-regular px-md-3 px-xl-4" href="#">BLOG</a>
                </li>
            </ul>
        </div>

        <div class="ms-3" id="nav-buttons" style="width:145.55px">
            <div class="d-flex justify-content-end">
                <div class="">
                    <a href="#" class="text-white">
                        <i class="fa-light fa-circle-user text-white font-size-140 font-size-sm-180"></i>
                    </a>
                </div>

                <div class="ps-4 ps-sm-5">
                    <a href="#" class="text-white">
                        <i class="fa-light fa-cart-shopping text-white font-size-140 font-size-sm-180"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
