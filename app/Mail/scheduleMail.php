<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
class scheduleMail extends Mailable
{
    use Queueable, SerializesModels;
    public $record;
    public $row;
    /**
     * Create a new message instance.
     */
    public function __construct($record,$row)
    {
        $this->record = $record;    
        $this->row = $row;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('admin@hirehub.com', 'HireHub'),
            subject: 'Schedule Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'email.organization.schedule',
            with: [
                'record' => $this->record,
                'row' => $this->row,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
