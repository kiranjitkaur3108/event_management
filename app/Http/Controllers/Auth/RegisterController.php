<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // Show registration form
    public function showRegistrationForm()
    {
        return view('register');
    }

    // Handle registration form submission
    public function register(Request $request)
    {
        // Basic validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Storing user info in session (temporary)
        session([
            'role' => 'user',
            'user' => [
                'name' => $request->name,
                'email' => $request->email,
            ],
        ]);

        // Redirect to home with success message
        return redirect('/home')->with('success', 'Registration successful. Welcome!');
    }
}
