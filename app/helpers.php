<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

if(!function_exists('ogDetails')) {
    function ogDetails() {
        if(request()->path() == '/') {
            $data['title'] = 'Sign Up Now!';
            $data['description'] = 'Sign Up & Get 20% Discount On Our Launch!';
            $data['image'] = asset('img/home/og-4.jpg');
        } else {
            $data['description'] = 'We are BARE.';
            $data['image'] = asset('img/home/og-2.jpg');
        }

        return $data;
    }
}

if(!function_exists('cartQuantity')) {
    function cartQuantity() {
        $cartQuantity = 0;

        if(Auth::check()) {
            $cartQuantity = Auth::user()->cartQuantity();
        }

        return $cartQuantity;
    }
}
