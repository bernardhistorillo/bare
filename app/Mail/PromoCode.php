<?php

namespace App\Mail;

use App\Models\EmailSubscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class PromoCode extends Mailable
{
    use Queueable, SerializesModels;

    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EmailSubscription $emailSubscription)
    {
        $this->emailSubscription = $emailSubscription;
    }

    public function build()
    {
        $data['name'] = json_decode($this->emailSubscription['data'],true)['name'];
        $data['email'] = $this->emailSubscription['email'];

        return $this->view('emails.promoCode', compact('data'))
            ->text('emails.promoCodeText', compact('data'))
            ->subject('Welcome to Our Family! Enjoy Your Exclusive 10% Launch Discount 🚀');
    }
}
