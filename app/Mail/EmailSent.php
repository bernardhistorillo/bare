<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class EmailSent extends Mailable
{
    use Queueable, SerializesModels;

    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    public function build()
    {
        $data['name'] = $this->message['name'];
        $data['email'] = $this->message['email'];
        $data['message'] = $this->message['message'];

        return $this->view('emails.emailSent', compact('data'))
            ->text('emails.emailSentText', compact('data'))
            ->subject('Your Message Has Been Sent');
    }
}
