@extends('layouts.app')

@section('title', 'Register | Celebrations')

@section('content')
    <style>
        /* === Page Background === */
        body {
            background-color: #f4e9dd;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* === Main Section === */
        .registration-section {
            padding: 60px 20px;
            border-radius: 10px;
            margin: 40px auto;
            max-width: 900px;
            display: flex;
            flex-wrap: wrap;
            background-color: #ffffff;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        /* === Left Panel === */
        .registration-left {
            flex: 1 1 40%;
            padding: 30px;
            color: #fff;
            background-color: #ae674e;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            border-radius: 10px 0 0 10px;
        }

        .registration-left h1 {
            font-family: 'Pacifico', cursive;
            font-size: 36px;
            margin-bottom: 15px;
            color: #fff;
        }

        .registration-left p {
            font-size: 16px;
            color: #fff;
        }

        /* === Right Panel === */
        .registration-right {
            flex: 1 1 60%;
            padding: 30px 40px;
            background-color: #fff;
            border-radius: 0 10px 10px 0;
        }

        .registration-right h2 {
            color: #ae674e;
            font-weight: bold;
            margin-bottom: 25px;
            text-align: center;
        }

        /* === Form Styling === */
        .registration-right form {
            display: flex;
            flex-direction: column;
        }

        .registration-right form label {
            margin-bottom: 6px;
            font-weight: 600;
            color: #ae674e;
        }

        .registration-right form input {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #d8c1b4;
            font-size: 14px;
            transition: border-color 0.2s ease-in-out, box-shadow 0.2s;
        }

        .registration-right form input:focus {
            border-color: #ae674e;
            box-shadow: 0 0 5px rgba(174, 103, 78, 0.3);
        }

        /* === Buttons === */
        .registration-right form button {
            padding: 12px;
            background-color: #ae674e;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .registration-right form button:hover {
            background-color: #8f523d;
        }

        /* === Thank You Message === */
        .thank-you-message {
            display: none;
            margin-top: 20px;
            text-align: center;
            color: #ae674e;
            font-weight: bold;
        }

        /* === Login Link === */
        .login-link {
            margin-top: 15px;
            text-align: center;
            font-size: 14px;
            color: #5c4033;
        }

        .login-link a {
            color: #ae674e;
            text-decoration: underline;
            font-weight: 600;
        }

        .login-link a:hover {
            color: #8f523d;
        }


        @media (max-width: 768px) {
            .registration-section {
                flex-direction: column;
            }
            .registration-left, .registration-right {
                border-radius: 10px;
            }
        }
    </style>

    <div class="registration-section">
        <div class="registration-left">
            <h1><i class="fa-solid fa-gift"></i> Celebrations</h1>
            <p>Join us to create unforgettable moments! Fill out the form to get started.</p>
        </div>

        <div class="registration-right">
            <h2>Create Your Account</h2>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ url('/register') }}" id="registrationForm">
                @csrf
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Your Name" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Your Email" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Your Password" required>

                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>

                <button type="submit">Register</button>
            </form>

            <div id="thankYouMessage" class="thank-you-message">
                <h3>Thank You for Registering!</h3>
                <p>We're excited to have you!</p>
            </div>

            <p class="login-link">Already registered? <a href="{{ route('login') }}">Login here</a>.</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('registrationForm');
            const thankYouMessage = document.getElementById('thankYouMessage');
            form.addEventListener('submit', function () {
                thankYouMessage.style.display = 'block';
                form.style.display = 'none';
            });
        });
    </script>
@endsection
