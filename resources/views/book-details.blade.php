@extends('layouts.app')

@section('title', 'Book Event Details')

@section('content')
<style>
    body { background-color: #f4e9dd; }
    .form-container {
        max-width: 600px; margin: 60px auto;
        background: #fff; padding: 40px;
        border-radius: 10px; box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }
    .form-container h2 { color: #ae674e; text-align: center; margin-bottom: 30px; }
    .form-group { margin-bottom: 20px; }
    label { display: block; font-weight: bold; color: #333; margin-bottom: 8px; }
    input, select, textarea { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 8px; font-size: 14px; }
    button { background-color: #ae674e; color: #fff; border: none; padding: 12px 25px; border-radius: 30px; font-weight: bold; width: 100%; transition: background-color 0.3s ease; }
    button:hover { background-color: #8e513d; }
    .error-message { color: red; font-size: 13px; margin-top: 5px; display: block; }
    .input-error { border-color: red; background-color: #ffeaea; }
    .service-info { margin-bottom: 30px; }
    .service-info h3 { color: #ae674e; margin-bottom: 10px; }
</style>

<div class="form-container">
    <div class="service-info">
        <h3>{{ $serviceName }}</h3>
        <p><strong>Charges:</strong> ${{ number_format($charges, 2) }}</p>
    </div>

    <form action="{{ route('book.submit') }}" method="POST" id="bookingForm">
        @csrf
        <input type="hidden" name="service_name" value="{{ $serviceName }}">
        <input type="hidden" name="charges" value="{{ $charges }}">

        <div class="form-group">
            <label>Event Date:</label>
            <input type="date" name="event_date" id="event_date" required onkeydown="return false;">
            <span class="error-message"></span>
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

<script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("bookingForm");
    const guestInput = document.querySelector("input[name='guest_count']");
    const dateInput = document.getElementById("event_date");

    // Set min date to tomorrow
    const today = new Date();
    today.setDate(today.getDate() + 1);
    const yyyy = today.getFullYear();
    const mm = String(today.getMonth() + 1).padStart(2, "0");
    const dd = String(today.getDate()).padStart(2, "0");
    const minDate = `${yyyy}-${mm}-${dd}`;
    dateInput.setAttribute("min", minDate);

    function showError(input, message) {
        let error = input.parentNode.querySelector(".error-message");
        if (!error) {
            error = document.createElement("span");
            error.className = "error-message";
            input.parentNode.appendChild(error);
        }
        error.textContent = message;
        input.classList.add("input-error");
    }

    function clearError(input) {
        const error = input.parentNode.querySelector(".error-message");
        if (error) error.textContent = "";
        input.classList.remove("input-error");
    }

    dateInput.addEventListener("change", function () {
        const selected = new Date(this.value);
        const min = new Date(minDate);
        if (selected < min) { showError(this, "You cannot select a past or today's date."); this.value = ""; } 
        else { clearError(this); }
    });

    form.addEventListener("submit", function (e) {
        let valid = true;
        const guests = parseInt(guestInput.value, 10);
        const selected = new Date(dateInput.value);
        const min = new Date(minDate);

        clearError(guestInput);
        clearError(dateInput);

        if (isNaN(guests) || guests <= 0) { showError(guestInput, "Guest count must be at least 1."); valid = false; }
        if (!dateInput.value) { showError(dateInput, "Please select an event date."); valid = false; } 
        else if (selected < min) { showError(dateInput, "Please choose a date after today."); valid = false; }

        if (!valid) e.preventDefault();
    });
});
</script>
@endsection