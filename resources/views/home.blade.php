@extends('layouts.app')

@section('title', 'Home | Celebrations')

@section('content')
    <style>
        body {
            background-color: #f4e9dd;
        }
        .hero-subtitle {
            font-size: 1.75rem;
            color: #6A3F3F;
        }
        .service-card {
            transition: all 0.3s ease-in-out;
        }
        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
    </style>
    <!-- Hero / Banner Section -->
    <section class="d-flex align-items-center justify-content-center text-center mb-5"
             style="height: 80vh; background: url('{{ asset('images/alexander-grey-62vi3TG5EDg-unsplash.jpg') }}') center/cover no-repeat; position: relative; font-family: Garamond, serif;">

        <!-- Light overlay -->
        <div style="position: absolute; top:0; left:0; width:100%; height:100%;"></div>

        <div style="position: relative; z-index: 2;">
            <!-- Hero Title -->
            <h1 class="display-4 fw-bold mb-3" style="color: #6A3F3F;">Making Your Events Extraordinary</h1>

            <!-- Hero Subtitle -->
            <p class="lead mb-4 hero-subtitle">
                From weddings to corporate galas, we bring your vision to life with creativity and precision.
            </p>


            <!-- Call-to-Action Button -->
            <a href="{{ url('/contact') }}"
               class="btn btn-outline-primary"
               style="background-color: #fffbf8; color: #AE674E; border-color: #AE674E;
                  padding: 0.5rem 1.5rem; font-weight: 600; text-transform: uppercase; border-radius: 10px;">
                Plan Your Event
            </a>
        </div>
    </section>


    <!-- Quote Section -->
    <section class="text-center mb-5">
        <blockquote class="blockquote fst-italic hero-subtitle">
            "Celebrate the moments of today, cherish the memories of tomorrow, and make every event unforgettable."
        </blockquote>
    </section>


    <!-- Welcome / Introduction Section -->
    <section class="py-5 text-center container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-3">Welcome to Celebrations</h2>
                <p class="mb-4 hero-subtitle">
                    We are your trusted partner in creating unforgettable experiences. Our expert team plans, coordinates, and executes every detail so you can enjoy every moment.
                </p>

                <img src="{{ asset('images/output-onlinepngtools.png') }}" class="img-fluid rounded shadow-sm" alt="Event Celebration">
            </div>
        </div>
    </section>

    <!-- Services / Highlights Section -->
    <section class="py-5 mb-5" style="background: linear-gradient(180deg, #fffaf5 0%, #fff4ee 100%);">
        <div class="container text-center">
            <h3 class="fw-bold mb-5" style="font-family: Garamond, serif; color: #6A3F3F;">Our Services</h3>

            <div class="row g-4">
                <!-- Service 1 -->
                <div class="col-md-4 col-sm-6">
                    <div class="service-card p-4 border rounded-3 h-100 shadow-sm text-center">
                        <i class="fas fa-calendar-alt fa-3x mb-3" style="color:#AE674E;"></i>
                        <h5 class="fw-semibold mb-3" style="font-family: Garamond, serif;">Event Planning</h5>
                        <p style="font-family: Garamond, serif; font-size: 1.1rem; color:#6A3F3F;">
                            Complete planning for weddings, birthdays, and corporate events, tailored to your style and budget.
                        </p>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="col-md-4 col-sm-6">
                    <div class="service-card p-4 border rounded-3 h-100 shadow-sm text-center">
                        <i class="fas fa-map-marker-alt fa-3x mb-3" style="color:#AE674E;"></i>
                        <h5 class="fw-semibold mb-3" style="font-family: Garamond, serif;">Venue Management</h5>
                        <p style="font-family: Garamond, serif; font-size: 1.1rem; color:#6A3F3F;">
                            Booking, décor, and vendor coordination to ensure seamless execution of your event.
                        </p>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="col-md-4 col-sm-6">
                    <div class="service-card p-4 border rounded-3 h-100 shadow-sm text-center">
                        <i class="fas fa-gift fa-3x mb-3" style="color:#AE674E;"></i>
                        <h5 class="fw-semibold mb-3" style="font-family: Garamond, serif;">Custom Packages</h5>
                        <p style="font-family: Garamond, serif; font-size: 1.1rem; color:#6A3F3F;">
                            Flexible packages designed to meet your unique needs and preferences.
                        </p>
                    </div>
                </div>
            </div>

            <!-- CTA Button -->
            <div class="text-center mt-5">
                <a href="{{ url('/services') }}"
                   class="btn btn-outline-primary"
                   style="background-color: #fffbf8; color: #AE674E; border-color: #AE674E;
                      padding: 0.5rem 1.5rem; font-weight: 600; text-transform: uppercase; border-radius: 50px;">
                    Explore Services
                </a>
            </div>
        </div>
    </section>
    <!-- Gallery Section -->
    <section class="container py-5 mb-5">
        <h3 class="text-center fw-bold mb-4">:: Gallery ::</h3>
        <div class="row g-3">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="ratio ratio-1x1 rounded shadow-sm" style="background: url('{{ asset('images/pexels-fu-zhichao-176355-587741.jpg') }}') center/cover no-repeat;"></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="ratio ratio-1x1 rounded shadow-sm" style="background: url('{{ asset('images/pexels-cottonbro-3171837.jpg') }}') center/cover no-repeat;"></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="ratio ratio-1x1 rounded shadow-sm" style="background: url('{{ asset('images/pexels-roneferreira-2735037.jpg') }}') center/cover no-repeat;"></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="ratio ratio-1x1 rounded shadow-sm" style="background: url('{{ asset('images/pexels-sebastian-ervi-866902-1763075.jpg') }}') center/cover no-repeat;"></div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="{{ url('/gallery') }}"
               class="btn btn-outline-primary"
               style="background-color: #fffbf8; color: #AE674E; border-color: #AE674E;
              padding: 0.5rem 1.5rem; font-weight: 600; text-transform: uppercase; border-radius: 10px;">
                View Full Gallery
            </a>
        </div>

    </section>
@endsection
