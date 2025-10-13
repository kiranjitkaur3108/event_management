@extends('layouts.app')

@section('title', ucfirst($role) . ' Login')

@section('content')
    <style>
        /* === Page Background === */
        body {
            background-color: #f4e9dd;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* === Login Container === */
        .login-container {
            padding: 60px 20px;
            min-height: 80vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* === Card Styling (Feedback Page Style) === */
        .login-card {
            max-width: 500px;
            width: 100%;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            padding: 35px;
            text-align: center;
        }

        /* === Title === */
        .login-card h2 {
            color: #ae674e;
            font-weight: bold;
            margin-bottom: 25px;
        }

        /* === Labels === */
        .login-card label {
            font-weight: 600;
            color: #ae674e;
            text-align: left;
            display: block;
            margin-bottom: 6px;
        }

        /* === Input Fields === */
        .login-card .form-control {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #d8c1b4;
            transition: border-color 0.2s ease-in-out, box-shadow 0.2s;
        }

        .login-card .form-control:focus {
            border-color: #ae674e;
            box-shadow: 0 0 5px rgba(174, 103, 78, 0.4);
        }

        /* === Buttons (Feedback Page Style) === */
        .btn-uniform {
            background-color: #ae674e;
            color: #fff;
            border: none;
            border-radius: 6px;
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

        .btn-uniform:hover {
            background-color: #8f523d;
            color: #fff;
        }

        /* === Responsive === */
        @media (max-width: 576px) {
            .login-card {
                padding: 25px;
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

                <button type="submit" class="btn-uniform">Login</button>
            </form>

            <a href="{{ route('role.select') }}" class="btn-uniform">← Back to Role Selection</a>
            <a href="{{ route('register') }}" class="btn-uniform">Register here</a>
        </div>
    </div>
@endsection
