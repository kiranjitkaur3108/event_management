@extends('layouts.app')

@section('title', 'Adult Parties')

@section('content')
<style>
    body {
        background-color: #f4e9dd;
    }

    .detail-container {
        max-width: 1100px;
        margin: 60px auto;
        background: #ffffff;
        padding: 36px;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .detail-title {
        font-family: 'Pacifico', cursive;
        color: #ae674e;
        font-size: 34px;
        font-weight: 700;
        text-align: center;
        margin-bottom: 10px;
    }

    .detail-lead {
        text-align: center;
        color: #555;
        margin-bottom: 18px;
    }

    .grid {
        display: grid;
        grid-template-columns: 1fr 360px;
        gap: 20px;
    }

    .card {
        background: #fff6f0;
        padding: 18px;
        border-radius: 10px;
    }

    .section-title {
        color: #ae674e;
        font-size: 18px;
        margin-bottom: 10px;
    }

    ul.features {
        padding-left: 20px;
        color: #444;
        line-height: 1.7;
    }

    .price-box {
        background: #fff6f0;
        padding: 14px;
        border-radius: 8px;
        text-align: center;
    }

    .btn-book {
        display: inline-block;
        margin-top: 14px;
        padding: 10px 20px;
        background: #ae674e;
        color: #fff;
        border-radius: 8px;
        text-decoration: none;
    }
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
    <h1 class="detail-title">Adult Parties</h1>
    <p class="detail-lead">Sophisticated, themed or casual — we design adult celebrations with curated menus, elegant décor, and entertainment to match your vibe.</p>

    <div class="grid">
        <div>
            <h3 class="section-title">Typical formats</h3>
            <p>Birthday dinners, cocktail parties, anniversaries and milestone celebrations with tailored food, beverage and ambiance.</p>

            <h3 class="section-title">What we do</h3>
            <ul class="features">
                <li>Theme design & upscale décor</li>
                <li>Curated menus & beverage pairing</li>
                <li>Live entertainment or DJ</li>
                <li>Table planning & VIP arrangements</li>
            </ul>

            <h3 class="section-title">Extras</h3>
            <ul class="features">
                <li>Signature cocktails</li>
                <li>Private chef or tasting menus</li>
            </ul>
        </div>

        <aside class="card">
            <h4 class="section-title">Price</h4>
            <div class="price-box">
                <div style="font-weight:700;color:#ae674e;">Starting at $900</div>
                <small>Price varies by menu selection and guest count.</small>
            </div>

            <h4 class="section-title" style="margin-top:12px;">Capacity</h4>
            <p style="color:#444;line-height:1.6;">Small intimate dinners to large cocktail receptions — we scale to your guest list.</p>

            <div style="text-align: center; margin-top: 30px;">
                <a href="{{ route('book.details', ['serviceName' => urlencode('Adult parties'), 'charges' => 900]) }}" class="book-btn">
                    Book Now
                </a>
            </div>

        </aside>
    </div>
</div>
@endsection