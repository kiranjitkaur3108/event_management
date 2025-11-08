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
                    <label class="form-label">Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-select" required>
                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-sm text-white" style="background:#ae674e;">Update User</button>
                <a href="{{ route('admin.users') }}" class="btn btn-sm btn-secondary ms-2">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
