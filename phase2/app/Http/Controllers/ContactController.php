<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        // (Optional) Handle contact form data — for now, static confirmation
        $name = $request->input('name');
        return back()->with('success', "Thank you, $name! Your message has been sent.");
    }
}
