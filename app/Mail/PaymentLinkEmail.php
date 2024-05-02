<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentLinkEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected $paymentLink;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($paymentLink)
    {
        $this->paymentLink = $paymentLink;
    }


    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function build()
    {
        return $this->view('emails.payment_link')
            ->with(['paymentLink' => $this->paymentLink]);
    }

   
}
