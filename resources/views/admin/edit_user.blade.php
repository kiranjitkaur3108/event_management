@extends('layouts.app')
@section('title', 'Edit User')

@section('content')
<div class="container my-5">
    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-bold" style="color:#ae674e;">Edit User</h2>
            <p class="text-muted">Update user details and role below.</p>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header" style="background:#ae674e; color:white;">
            <span>Edit User Information</span>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Role</label>
                    <select name="role" class="form-select" required>
                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.users') }}" class="btn text-white me-2" style="background:#aaa;">Cancel</a>
                    <button type="submit" class="btn text-white" style="background:#ae674e;">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
