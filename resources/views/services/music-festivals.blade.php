@extends('layouts.app')

@section('title', 'Music Festivals')

@section('content')
<style>
    body{background-color:#f4e9dd;}
    .detail-container{max-width:1200px;margin:60px auto;background:#ffffff;padding:36px;border-radius:12px;box-shadow:0 6px 20px rgba(0,0,0,0.15);}
    .detail-title{font-family:'Pacifico',cursive;color:#ae674e;font-size:34px;font-weight:700;text-align:center;margin-bottom:10px;}
    .detail-lead{text-align:center;color:#555;margin-bottom:18px;}
    .grid{display:grid;grid-template-columns:1fr 380px;gap:22px;}
    .card{background:#fff6f0;padding:18px;border-radius:10px;}
    .section-title{color:#ae674e;font-size:18px;margin-bottom:10px;}
    ul.features{padding-left:20px;color:#444;line-height:1.7;}
    .price-box{background:#fff6f0;padding:14px;border-radius:8px;text-align:center;}
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
</style>

<div class="detail-container">
    <h1 class="detail-title">Music Festivals</h1>
    <p class="detail-lead">Large scale music events — artist bookings, production, stage & site logistics, security and audience experience designed end-to-end.</p>

    <div class="grid">
        <div>
            <h3 class="section-title">Production services</h3>
            <ul class="features">
                <li>Stage & rigging, sound & lighting production</li>
                <li>Artist bookings & rider coordination</li>
                <li>Ticketing, entry, and crowd management</li>
                <li>Sponsor activation and on-site branding</li>
            </ul>

            <h3 class="section-title">Safety & compliance</h3>
            <ul class="features">
                <li>Permits, on-site medical, and vetted security</li>
            </ul>
        </div>

        <aside class="card">
            <h4 class="section-title">Price</h4>
            <div class="price-box">
                <div style="font-weight:700;color:#ae674e;">$10000</div>
            </div>
<div style="text-align: center; margin-top: 30px;">
    <a href="{{ route('book.details', ['serviceName' => urlencode('music festivals'), 'charges' => 10000]) }}" class="book-btn">
        Book Now
    </a>
</div>

           
        </aside>
    </div>
</div>
@endsection