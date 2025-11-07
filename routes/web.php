<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\{
    HomeController,
    ContactController,
    FeedbackController,
    GalleryController,
    AboutController,
    AuthController,
    BookingController
};
use App\Http\Controllers\Admin\DashboardController;
use App\Models\{Feedback, User, Booking};

/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'show'])->name('about');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

// Services Page
Route::get('/services', fn() => view('services'))->name('services');

// Reviews Page
Route::get('/reviews', function () {
    $reviews = Feedback::latest()->get();
    return view('reviews', compact('reviews'));
})->name('reviews');

// Contact Page
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Feedback Page
Route::get('/feedback', [FeedbackController::class, 'show'])->name('feedback.show');
Route::post('/feedback', [FeedbackController::class, 'submit'])->name('feedback.submit');
Route::get('/thank-you', [FeedbackController::class, 'thankYou'])->name('feedback.thankyou');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

/*
|--------------------------------------------------------------------------
| Admin Routes (Protected)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('auth')->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // ✅ User Management
    Route::get('/users', function () {
        $users = User::where('role', 'user')->latest()->get();
        return view('admin.users', compact('users'));
    })->name('admin.users');

    Route::get('/user/{id}/edit', function ($id) {
        $user = User::findOrFail($id);
        return view('admin.edit_user', compact('user'));
    })->name('admin.user.edit');

    Route::put('/user/{id}', function ($id, Request $request) {
        $user = User::findOrFail($id);
        $user->update($request->only(['name', 'email', 'role']));
        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    })->name('admin.user.update');

    Route::delete('/user/{id}', function ($id) {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully');
    })->name('admin.user.delete');

    // ✅ Booking Management (Uses Controller)
    Route::get('/bookings', [BookingController::class, 'adminBookings'])->name('admin.bookings');
    Route::get('/bookings/fetch', [BookingController::class, 'fetchBookings'])->name('admin.bookings.fetch'); // AJAX

    Route::get('/booking/{id}/edit', function ($id) {
        $booking = Booking::findOrFail($id);
        return view('admin.edit_booking', compact('booking'));
    })->name('admin.booking.edit');

    Route::put('/booking/{id}', function ($id, Request $request) {
        $booking = Booking::findOrFail($id);
        $booking->update($request->only(['user_id', 'event_date', 'status']));
        return redirect()->route('admin.bookings')->with('success', 'Booking updated successfully');
    })->name('admin.booking.update');

    Route::delete('/booking/{id}', function ($id) {
        Booking::findOrFail($id)->delete();
        return redirect()->route('admin.bookings')->with('success', 'Booking deleted successfully');
    })->name('admin.booking.delete');


    // ✅ Feedback Management
    Route::get('/feedback', function () {
        $feedbacks = Feedback::latest()->get();
        return view('admin.feedback', compact('feedbacks'));
    })->name('admin.feedback');

    Route::get('/feedback/{id}/edit', function ($id) {
        $feedback = Feedback::findOrFail($id);
        return view('admin.edit_feedback', compact('feedback'));
    })->name('admin.feedback.edit');

    Route::put('/feedback/{id}', function ($id, Request $request) {
        $feedback = Feedback::findOrFail($id);
        $feedback->update($request->only(['name', 'email', 'message']));
        return redirect()->route('admin.feedback')->with('success', 'Feedback updated successfully');
    })->name('admin.feedback.update');

    // ✅ Gallery Management
    Route::get('/gallery', fn() => view('admin.gallery'))->name('admin.gallery');
});

/*
|--------------------------------------------------------------------------
| User Routes (Protected)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // ✅ User Home / Dashboard
    Route::get('/home', function () {
        if (auth()->user()->role !== 'user') {
            return redirect()->route('login')->with('error', 'Please login as a user.');
        }
        return redirect()->route('user.bookings');
    })->name('user.home');

    // ✅ Booking Flow
    Route::get('/book', [BookingController::class, 'show'])->name('book.show');
    Route::post('/book', [BookingController::class, 'store'])->name('book.submit');
    Route::get('/book/details', [BookingController::class, 'showBookingForm'])->name('book.details');
    Route::get('/my-bookings', [BookingController::class, 'userBookings'])->name('user.bookings');
});
