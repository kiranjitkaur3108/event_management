<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Models\Feedback;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'show'])->name('about');
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/feedback', [FeedbackController::class, 'show'])->name('feedback.show');
Route::post('/feedback', [FeedbackController::class, 'submit'])->name('feedback.submit');
Route::get('/thank-you', [FeedbackController::class, 'thankYou'])->name('feedback.thankyou');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/services', function() { return view('services'); })->name('services');
Route::get('/reviews', function() {
    $reviews = Feedback::latest()->get();
    return view('reviews', compact('reviews'));
})->name('reviews');
Route::get('/book', function() { return view('book'); })->name('book');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/dashboard', function() {
    if (!auth()->check() || auth()->user()->role !== 'admin') {
        return redirect()->route('login')->with('error', 'Please login as admin.');
    }

    $users = User::all(); // includes admin and registered users
    return view('admin.dashboard', compact('users'));
})->name('admin.dashboard');

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::get('/home', function() {
    if (!auth()->check() || auth()->user()->role !== 'user') {
        return redirect()->route('login')->with('error', 'Please login as user.');
    }
    return view('home');
})->name('user.home');
