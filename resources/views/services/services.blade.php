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
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
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
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-align: center;
        text-decoration: none;
        color: inherit;
        padding-bottom: 20px;
    }

    .service-card:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
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
        margin: 0 20px 15px;
    }

    
.event-section { 
    margin-top: 50px; 
}
 .event-section h2 { 
    color: #ae674e; font-size: 28px; margin-bottom: 30px; text-align: center; position: relative; 
}

.service-btn,
.wishlist-btn,
.btn-theme {
    display: inline-block;
    background-color: #ae674e;  
    color: white !important;
    padding: 10px 25px;
    border-radius: 30px;         
    text-decoration: none;
    font-size: 15px;
    font-weight: bold;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

/* Hover */
.service-btn:hover,
.wishlist-btn:hover,
.btn-theme:hover {
    background-color: #8f523d;   
}

.card-buttons {
    display: flex;
    flex-direction: column;
    gap: 12px;   /* <-- this adds spacing between View + Add to Wishlist */
    align-items: center;
}


</style>

<div class="services-container">
      @if(session('success'))
    <div style="background:#d4edda; color:#155724; padding:10px; 
                border-radius:6px; margin-bottom:15px; text-align:center;">
        {{ session('success') }}
    </div>
@endif

@if(session('message'))
    <div style="background:#fff3cd; color:#856404; padding:10px; 
                border-radius:6px; margin-bottom:15px; text-align:center;">
        {{ session('message') }}
    </div>
@endif

    <h1 class="services-title">Our Services</h1>

    <div style="text-align: center; margin-bottom: 30px;">
        <a href="{{ route('user.bookings') }}"
            style="background-color: #ae674e; color: white; padding: 12px 25px; border-radius: 30px; font-weight: bold; text-decoration: none; transition: background-color 0.3s ease;">
            My Bookings
        </a>
    </div>
    <div style="text-align: right; margin-bottom: 25px;">
        <a href="{{ route('wishlist.index') }}"
            class="btn-theme"
            style="
           border-radius: 30px; 
           display: inline-flex; 
           align-items: center; 
           gap: 8px;
       ">
            ❤️ View My Wishlist
        </a>
    </div>





    <!-- WEDDINGS -->
    <section class="event-section">
        <h2>Weddings</h2>
        <div class="services-grid">

            <!-- 1 -->
            <div class="service-card">
                <img src="images/wedding-ceremony.jpg">
                <h3>Wedding Ceremonies</h3>
                <p>Celebrate love with beautifully crafted wedding ceremonies.</p>
<div class="card-buttons">
                <a href="{{ url('/services/wedding-ceremonies') }}" class="service-btn">View</a>
                @auth
                <form method="POST" action="{{ route('wishlist.add') }}">
                    @csrf
                    <input type="hidden" name="service_id" value="1">
                    <button class="service-btn wishlist-btn">Add to Wishlist ♥</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="service-btn wishlist-btn">Add to Wishlist ♥</a>
                @endauth
                </div>
            </div>

            <!-- 2 -->
            <div class="service-card">
                <img src="images/wedding-reception.jpg">
                <h3>Wedding Receptions</h3>
                <p>Host grand receptions with stunning decor and themes.</p>
                <div class="card-buttons">
                <a href="{{ url('/services/wedding-receptions') }}" class="service-btn">View</a>

                @auth
                <form method="POST" action="{{ route('wishlist.add') }}">
                    @csrf
                    <input type="hidden" name="service_id" value="2">
                    <button class="service-btn wishlist-btn">Add to Wishlist ♥</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="service-btn wishlist-btn">Add to Wishlist ♥</a>
                @endauth
                 </div>
            </div>

            <!-- 3 -->
            <div class="service-card">
                <img src="images/destination-wedding.avif">
                <h3>Destination Weddings</h3>
                <p>Plan your dream wedding in the most picturesque locations.</p>
           <div class="card-buttons">
                <a href="{{ url('/services/destination-weddings') }}" class="service-btn">View</a>

                @auth
                <form method="POST" action="{{ route('wishlist.add') }}">
                    @csrf
                    <input type="hidden" name="service_id" value="3">
                    <button class="service-btn wishlist-btn">Add to Wishlist ♥</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="service-btn wishlist-btn">Add to Wishlist ♥</a>
                @endauth
                 </div>
            </div>

        </div>
    </section>

    <!-- BIRTHDAYS -->
    <section class="event-section">
        <h2>Birthdays</h2>
        <div class="services-grid">

            <!-- 4 -->
            <div class="service-card">
                <img src="images/kids-party.png">
                <h3>Kids' Parties</h3>
                <p>Fun-filled birthday parties with exciting games and themes.</p>
                  <div class="card-buttons">
                <a href="{{ url('/services/kids-parties') }}" class="service-btn">View</a>

                @auth
                <form method="POST" action="{{ route('wishlist.add') }}">
                    @csrf
                    <input type="hidden" name="service_id" value="4">
                    <button class="service-btn wishlist-btn">Add to Wishlist ♥</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="service-btn wishlist-btn">Add to Wishlist ♥</a>
                @endauth
                 </div>
            </div>

            <!-- 5 -->
            <div class="service-card">
                <img src="images/teen-party.jpeg">
                <h3>Teen Parties</h3>
                <p>Stylish and memorable celebrations for teens.</p>
                <div class="card-buttons">
                <a href="{{ url('/services/teen-parties') }}" class="service-btn">View</a>
                  
                @auth
                <form method="POST" action="{{ route('wishlist.add') }}">
                    @csrf
                    <input type="hidden" name="service_id" value="5">
                    <button class="service-btn wishlist-btn">Add to Wishlist ♥</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="service-btn wishlist-btn">Add to Wishlist ♥</a>
                @endauth
                 </div>
            </div>

            <!-- 6 -->
            <div class="service-card">
                <img src="images/adult-party.jpg">
                <h3>Adult Parties</h3>
                <p>Elegant and sophisticated birthday celebrations for adults.</p>
                 <div class="card-buttons">
                <a href="{{ url('/services/adult-parties') }}" class="service-btn">View</a>

                @auth
                <form method="POST" action="{{ route('wishlist.add') }}">
                    @csrf
                    <input type="hidden" name="service_id" value="6">
                    <button class="service-btn wishlist-btn">Add to Wishlist ♥</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="service-btn wishlist-btn">Add to Wishlist ♥</a>
                @endauth
                 </div>
            </div>

        </div>
    </section>

    <!-- CORPORATE -->
    <section class="event-section">
        <h2>Corporate Events</h2>
        <div class="services-grid">

            <!-- 7 -->
            <div class="service-card">
                <img src="images/team-building.jpg">
                <h3>Team Building</h3>
                <p>Foster team spirit with engaging activities and workshops.</p>
                <div class="card-buttons">
                <a href="{{ url('/services/team-building') }}" class="service-btn">View</a>

                @auth
                <form method="POST" action="{{ route('wishlist.add') }}">
                    @csrf
                    <input type="hidden" name="service_id" value="7">
                    <button class="service-btn wishlist-btn">Add to Wishlist ♥</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="service-btn wishlist-btn">Add to Wishlist ♥</a>
                @endauth
                 </div>
            </div>

            <!-- 8 -->
            <div class="service-card">
                <img src="images/product-launch.jpg">
                <h3>Product Launch</h3>
                <p>Introduce your product in style with grand launch events.</p>
                 <div class="card-buttons">
                <a href="{{ url('/services/product-launch') }}" class="service-btn">View</a>

                @auth
                <form method="POST" action="{{ route('wishlist.add') }}">
                    @csrf
                    <input type="hidden" name="service_id" value="8">
                    <button class="service-btn wishlist-btn">Add to Wishlist ♥</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="service-btn wishlist-btn">Add to Wishlist ♥</a>
                @endauth
                 </div>
            </div>

            <!-- 9 -->
            <div class="service-card">
                <img src="images/conference.jpg">
                <h3>Conferences</h3>
                <p>Host professional conferences with expert arrangements.</p>
                <div class="card-buttons">
                <a href="{{ url('/services/conferences') }}" class="service-btn">View</a>

                @auth
                <form method="POST" action="{{ route('wishlist.add') }}">
                    @csrf
                    <input type="hidden" name="service_id" value="9">
                    <button class="service-btn wishlist-btn">Add to Wishlist ♥</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="service-btn wishlist-btn">Add to Wishlist ♥</a>
                @endauth
                 </div>
            </div>

        </div>
    </section>

    <!-- ANNIVERSARIES -->
    <section class="event-section">
        <h2>Anniversaries</h2>
        <div class="services-grid">

            <!-- 10 -->
            <div class="service-card">
                <img src="images/anniversary.jpg">
                <h3>Anniversary Parties</h3>
                <p>Celebrate love and milestones beautifully.</p>
                <div class="card-buttons">
                <a href="{{ url('/services/anniversary-parties') }}" class="service-btn">View</a>

                @auth
                <form method="POST" action="{{ route('wishlist.add') }}">
                    @csrf
                    <input type="hidden" name="service_id" value="10">
                    <button class="service-btn wishlist-btn">Add to Wishlist ♥</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="service-btn wishlist-btn">Add to Wishlist ♥</a>
                @endauth
                 </div>
            </div>

            <!-- 11 -->
            <div class="service-card">
                <img src="images/anniversary-dinner.jpg">
                <h3>Anniversary Dinners</h3>
                <p>Intimate dinners for couples to cherish special moments.</p>
                 <div class="card-buttons">
                <a href="{{ url('/services/anniversary-dinners') }}" class="service-btn">View</a>

                @auth
                <form method="POST" action="{{ route('wishlist.add') }}">
                    @csrf
                    <input type="hidden" name="service_id" value="11">
                    <button class="service-btn wishlist-btn">Add to Wishlist ♥</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="service-btn wishlist-btn">Add to Wishlist ♥</a>
                @endauth
                 </div>
            </div>

            <!-- 12 -->
            <div class="service-card">
                <img src="images/anniversary-surprise.jpg">
                <h3>Surprise Celebrations</h3>
                <p>Create unforgettable surprises for your loved ones.</p>
                <div class="card-buttons">
                <a href="{{ url('/services/surprise-celebrations') }}" class="service-btn">View</a>

                @auth
                <form method="POST" action="{{ route('wishlist.add') }}">
                    @csrf
                    <input type="hidden" name="service_id" value="12">
                    <button class="service-btn wishlist-btn">Add to Wishlist ♥</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="service-btn wishlist-btn">Add to Wishlist ♥</a>
                @endauth
                 </div>
            </div>

        </div>
    </section>

    <!-- BABY SHOWERS -->
    <section class="event-section">
        <h2>Baby Showers</h2>
        <div class="services-grid">

            <!-- 13 -->
            <div class="service-card">
                <img src="images/baby-shower.jpg">
                <h3>Baby Shower Parties</h3>
                <p>Welcome your little one in warmth and a great joy.</p>
                 <div class="card-buttons">
                <a href="{{ url('/services/baby-shower-parties') }}" class="service-btn">View</a>

                @auth
                <form method="POST" action="{{ route('wishlist.add') }}">
                    @csrf
                    <input type="hidden" name="service_id" value="13">
                    <button class="service-btn wishlist-btn">Add to Wishlist ♥</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="service-btn wishlist-btn">Add to Wishlist ♥</a>
                @endauth
                 </div>
            </div>

            <!-- 14 -->
            <div class="service-card">
                <img src="images/baby-gift.jpg">
                <h3>Gifting Events</h3>
                <p>Special gifting moments for the newborn and family.</p>
                 <div class="card-buttons">
                <a href="{{ url('/services/gifting-events') }}" class="service-btn">View</a>

                @auth
                <form method="POST" action="{{ route('wishlist.add') }}">
                    @csrf
                    <input type="hidden" name="service_id" value="14">
                    <button class="service-btn wishlist-btn">Add to Wishlist ♥</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="service-btn wishlist-btn">Add to Wishlist ♥</a>
                @endauth
                 </div>
            </div>

            <!-- 15 -->
            <div class="service-card">
                <img src="images/baby-fun.jpg">
                <h3>Fun Activities</h3>
                <p>Games and activities to celebrate the upcoming arrival.</p>
               <div class="card-buttons">
                <a href="{{ url('/services/fun-activities') }}" class="service-btn">View</a>

                @auth
                <form method="POST" action="{{ route('wishlist.add') }}">
                    @csrf
                    <input type="hidden" name="service_id" value="15">
                    <button class="service-btn wishlist-btn">Add to Wishlist ♥</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="service-btn wishlist-btn">Add to Wishlist ♥</a>
                @endauth
                 </div>
            </div>

        </div>
    </section>

    <!-- FESTIVALS -->
    <section class="event-section">
        <h2>Festivals</h2>
        <div class="services-grid">

            <!-- 16 -->
            <div class="service-card">
                <img src="images/festival.jpg">
                <h3>Community Festivals</h3>
                <p>Bring your community together with vibrant celebrations.</p>
                <div class="card-buttons">
                <a href="{{ url('/services/community-festivals') }}" class="service-btn">View</a>

                @auth
                <form method="POST" action="{{ route('wishlist.add') }}">
                    @csrf
                    <input type="hidden" name="service_id" value="16">
                    <button class="service-btn wishlist-btn">Add to Wishlist ♥</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="service-btn wishlist-btn">Add to Wishlist ♥</a>
                @endauth
                 </div>
            </div>

            <!-- 17 -->
            <div class="service-card">
                <img src="images/festival-food.jpg">
                <h3>Food Festivals</h3>
                <p>Celebrate cultural flavors with festive food events.</p>
                 <div class="card-buttons">
                <a href="{{ url('/services/food-festivals') }}" class="service-btn">View</a>

                @auth
                <form method="POST" action="{{ route('wishlist.add') }}">
                    @csrf
                    <input type="hidden" name="service_id" value="17">
                    <button class="service-btn wishlist-btn">Add to Wishlist ♥</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="service-btn wishlist-btn">Add to Wishlist ♥</a>
                @endauth
                 </div>
            </div>

            <!-- 18 -->
            <div class="service-card">
                <img src="images/festival-music.jpg">
                <h3>Music Festivals</h3>
                <p>Enjoy lively music and entertainment for all ages.</p>
                  <div class="card-buttons">
                <a href="{{ url('/services/music-festivals') }}" class="service-btn">View</a>

                @auth
                <form method="POST" action="{{ route('wishlist.add') }}">
                    @csrf
                    <input type="hidden" name="service_id" value="18">
                    <button class="service-btn wishlist-btn">Add to Wishlist ♥</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="service-btn wishlist-btn">Add to Wishlist ♥</a>
                @endauth
                 </div>
            </div>

        </div>
    </section>

</div>
@endsection