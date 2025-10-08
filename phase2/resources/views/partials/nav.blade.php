<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm" >
    <div class="container">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            <i class="fas fa-user"></i> Login</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{ route('contact.show') }}" class="nav-link">Contact</a></li>
                <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link">Services</a></li>
            </ul>
        </div>
    </div>
</nav>