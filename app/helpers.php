<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

if(!function_exists('ogDetails')) {
    function ogDetails() {
        if(request()->path() == '/') {
            $data['title'] = 'Sign Up Now!';
            $data['description'] = 'Sign Up & Get 10% Discount On Our Launch!';
            $data['image'] = asset('img/home/og-4.jpg');
        } else {
            $data['description'] = 'We are BARE.';
            $data['image'] = asset('img/home/og-2.jpg');
        }

        return $data;
    }
}

if(!function_exists('cartQuantity')) {
    function cartQuantity() {
        $cartQuantity = 0;

        if(Auth::check()) {
            $cartQuantity = Auth::user()->cartQuantity();
        }

        return $cartQuantity;
    }
}

if(!function_exists('generateCode')) {
    function generateCode($length) {
        $characters = "ABCDEFGHJKLMNPQRSTUVWXYZ23456789";
        $charactersLength = strlen($characters);
        $generatedCode = "";
        for ($j = 0; $j < $length; $j++) {
            $generatedCode = $generatedCode . $characters[rand(0, $charactersLength - 1)];
        }

        return $generatedCode;
    }
}

if(!function_exists('orderStatuses')) {
    function orderStatuses() {
        return [
            [
                'status' => 'Pending',
                'description' => 'Your order has been placed successfully. We are awaiting payment confirmation before proceeding.',
            ], [
                'status' => 'Processing',
                'description' => 'Your order is currently being processed. We are preparing your items for shipment.',
            ], [
                'status' => 'Payment Received',
                'description' => 'We have received your payment and are moving forward with processing your order.',
            ], [
                'status' => 'Backordered',
                'description' => 'One or more items in your order are currently out of stock. We will ship these items as soon as they become available.',
            ], [
                'status' => 'Ready to Ship',
                'description' => 'Your items have been packed and are ready to be shipped.',
            ], [
                'status' => 'Shipped',
                'description' => 'Your order is on its way. You can track the shipping progress with the provided tracking number.',
            ], [
                'status' => 'Out for Delivery',
                'description' => 'Your order is currently with the delivery carrier and will be delivered to your address shortly.',
            ], [
                'status' => 'Delivered',
                'description' => 'Your order has been delivered. Please check your items to ensure everything is as expected.',
            ], [
                'status' => 'Completed',
                'description' => 'Your order has been delivered and completed to your satisfaction. Thank you for shopping with us!',
            ], [
                'status' => 'Cancelled',
                'description' => 'Your order has been cancelled. If you have any questions, please contact customer service.',
            ], [
                'status' => 'Refunded',
                'description' => 'We have processed a refund for your order. The funds should appear in your account according to your bank\'s processing times.',
            ], [
                'status' => 'Failed',
                'description' => 'Unfortunately, there was an issue processing your order. Please contact customer service for further assistance.',
            ], [
                'status' => 'On Hold',
                'description' => 'Your order has been placed on hold. We will contact you for any additional information required to proceed.',
            ], [
                'status' => 'Returned',
                'description' => 'We have received your returned items and are processing them accordingly.',
            ]
        ];
    }
}

if(!function_exists('orderStatusDescription')) {
    function orderStatusDescription($status) {
        foreach(orderStatuses() as $orderStatus) {
            if($status == $orderStatus['status']) {
                return $orderStatus['description'];
            }
        }
    }
}
