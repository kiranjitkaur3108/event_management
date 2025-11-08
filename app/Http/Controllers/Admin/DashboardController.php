<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Service;
use Carbon\Carbon;
use App\Models\Contact; 

class DashboardController extends Controller
{
    public function index()
    {
        // Only allow admin
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            return redirect()->route('login')->with('error', 'Please login as admin.');
        }

        // Count only regular users (exclude admin)
        $userCount = User::where('role', 'user')->count();

        // Done events
        $doneEventCount = Booking::where(function ($query) {
            $query->where('status', 'done')
                ->orWhere('event_date', '<', Carbon::today());
        })->count();

        // Upcoming events
        $upcomingEvents = Booking::where(function ($query) {
            $query->where('status', 'upcoming')
                ->orWhere('event_date', '>=', Carbon::today());
        })->count();

        // Latest 5 users (exclude admin)
        $latestUsers = User::where('role', 'user')->latest()->take(5)->get();

        // Latest 5 bookings
        $latestBookings = Booking::with('service')->latest()->take(5)->get();

        // Total revenue: sum of service prices for all bookings
        $totalRevenue = Booking::with('service')->get()->sum(function ($booking) {
            return $booking->service->price ?? 0;
        });

        $latestContacts = Contact::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'userCount',
            'doneEventCount',
            'upcomingEvents',
            'latestUsers',
            'latestBookings',
            'totalRevenue',
            'latestContacts'
        ));
    }
}

