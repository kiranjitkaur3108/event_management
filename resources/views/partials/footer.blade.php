<footer class="bg-dark text-light py-4 mt-5">
    <div class="container text-center">

        <p class="mb-2">&copy; {{ date('Y') }} CELEBRATIONS | All Rights Reserved</p>

        <div class="mb-3">
            <a href="{{ url('about') }}" class="text-light text-decoration-none mx-2">About Us</a>
            <a href="{{ url('services') }}" class="text-light text-decoration-none mx-2">Our Services</a>
            <a href="{{ url('gallery') }}" class="text-light text-decoration-none mx-2">Gallery</a>
            <a href="{{ url('contact') }}" class="text-light text-decoration-none mx-2">Contact</a>
            <a href="{{ url('feedback') }}" class="text-light text-decoration-none mx-2">Feedback</a>
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

        <a href="{{ url('book') }}" class="btn btn-outline-light btn-sm rounded-pill px-4">Book Now</a>
    </div>
</footer>