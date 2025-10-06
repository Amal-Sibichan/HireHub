<?php

namespace App\Mail;
use App\Models\Otp;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;


class forgetpassword extends Mailable
{
    use Queueable, SerializesModels;
    public $otp;
    /**
     * Create a new message instance.
     */
    public function __construct($otp)
    {
        $this->otp=$otp;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('admin@hirehub.com', 'HireHub'),
            subject: 'Reset password',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.password.passwordreset',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            // Return an empty array if you don't have actual attachments
            // The OTP is already passed to the email view through the content() method
        ];
    }
}
