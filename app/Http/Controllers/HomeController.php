<?php

namespace App\Http\Controllers;

use App\Mail\EmailReceived;
use App\Mail\EmailSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index() {
        return view('home.underConstruction');
    }

    public function try() {
        return 0;

        return Hash::make('Jnd7byUTpaaXdnjWwfWo');

        $data['name'] = 'Bernard';
        $data['email'] = 'bernardhistorillo1@gmail.com';
        $data['subject'] = 'Hair Skin Removal';
        $data['message'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';

//        Mail::to('bernardhistorillo1@gmail.com')->send(new EmailSent($data));

        return view('emails.emailSent', compact('data'));
    }
}
