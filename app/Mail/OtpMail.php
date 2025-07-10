<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $otp;
    public string $userName;

    public function __construct(string $otp, string $userName)
    {
        $this->otp = $otp;
        $this->userName = $userName;
    }

    /* < Laravel 10 style > */
    public function envelope(): Envelope
    {
        return new Envelope(subject: 'Kode OTP RaiseMeUp');
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.otp',          // file Blade email
            with: [
                'otp'       => $this->otp,
                'userName'  => $this->userName,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
