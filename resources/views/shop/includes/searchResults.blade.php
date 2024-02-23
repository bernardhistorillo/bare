<p class="text-color-2 cerebri-sans-pro-regular text-center font-size-90 mb-3">Search results for <span class="cerebri-sans-pro-bold">'{{ $keyword }}'</span>.</p>

<div class="row mt-5 font-size-50 overflow-x-hidden overflow-y-auto" style="max-height: calc(100vh - 370px)">
    @foreach($groupedProducts as $i => $groupedProduct)
    <div class="col-6 col-lg-4 px-1">
        <div class="">
            <a href="{{ route('shop.product', [$groupedProduct['category'], strtolower($groupedProduct['name'])]) }}" class="text-decoration-none">
                <div>
                    <div class="position-relative hover-photo mb-4">
                        <img src="{{ $groupedProduct['photo'] }}" class="w-100" alt="Product" style="opacity:1; transition:0.5s" />

                        @foreach(json_decode($groupedProduct['sub_photos'],true) as $subPhoto)
                        <div class="position-absolute" style="top:0; left:0">
                            <img src="{{ $subPhoto }}" style="opacity:0; transition:0.5s" alt="Product" />
                        </div>
                        @endforeach
                    </div>

                    <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-1">{{ strtoupper($groupedProduct['name']) }}</p>
                    <p class="text-color-2 cerebri-sans-pro-bold text-center font-size-140 letter-spacing-5 mb-3">PHP {{ number_format($groupedProduct['price'],2) }}</p>
                </div>
            </a>

            <div class="mb-4">
                <form class="update-cart-form" data-index="{{ $i }}">
                    <input type="hidden" name="name" value="{{ $groupedProduct['name'] }}" />
                    <input type="hidden" name="category" value="{{ $groupedProduct['category'] }}" />
                    <input type="hidden" name="variations" value="{{ json_encode($groupedProduct['variations']) }}" />

                    <button type="submit" class="btn btn-custom-4 cerebri-sans-pro-bold letter-spacing-5 font-size-120 font-size-lg-130 font-size-xl-140 tw-pt-[0.8em] lg:tw-pt-[0.8em] w-100">ADD TO CART</button>
                </form>
            </div>

            <p class="cerebri-sans-pro-regular text-center font-size-130 mb-2">Or shop on:</p>
            <div class="row justify-content-center align-items-center">
                <div class="col-4">
                    <a href="{{ $groupedProduct['lazada_link'] }}" target="_blank" rel="noreferrer">
                        <img src="{{ asset('img/home/lazada.webp') }}" class="w-100 tw-rounded-[30%]" alt="{{ config('app.name') }}" />
                    </a>
                </div>

                <div class="col-4">
                    <a href="{{ $groupedProduct['shopee_link'] }}" target="_blank" rel="noreferrer">
                        <img src="{{ asset('img/home/shopee.webp') }}" class="w-100 tw-rounded-[30%]" alt="{{ config('app.name') }}" />
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
