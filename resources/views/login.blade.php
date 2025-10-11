@extends('layouts.app')

@section('title', ucfirst($role) . ' Login')

@section('content')
<div class="container my-5" style="max-width: 500px;">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="text-center mb-4">{{ ucfirst($role) }} Login</h2>

            @if (session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
            @endif

            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <input type="hidden" name="role" value="{{ $role }}">

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>

            <div class="text-center mt-3">
                <a href="{{ route('role.select') }}">← Back to Role Selection</a>
            </div>

            <div>
                <p class="text-center mt-2">
                    Don’t have an account? <a href="{{ route('register') }}">Register here</a>
                </p>

            </div>
        </div>
    </div>
</div>
@endsection