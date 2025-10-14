@extends('layouts.app')

@section('title', 'Feedback')

@section('content')
    <style>
        body {
            background-color: #f4e9dd;
        }

        .feedback-container {
            max-width: 700px;
            margin: 60px auto;
            background: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            text-align: center;
        }

        .feedback-icon {
            width: 80px;
            margin-bottom: 15px;
        }

        .feedback-title {
            font-size: 30px;
            font-weight: bolder;
            margin-bottom: 25px;
            color: #ae674e;
        }

        .feedback-textarea {
            width: 100%;
            height: 140px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            resize: vertical;
            font-size: 15px;
        }

        .feedback-inputs {
            display: flex;
            gap: 12px;
            margin-top: 15px;
        }

        .feedback-name, .feedback-email {
            flex: 1;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        .feedback-rating {
            margin-top: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: flex-start;
        }


        /*.feedback-rating label {*/
        /*    font-size: 20px;*/
        /*    font-weight: bold;*/
        /*    white-space: nowrap;*/
        /*    color: #ae674e;*/
        /*}*/

        .feedback-rating select {
            padding: 8px;
            border: 1px solid #b5b5b5;
            border-radius: 6px;
            color: #555;
            background-color: #f8f8f8;
            font-weight: normal;
            width: 630px;
            cursor: pointer;
        }

        .feedback-submit {
            margin-top: 25px;
            padding: 12px 30px;
            border: none;
            border-radius: 6px;
            background: #ae674e;
            color: white;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
        }

        .feedback-submit:hover {
            background: #8f523d;
        }
    </style>

    <div class="feedback-container">
        <img src="{{ asset('images/envelop2.png') }}" alt="Envelope Icon" class="feedback-icon">
        <h1 class="feedback-title">We Value Your Feedback!</h1>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="feedback-form" action="{{ route('feedback.submit') }}" method="POST">
            @csrf

            <textarea name="message" class="feedback-textarea" placeholder="Your feedback..." required autofocus>{{ old('message') }}</textarea>
            <div class="feedback-rating">
{{--                <label>Ratings:</label>--}}
                <select name="rating" required>
                    <option value="" disabled hidden {{ old('rating') ? '' : 'selected' }}>Select Rating</option>
                    <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐</option>
                    <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>⭐⭐⭐⭐</option>
                    <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>⭐⭐⭐</option>
                    <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>⭐⭐</option>
                    <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>⭐</option>
                </select>
            </div>
            <div class="feedback-inputs">
                <input type="text" name="name" class="feedback-name" placeholder="Name" value="{{ old('name') }}" required>
                <input type="email" name="email" class="feedback-email" placeholder="Email" value="{{ old('email') }}" required>
            </div>

            <button type="submit" class="feedback-submit">Send</button>
        </form>
    </div>
@endsection
