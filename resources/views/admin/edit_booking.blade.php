@extends('layouts.app')
@section('title', 'Edit Booking')

@section('content')
<div class="container my-5">
    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-bold" style="color:#ae674e;">Edit Booking</h2>
            <p class="text-muted">Modify event details and status below.</p>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header" style="background:#ae674e; color:white;">
            <span>Edit Booking Details</span>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.booking.update', $booking->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Service Name (readonly) -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Service Name</label>
                    <input type="text" class="form-control" value="{{ $booking->service->name ?? 'N/A' }}" disabled>
                </div>

                <!-- Event Date -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Event Date</label>
                    <input type="date" name="event_date" class="form-control" 
                        value="{{ old('event_date', $booking->event_date) }}" required>
                </div>

                <!-- Venue -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Venue</label>
                    <input type="text" name="venue" class="form-control" 
                        value="{{ old('venue', $booking->venue) }}" required>
                </div>

                <!-- Guest Count -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Guest Count</label>
                    <input type="number" name="guest_count" class="form-control" 
                        value="{{ old('guest_count', $booking->guest_count) }}" min="1" required>
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="Pending" {{ $booking->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Confirmed" {{ $booking->status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                    </select>
                </div>

                <!-- Special Requests / Notes -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Special Requests (Optional)</label>
                    <textarea name="special_requests" class="form-control" rows="3" 
                        placeholder="Additional details...">{{ old('special_requests', $booking->special_requests) }}</textarea>
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.bookings') }}" class="btn text-white me-2" style="background:#aaa;">Cancel</a>
                    <button type="submit" class="btn text-white" style="background:#ae674e;">Update Booking</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
