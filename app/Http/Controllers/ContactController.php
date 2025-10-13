<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Show contact form
    /**
     * @return Factory|View
     */
    public function show()
    {
        return view('contact');
    }

    // Handle form submission
    public function submit(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Validate input
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:5',
        ]);

        return redirect()->route('contact.show')->with('success', 'Thanks — your message has been sent!');
    }
}

