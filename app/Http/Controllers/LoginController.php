<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(Request $request) {
        return view('admin.login.index');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        if(!Auth::attempt($credentials)) {
            abort(422, 'The provided credentials do not match our records.');
        }

        return response()->json([
            'redirect' => route('admin.subscribers.index')
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('admin.login.index');
    }
}
