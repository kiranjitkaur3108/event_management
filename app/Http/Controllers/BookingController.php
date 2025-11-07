<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Show booking form
    public function show()
    {
        $services = Service::all();
        return view('book', compact('services'));
    }

    public function showBookingForm(Request $request)
    {
        $serviceName = $request->input('service_name');
        $charges = $request->input('charges');
        return view('book-details', compact('serviceName', 'charges'));
    }

    // Handle booking submission
    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string',
            'charges' => 'required|numeric',
            'event_date' => 'required|date',
            'venue' => 'required|string|max:255',
            'guest_count' => 'required|integer|min:1',
            'status' => 'required|string',
        ]);

        $service = Service::firstOrCreate(
            ['name' => $request->service_name],
            ['price' => $request->charges]
        );

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

    // User bookings
    public function userBookings()
    {
        $bookings = Booking::with('service')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('bookings', compact('bookings'));
    }

    // Admin bookings view
    public function adminBookings()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login')->with('error', 'Only admins can access this page.');
        }

        $bookings = Booking::with(['user', 'service'])->latest()->get();
        return view('admin.bookings', compact('bookings'));
    }

    // ✅ Admin: Edit booking
    public function edit($id)
    {
        $booking = Booking::with('service')->findOrFail($id);
        return view('admin.edit_booking', compact('booking'));
    }

    // ✅ Admin: Update booking
    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update($request->only(['event_date', 'status', 'venue', 'guest_count']));
        return redirect()->route('admin.bookings')->with('success', 'Booking updated successfully');
    }

    // ✅ Admin: Delete booking
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->route('admin.bookings')->with('success', 'Booking deleted successfully');
    }
}
