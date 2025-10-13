@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <style>
        body {
            background-color: #f4e9dd;
        }

        .contact-container {
            max-width: 900px;
            margin: 60px auto;
            background: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }

        .contact-title {
            font-size: 30px;
            font-weight: bolder;
            margin-bottom: 35px;
            color: #ae674e;
            text-align: center;
        }

        .contact-row {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            justify-content: space-between;
        }

        .contact-info {
            flex: 1;
            min-width: 300px;
            font-size: 16px;
            color: #333;
            line-height: 1.8;
        }

        .contact-info p {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .contact-info i {
            color: #ae674e;
            font-size: 20px;
            margin-right: 12px;
        }

        .contact-form {
            flex: 1;
            min-width: 300px;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            margin-bottom: 15px;
        }

        .contact-submit {
            padding: 12px 30px;
            border: none;
            border-radius: 6px;
            background: #ae674e;
            color: white;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }

        .contact-submit:hover {
            background: #8f523d;
        }

        @media (max-width: 768px) {
            .contact-row {
                flex-direction: column;
            }
        }
    </style>

    <div class="contact-container">
        <h1 class="contact-title">Get in Touch With Us</h1>

        <div class="contact-row">

            <div class="contact-info">
                <p><i class="fas fa-phone"></i> +1 (123) 456-7890</p>
                <p><i class="fas fa-envelope"></i> info@celebration.com</p>
                <p><i class="fas fa-map-marker-alt"></i> 456 Avenue Road, Cityville, USA</p>
            </div>


            <div class="contact-form">
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

                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Your Name" value="{{ old('name') }}" required>
                    <input type="email" name="email" placeholder="Your Email" value="{{ old('email') }}" required>
                    <textarea name="message" placeholder="Your Message" rows="4" required>{{ old('message') }}</textarea>
                    <button type="submit" class="contact-submit">Send Message</button>
                </form>
            </div>
        </div>
    </div>
@endsection
