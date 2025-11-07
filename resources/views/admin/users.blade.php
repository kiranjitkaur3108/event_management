@extends('layouts.app')
@section('title', 'Manage Users')

@section('content')
<div class="container my-5">
    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-bold" style="color:#ae674e;">Manage Users</h2>
            <p class="text-muted">View, edit, and remove registered users from the system.</p>
        </div>
    </div>

    {{-- USERS TABLE --}}
    <div class="card shadow-sm border-0">
        <div class="card-header d-flex justify-content-between align-items-center" style="background:#ae674e;color:white;">
            <span>All Users</span>
            <a href="{{ route('register') }}" class="btn btn-sm text-white" style="background:#a45d46;">Add New User</a>
        </div>
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width:5%;">#</th>
                        <th style="width:25%;">Name</th>
                        <th style="width:25%;">Email</th>
                        <th style="width:15%;">Role</th>
                        <th style="width:30%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ucfirst($user->role) }}</td>
                        <td>
                            <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm text-white" style="background:#ae674e;">Edit</a>
                            <form action="{{ route('admin.user.delete', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm text-white" style="background:#aaa;" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
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
</div>
@endsection
