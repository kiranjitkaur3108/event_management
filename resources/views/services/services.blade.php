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
        text-align: center;
        text-decoration: none;
        color: inherit;
    }

    .service-card:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 16px rgba(0,0,0,0.2);
    }

    .service-card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }

    .service-card h3 {
        font-size: 20px;
        font-weight: bold;
        color: #ae674e;
        margin: 15px 20px 10px;
    }

    .service-card p {
        color: #555;
        font-size: 15px;
        margin: 0 20px 20px;
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
</style>

<div class="services-container">
    <h1 class="services-title">Our Services</h1>

    <div style="text-align: center; margin-bottom: 30px;">
    <a href="{{ route('user.bookings') }}" 
       style="background-color: #ae674e; color: white; padding: 12px 25px; border-radius: 30px; font-weight: bold; text-decoration: none; transition: background-color 0.3s ease;">
        My Bookings
    </a>
</div>


    <!-- Weddings Section -->
    <section class="event-section">
        <h2>Weddings</h2>
        <div class="services-grid">
            <a href="{{ url('/services/wedding-ceremonies') }}" class="service-card">
                <img src="images/wedding-ceremony.jpg" alt="Wedding Ceremony">
                <h3>Wedding Ceremonies</h3>
                <p>Celebrate love with beautifully crafted wedding ceremonies.</p>
            </a>
            <a href="{{ url('/services/wedding-receptions') }}" class="service-card">
                <img src="images/wedding-reception.jpg" alt="Wedding Receptions">
                <h3>Wedding Receptions</h3>
                <p>Host grand receptions with stunning decor and themes.</p>
            </a>
            <a href="{{ url('/services/destination-weddings') }}" class="service-card">
                <img src="images/destination-wedding.avif" alt="Destination Weddings">
                <h3>Destination Weddings</h3>
                <p>Plan your dream wedding in the most picturesque locations.</p>
            </a>
        </div>
    </section>

    <!-- Birthdays Section -->
    <section class="event-section">
        <h2>Birthdays</h2>
        <div class="services-grid">
            <a href="{{ url('/services/kids-parties') }}" class="service-card">
                <img src="images/kids-party.png" alt="Kids' Birthday Party">
                <h3>Kids' Parties</h3>
                <p>Fun-filled birthday parties with exciting games and themes.</p>
            </a>
            <a href="{{ url('/services/teen-parties') }}" class="service-card">
                <img src="images/teen-party.jpeg" alt="Teen Birthday Party">
                <h3>Teen Parties</h3>
                <p>Stylish and memorable celebrations for teens.</p>
            </a>
            <a href="{{ url('/services/adult-parties') }}" class="service-card">
                <img src="images/adult-party.jpg" alt="Adult Birthday Party">
                <h3>Adult Parties</h3>
                <p>Elegant and sophisticated birthday celebrations for adults.</p>
            </a>
        </div>
    </section>

    <!-- Corporate Section -->
    <section class="event-section">
        <h2>Corporate Events</h2>
        <div class="services-grid">
            <a href="{{ url('/services/team-building') }}" class="service-card">
                <img src="images/team-building.jpg" alt="Team Building">
                <h3>Team Building</h3>
                <p>Foster team spirit with engaging activities and workshops.</p>
            </a>
            <a href="{{ url('/services/product-launch') }}" class="service-card">
                <img src="images/product-launch.jpg" alt="Product Launch">
                <h3>Product Launch</h3>
                <p>Introduce your product in style with grand launch events.</p>
            </a>
            <a href="{{ url('/services/conferences') }}" class="service-card">
                <img src="images/conference.jpg" alt="Conferences">
                <h3>Conferences</h3>
                <p>Host professional conferences with expert arrangements.</p>
            </a>
        </div>
    </section>

    <!-- Anniversary Section -->
    <section class="event-section">
        <h2>Anniversaries</h2>
        <div class="services-grid">
            <a href="{{ url('/services/anniversary-parties') }}" class="service-card">
                <img src="images/anniversary.jpg" alt="Anniversary Celebration">
                <h3>Anniversary Parties</h3>
                <p>Celebrate love and milestones beautifully.</p>
            </a>
            <a href="{{ url('/services/anniversary-dinners') }}" class="service-card">
                <img src="images/anniversary-dinner.jpg" alt="Anniversary Dinners">
                <h3>Anniversary Dinners</h3>
                <p>Intimate dinners for couples to cherish special moments.</p>
            </a>
            <a href="{{ url('/services/surprise-celebrations') }}" class="service-card">
                <img src="images/anniversary-surprise.jpg" alt="Surprise Celebrations">
                <h3>Surprise Celebrations</h3>
                <p>Create unforgettable surprises for your loved ones.</p>
            </a>
        </div>
    </section>

    <!-- Baby Shower Section -->
    <section class="event-section">
        <h2>Baby Showers</h2>
        <div class="services-grid">
            <a href="{{ url('/services/baby-shower-parties') }}" class="service-card">
                <img src="images/baby-shower.jpg" alt="Baby Shower">
                <h3>Baby Shower Parties</h3>
                <p>Welcome your little one in warmth and joy.</p>
            </a>
            <a href="{{ url('/services/gifting-events') }}" class="service-card">
                <img src="images/baby-gift.jpg" alt="Gifting Events">
                <h3>Gifting Events</h3>
                <p>Special gifting moments for the newborn and family.</p>
            </a>
            <a href="{{ url('/services/fun-activities') }}" class="service-card">
                <img src="images/baby-fun.jpg" alt="Fun Activities">
                <h3>Fun Activities</h3>
                <p>Games and activities to celebrate the upcoming arrival.</p>
            </a>
        </div>
    </section>

    <!-- Festivals Section -->
    <section class="event-section">
        <h2>Festivals</h2>
        <div class="services-grid">
            <a href="{{ url('/services/community-festivals') }}" class="service-card">
                <img src="images/festival.jpg" alt="Community Festivals">
                <h3>Community Festivals</h3>
                <p>Bring your community together with vibrant celebrations.</p>
            </a>
            <a href="{{ url('/services/food-festivals') }}" class="service-card">
                <img src="images/festival-food.jpg" alt="Food Festivals">
                <h3>Food Festivals</h3>
                <p>Celebrate cultural flavors with festive food events.</p>
            </a>
            <a href="{{ url('/services/music-festivals') }}" class="service-card">
                <img src="images/festival-music.jpg" alt="Music Festivals">
                <h3>Music Festivals</h3>
                <p>Enjoy lively music and entertainment for all ages.</p>
            </a>
        </div>
    </section>

</div>
@endsection