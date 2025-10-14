<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function submit(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Save feedback with rating
        Feedback::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
            'rating' => $request->input('rating'),
        ]);

        // Redirect to thank-you page
        return redirect()->route('feedback.thankyou');
    }

    public function show()
    {
        return view('feedback');
    }

    public function thankYou()
    {
        return view('thank-you');
    }
}
