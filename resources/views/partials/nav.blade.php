<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    .navbar-dark .nav-link {
        color: rgba(255, 255, 255, 0.7);
    }

    .navbar-dark .nav-link:hover {
        color: #ffffff;
    }

    .navbar-dark .nav-link.active {
        color: #ffffff !important;
        font-weight: 500;
    }
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #ae674e;">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/role-select') }}">
            <i class="fas fa-user"></i> Login
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto fw-bold">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact.show') }}" class="nav-link {{ request()->routeIs('contact.show') ? 'active' : '' }}">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Services</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Admin</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
