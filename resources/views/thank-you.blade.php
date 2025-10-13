@extends('layouts.app')

@section('title', 'Thank You')

@section('content')
    <style>
        body {
            background-color: #f4e9dd !important;
        }

        .thankyou-container {
            max-width: 600px;
            margin: 80px auto;
            background: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            text-align: center;
        }

        .thankyou-title {
            font-size: 32px;
            font-weight: bold;
            color: #ae674e;
            margin-bottom: 20px;
        }

        .thankyou-message {
            font-size: 16px;
            color: #555;
            margin-bottom: 30px;
        }

        .thankyou-btn {
            background-color: #ae674e;
            color: white;
            font-weight: bold;
            border: none;
            padding: 12px 30px;
            border-radius: 6px;
            text-decoration: none;
            transition: 0.3s;
        }

        .thankyou-btn:hover {
            background-color: #8f523d;
        }
    </style>

    <div class="thankyou-container">
        <h1 class="thankyou-title">🎉 Thank You!</h1>
        <p class="thankyou-message">Your feedback has been submitted successfully.</p>
        <a href="{{ route('home') }}" class="thankyou-btn">Go Back Home</a>
    </div>
@endsection
