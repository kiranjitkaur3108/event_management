@extends('layouts.app')

@section('title', 'Reviews')

@section('content')
    <style>
        body { background-color: #f4e9dd; }

        .review-container {
            max-width: 900px;
            margin: 60px auto;
            background:#fff;
            padding:30px;
            border-radius:10px;
            box-shadow:0 6px 20px rgba(0,0,0,0.15);
            text-align: center;
        }

        .add-feedback-btn, .view-more-btn, .view-less-btn {
            background: #ae674e;
            color: white;
            font-weight: bold;
            border: none;
            padding: 10px 25px;
            border-radius: 6px;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            margin-top: 15px;
        }

        .add-feedback-btn:hover, .view-more-btn:hover, .view-less-btn:hover {
            background: #8f523d;
        }

        .review-card {
            padding:15px 0;
            border-bottom: 5px solid #ae674e;
            text-align: left;
        }

        .review-card:last-child {
            border-bottom: none;
        }

        .review-rating {
            color:#ae674e;
            font-size:18px;
        }

        .no-reviews {
            margin-top: 20px;
            font-size: 16px;
            color: #555;
        }
    </style>

    <div class="review-container">
        <a href="{{ route('feedback.show') }}" class="add-feedback-btn mb-3">Add Your Feedback</a>

        <h2 class="mb-4" style="color:#ae674e; font-weight:bold; text-align: center;">Reviews</h2>

        <div id="reviews-wrapper">
            @forelse($reviews->take(3) as $review)
                <div class="review-card">
                    <h4>{{ $review->name }}</h4>
                    <p class="review-rating">
                        @for($i = 1; $i <= $review->rating; $i++) ⭐ @endfor
                    </p>
                    <p>{{ $review->message }}</p>
                </div>
            @empty
                <p class="no-reviews">No reviews yet. Be the first to leave feedback!</p>
            @endforelse
        </div>

        @if($reviews->count() > 3)
            <button id="viewMoreBtn" class="view-more-btn">View More</button>
            <button id="viewLessBtn" class="view-less-btn" style="display:none;">View Less</button>
        @endif
    </div>

    <script>
        const reviews = @json($reviews);
        const reviewsWrapper = document.getElementById('reviews-wrapper');
        const viewMoreBtn = document.getElementById('viewMoreBtn');
        const viewLessBtn = document.getElementById('viewLessBtn');
        const initialCount = 3; // Show first 3
        let expanded = false;

        viewMoreBtn?.addEventListener('click', function() {
            if (!expanded) {
                for (let i = initialCount; i < reviews.length; i++) {
                    const review = reviews[i];
                    const div = document.createElement('div');
                    div.className = 'review-card';
                    div.innerHTML = `
                        <h4>${review.name}</h4>
                        <p class="review-rating">${'⭐'.repeat(review.rating)}</p>
                        <p>${review.message}</p>
                    `;
                    reviewsWrapper.appendChild(div);
                }
                expanded = true;
                viewMoreBtn.style.display = 'none';
                viewLessBtn.style.display = 'inline-block';
            }
        });

        viewLessBtn?.addEventListener('click', function() {
            const allReviews = reviewsWrapper.querySelectorAll('.review-card');
            allReviews.forEach((card, index) => {
                if (index >= initialCount) {
                    card.remove();
                }
            });
            expanded = false;
            viewLessBtn.style.display = 'none';
            viewMoreBtn.style.display = 'inline-block';
        });
    </script>
@endsection
