<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationMail;

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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $profileImageName = null;

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $profileImageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('profile_images', $profileImageName, 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // important!
            'role' => 'user',
            'profile_image' => $profileImageName,
        ]);

        // Send welcome/registration email
        Mail::to($user->email)->send(new RegistrationMail($user));

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registration successful! A confirmation email has been sent.');
    }

    // Show login form
    public function showLogin()
    {
        return view('login');
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


    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}
