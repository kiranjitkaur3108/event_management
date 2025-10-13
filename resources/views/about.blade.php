@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <style>
        body {
            background-color: #f4e9dd;
        }

        .about-container {
            max-width: 900px;
            margin: 60px auto;
            background: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }

        .section-accent-line {
            height: 6px;
            background: #ae674e;
            width: 100%;
            margin-bottom: 20px;
        }

        h2.section-title {
            font-size: 30px;
            font-weight: bolder;
            color: #ae674e;
            margin-bottom: 20px;
        }

        .lead-muted {
            color: #333;
            font-weight: normal;
            font-size: 16px;
            line-height: 1.8;
        }

        .img-rounded-shadow {
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            transition: transform .25s ease, box-shadow .25s ease;
            object-fit: cover;
            width: 100%;
            max-height: 280px;
        }

        .img-rounded-shadow:hover {
            transform: scale(1.03);
            box-shadow: 0 12px 30px rgba(0,0,0,0.2);
        }

        @media (max-width: 768px) {
            .about-container { margin: 40px 20px; padding: 30px; }
        }
    </style>

    <div class="about-container">

        <section class="mb-4">
            <div class="card border-0 p-0">
                <div class="section-accent-line"></div>
                <div class="row align-items-center g-4 py-3">
                    <div class="col-lg-8">
                        <h2 class="section-title">About Us</h2>
                        <p class="lead-muted">
                            We are professional event planners specializing in weddings, corporate events, and parties. We pride ourselves on assisting you with your event from start to finish so everything runs smoothly.
                        </p>
                        <p class="lead-muted">
                            Over the last decade, we have worked with hundreds of clients, specializing in weddings but also offering other events like birthdays, bridal showers, and baby showers. Contact us today to plan your special event!
                        </p>
                    </div>
                    <div class="col-lg-4 text-lg-center text-start">
                        <img src="{{ asset('images/planning.jpg') }}" alt="Event Planning" class="img-fluid img-rounded-shadow">
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-4">
            <div class="card border-0 p-0">
                <div class="section-accent-line"></div>
                <div class="row align-items-center g-4 py-3">
                    <div class="col-md-7">
                        <h2 class="section-title">Our Team</h2>
                        <p class="lead-muted">
                            Our team consists of passionate, experienced professionals dedicated to making every event unique and memorable. From creative designers to meticulous coordinators, we bring expertise and enthusiasm to ensure your celebration is perfect. We focus on attention to detail, strong vendor relationships, and a personalized approach to make every moment unforgettable.
                        </p>
                    </div>
                    <div class="col-md-5 text-center">
                        <img src="{{ asset('images/event.planning.jpg') }}" alt="Our Team" class="img-fluid img-rounded-shadow">
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
