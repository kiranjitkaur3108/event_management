@extends('layouts.app')

@section('title', ucfirst($role) . ' Login')

@section('content')

    <style>
        .login-container {
            padding: 60px 20px;
            min-height: 80vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Card styling */
        .login-card {
            max-width: 500px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            padding: 30px;
            text-align: center;
        }

        .login-card h2 {
            color: #6A3F3F;
            margin-bottom: 20px;
        }

        .login-card label {
            font-weight: bold;
            color: #6A3F3F;
            text-align: left;
            display: block;
            margin-bottom: 5px;
        }

        .login-card .form-control {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        /* Unified button style */
        .login-card .btn-uniform {
            background-color: #6A3F3F;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 12px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
            display: block;
            width: 100%;
            margin: 10px 0;
            text-decoration: none;
            text-align: center;
        }

        .login-card .btn-uniform:hover {
            background-color: #8A5C5C;
            color: #fff;
        }

        @media (max-width: 576px) {
            .login-card {
                padding: 20px;
            }
        }
    </style>

    <div class="login-container">
        <div class="login-card">
            <h2>{{ ucfirst($role) }} Login</h2>

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

                <!-- Login button -->
                <button type="submit" class="btn-uniform">Login</button>
            </form>

            <!-- Links styled as buttons -->
            <a href="{{ route('role.select') }}" class="btn-uniform">← Back to Role Selection</a>
            <a href="{{ route('register') }}" class="btn-uniform">Register here</a>
        </div>
    </div>

@endsection
