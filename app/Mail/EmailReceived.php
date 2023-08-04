<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class EmailReceived extends Mailable
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
        $data['subject'] = $this->message['subject'];
        $data['message'] = $this->message['message'];

        return $this->view('emails.emailReceived', compact('data'))
            ->text('emails.emailReceivedText', compact('data'))
            ->subject('New Support Message - ' . $data['subject']);
    }
}
