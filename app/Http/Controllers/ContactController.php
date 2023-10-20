<?php

namespace App\Http\Controllers;

use App\Mail\EmailReceived;
use App\Mail\EmailSent;
use App\Models\EmailSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index() {
        return view('contact.index');
    }

    public function subscribeEmail(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        $emailSubscription = EmailSubscription::where('email', $request->email)
            ->first();

        if($emailSubscription) {
            $data['name'] = $request->name;

            $emailSubscription->data = json_encode($data);
            $emailSubscription->update();
        } else {
            $emailSubscription = new EmailSubscription();
            $emailSubscription->email = $request->email;

            $data['name'] = $request->name;
            $emailSubscription->data = json_encode($data);

            $emailSubscription->save();
        }

        return response()->json();
    }

    public function sendMessage(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $email = (config('app.env') == 'production') ? 'help@wearebare.co' : 'bernardhistorillo1@gmail.com';

//        Mail::to($email)->queue(new EmailReceived($request->only(['name', 'email', 'message'])));
        Mail::to($request->email)->queue(new EmailReceived($request->only(['name', 'email', 'message'])));
        Mail::to($request->email)->queue(new EmailSent($request->only('name', 'email', 'message')));

        return response()->json();
    }
}
