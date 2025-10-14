@extends('layouts.app')

@section('title', 'Our Services')

@section('content')
    <style>
        body {
            background-color: #f4e9dd;
        }

        .services-container {
            max-width: 1200px;
            margin: 60px auto;
            background: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }

        .services-title {
            font-size: 34px;
            font-weight: bolder;
            margin-bottom: 40px;
            color: #ae674e;
            text-align: center;
            font-family: 'Pacifico', cursive;
        }

        .book-now-popup {
            text-align: center;
            margin: 30px 0;
        }

        .book-now-popup a {
            text-decoration: none;
            padding: 12px 30px;
            background: #ae674e;
            color: #fff;
            border-radius: 50px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .book-now-popup a:hover {
            background: #8c4b35;
            transform: scale(1.05);
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .service-card {
            background: #fff6f0;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .service-card .image-container {
            width: 100%;
            height: 180px;
            overflow: hidden;
        }

        .service-card .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .service-card:hover .image-container img {
            transform: scale(1.05);
        }

        .service-card h3 {
            font-size: 20px;
            font-weight: bold;
            color: #ae674e;
            margin: 15px 20px 10px;
            text-align: center;
        }

        .service-card p {
            color: #555;
            font-size: 15px;
            margin: 0 20px 20px;
            text-align: center;
            line-height: 1.5;
        }

        .event-section {
            margin-top: 50px;
        }

        .event-section h2 {
            color: #ae674e;
            font-size: 28px;
            margin-bottom: 30px;
            text-align: center;
            position: relative;
        }

        .event-section h2::after {
            content: '';
            width: 60px;
            height: 3px;
            background: #ae674e;
            display: block;
            margin: 8px auto 0;
            border-radius: 3px;
        }

        @media (max-width: 768px) {
            .services-container {
                padding: 30px 20px;
            }

            .book-now-popup a {
                padding: 10px 25px;
            }
        }
    </style>

    <div class="services-container">
        <h1 class="services-title">Our Services</h1>

        <div class="book-now-popup">
            <a href="{{ url('book') }}">Book Now</a>
        </div>

        <!-- Weddings Section -->
        <section class="event-section">
            <h2>Weddings</h2>
            <div class="services-grid">
                <div class="service-card">
                    <div class="image-container">
                        <img src="images/wedding-ceremony.jpg" alt="Wedding Ceremony">
                    </div>
                    <h3>Wedding Ceremonies</h3>
                    <p>Celebrate love with beautifully crafted wedding ceremonies.</p>
                </div>
                <div class="service-card">
                    <div class="image-container">
                        <img src="images/wedding-reception.jpg" alt="Wedding Receptions">
                    </div>
                    <h3>Wedding Receptions</h3>
                    <p>Host grand receptions with stunning decor and themes.</p>
                </div>
                <div class="service-card">
                    <div class="image-container">
                        <img src="images/destination-wedding.avif" alt="Destination Weddings">
                    </div>
                    <h3>Destination Weddings</h3>
                    <p>Plan your dream wedding in the most picturesque locations.</p>
                </div>
            </div>
        </section>

        <!-- Birthdays Section -->
        <section class="event-section">
            <h2>Birthdays</h2>
            <div class="services-grid">
                <div class="service-card">
                    <div class="image-container">
                        <img src="images/kids-party.png" alt="Kids' Birthday Party">
                    </div>
                    <h3>Kids' Parties</h3>
                    <p>Fun-filled birthday parties with exciting games and themes.</p>
                </div>
                <div class="service-card">
                    <div class="image-container">
                        <img src="images/teen-party.jpeg" alt="Teen Birthday Party">
                    </div>
                    <h3>Teen Parties</h3>
                    <p>Stylish and memorable celebrations for teens.</p>
                </div>
                <div class="service-card">
                    <div class="image-container">
                        <img src="images/adult-party.jpg" alt="Adult Birthday Party">
                    </div>
                    <h3>Adult Parties</h3>
                    <p>Elegant and sophisticated birthday celebrations for adults.</p>
                </div>
            </div>
        </section>

        <!-- Corporate Section -->
        <section class="event-section">
            <h2>Corporate Events</h2>
            <div class="services-grid">
                <div class="service-card">
                    <div class="image-container">
                        <img src="images/team-building.jpg" alt="Team Building">
                    </div>
                    <h3>Team Building</h3>
                    <p>Foster team spirit with engaging activities and workshops.</p>
                </div>
                <div class="service-card">
                    <div class="image-container">
                        <img src="images/product-launch.jpg" alt="Product Launch">
                    </div>
                    <h3>Product Launch</h3>
                    <p>Introduce your product in style with grand launch events.</p>
                </div>
                <div class="service-card">
                    <div class="image-container">
                        <img src="images/conference.jpg" alt="Conferences">
                    </div>
                    <h3>Conferences</h3>
                    <p>Host professional conferences with expert arrangements.</p>
                </div>
            </div>
        </section>
    </div>
@endsection
