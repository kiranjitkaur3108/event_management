<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

/*
|--------------------------------------------------------------------------
| Role Selection Page
|--------------------------------------------------------------------------
| Shows buttons to choose Login as Admin or Login as User.
*/
Route::get('/role-select', function () {
    return view('role-select');
})->name('role.select');

/*
|--------------------------------------------------------------------------
| Login Page
|--------------------------------------------------------------------------
| Displays login form with a pre-selected role (admin or user)
*/
Route::get('/login', function (Request $request) {
    $role = $request->query('role', 'user'); // default role is 'user'
    return view('login', compact('role'));
})->name('login');

/*
|--------------------------------------------------------------------------
| Handle Login Form Submission
|--------------------------------------------------------------------------
*/
Route::post('/login', function (Request $request) {
    $email = $request->input('email');
    $password = $request->input('password');
      $user = User::where('email', $email)->first();

 if (!$user || !Hash::check($password, $user->password)) {
        return back()->with('error', 'Invalid credentials.');
    }

    // Check if admin
    if ($user->is_admin == 1) {
        session(['role' => 'admin', 'user_id' => $user->id]);
        return redirect('/admin/dashboard');
    } else {
        session(['role' => 'user', 'user_id' => $user->id]);
        return redirect('/home');
    }
})->name('login.submit');

/*
|--------------------------------------------------------------------------
| Registration Routes
|--------------------------------------------------------------------------
*/
Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
    ]);

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->is_admin = 0;
    $user->save();

    session(['role' => 'user', 'user_id' => $user->id]);
    return redirect('/home')->with('success', 'Registration successful! Welcome.');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/dashboard', function () {
    if (session('role') !== 'admin') {
        return redirect('/login')->with('error', 'Please login as admin.');
    }

    // Sample static data
    $userCount = 12;
    $postCount = 34;
    $recentLogins = [
        ['name' => 'Sara K.', 'when' => '2025-10-01'],
        ['name' => 'Ali P.',  'when' => '2025-10-02'],
        ['name' => 'Maya R.', 'when' => '2025-10-05'],
    ];

    return view('admin.dashboard', compact('userCount', 'postCount', 'recentLogins'));
})->name('admin.dashboard');

Route::get('/admin/users', function () {
    if (session('role') !== 'admin') {
        return redirect('/login')->with('error', 'Unauthorized.');
    }
    return view('admin.users');
})->name('admin.users');

Route::get('/admin/posts', function () {
    if (session('role') !== 'admin') {
        return redirect('/login')->with('error', 'Unauthorized.');
    }
    return view('admin.posts');
})->name('admin.posts');

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::get('/home', function () {
    if (session('role') !== 'user') {
        return redirect('/login')->with('error', 'Please login as user.');
    }
    return view('home');
})->name('user.home');