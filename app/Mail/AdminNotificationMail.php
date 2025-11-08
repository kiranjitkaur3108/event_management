<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct(array $data)
    {
        // Store the form data submitted by the user
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            // Set the subject to clearly identify it as a new contact
            subject: 'NEW Contact Form Submission: ' . $this->data['name'],
        );
    }

    public function content(): Content
    {
        return new Content(
            // We can reuse the same view as the confirmation email, or create a new one
            view: 'emails.admin-notification',
            with: $this->data, // Pass all data to the view
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
