<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The contact submission data.
     *
     * @var array
     */
    public $data;

    /**
     * Create a new message instance.
     *
     * @param array $data The validated form data (name, email, message).
     */
    public function __construct(array $data)
    {
        // Store the form data to be accessible in the other methods
        $this->data = $data;
    }

    /**
     * Get the message envelope (subject and recipient).
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // Use the user's email as the recipient
            to: $this->data['email'], 
            subject: 'Thank You for Contacting Us | Copy of Your Message',
        );
    }

    /**
     * Get the message content definition (view and data to pass).
     */
    public function content(): Content
    {
        return new Content(
            // Specify the Blade view to be used for the email body
            view: 'emails.contact-confirmation',
            // Pass the data needed by the view
            with: [
                'name' => $this->data['name'],
                'message_body' => $this->data['message'],
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
