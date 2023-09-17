<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function __invoke() {
        $meta = ogDetails();

        return view('layouts.app', compact('meta'));
    }
}
