<?php


use Illuminate\Support\Facades\Route;

if(!function_exists('ogDetails')) {
    function ogDetails() {
        if(Route::currentRouteName() == 'home.index') {
            $data['description'] = 'Sign Up & Get 20% Discount On Our Launch!';
            $data['image'] = asset('img/home/og-3.jpg');
        } else {
            $data['description'] = 'We are BARE.';
            $data['image'] = asset('img/home/og-2.jpg');
        }

        return $data;
    }
}
