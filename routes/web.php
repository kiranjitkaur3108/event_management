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
    BookingController,
    ServiceController
};
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Models\{Feedback, User, Booking};

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'show'])->name('about');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

// Feedback and Contact
Route::get('/feedback', [FeedbackController::class, 'show'])->name('feedback.show');
Route::post('/feedback', [FeedbackController::class, 'submit'])->name('feedback.submit');
Route::get('/thank-you', [FeedbackController::class, 'thankYou'])->name('feedback.thankyou');

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Reviews
Route::get('/reviews', function () {
    $reviews = Feedback::latest()->get();
    return view('reviews', compact('reviews'));
})->name('reviews');

/*
|--------------------------------------------------------------------------
| Services Routes
|--------------------------------------------------------------------------
*/
Route::get('/services', [ServiceController::class, 'index'])->name('services');

Route::prefix('services')->group(function () {
    // Weddings
    Route::get('/wedding-ceremonies', [ServiceController::class, 'weddingCeremonies'])->name('services.weddingCeremonies');
    Route::get('/wedding-receptions', [ServiceController::class, 'weddingReceptions'])->name('services.weddingReceptions');
    Route::get('/destination-weddings', [ServiceController::class, 'destinationWeddings'])->name('services.destinationWeddings');

    // Birthdays
    Route::get('/kids-parties', [ServiceController::class, 'kidsParties'])->name('services.kidsParties');
    Route::get('/teen-parties', [ServiceController::class, 'teenParties'])->name('services.teenParties');
    Route::get('/adult-parties', [ServiceController::class, 'adultParties'])->name('services.adultParties');

    // Corporate Events
    Route::get('/team-building', [ServiceController::class, 'teamBuilding'])->name('services.teamBuilding');
    Route::get('/product-launch', [ServiceController::class, 'productLaunch'])->name('services.productLaunch');
    Route::get('/conferences', [ServiceController::class, 'conferences'])->name('services.conferences');

    // Anniversaries
    Route::get('/anniversary-parties', [ServiceController::class, 'anniversaryParties'])->name('services.anniversaryParties');
    Route::get('/anniversary-dinners', [ServiceController::class, 'anniversaryDinners'])->name('services.anniversaryDinners');
    Route::get('/surprise-celebrations', [ServiceController::class, 'surpriseCelebrations'])->name('services.surpriseCelebrations');

    // Baby Showers
    Route::get('/baby-shower-parties', [ServiceController::class, 'babyShowerParties'])->name('services.babyShowerParties');
    Route::get('/gifting-events', [ServiceController::class, 'giftingEvents'])->name('services.giftingEvents');
    Route::get('/fun-activities', [ServiceController::class, 'funActivities'])->name('services.funActivities');

    // Festivals
    Route::get('/community-festivals', [ServiceController::class, 'communityFestivals'])->name('services.communityFestivals');
    Route::get('/food-festivals', [ServiceController::class, 'foodFestivals'])->name('services.foodFestivals');
    Route::get('/music-festivals', [ServiceController::class, 'musicFestivals'])->name('services.musicFestivals');
});

// Booking from a service
Route::get('/book/{service}', [ServiceController::class, 'book'])->name('book.fromService');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
// Login / Logout
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Registration
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // User Management
    Route::get('/users', function () {
        $users = User::where('role', 'user')->latest()->get();
        return view('admin.users', compact('users'));
    })->name('admin.users');

    Route::get('/user/{id}/edit', fn($id) => view('admin.edit_user', ['user' => User::findOrFail($id)]))->name('admin.user.edit');

    Route::put('/user/{id}', function(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->update($request->only(['name', 'email', 'role']));
        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    })->name('admin.user.update');

    Route::delete('/user/{id}', function($id) {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    })->name('admin.user.delete');

    // Bookings
    Route::get('/bookings', [BookingController::class, 'adminBookings'])->name('admin.bookings');
    Route::get('/booking/{id}/edit', [BookingController::class, 'edit'])->name('admin.booking.edit');
    Route::put('/booking/{id}', [BookingController::class, 'update'])->name('admin.booking.update');
    Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('admin.booking.delete');

    // Feedback
    Route::get('/feedback', fn() => view('admin.feedback', ['feedbacks' => Feedback::latest()->get()]))->name('admin.feedback');
});

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        $user = auth()->user();
        return $user->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('user.bookings');
    })->name('user.home');

    // Booking Routes
    Route::get('/book', [BookingController::class, 'show'])->name('book.show');
    Route::get('/book-details/{serviceName}/{charges}', [BookingController::class, 'showBookingForm'])->name('book.details');
    Route::post('/book-details/submit', [BookingController::class, 'store'])->name('book.submit');
    Route::get('/my-bookings', [BookingController::class, 'userBookings'])->name('user.bookings');
});
