@extends('layouts.app')

@section('title', 'Book Event Details')

@section('content')
<style>
    body {
        background-color: #f4e9dd;
    }
    .form-container {
        max-width: 600px;
        margin: 60px auto;
        background: #fff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }
    .form-container h2 {
        color: #ae674e;
        text-align: center;
        margin-bottom: 30px;
    }
    .form-group {
        margin-bottom: 20px;
    }
    label {
        display: block;
        font-weight: bold;
        color: #333;
        margin-bottom: 8px;
    }
    input, select, textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 14px;
    }
    button {
        background-color: #ae674e;
        color: #fff;
        border: none;
        padding: 12px 25px;
        border-radius: 30px;
        font-weight: bold;
        width: 100%;
        transition: background-color 0.3s ease;
    }
    button:hover {
        background-color: #8e513d;
    }
</style>

<div class="form-container">
    <h2>Complete Your Booking</h2>

    <form action="{{ route('book.submit') }}" method="POST">
        @csrf
        <input type="hidden" name="service_name" value="{{ $serviceName }}">
        <input type="hidden" name="charges" value="{{ $charges }}">

        <div class="form-group">
            <label>Event Date:</label>
            <input type="date" name="event_date" required>
        </div>

        <div class="form-group">
            <label>Venue:</label>
            <input type="text" name="venue" placeholder="Enter venue name" required>
        </div>

        <div class="form-group">
            <label>Number of Guests:</label>
            <input type="number" name="guest_count" placeholder="Enter number of guests" required>
        </div>

        <div class="form-group">
            <label>Special Requests:</label>
            <textarea name="special_requests" rows="3" placeholder="Any special instructions?"></textarea>
        </div>

        <div class="form-group">
            <label>Status:</label>
            <select name="status" required>
                <option value="Pending">Pending</option>
                <option value="Confirmed">Confirmed</option>
            </select>
        </div>

        <button type="submit">Confirm Booking</button>
    </form>
</div>
@endsection