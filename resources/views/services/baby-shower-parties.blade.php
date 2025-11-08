@extends('layouts.app')

@section('title', 'Baby Shower Parties')

@section('content')
<style>
    body{background-color:#f4e9dd;}
    .detail-container{max-width:1000px;margin:60px auto;background:#ffffff;padding:32px;border-radius:12px;box-shadow:0 6px 20px rgba(0,0,0,0.15);}
    .detail-title{font-family:'Pacifico',cursive;color:#ae674e;font-size:34px;font-weight:700;text-align:center;margin-bottom:10px;}
    .detail-lead{text-align:center;color:#555;margin-bottom:18px;}
    .grid{display:grid;grid-template-columns:1fr 320px;gap:20px;}
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
    <h1 class="detail-title">Baby Shower Parties</h1>
    <p class="detail-lead">Warm, joyful showers with baby-safe décor, games, and curated menus — we create a comfortable celebration for the parents-to-be and guests.</p>

    <div class="grid">
        <div>
            <h3 class="section-title">Typical elements</h3>
            <ul class="features">
                <li>Theme décor (gender neutral or themed)</li>
                <li>Baby shower games & host facilitation</li>
                <li>Delicate menu options and specialty cakes</li>
                <li>Gift table and thank-you notes management</li>
            </ul>

            <h3 class="section-title">Comfort & safety</h3>
            <ul class="features">
                <li>Seating and access considerations for expectant parents</li>
                <li>Allergy-aware catering and gentle entertainment</li>
            </ul>
        </div>

        <aside class="card">
            <h4 class="section-title">Price</h4>
            <div class="price-box">
                <div style="font-weight:700;color:#ae674e;">Starting at $450</div>
                <small>Includes décor, games hosting and light catering for up to 30 guests.</small>
            </div>

            <div style="text-align: center; margin-top: 30px;">
    <a href="{{ route('book.details', ['serviceName' => urlencode('Baby shower'), 'charges' => 450]) }}" class="book-btn">
        Book Now
    </a>
</div>

        </aside>
    </div>
</div>
@endsection