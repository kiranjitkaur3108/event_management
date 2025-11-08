<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Show booking form (list all services)
    public function show()
    {
        $services = Service::all(); // fetch all services
        return view('book', compact('services'));
    }

    // Show booking details form (from service selection)
    public function showBookingForm($serviceName, $charges)
    {
        // These come directly from route parameters
        return view('book-details', compact('serviceName', 'charges'));
    }

    // Handle booking submission
    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string',
            'charges' => 'required|numeric',
            'event_date' => 'required|date|after:today',
            'venue' => 'required|string|max:255',
            'guest_count' => 'required|integer|min:1',
            'special_requests' => 'nullable|string|max:1000',
            'status' => 'required|string|in:Pending,Confirmed',
        ]);

        // Get existing service or create new
        $service = Service::firstOrCreate(
            ['name' => $request->service_name],
            ['price' => $request->charges]
        );

        // Create booking
        Booking::create([
            'user_id' => Auth::id(),
            'service_id' => $service->id,
            'event_date' => $request->event_date,
            'venue' => $request->venue,
            'guest_count' => $request->guest_count,
            'special_requests' => $request->special_requests,
            'status' => $request->status,
        ]);

        return redirect()->route('user.bookings')
            ->with('success', 'Your booking has been placed successfully!');
    }

    // Show bookings for logged-in user
    public function userBookings()
    {
        $bookings = Booking::with('service')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('bookings', compact('bookings'));
    }

    // Admin: view all bookings
    public function adminBookings()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login')->with('error', 'Only admins can access this page.');
        }

        $bookings = Booking::with(['user', 'service'])->latest()->get();
        return view('admin.bookings', compact('bookings'));
    }

    // Admin: edit booking
    public function edit($id)
    {
        $booking = Booking::with('service')->findOrFail($id);
        return view('admin.edit_booking', compact('booking'));
    }

    // Admin: update booking
    public function update(Request $request, $id)
    {
        $request->validate([
            'event_date' => 'required|date|after:today',
            'venue' => 'required|string|max:255',
            'guest_count' => 'required|integer|min:1',
            'status' => 'required|string|in:Pending,Confirmed',
            'special_requests' => 'nullable|string|max:1000',
        ]);

        $booking = Booking::findOrFail($id);

        $booking->update($request->only([
            'event_date',
            'venue',
            'guest_count',
            'status',
            'special_requests'
        ]));

        return redirect()->route('admin.bookings')->with('success', 'Booking updated successfully!');
    }

    // Admin: delete booking
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.bookings')->with('success', 'Booking deleted successfully!');
    }
}
