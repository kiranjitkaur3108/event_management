<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationMail;
use App\Models\User;


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
    // Validate inputs
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
    ]);

    // Create user in database
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Send registration email
    Mail::to($user->email)->send(new RegistrationMail($user));

    // Optionally log the user in:
    // Auth::login($user);

    return redirect('/home')->with('success', 'Registration successful! A confirmation email has been sent.');
}

}
