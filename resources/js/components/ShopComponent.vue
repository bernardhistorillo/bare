<template>
    <div>
        <div :class="{ 'd-block': productsAreFetched }" class="hide-by-default">
            <div class="pt-4">Cart Quantity: [[ cartQuantity ]]</div>

            <div class="py-3">
                <div class="row">
                    <div v-for="product in products" :key="product.id" class="col-md-3 p-3">
                        <div class="card border-radius-0">
                            <div class="card-body">
                                <p class="text-center font-size-120 mb-1">[[ product.name ]]</p>
                                <p class="text-center mb-2">
                                    <i class="fa-solid fa-peso-sign"></i> 100.00
                                </p>

                                <div class="">
                                    <button @click="updateCart($event, product.id)" class="btn btn-custom-1 w-100">[[ product.cartQuantity > 0 ? "Remove from Cart" : "Add to Cart" ]]</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div :class="{ 'd-none': productsAreFetched }">
            <p  class="text-center py-5">Loading</p>
        </div>
    </div>
</template>
