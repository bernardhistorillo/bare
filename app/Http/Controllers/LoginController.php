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
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if(!Auth::attempt($credentials)) {
            abort(422, 'The provided credentials do not match our records.');
        }

        return response()->json([
            'redirect' => route('admin.orders.index')
        ]);
    }

    public function changePassword(Request $request) {
        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|confirmed',
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            abort(422, 'The provided password does not match your current password.');
        }

        Auth::user()->password = Hash::make($request->password);
        Auth::user()->save();

        return response()->json();
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('admin.login.index');
    }
}
