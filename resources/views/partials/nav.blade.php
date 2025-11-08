<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
    #main-navbar .nav-link {
        color: rgba(255, 255, 255, 0.7) !important;
    }


    #main-navbar .nav-link:hover {
        color: #ffffff !important;
    }


    #main-navbar .nav-link.active {
        color: #ffffff !important;
    }


    #main-navbar .navbar-brand {
        color: #ffffff !important;
    }
</style>


<!-- Navbar -->
<nav id="main-navbar" class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #ae674e;">
    <div class="container">
   <!-- User/Login link -->
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2"
           href="{{ Auth::check() ? (Auth::user()->role === 'admin' ? url('admin/dashboard') : url('my-bookings')) : route('login') }}">
            @if(Auth::check())
                @if(Auth::user()->profile_image)
                    <img src="{{ asset('storage/profile_images/' . Auth::user()->profile_image) }}"
                         alt="Profile"
                         style="width: 38px; height: 38px; border-radius: 50%; object-fit: cover; border: 2px solid #fff;">
                @else
                    <i class="fas fa-user-circle fa-lg text-white"></i>
                @endif
                <span>{{ Auth::user()->name }}</span>
            @else
                <i class="fas fa-user"></i>
                <span>Login</span>
            @endif
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
                    <a href="{{ route('gallery') }}" class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}">Gallery</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('services') }}" class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}">Services</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact.show') }}" class="nav-link {{ request()->routeIs('contact.show') ? 'active' : '' }}">Contact</a>
                </li>

               



                @if(Auth::check())
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-white" style="text-decoration:none;">
                            Logout
                        </button>
                    </form>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>