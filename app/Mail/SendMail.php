<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $quotationMailData;

    /**
     * Create a new message instance.
     */
    public function __construct($quotationMailData)
    {
        $this->quotationMailData = $quotationMailData;
    }

    public function build()
    {
        return $this->subject('Request a Service Legalworks')
            ->view('emails.quotationMail');
    }
}
