@extends('layouts.app')

@section('title', 'My Wishlist')

@section('content')
<style>
    body { background-color: #f4e9dd; }

    .wishlist-container {
        max-width: 1000px;
        margin: 40px auto;
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .wishlist-item {
        display: flex;
        gap: 20px;
        margin-bottom: 25px;
        padding-bottom: 20px;
        border-bottom: 1px solid #ddd;
    }

    .wishlist-item img {
        width: 180px;
        height: 120px;
        border-radius: 8px;
        object-fit: cover;
        border: 2px solid #d7c4b4;
    }

    .wishlist-info h3 {
        margin: 0;
        font-size: 22px;
        color: #3b2f2f;
    }

    .wishlist-info p {
        margin: 5px 0;
        color: #6b5c5c;
    }

    .btn-remove {
        margin-top: 10px;
        padding: 8px 16px;
        background: #b34747;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: 0.3s ease;
    }

    .btn-remove:hover {
        background: #992d2d;
        transform: scale(1.05);
    }

    .empty-box {
        text-align: center;
        padding: 40px;
        color: #6b5c5c;
        font-size: 20px;
    }
    .btn-main {
    background: #ae674e;
    color: white;
    padding: 10px 22px;
    border: none;
    border-radius: 6px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s ease;
    text-decoration: none;
    display: inline-block;
}

.btn-main:hover {
    background: #8f523d;
    transform: scale(1.05);
}

.btn-outline {
    background: transparent;
    border: 2px solid #ae674e;
    color: #ae674e;
    padding: 8px 18px;
    border-radius: 6px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s ease;
    text-decoration: none;
}

.btn-outline:hover {
    background: #ae674e;
    color: white;
    transform: scale(1.05);
}

</style>

<div class="wishlist-container">
    @if(session('success'))
    <div style="
        background:#d4edda;
        color:#155724;
        padding:12px;
        border-radius:6px;
        margin-bottom:20px;
        text-align:center;
        font-weight:600;
    ">
        {{ session('success') }}
    </div>
@endif

    <h2 style="text-align:center; margin-bottom:30px; color:#3b2f2f;">
        ❤️ My Wishlist
    </h2>

    @if($wishlist->isEmpty())
        <div class="empty-box">
            Nothing added yet…<br>
            Start exploring services and add your favourites ✨
        </div>
    @else
        @foreach($wishlist as $item)
            <div class="wishlist-item">

                <!-- Image -->
                <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">

                <!-- Info -->
                <div class="wishlist-info">
                    <h3>{{ $item->name }}</h3>
                    <p><strong>Category:</strong> {{ $item->category }}</p>
                    <p><strong>Price:</strong> ${{ $item->price }}</p>

                    <!-- Remove Button -->
                    <form action="{{ route('wishlist.remove', $item->wishlist_id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-remove">Remove ❌</button>
                    </form>
                </div>

            </div>
        @endforeach
    @endif

</div>
@endsection
