@extends('layouts.app')

@section('title', 'Book Event')

@section('content')
    <style>
        body {
            background-color: #f4e9dd;
        }

        .book-container {
            max-width: 1100px;
            margin: 60px auto;
            background: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .book-title {
            font-size: 32px;
            font-weight: bolder;
            margin-bottom: 35px;
            color: #ae674e;
            text-align: center;
        }

        .event-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .event-item {
            background: #fff6f0;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .event-item:hover {
            transform: translateY(-5px);
        }

        .event-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 3px solid #ae674e;
        }

        .event-details {
            padding: 20px;
            text-align: center;
        }

        .event-details h4 {
            color: #333;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .event-details p {
            color: #555;
            font-size: 15px;
            margin-bottom: 8px;
        }

        .event-details .book-btn {
            background-color: #ae674e;
            color: #fff;
            border: none;
            padding: 8px 18px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .event-details .book-btn:hover {
            background-color: #8e513d;
        }
    </style>

    <div class="book-container">
        <h1 class="book-title">Choose Your Event</h1>

        <div class="event-grid">

            <div class="event-item">
                <img src="{{ asset('images/wedding-ceremony.jpg') }}" alt="Wedding Event">
                <div class="event-details">
                    <h4>Wedding</h4>
                    <p>Celebrate your special day in elegance and style.</p>
                    <p><strong>Charges:</strong> $200/hour</p>
                    <a href="#" class="book-btn">Book Now</a>
                </div>
            </div>

            <div class="event-item">
                <img src="{{ asset('images/birthday.jpg') }}" alt="Birthday Event">
                <div class="event-details">
                    <h4>Birthday</h4>
                    <p>Make your birthday unforgettable with creative themes.</p>
                    <p><strong>Charges:</strong> $100/hour</p>
                    <a href="#" class="book-btn">Book Now</a>
                </div>
            </div>

            <div class="event-item">
                <img src="{{ asset('images/conference.jpg') }}" alt="Corporate Event">
                <div class="event-details">
                    <h4>Corporate</h4>
                    <p>Host professional conferences and meetings effortlessly.</p>
                    <p><strong>Charges:</strong> $300/hour</p>
                    <a href="#" class="book-btn">Book Now</a>
                </div>
            </div>

            <div class="event-item">
                <img src="{{ asset('images/anniversary.jpg') }}" alt="Anniversary Event">
                <div class="event-details">
                    <h4>Anniversary</h4>
                    <p>Celebrate your love and milestones beautifully.</p>
                    <p><strong>Charges:</strong> $150/hour</p>
                    <a href="#" class="book-btn">Book Now</a>
                </div>
            </div>

            <div class="event-item">
                <img src="{{ asset('images/baby-shower.jpg') }}" alt="Baby Shower Event">
                <div class="event-details">
                    <h4>Baby Shower</h4>
                    <p>Welcome your little one in warmth and joy.</p>
                    <p><strong>Charges:</strong> $120/hour</p>
                    <a href="#" class="book-btn">Book Now</a>
                </div>
            </div>

            <div class="event-item">
                <img src="{{ asset('images/festival.jpg') }}" alt="Festival Event">
                <div class="event-details">
                    <h4>Festival</h4>
                    <p>Bring your community together with vibrant celebrations.</p>
                    <p><strong>Charges:</strong> $250/hour</p>
                    <a href="#" class="book-btn">Book Now</a>
                </div>
            </div>

        </div>
    </div>
@endsection
