@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3">Admin Dashboard</h1>
            <p class="text-muted">Welcome back. Manage users and posts from here.</p>
        </div>
        <div>
            <a href="{{ url('/') }}" class="btn btn-outline-secondary">Visit Site</a>
            <a href="{{ url('/logout') }}" class="btn btn-outline-danger">Logout</a>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Total Users</h6>
                    <p class="display-6">{{ $userCount }}</p>
                    <a href="{{ route('admin.users') }}" class="btn btn-sm btn-primary">Manage Users</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Total Posts</h6>
                    <p class="display-6">{{ $postCount }}</p>
                    <a href="{{ route('admin.posts') }}" class="btn btn-sm btn-success">Manage Posts</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Recent Logins</h6>
                    <ul class="list-unstyled small mb-0">
                        @foreach($recentLogins as $r)
                            <li>{{ $r['name'] }} — <span class="text-muted">{{ $r['when'] }}</span></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Links or Shortcuts -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5>Users</h5>
                    <p class="mb-2">View, edit, or remove users. Assign roles later.</p>
                    <a href="{{ route('admin.users') }}" class="btn btn-outline-primary">Open User Manager</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5>Posts</h5>
                    <p class="mb-2">Create, review, approve, edit, or delete posts and event listings.</p>
                    <a href="{{ route('admin.posts') }}" class="btn btn-outline-success">Open Post Manager</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection