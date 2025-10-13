@extends('layouts.app')
@section('title', 'Admin Dashboard')

@section('content')
    <div class="container my-5">
        <div class="row mb-4">
            <div class="col">
                <h2 class="fw-bold" style="color:#ae674e;">Admin Dashboard</h2>
                <p class="text-muted">Manage users, posts, and events efficiently.</p>
            </div>
        </div>

        {{-- KPI CARDS --}}
        <div class="row g-3 mb-4">
            <div class="col-md-3 col-sm-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h6 class="text-muted mb-1">Total Users</h6>
                        <h3 class="fw-bold mb-2">{{ $userCount ?? 0 }}</h3>
                        <button class="btn btn-sm text-white" style="background:#ae674e;">Manage</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h6 class="text-muted mb-1">Total Posts</h6>
                        <h3 class="fw-bold mb-2">{{ $postCount ?? 0 }}</h3>
                        <button class="btn btn-sm text-white" style="background:#ae674e;">Manage</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h6 class="text-muted mb-1">Upcoming Events</h6>
                        <h3 class="fw-bold mb-2">12</h3>
                        <button class="btn btn-sm text-white" style="background:#ae674e;">View Events</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h6 class="text-muted mb-1">Revenue (This Month)</h6>
                        <h3 class="fw-bold mb-2">$4,120</h3>
                        <button class="btn btn-sm text-white" style="background:#ae674e;">View Reports</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- ACTION BUTTONS --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-semibold">Quick Actions</h4>
            <div>
                <button class="btn text-white me-2" style="background:#ae674e;">
                    <i class="fa fa-plus me-1"></i> Add New Item
                </button>
                <button class="btn btn-outline-secondary me-2">
                    <i class="fa fa-edit me-1"></i> Edit Selected
                </button>
                <button class="btn btn-outline-danger">
                    <i class="fa fa-trash me-1"></i> Delete
                </button>
            </div>
        </div>

        {{-- CHART SECTION --}}
        <div class="card shadow-sm mb-4 border-0">
            <div class="card-body">
                <h5 class="card-title">Bookings Trend</h5>
                <canvas id="bookingsChart" height="100"></canvas>
            </div>
        </div>

        {{-- RECENT ACTIVITY TABLE --}}
        <div class="card shadow-sm border-0">
            <div class="card-header d-flex justify-content-between align-items-center" style="background:#ae674e;color:white;">
                <span>Recent Logins</span>
                <a href="#" class="btn btn-sm btn-light text-dark">View All</a>
            </div>
            <div class="card-body p-0">
                <table class="table mb-0">
                    <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User</th>
                        <th scope="col">Last Login</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($recentLogins ?? [] as $index => $login)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $login['name'] ?? 'N/A' }}</td>
                            <td>{{ $login['when'] ?? '-' }}</td>
                            <td>
                                <button class="btn btn-sm btn-outline-secondary me-1">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-3">No recent logins available.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- CHART.JS SCRIPT --}}
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const ctx = document.getElementById('bookingsChart').getContext('2d');
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Oct 1','Oct 5','Oct 9','Oct 13','Oct 17','Oct 21','Oct 25'],
                        datasets: [{
                            label: 'Bookings',
                            data: [5,8,6,10,9,12,7],
                            borderColor: '#ae674e',
                            backgroundColor: 'rgba(174,103,78,0.2)',
                            fill: true,
                            tension: 0.3
                        }]
                    },
                    options: {
                        plugins: { legend: { display: false } },
                        scales: {
                            y: { beginAtZero: true, ticks: { stepSize: 2 } }
                        }
                    }
                });
            });
        </script>
    @endpush
@endsection
