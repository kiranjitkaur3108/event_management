<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    main {
        flex: 1;
    }

    footer a.text-light:hover {
        color: rgba(255, 255, 255, 0.9);
        text-decoration: none;
    }
</style>

<footer class="text-light py-4 mt-5" style="background-color: #ae674e;">
    <div class="container text-center">

        <p class="mb-2">&copy; {{ date('Y') }} CELEBRATIONS | All Rights Reserved</p>

        <div class="mb-3">
            <a href="{{ url('about') }}" class="text-light text-decoration-none mx-2">About Us</a>
            <a href="{{ url('/services') }}" class="text-light text-decoration-none mx-2">Services</a>
            <a href="{{ url('gallery') }}" class="text-light text-decoration-none mx-2">Gallery</a>
            <a href="{{ url('contact') }}" class="text-light text-decoration-none mx-2">Contact</a>
            <a href="{{ url('reviews') }}" class="text-light text-decoration-none mx-2">Feedback</a>
        </div>

        <div class="mb-3">
            <a href="https://www.facebook.com" target="_blank" class="text-light mx-2">
                <i class="fa-brands fa-facebook-f fa-lg"></i>
            </a>
            <a href="https://www.twitter.com" target="_blank" class="text-light mx-2">
                <i class="fa-brands fa-x-twitter fa-lg"></i>
            </a>
            <a href="https://www.instagram.com" target="_blank" class="text-light mx-2">
                <i class="fa-brands fa-instagram fa-lg"></i>
            </a>
        </div>

        <p class="mb-3">
            Contact us:
            <a href="mailto:info@celebrations.com" class="text-light text-decoration-none">info@celebrations.com</a>
            | Phone: +1 (123) 456-7890
        </p>

        <a href="{{ route('services') }}" class="btn btn-outline-light btn-sm rounded-pill px-4">Book Now</a>

    </div>
</footer>
