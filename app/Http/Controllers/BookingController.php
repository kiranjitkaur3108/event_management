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

    // Add your new method HERE (inside the class, before the final } )
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

    // User can view their bookings
    public function userBookings()
    {
        $bookings = Booking::with('service')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('bookings', compact('bookings'));
    }

    // Admin can view all bookings
    public function adminBookings()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login')->with('error', 'Only admins can access this page.');
        }

        $bookings = Booking::with(['user', 'service'])->latest()->get();
        return view('admin.bookings', compact('bookings'));
    }
} 