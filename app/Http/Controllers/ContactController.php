<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactConfirmationMail;
use App\Mail\AdminNotificationMail;
use App\Mail\AdminReplyMail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Show contact form
     */
    public function show(): View|Factory
    {
        return view('contact');
    }

    /**
     * Handle contact form submission
     */
    public function submit(Request $request): RedirectResponse
    {
        // 1️⃣ Validate input
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:5',
        ]);

        // 2️⃣ Save to database
        Contact::create($data);

        // 3️⃣ Send emails using Mail
        try {
            // Confirmation to user
            Mail::to($data['email'])->send(new ContactConfirmationMail($data));

            // Notification to admin
            Mail::to('no-reply@celebrations.com')->send(new AdminNotificationMail($data));
        } catch (\Exception $e) {
            Log::error('Contact form email failed: ' . $e->getMessage());
        }

        // 4️⃣ Redirect back with success message
        return redirect()->route('contact.show')
            ->with('success', 'Thanks — your message has been sent, and a confirmation copy has been emailed to you!');
    }

    /**
     * Admin reply to a contact message
     */
    public function reply(Request $request, Contact $contact): RedirectResponse
    {
        // Validate the reply message
        $request->validate([
            'reply_message' => 'required|string|min:5',
        ]);

        $replyMessage = $request->input('reply_message');

        try {
            // Send reply to the contact's email
            Mail::to($contact->email)->send(new AdminReplyMail($contact, $replyMessage));
        } catch (\Exception $e) {
            Log::error('Admin reply email failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to send reply.');
        }

        return back()->with('success', 'Reply sent successfully to ' . $contact->name);
    }
}
