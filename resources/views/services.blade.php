@extends('layouts.app')

@section('title', 'Our Services')

@section('content')
    <style>
        body {
            background-color: #f4e9dd;
        }

        .services-container {
            max-width: 1000px;
            margin: 60px auto;
            background: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }

        .services-title {
            font-size: 30px;
            font-weight: bolder;
            margin-bottom: 35px;
            color: #ae674e;
            text-align: center;
        }

        .service-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .service-item {
            background: #fff6f0;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.2s ease;
        }

        .service-item:hover {
            transform: translateY(-5px);
        }

        .service-item i {
            font-size: 40px;
            color: #ae674e;
            margin-bottom: 15px;
        }

        .service-item h4 {
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .service-item p {
            color: #555;
            font-size: 15px;
        }
    </style>

    <div class="services-container">
        <h1 class="services-title">Our Services</h1>

        <div class="service-list">
            <div class="service-item">
                <i class="fas fa-gem"></i>
                <h4>Wedding Planning</h4>
                <p>Elegant and personalized wedding setups designed to make your big day truly magical.</p>
            </div>
            <div class="service-item">
                <i class="fas fa-briefcase"></i>
                <h4>Corporate Events</h4>
                <p>Professional event coordination for conferences, meetings, and product launches.</p>
            </div>
            <div class="service-item">
                <i class="fas fa-birthday-cake"></i>
                <h4>Birthday Celebrations</h4>
                <p>Creative themes and decorations to make birthdays unforgettable.</p>
            </div>
            <div class="service-item">
                <i class="fas fa-music"></i>
                <h4>Live Events & Concerts</h4>
                <p>Stage, sound, and lighting setup for energetic and engaging live performances.</p>
            </div>
            <div class="service-item">
                <i class="fas fa-glass-cheers"></i>
                <h4>Private Parties</h4>
                <p>Intimate gatherings, anniversaries, and celebrations planned with a personal touch.</p>
            </div>
            <div class="service-item">
                <i class="fas fa-tree"></i>
                <h4>Outdoor Events</h4>
                <p>From garden parties to open-air festivals, we handle logistics and ambiance seamlessly.</p>
            </div>
        </div>
    </div>
@endsection
