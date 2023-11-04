<div class="modal fade" id="modal-variation" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content" style="border-radius:0">
            <form id="add-to-cart-form">
                <input type="hidden" name="url" value="{{ route('shop.addToCart') }}" />
                <input type="hidden" name="name" />
                <input type="hidden" name="category" />

                <div class="modal-body position-relative pb-1">
                    <div class="position-absolute tw-top-[17px] tw-right-[18px]" data-bs-dismiss="modal">
                        <i class="fa-light fa-times text-black font-size-120 cursor-pointer"></i>
                    </div>

                    <div class="text-center text-color-1 mb-2 font-size-100 message">Select Your Variation</div>

                    <div id="variation-container"></div>

                    <div class="tw-px-[14px]">
                        <div class="text-center text-color-1 mb-2 font-size-100 message">Enter Quantity</div>
                        <input type="number" name="quantity" class="form-control form-control-1 cerebri-sans-pro-regular text-center text-start mb-3 py-2 px-3" style="height:45px; border:3px solid #946C51; color:#946C51!important" placeholder="Quantity" value="1" min="1" required />
                    </div>
                </div>
                <div class="modal-footer justify-content-center tw-px-[27px]" style="border-color:#808080">
                    <button type="submit" class="btn btn-custom-1 font-weight-500 font-size-90 px-4 tw-pt-[7px] pb-2 w-100" data-bs-dismiss="modal">Add to Cart</button>
                </div>
            </form>
        </div>
    </div>
</div>
