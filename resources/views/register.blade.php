@extends('layouts.app')

@section('title', 'Register | Celebrations')

@section('content')

    <style>
        .registration-section {
            padding: 60px 20px;
            border-radius: 10px;
            margin: 40px auto;
            max-width: 900px;
            display: flex;
            flex-wrap: wrap;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            background-color: rgba(255, 251, 248, 0.95);
        }

        .registration-left {
            flex: 1 1 40%;
            padding: 30px;
            color: #fff;
            background: rgba(79, 76, 76, 0.8);
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .registration-left h1 {
            font-family: 'Pacifico', cursive;
            font-size: 36px;
            margin-bottom: 15px;
        }

        .registration-left p {
            font-size: 16px;
        }

        .registration-right {
            flex: 1 1 60%;
            padding: 30px;
            background: transparent;
        }

        .registration-right h2 {
            color: #6A3F3F;
            margin-bottom: 20px;
            text-align: center;
        }

        .registration-right form {
            display: flex;
            flex-direction: column;
        }

        .registration-right form label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #6A3F3F;
        }

        .registration-right form input {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .registration-right form button {
            padding: 12px;
            background-color: #c06817ff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .registration-right form button:hover {
            background-color: #8A5C5C;
        }

        .thank-you-message {
            display: none;
            margin-top: 20px;
            text-align: center;
            color: #6A3F3F;
            font-weight: bold;
        }

        .login-link {
            margin-top: 15px;
            text-align: center;
            font-size: 14px;
        }

        .login-link a {
            color: #6A3F3F;
            text-decoration: underline;
        }
    </style>

    <div class="registration-section">
        <div class="registration-left">
            <h1><i class="fa-solid fa-gift"></i> Celebrations</h1>
            <p>Join us to create unforgettable moments! Fill out the form to get started.</p>
        </div>

        <div class="registration-right">
            <h2>Create Your Account</h2>

            <!-- Display validation errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('/register') }}" id="registrationForm">
                @csrf

                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Your Name" value="{{ old('name') }}" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Your Email" value="{{ old('email') }}" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Your Password" required>

                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>

                <button type="submit">Register</button>
            </form>

            <div id="thankYouMessage" class="thank-you-message">
                <h3>Thank You for Registering!</h3>
                <p>We're excited to have you.</p>
            </div>

            <p class="login-link">Already registered? <a href="{{ route('login') }}">Login here</a>.</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('registrationForm');
            const thankYouMessage = document.getElementById('thankYouMessage');

            form.addEventListener('submit', function () {
                // Show thank-you message after submit
                thankYouMessage.style.display = 'block';
                form.style.display = 'none';
            });
        });
    </script>

@endsection
