<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function createPayment()
    {
        $data = [
            'data' => [
                'attributes' => [
                    'line_items' => [
                        [
                            'currency'      => 'PHP',
                            'amount'        => 10000,
                            'description'   => 'text',
                            'name'          => 'Test Product',
                            'quantity'      => 1,
                        ]
                    ],
                    'payment_method_types' => [
                        'card',
                    ],
                    'success_url' => 'http://localhost:8000/success',
                    'cancel_url' => 'http://localhost:8000/success',
                    'description' => 'text'
                ],
            ]
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'accept' => 'application/json',
            'Authorization' => 'Basic ' . 'sk_live_V7xj8QCfhXY1Pxx3xpAbWY87',
        ])
            ->post('https://api.paymongo.com/v1/checkout_sessions', $data);

        dd($response);

        Session::put('session_id', $response->json('data.id'));

        return redirect()->to($response->data->attributes->checkout_url);
    }

    public function success()
    {
        $sessionId = \Session::get('session_id');


        $response = Curl::to('https://api.paymongo.com/v1/checkout_sessions/'.$sessionId)
            ->withHeader('accept: application/json')
            ->withHeader('Authorization: Basic '.env('AUTH_PAY'))
            ->asJson()
            ->get();

        dd($response);

    }



    public function linkPay()
    {
        $data['data']['attributes']['amount'] = 150050;
        $data['data']['attributes']['description'] = 'Test transaction.';

        $response = Curl::to('https://api.paymongo.com/v1/links')
            ->withHeader('Content-Type: application/json')
            ->withHeader('accept: application/json')
            ->withHeader('Authorization: Basic '.env('AUTH_PAY'))
            ->withData($data)
            ->asJson()
            ->post();

        dd($response);
    }

    public function linkStatus($linkid)
    {
        $response = Curl::to('https://api.paymongo.com/v1/links/'.$linkid)
            ->withHeader('accept: application/json')
            ->withHeader('Authorization: Basic '.env('AUTH_PAY'))
            ->asJson()
            ->get();

        dd($response);
    }


    public function refund()
    {

        $data['data']['attributes']['amount']       = 5000;
        $data['data']['attributes']['payment_id']   = 'pay_sA83KrtmJUdue8prEHD6rZrY';
        $data['data']['attributes']['reason']       = 'duplicate';

        $response = Curl::to('https://api.paymongo.com/refunds')
            ->withHeader('Content-Type: application/json')
            ->withHeader('accept: application/json')
            ->withHeader('Authorization: Basic '.env('AUTH_PAY'))
            ->withData($data)
            ->asJson()
            ->post();

        dd($response);
    }

    public function refundStatus($id)
    {
        $response = Curl::to('https://api.paymongo.com/refunds/'.$id)
            ->withHeader('accept: application/json')
            ->withHeader('Authorization: Basic '.env('AUTH_PAY'))
            ->asJson()
            ->get();

        dd($response);
    }
}
