<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminAccountController extends Controller
{
    public function index(Request $request) {
        $users = User::latest()
            ->get();

        return view('admin.accounts.index', compact('users'));
    }
}
