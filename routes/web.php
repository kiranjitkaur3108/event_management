<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\LogoutController;

/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
//For Feedback:
Route::get('/feedback', [FeedbackController::class, 'show'])->name('feedback.show');
Route::post('/feedback', [FeedbackController::class, 'submit'])->name('feedback.submit');
Route::get('/thank-you', [FeedbackController::class, 'thankYou'])->name('feedback.thankyou');
//For logout functionality:
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
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

    // === STATIC CREDENTIALS  ===
    $adminCred = ['email' => 'admin@gmail.com', 'password' => 'admin123'];
    $userCred  = ['email' => 'user@gmail.com',  'password' => 'user123'];

    // Admin login
    if ($email === $adminCred['email'] && $password === $adminCred['password']) {
        session([
            'role' => 'admin',
            'user_id' => 1,
            'user_name' => 'Admin'
        ]);
        return redirect('/admin/dashboard');
    }

    // Regular user login
    if ($email === $userCred['email'] && $password === $userCred['password']) {
        session([
            'role' => 'user',
            'user_id' => 2,
            'user_name' => 'User'
        ]);
        return redirect('/home');
    }

    // Invalid credentials
    return back()->with('error', 'Invalid credentials.');
})->name('login.submit');


/*
|--------------------------------------------------------------------------
| Registration Routes
|--------------------------------------------------------------------------
*/
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

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
        ['name' => 'Sarita Rani', 'when' => '2025-10-01'],
        ['name' => 'Sonali',  'when' => '2025-10-02'],
        ['name' => 'Bhakti', 'when' => '2025-10-05'],
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



/*
|--------------------------------------------------------------------------
| services
|--------------------------------------------------------------------------
*/

Route::get('/services', function () {
    return view('services');
})->name('services');


/*
|--------------------------------------------------------------------------
| contact
|--------------------------------------------------------------------------
*/
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');


/*
|--------------------------------------------------------------------------
| about
|--------------------------------------------------------------------------
*/
Route::get('/about', [AboutController::class, 'show'])->name('about');
