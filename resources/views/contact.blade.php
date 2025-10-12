@extends('layouts.app')

@section('title', 'Contact Us')

@section('styles')
    <style>
        body {
            background-color: #ede1da;
        }
        .bg-contact-header {
            background-color: #b88f7f;
            color: #fff;
            border-top-left-radius: .75rem;
            border-top-right-radius: .75rem;
        }
        .contact-header {
            font-family: 'Pacifico', 'cursive';
            font-style: italic;
            font-size: 2rem;
            font-weight: 400;
            color: #fff;
        }
        .contact-subtitle {
            font-size: 1rem;
            font-weight: 400;
        }

        .contact-info-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            color: #b88f7f;
            font-weight: 500;
        }
        .contact-icon {
            font-size: 1.2rem;
            margin-right: 0.75rem;
        }

        .input-field {
            width: 100%;
            padding: 0.6rem 1rem;
            border: 1px solid #ccc;
            border-radius: .5rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        .input-field:focus {
            outline: none;
            border-color: #b88f7f;
            box-shadow: 0 0 5px rgba(184, 143, 127, 0.5);
        }

        .send-btn {
            background-color: #b88f7f;
            color: #fff;
            padding: 0.6rem 1.2rem;
            border: none;
            border-radius: .5rem;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .send-btn:hover {
            background-color: #a7766a;
        }

        /* Responsive adjustments */
        @media (max-width: 767.98px) {
            .contact-info-item {
                font-size: 0.9rem;
            }
            .contact-header {
                font-size: 1.6rem;

            }
        }
    </style>
@endsection

@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-100 p-3">
        <div class="w-100" style="max-width: 36rem;">
            <div class="bg-white rounded-3 shadow-sm">

                <!-- Header -->
                <div class="bg-contact-header p-5 text-center">
                    <h1 class="contact-header">Contact Us</h1>
                    <p class="contact-subtitle mt-2">Let us help you with your queries and ideas!</p>
                </div>

                <!-- Body -->
                <div class="p-4">
                    <div class="row g-4">
                        <!-- Contact Info -->
                        <div class="col-md-6">
                            <div class="bg-light p-4 rounded-3 h-100">
                                <h2 class="section-title mb-4" style="color:#b88f7f;">Get in Touch</h2>

                                <div class="contact-info-item">
                                    <i class="fas fa-phone contact-icon"></i>
                                    <span>+1 (123) 456-7890</span>
                                </div>

                                <div class="contact-info-item">
                                    <i class="fas fa-envelope contact-icon"></i>
                                    <span>info@celebration.com</span>
                                </div>

                                <div class="contact-info-item">
                                    <i class="fas fa-map-marker-alt contact-icon"></i>
                                    <span>456 Avenue Road,<br>Cityville, USA</span>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Form -->
                        <div class="col-md-6">
                            <div class="bg-white p-4 rounded-3 h-100">
                                <h2 class="section-title mb-4" style="color:#b88f7f;">Send Us a Message</h2>

                                @if(session('success'))
                                    <div class="alert alert-success mb-4">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('contact.submit') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" name="name" placeholder="Your Name" class="input-field" required />
                                    </div>

                                    <div class="mb-3">
                                        <input type="email" name="email" placeholder="Your Email" class="input-field" required />
                                    </div>

                                    <div class="mb-3">
                                        <textarea name="message" placeholder="Your Message" rows="4" class="input-field" required></textarea>
                                    </div>

                                    <button type="submit" class="send-btn">Send Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
