@extends('layouts.app')

@section('title', 'Kids Parties')

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
    <h1 class="detail-title">Kids' Parties</h1>
    <p class="detail-lead">Fun, safe and themed parties for children — games, entertainers, kid-friendly menus and parent-friendly coordination.</p>

    <div class="grid">
        <div>
            <h3 class="section-title">What we plan</h3>
            <p>From themed décor to age-appropriate entertainment, we design parties that keep children engaged and parents relaxed.</p>

            <h3 class="section-title">Activities & options</h3>
            <ul class="features">
                <li>Interactive game stations and craft corners</li>
                <li>Clowns, magicians, face painters, balloon artists</li>
                <li>Kid-safe catering and allergy-aware menus</li>
                <li>Photo zone, goody-bags & activity kits</li>
            </ul>

            <h3 class="section-title">Safety & logistics</h3>
            <ul class="features">
                <li>Child-safe décor and furniture</li>
                <li>First-aid kit and trained staff on-site</li>
                <li>Clear pickup/drop-off instructions for parents</li>
            </ul>
        </div>

        <aside class="card">
            <h4 class="section-title">Price</h4>
            <div class="price-box">
                <div style="font-weight:700;color:#ae674e;">Starting at $350</div>
                <small>Includes entertainer, basic décor, and snacks (up to 20 kids).</small>
            </div>

            <h4 class="section-title" style="margin-top:12px;">Add-ons</h4>
            <ul class="features">
                <li>Premium entertainment</li>
                <li>Custom cake & themed photo booth</li>
            </ul>

            <div style="text-align: center; margin-top: 30px;">
    <a href="{{ route('book.details', ['serviceName' => urlencode('kida party'), 'charges' => 350]) }}" class="book-btn">
        Book Now
    </a>
</div>

        </aside>
    </div>
</div>
@endsection