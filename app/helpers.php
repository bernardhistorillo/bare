<?php


use Illuminate\Support\Facades\Route;

if(!function_exists('ogDetails')) {
    function ogDetails() {
        if(Route::currentRouteName() == 'home.index') {
            $data['description'] = 'Stay Tuned, We\'re Crafting Something Special!';
            $data['image'] = asset('img/home/og.jpg');
        } else {
            $data['description'] = 'We are BARE.';
            $data['image'] = asset('img/home/og.jpg');
        }

        return $data;
    }
}
