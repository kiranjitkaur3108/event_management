@extends('layouts.app')

@section('title', 'Wedding Receptions')

@section('content')
<style>
    body{background-color:#f4e9dd;}
    .detail-container{max-width:1100px;margin:60px auto;background:#ffffff;padding:36px;border-radius:12px;box-shadow:0 6px 20px rgba(0,0,0,0.15);}
    .detail-title{font-family:'Pacifico',cursive;color:#ae674e;font-size:34px;font-weight:700;text-align:center;margin-bottom:10px;}
    .detail-lead{color:#555;text-align:center;margin-bottom:22px;}
    .split{display:grid;grid-template-columns:1fr 360px;gap:22px;}
    .detail-card{background:#fff6f0;padding:20px;border-radius:10px;}
    .section-title{color:#ae674e;font-size:20px;margin-bottom:12px;}
    ul.features{padding-left:20px;color:#444;line-height:1.7;}
    .price-box{background:#fff6f0;padding:18px;border-radius:8px;text-align:center;}
    .price-amount{font-size:22px;color:#ae674e;font-weight:700;margin-bottom:6px;}
    .btn-book{display:inline-block;margin-top:14px;padding:10px 20px;background:#ae674e;color:#fff;border-radius:8px;text-decoration:none;}
    .hero-img{width:100%;height:260px;object-fit:cover;border-radius:8px;margin-bottom:16px;}
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
    <div>
       
        <h1 class="detail-title">Wedding Receptions</h1>
        <p class="detail-lead">Grand or intimate — we design receptions that reflect your style, with stage décor, lighting, entertainment and culinary experiences tailored to your vision.</p>
    </div>

    <div class="split">
        <div>
            <h3 class="section-title">What we design for receptions</h3>
            <p>From stage themes to guest-flow and live entertainment planning, the reception is where your celebration comes alive. We manage every detail so you can celebrate stress-free.</p>

            <h3 class="section-title">Highlights</h3>
            <ul class="features">
                <li>Theme & stage design (classic, modern, cultural)</li>
                <li>Menu curation with tasting & catering coordination</li>
                <li>Entertainment booking (bands, DJs, performers)</li>
                <li>Lighting design & projection mapping</li>
                <li>Guest seating, VIP handling & timeline management</li>
            </ul>

            <h3 class="section-title">Extras available</h3>
            <ul class="features">
                <li>Live photo booth</li>
                <li>Custom fireworks or confetti moments</li>
                <li>Luxury transport for couple & VIP guests</li>
            </ul>
        </div>

        <aside class="detail-card">
            <h4 class="section-title">Price</h4>
            <div class="price-box">
                <div class="price-amount">Starting at $3,000</div>
                <div>Reception Essentials Package</div>
                <small>Premium and bespoke packages available.</small>
            </div>

            <h4 class="section-title" style="margin-top:16px;">Capacity & timing</h4>
            <p style="color:#444;line-height:1.6;">Designed for events from 50 to 500+ guests. Typical setup and event time: 6–10 hours (including setup & teardown).</p>

            <div style="text-align: center; margin-top: 30px;">
    <a href="{{ route('book.details', ['serviceName' => urlencode('Wedding receptions'), 'charges' => 3000]) }}" class="book-btn">
        Book Now
    </a>
</div>

        </aside>
    </div>
</div>
@endsection