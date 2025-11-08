@extends('layouts.app')

@section('title', 'Wedding Ceremonies')

@section('content')
<style>
    body { background-color: #f4e9dd; }
    .detail-container {
        max-width: 1100px; margin: 60px auto; background:#ffffff; padding:36px; border-radius:12px;
        box-shadow:0 6px 20px rgba(0,0,0,0.15);
    }
    .detail-hero { text-align:center; margin-bottom:24px; }
    .detail-title { font-family: 'Pacifico', cursive; color:#ae674e; font-size:34px; font-weight:700; margin-bottom:8px; }
    .detail-lead { color:#555; font-size:16px; margin-bottom:20px; }
    .detail-grid { display: grid; grid-template-columns: 1fr 340px; gap: 24px; align-items:start; }
    .detail-card { background:#fff6f0; padding:20px; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.08); }
    .section-title { color:#ae674e; font-size:20px; margin-bottom:12px; }
    ul.features { list-style: disc; padding-left:20px; color:#444; line-height:1.7; }
    .price-box { background:#fff6f0; padding:18px; border-radius:8px; text-align:center; }
    .price-amount { font-size:22px; color:#ae674e; font-weight:700; margin-bottom:6px; }
    .btn-book { display:inline-block; margin-top:14px; padding:10px 20px; background:#ae674e; color:#fff; border-radius:8px; text-decoration:none; }
    .hero-img { width:100%; height:260px; object-fit:cover; border-radius:8px; margin-bottom:16px; }
    .book-btn {
    display: inline-block;
    padding: 12px 28px;
    background-color: #ae674e;
    color: #fff;
    font-weight: bold;
    border-radius: 30px;
    text-decoration: none;
    font-size: 16px;
    transition: all 0.3s ease;
}

.book-btn:hover {
    background-color: #8e513d;
    transform: scale(1.05);
}

</style>

<div class="detail-container">
    <div class="detail-hero">
        <h1 class="detail-title">Wedding Ceremonies</h1>
        <p class="detail-lead">Elegant, culturally-aware ceremony planning — from intimate mandaps to full-scale stage productions. We handle rituals, timing, décor and logistics so you enjoy every moment.</p>
    </div>

    <div class="detail-grid">
        <div>
            <h3 class="section-title">What is a Wedding Ceremony service?</h3>
            <p>Complete ceremony planning covering venue layout, ritual setup, vendor coordination, timing, and guest flow. We make sure every religious or cultural custom is respected and executed with care.</p>

            <h3 class="section-title">Key Features</h3>
            <ul class="features">
                <li>Custom mandap/stage design & thematic décor</li>
                <li>Professional officiant & ritual coordination (if required)</li>
                <li>Sound, lighting & live-music coordination</li>
                <li>Seating plan, ushering, and guest assistance</li>
                <li>On-the-day coordinator to manage schedule & vendors</li>
            </ul>

            <h3 class="section-title">What we include</h3>
            <ul class="features">
                <li>Site survey & layout plan</li>
                <li>Complete décor setup & teardown</li>
                <li>Vendor communication and confirmations</li>
                <li>Emergency kit and contingency planning</li>
            </ul>
        </div>

        <aside class="detail-card">
            <h4 class="section-title">Price</h4>
            <div class="price-box">
                <div class="price-amount">Starting at $2,500</div>
                <div>Standard Ceremony Package</div>
                <small>Custom packages available for guest counts, luxury décor, and destination ceremonies.</small>
            </div>

            <h4 class="section-title" style="margin-top:18px;">Timing & Guests</h4>
            <p style="color:#444; line-height:1.6;">Typical services: 2–5 hours on-site. Pricing varies by guest count, venue access, and custom requests.</p>

            <div style="text-align: center; margin-top: 30px;">
    <a href="{{ route('book.details', ['serviceName' => urlencode('Wedding Ceremonies'), 'charges' => 2500]) }}" class="book-btn">
        Book Now
    </a>
</div>

        </aside>
    </div>
</div>
@endsection