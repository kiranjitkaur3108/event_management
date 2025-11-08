@extends('layouts.app')

@section('title', 'Product Launch')

@section('content')
<style>
    body{background-color:#f4e9dd;}
    .detail-container{max-width:1100px;margin:60px auto;background:#ffffff;padding:36px;border-radius:12px;box-shadow:0 6px 20px rgba(0,0,0,0.15);}
   .detail-title{font-family:'Pacifico',cursive;color:#ae674e;font-size:34px;font-weight:700;text-align:center;margin-bottom:10px;}
    .detail-lead{text-align:center;color:#555;margin-bottom:18px;}
    .grid{display:grid;grid-template-columns:1fr 360px;gap:20px;}
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
    <h1 class="detail-title">Product Launch Events</h1>
    <p class="detail-lead">Create buzz and media interest with a launch event that showcases your product to the right audience and press.</p>

    <div class="grid">
        <div>
            <h3 class="section-title">What we handle</h3>
            <ul class="features">
                <li>Event concept & brand alignment</li>
                <li>Press & influencer invitations and RSVP management</li>
                <li>Presentation & demo area setup</li>
                <li>AV, staging and technical rehearsals</li>
            </ul>

            <h3 class="section-title">Deliverables</h3>
            <ul class="features">
                <li>Run-of-show and rehearsal coordination</li>
                <li>Guest RTM and VIP briefings</li>
                <li>Media kits & press management support</li>
            </ul>
        </div>

        <aside class="card">
            <h4 class="section-title">Price</h4>
            <div class="price-box">
                <div style="font-weight:700;color:#ae674e;">From $2,500</div>
                <small>Depends on scale, media reach and production complexity.</small>
            </div>

            <h4 class="section-title" style="margin-top:12px;">Ideal for</h4>
            <p style="color:#444;line-height:1.6;">Startups launching a prototype, mid-size firms unveiling new lines, or premium brands staging flagship reveals.</p>

            <div style="text-align: center; margin-top: 30px;">
    <a href="{{ route('book.details', ['serviceName' => urlencode('product launch'), 'charges' => 2500]) }}" class="book-btn">
        Book Now
    </a>
</div>

        </aside>
    </div>
</div>
@endsection