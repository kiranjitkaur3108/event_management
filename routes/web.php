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
    ServiceController,
};
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;

use App\Models\{Feedback, User, Booking};

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'show'])->name('about');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

// Feedback & Contact
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

// Services
Route::get('/services', [ServiceController::class, 'index'])->name('services');

Route::prefix('services')->group(function () {
    Route::get('/wedding-ceremonies', [ServiceController::class, 'weddingCeremonies'])->name('services.weddingCeremonies');
    Route::get('/wedding-receptions', [ServiceController::class, 'weddingReceptions'])->name('services.weddingReceptions');
    Route::get('/destination-weddings', [ServiceController::class, 'destinationWeddings'])->name('services.destinationWeddings');
    Route::get('/kids-parties', [ServiceController::class, 'kidsParties'])->name('services.kidsParties');
    Route::get('/teen-parties', [ServiceController::class, 'teenParties'])->name('services.teenParties');
    Route::get('/adult-parties', [ServiceController::class, 'adultParties'])->name('services.adultParties');
    Route::get('/team-building', [ServiceController::class, 'teamBuilding'])->name('services.teamBuilding');
    Route::get('/product-launch', [ServiceController::class, 'productLaunch'])->name('services.productLaunch');
    Route::get('/conferences', [ServiceController::class, 'conferences'])->name('services.conferences');
    Route::get('/anniversary-parties', [ServiceController::class, 'anniversaryParties'])->name('services.anniversaryParties');
    Route::get('/anniversary-dinners', [ServiceController::class, 'anniversaryDinners'])->name('services.anniversaryDinners');
    Route::get('/surprise-celebrations', [ServiceController::class, 'surpriseCelebrations'])->name('services.surpriseCelebrations');
    Route::get('/baby-shower-parties', [ServiceController::class, 'babyShowerParties'])->name('services.babyShowerParties');
    Route::get('/gifting-events', [ServiceController::class, 'giftingEvents'])->name('services.giftingEvents');
    Route::get('/fun-activities', [ServiceController::class, 'funActivities'])->name('services.funActivities');
    Route::get('/community-festivals', [ServiceController::class, 'communityFestivals'])->name('services.communityFestivals');
    Route::get('/food-festivals', [ServiceController::class, 'foodFestivals'])->name('services.foodFestivals');
    Route::get('/music-festivals', [ServiceController::class, 'musicFestivals'])->name('services.musicFestivals');
});

// Booking from service
Route::get('/book/{service}', [ServiceController::class, 'book'])->name('book.fromService');

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/
// Registration
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Users
    Route::get('/users', function () {
        $users = User::where('role', 'user')->latest()->get();
        return view('admin.users', compact('users'));
    })->name('admin.users');

    Route::get('/user/{id}/edit', fn($id) => view('admin.edit_user', ['user' => User::findOrFail($id)]))->name('admin.user.edit');
    Route::put('/user/{id}', function(Request $request, $id) {
        User::findOrFail($id)->update($request->only(['name','email','role']));
        return redirect()->route('admin.users')->with('success','User updated successfully.');
    })->name('admin.user.update');
    Route::delete('/user/{id}', function($id) {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.users')->with('success','User deleted successfully.');
    })->name('admin.user.delete');

    // Bookings
    Route::get('/bookings', [BookingController::class,'adminBookings'])->name('admin.bookings');
    Route::get('/booking/{id}/edit', [BookingController::class,'edit'])->name('admin.booking.edit');
    Route::put('/booking/{id}', [BookingController::class,'update'])->name('admin.booking.update');
    Route::delete('/booking/{id}', [BookingController::class,'destroy'])->name('admin.booking.delete');

    // Feedback
    Route::get('/feedback', fn() => view('admin.feedback',['feedbacks'=>Feedback::latest()->get()]))->name('admin.feedback');

    // Contacts
    Route::get('/contacts', [ContactController::class,'index'])->name('admin.contacts');


Route::post('/admin/contact/{contact}/reply', [ContactController::class, 'reply'])
    ->middleware(['auth']) // optionally check if admin
    ->name('admin.contact.reply');

});

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {
        return auth()->user()->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('user.bookings');
    })->name('user.home');

    // Bookings
    Route::get('/book', [BookingController::class,'show'])->name('book.show');
    Route::get('/book-details/{serviceName}/{charges}', [BookingController::class,'showBookingForm'])->name('book.details');
    Route::post('/book-details/submit', [BookingController::class,'store'])->name('book.submit');
    Route::get('/my-bookings', [BookingController::class,'userBookings'])->name('user.bookings');
});



//wislist
Route::post('/wishlist/add', [WishlistController::class, 'store'])
    ->name('wishlist.add')
    ->middleware('auth');
Route::get('/wishlist', [WishlistController::class, 'index'])
    ->name('wishlist.index')
    ->middleware('auth');
Route::delete('/wishlist/{id}', [WishlistController::class, 'remove'])
    ->name('wishlist.remove')
    ->middleware('auth');
