<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Contact;

class AdminReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    // Public properties will be available in the Blade view
    public $contact;
    public $messageBody;

    /**
     * Create a new message instance.
     *
     * @param Contact $contact
     * @param string $messageBody
     */
    public function __construct(Contact $contact, string $messageBody)
    {
        $this->contact = $contact;
        $this->messageBody = $messageBody;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Reply from Celebrations')
                    ->view('emails.admin_reply')
                    ->with([
                        'contact' => $this->contact,
                        'messageBody' => $this->messageBody,
                    ]);
    }
}
