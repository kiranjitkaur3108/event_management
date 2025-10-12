<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function show()
    {
        return view('feedback');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'message' => 'required|min:10',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        Feedback::create($request->only(['name', 'email', 'message']));

        return redirect()->route('feedback.thankyou')
            ->with('success', 'Thank you for your feedback!');
    }

    public function thankYou()
    {
        return view('thank-you');
    }
}
