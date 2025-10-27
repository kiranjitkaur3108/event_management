<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Booking;

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
Route::prefix('admin')->middleware('auth')->group(function() {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // User Management
    Route::get('/users', function() {
        $users = User::where('role', 'user')->latest()->get();
        return view('admin.users', compact('users'));
    })->name('admin.users');

    Route::get('/user/{id}/edit', function($id) {
        $user = User::findOrFail($id);
        return view('admin.edit_user', compact('user'));
    })->name('admin.user.edit');

    Route::put('/user/{id}', function($id, Illuminate\Http\Request $request) {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();
        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    })->name('admin.user.update');

    Route::delete('/user/{id}', function($id) {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully');
    })->name('admin.user.delete');

    // Booking Management
    Route::get('/bookings', function() {
        $bookings = Booking::latest()->get();
        return view('admin.bookings', compact('bookings'));
    })->name('admin.bookings');

    Route::get('/booking/{id}/edit', function($id) {
        $booking = Booking::findOrFail($id);
        return view('admin.edit_booking', compact('booking'));
    })->name('admin.booking.edit');

    Route::put('/booking/{id}', function($id, Illuminate\Http\Request $request) {
        $booking = Booking::findOrFail($id);
        $booking->user_id = $request->user_id;
        $booking->event_date = $request->event_date;
        $booking->status = $request->status;
        $booking->save();
        return redirect()->route('admin.bookings')->with('success', 'Booking updated successfully');
    })->name('admin.booking.update');

    Route::delete('/booking/{id}', function($id) {
        Booking::findOrFail($id)->delete();
        return redirect()->route('admin.bookings')->with('success', 'Booking deleted successfully');
    })->name('admin.booking.delete');

    // Feedback Management
    Route::get('/feedback', function() {
        $feedbacks = Feedback::latest()->get();
        return view('admin.feedback', compact('feedbacks'));
    })->name('admin.feedback');

    Route::get('/feedback/{id}/edit', function($id) {
        $feedback = Feedback::findOrFail($id);
        return view('admin.edit_feedback', compact('feedback'));
    })->name('admin.feedback.edit');

    Route::put('/feedback/{id}', function($id, Illuminate\Http\Request $request) {
        $feedback = Feedback::findOrFail($id);
        $feedback->name = $request->name;
        $feedback->email = $request->email;
        $feedback->message = $request->message;
        $feedback->save();
        return redirect()->route('admin.feedback')->with('success', 'Feedback updated successfully');
    })->name('admin.feedback.update');

    // Gallery Management
    Route::get('/gallery', function() {
        return view('admin.gallery');
    })->name('admin.gallery');
});

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function() {
    Route::get('/home', function() {
        if (!auth()->check() || auth()->user()->role !== 'user') {
            return redirect()->route('login')->with('error', 'Please login as user.');
        }
        return view('home');
    })->name('user.home');

    // Booking Routes
    Route::get('/book', [BookingController::class, 'show'])->name('book.show');
    Route::post('/book', [BookingController::class, 'store'])->name('book.submit');
    Route::get('/my-bookings', [BookingController::class, 'userBookings'])->name('user.bookings');
    Route::get('/book/details', [BookingController::class, 'showBookingForm'])->name('book.details');
});

/*
|--------------------------------------------------------------------------
| Misc Routes
|--------------------------------------------------------------------------
*/
Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/reviews', function () {
    $reviews = Feedback::latest()->get();
    return view('reviews', compact('reviews'));
})->name('reviews');

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/about', [AboutController::class, 'show'])->name('about');
