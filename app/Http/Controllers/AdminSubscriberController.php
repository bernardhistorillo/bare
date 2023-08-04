<?php

namespace App\Http\Controllers;

use App\Models\EmailSubscription;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminSubscriberController extends Controller
{
    public function index(Request $request) {
        $subscribers = EmailSubscription::latest()
            ->get();

        return view('admin.subscribers.index', compact('subscribers'));
    }
}
