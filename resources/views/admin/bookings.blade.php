@extends('layouts.app')
@section('title', 'Manage Bookings')

@section('content')
<div class="container my-5">
    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-bold" style="color:#ae674e;">Manage Bookings</h2>
            <p class="text-muted">View, edit, and remove bookings placed by users.</p>
        </div>
    </div>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header d-flex justify-content-between align-items-center" style="background:#ae674e;color:white;">
            <span>All Bookings</span>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-sm text-white" style="background:#a45d46;">Back to Dashboard</a>
        </div>
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Service</th>
                        <th>Event Date</th>
                        <th>Venue</th>
                        <th>Guests</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $index => $booking)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $booking->user->name ?? 'N/A' }}</td>
                        <td>{{ $booking->service->name ?? 'N/A' }}</td>
                        <td>{{ $booking->event_date }}</td>
                        <td>{{ $booking->venue ?? 'N/A' }}</td>
                        <td>{{ $booking->guest_count ?? 'N/A' }}</td>
                        <td>
                            @if($booking->status == 'Pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif($booking->status == 'Confirmed')
                                <span class="badge bg-success">Confirmed</span>
                            @else
                                <span class="badge bg-secondary">{{ $booking->status }}</span>
                            @endif
                        </td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('admin.booking.edit', $booking->id) }}" class="btn btn-sm text-white mb-1" style="background:#ae674e;">Edit</a>

                            <!-- Delete Form -->
                            <form action="{{ route('admin.booking.delete', $booking->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm text-white mb-1" style="background:#aaa;"
                                    onclick="return confirm('Are you sure you want to delete this booking?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-3">No bookings available.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
