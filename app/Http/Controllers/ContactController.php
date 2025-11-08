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
use Illuminate\Support\Facades\Log;


class ContactController extends Controller
{
    // Show contact form
    public function show(): View|Factory
    {
        return view('contact');
    }

    // Handle form submission
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

        // 3️⃣ Send emails using the Gmail mailer
        try {
            Mail::to($data['email'])->send(new ContactConfirmationMail($data));
            Mail::to('no-reply@celebrations.com')->send(new AdminNotificationMail($data));
        } catch (\Exception $e) {
            Log::error('Contact form email failed: ' . $e->getMessage());
        }


        // 4️⃣ Redirect back with success message
        return redirect()->route('contact.show')
            ->with('success', 'Thanks — your message has been sent, and a confirmation copy has been emailed to you!');
    }
}
