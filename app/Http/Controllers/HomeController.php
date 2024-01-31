<?php

namespace App\Http\Controllers;

use App\Mail\EmailReceived;
use App\Mail\EmailSent;
use App\Mail\PromoCode;
use App\Models\EmailSubscription;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index() {
        $items = Product::orderBy('id')
            ->where('status', 1)
            ->get();

        $groupedProducts = Product::groupedProducts($items);

//        return $groupedProducts;
        return view('home.index', compact('groupedProducts'));
    }

    public function underConstruction() {
        return view('home.underConstruction');
    }

    public function try() {
        Auth::loginUsingId(1);
    }
}
