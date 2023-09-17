@extends('layouts.app')

@section('title', 'Shop')

@section('content')
<div class="container">
    <div :class="{ 'd-block': pageIsLoaded }" class="hide-by-default">
        <div class="row align-items-center pt-4">
            <div class="col-md-3 p-3">
                <div class="">Cart Quantity: [[ cartQuantity ]]</div>
            </div>

            <div class="col-md-3 p-3">
                <button @click="showModalLogin" class="btn btn-custom-1 w-100">Log In</button>
            </div>
        </div>

        <hr>

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

    <div :class="{ 'd-none': pageIsLoaded }">
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <div class="">
                <p  class="text-center mb-0 py-5">Loading</p>
            </div>
        </div>
    </div>
</div>

<input type="hidden" value="{{ route('shop.getProducts') }}" ref="getProductsRoute" />
<input type="hidden" value="{{ route('shop.updateCart') }}" ref="updateCartRoute" />
@endsection
