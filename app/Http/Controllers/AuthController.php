<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show registration form
    public function showRegister()
    {
        return view('register');
    }

    // Handle registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        // Create new user (role always 'user' on registration)
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'user',
        ]);

        // Log the user in
        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registration successful!');
    }

    // Show login form
    public function showLogin()
    {
        return view('login'); // login form should include role selection
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:user,admin', // user must select role
        ]);

        $email = $request->email;
        $password = $request->password;
        $role = $request->role;

        $user = User::where('email', $email)->where('role', $role)->first();

        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();

            // Redirect based on role
            if ($role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Admin login successful!');
            } else {
                return redirect()->route('home')->with('success', 'Login successful!');
            }
        }

        return back()->with('error', 'Invalid credentials or role selected.');
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
