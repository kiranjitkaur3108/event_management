@extends('layouts.app')
@section('title', 'About Us')
@section('content')
<style>
    body { background-color: #f4e9dd; }
    .about-container { max-width: 900px; margin: 60px auto; background: #ffffff; padding: 40px; border-radius: 10px; box-shadow: 0 6px 20px rgba(0,0,0,0.15); }
    .section-accent-line { height: 6px; background: #ae674e; width: 100%; margin-bottom: 20px; }
    h2.section-title { font-size: 30px; font-weight: bolder; color: #ae674e; margin-bottom: 20px; }
    .lead-muted { color: #333; font-weight: normal; font-size: 16px; line-height: 1.8; }
    .img-rounded-shadow { border-radius: 10px; box-shadow: 0 6px 20px rgba(0,0,0,0.15); transition: transform .25s ease, box-shadow .25s ease; object-fit: cover; width: 100%; max-height: 280px; }
    .img-rounded-shadow:hover { transform: scale(1.03); box-shadow: 0 12px 30px rgba(0,0,0,0.2); }
    .team-card { border-radius: 15px; background: #fff; box-shadow: 0 6px 20px rgba(0,0,0,0.1); transition: transform .25s ease; }
    .team-card:hover { transform: translateY(-5px); }
    .team-avatar { width: 120px; height: 120px; border-radius: 50%; object-fit: cover; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
    @media (max-width: 768px) { .about-container { margin: 40px 20px; padding: 30px; } }
</style>

<div class="about-container">

    {{-- About Section --}}
    <section class="mb-4">
        <div class="card border-0 p-0">
            <div class="section-accent-line"></div>
            <div class="row align-items-center g-4 py-3">
                <div class="col-lg-8">
                    <h2 class="section-title">About Us</h2>
                    <p class="lead-muted">
                        We are professional event planners specializing in weddings, corporate events, and parties. We pride ourselves on assisting you with your event from start to finish so everything runs smoothly.
                    </p>
                    <p class="lead-muted">
                        Over the last decade, we have worked with hundreds of clients, specializing in weddings but also offering other events like birthdays, bridal showers, and baby showers. Contact us today to plan your special event!
                    </p>
                </div>
                <div class="col-lg-4 text-lg-center text-start">
                    <img src="{{ asset('images/planning.jpg') }}" alt="Event Planning" class="img-fluid img-rounded-shadow">
                </div>
            </div>
        </div>
    </section>

    {{-- Team Section --}}
    <section class="team-section py-5" style="background-color: #fffaf7;">
        <div class="container">
            {{-- Heading --}}
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="display-5 fw-bold" style="color: #ae674e;">
                        Meet Our <span style="color: #6b3f2d;">Exceptional Team</span>
                    </h2>
                    <p class="lead" style="color: #444;">
                        Our passionate, experienced team brings creativity and precision to make every event unique, seamless, and unforgettable.
                    </p>
                    <div style="width: 80px; height: 4px; background-color: #ae674e; margin: 15px auto; border-radius: 2px;"></div>
                </div>
            </div>

            {{-- Team Members --}}
            <div class="row mt-4">
                @foreach($teamMembers as $member)
                    <div class="col-md-4 text-center mb-4">
                        <div class="team-card p-4 shadow-sm rounded-4 bg-white position-relative overflow-hidden">
                            {{-- Avatar --}}
                            <img src="{{ $member->avatar ? asset('storage/' . $member->avatar) : asset('images/default-avatar.png') }}"
                                 alt="{{ $member->name }}"
                                 class="team-avatar mb-3 rounded-circle">

                            {{-- Info --}}
                            <h5 class="fw-bold mt-3" style="color: #ae674e;">{{ $member->name }}</h5>
                            <p class="text-muted mb-2" style="font-size: 1rem;">{{ $member->role }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</div>
@endsection
