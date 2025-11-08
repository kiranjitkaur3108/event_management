@extends('layouts.app')

@section('title', 'My Bookings')

@section('content')
<style>
    body {
        background-color: #f4e9dd;
    }

    .bookings-container {
        max-width: 1000px;
        margin: 50px auto;
        background: #ffffff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    }

    .bookings-title {
        font-size: 30px;
        font-weight: bolder;
        color: #ae674e;
        margin-bottom: 30px;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff6f0;
        border-radius: 10px;
        overflow: hidden;
    }

    th, td {
        padding: 14px 18px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #ae674e;
        color: white;
        font-weight: bold;
    }

    tr:hover {
        background-color: #fbe8dd;
    }

    .status {
        font-weight: bold;
        padding: 6px 12px;
        border-radius: 20px;
        text-align: center;
    }

    .status.pending {
        background: #fff3cd;
        color: #856404;
    }

    .status.confirmed {
        background: #d4edda;
        color: #155724;
    }

    .status.cancelled {
        background: #f8d7da;
        color: #721c24;
    }

    .no-bookings {
        text-align: center;
        font-size: 18px;
        color: #555;
        margin-top: 20px;
    }
</style>

<div class="bookings-container">
    <h1 class="bookings-title">My Bookings</h1>

    @if (session('success'))
        <div style="background:#d4edda;color:#155724;padding:10px;border-radius:8px;margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif

    @if ($bookings->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Event Date</th>
                    <th>Venue</th>
                    <th>Guests</th>
                    <th>Status</th>
                    <th>Booked On</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($booking->event_date)->format('d M Y') }}</td>
                        <td>{{ $booking->venue }}</td>
                        <td>{{ $booking->guest_count ?? '—' }}</td>
                        <td><span class="status {{ strtolower($booking->status) }}">{{ ucfirst($booking->status) }}</span></td>
                        <td>{{ $booking->created_at->format('d M Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="no-bookings">You haven't made any bookings yet.</p>
    @endif
</div>
@endsection