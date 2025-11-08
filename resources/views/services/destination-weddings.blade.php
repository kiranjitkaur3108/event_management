@extends('layouts.app')

@section('title', 'Destination Weddings')

@section('content')
<style>
    body{background-color:#f4e9dd;}
    .detail-container{max-width:1100px;margin:60px auto;background:#ffffff;padding:36px;border-radius:12px;box-shadow:0 6px 20px rgba(0,0,0,0.15);}
    .detail-title{font-family:'Pacifico',cursive;color:#ae674e;font-size:34px;font-weight:700;text-align:center;margin-bottom:10px;}
    .detail-lead{text-align:center;color:#555;margin-bottom:20px;}
    .split{display:grid;grid-template-columns:1fr 360px;gap:22px;}
    .detail-card{background:#fff6f0;padding:20px;border-radius:10px;}
    .section-title{color:#ae674e;font-size:20px;margin-bottom:12px;}
    ul.features{padding-left:20px;color:#444;line-height:1.7;}
    .price-box{background:#fff6f0;padding:18px;border-radius:8px;text-align:center;}
    .price-amount{font-size:20px;color:#ae674e;font-weight:700;margin-bottom:6px;}
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

    .btn-book{display:inline-block;margin-top:14px;padding:10px 20px;background:#ae674e;color:#fff;border-radius:8px;text-decoration:none;}
    .hero-img{width:100%;height:260px;object-fit:cover;border-radius:8px;margin-bottom:16px;}
</style>

<div class="detail-container">
   
    <h1 class="detail-title">Destination Weddings</h1>
    <p class="detail-lead">Full-service planning for weddings in scenic locales — from vendor scouting to guest travel and on-site logistics. We make destination weddings effortless and unforgettable.</p>

    <div class="split">
        <div>
            <h3 class="section-title">What this covers</h3>
            <p>We manage location scouting, vendor negotiation, guest travel packages, accommodation, local permits and on-site coordination so you get a seamless experience far from home.</p>

            <h3 class="section-title">Core Services</h3>
            <ul class="features">
                <li>Venue & vendor scouting (local partners)</li>
                <li>Guest travel and accommodation blocks</li>
                <li>Legal & customs guidance for international weddings</li>
                <li>On-site coordination and multilingual staff (if needed)</li>
            </ul>

            <h3 class="section-title">Ideal for</h3>
            <ul class="features">
                <li>Couples wanting a scenic or exotic wedding</li>
                <li>Small destination elopements to large resort weddings</li>
            </ul>
        </div>

        <aside class="detail-card">
            <h4 class="section-title">Price</h4>
            <div class="price-box">
                <div class="price-amount">Starting at $6,000</div>
                <div>Basic Destination Package (local partners)</div>
                <small>Price varies by country, travel, and guest logistics.</small>
            </div>

            <h4 class="section-title" style="margin-top:16px;">Planning timeline</h4>
            <p style="color:#444;line-height:1.6;">Recommend 6–12 months planning depending on destination and legal requirements.</p>

            <div style="text-align: center; margin-top: 30px;">
    <a href="{{ route('book.details', ['serviceName' => urlencode('destination wedding'), 'charges' => 6000]) }}" class="book-btn">
        Book Now
    </a>
</div>

        </aside>
    </div>
</div>
@endsection