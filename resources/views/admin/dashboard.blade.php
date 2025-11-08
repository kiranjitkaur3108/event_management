@extends('layouts.app')
@section('title', 'Admin Dashboard')

@section('content')
<div class="container my-5">
    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-bold" style="color:#ae674e;">Admin Dashboard</h2>
            <p class="text-muted">Manage users, bookings, and events efficiently.</p>
        </div>
    </div>

    {{-- KPI CARDS --}}
    <div class="row g-3 mb-4">
        <!-- Total Users -->
        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted mb-1">Total Users</h6>
                    <h3 class="fw-bold mb-2">{{ $userCount ?? 0 }}</h3>
                </div>
            </div>
        </div>

        <!-- Done Events -->
        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted mb-1">Done Events</h6>
                    <h3 class="fw-bold mb-2">{{ $doneEventCount ?? 0 }}</h3>
                </div>
            </div>
        </div>

        <!-- Upcoming Events -->
        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted mb-1">Upcoming Events</h6>
                    <h3 class="fw-bold mb-2">{{ $upcomingEvents ?? 0 }}</h3>
                </div>
            </div>
        </div>

        <!-- Total Revenue -->
        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted mb-1">Total Revenue</h6>
                    <h3 class="fw-bold mb-2">${{ number_format($totalRevenue ?? 0, 2) }}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- LATEST USERS --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header d-flex justify-content-between align-items-center" style="background:#ae674e;color:white;">
            <span>Latest Users</span>
        </div>
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($latestUsers ?? [] as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ucfirst($user->role) }}</td>
                        <td>
                            <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm text-white mb-1" style="background:#ae674e;">Edit</a>
                            <form action="{{ route('admin.user.delete', $user->id) }}" method="POST" class="d-inline mb-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm text-white mb-1" style="background:#aaa;" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-3">No users available.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- LATEST BOOKINGS --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header d-flex justify-content-between align-items-center" style="background:#ae674e;color:white;">
            <span>Latest Bookings</span>
        </div>
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Service</th>
                        <th>Event Date</th>
                        <th>Venue</th>
                        <th>Guests</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($latestBookings ?? [] as $index => $booking)
                    <tr>
                        <td>{{ $index + 1 }}</td>
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
                            <a href="{{ route('admin.booking.edit', $booking->id) }}" class="btn btn-sm text-white mb-1" style="background:#ae674e;">Edit</a>
                            <form action="{{ route('admin.booking.delete', $booking->id) }}" method="POST" class="d-inline mb-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm text-white mb-1" style="background:#aaa;" onclick="return confirm('Are you sure you want to delete this booking?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-3">No bookings available.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
