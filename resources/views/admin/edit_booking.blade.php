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

                <div class="mb-3">
                    <label class="form-label fw-semibold">Service Name</label>
                    <input type="text" class="form-control" value="{{ $booking->service->name ?? 'N/A' }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Event Date</label>
                    <input type="date" name="event_date" class="form-control" value="{{ old('event_date', $booking->event_date) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="upcoming" {{ $booking->status == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                        <option value="done" {{ $booking->status == 'done' ? 'selected' : '' }}>Done</option>
                        <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Notes (Optional)</label>
                    <textarea name="notes" class="form-control" rows="3" placeholder="Additional details...">{{ old('notes', $booking->notes ?? '') }}</textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.bookings') }}" class="btn text-white me-2" style="background:#aaa;">Cancel</a>
                    <button type="submit" class="btn text-white" style="background:#ae674e;">Update Booking</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
