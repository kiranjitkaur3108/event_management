<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show login form
    public function showLogin()
    {
        // Make sure this matches your file structure
        return view('login'); 
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $email = $request->email;
        $password = $request->password;

        // Fetch user by email
        $user = User::where('email', $email)->first();

        if (!$user) {
            return back()->with('error', 'Invalid email or password.');
        }

        // Verify password
        if (!Hash::check($password, $user->password)) {
            return back()->with('error', 'Invalid email or password.');
        }

        // Log the user in
        Auth::login($user);
        $request->session()->regenerate();

        // Redirect based on role
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard')->with('success', 'Admin login successful!');
        }

        return redirect()->route('user.bookings')->with('success', 'Login successful!');
    }

    // Show registration form
    public function showRegister()
    {
        return view('register'); // matches resources/views/register.blade.php
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Logged out successfully.');
    }
}
