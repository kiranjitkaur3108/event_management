@extends('layouts.app')

@section('title', 'About Us')

@section('styles')
    <style>
        html,body {
            /*font-family: Garamond, serif;*/
            background-color: #f2f2f2;
            color: #333;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            font-size: 18px;
        }

        :root {
            --accent: #ae674e;
            --muted: #666666;
            --card-bg: #ffffff;
        }

        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0,0,0,0.08);
            z-index: 1050;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1rem;
        }
        nav h1 {
            font-family: Garamond, serif;
            font-size: 32px;
            margin: 0;
            color: var(--accent);
        }
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        nav ul li a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 700;
            font-size: 18px;
            padding: 8px 10px;
            border-radius: 6px;
        }
        nav ul li a:hover {
            background: rgba(174,103,78,0.12);
        }

        .main-content { padding-top: 130px; padding-bottom: 40px; }

        .accent-card {
            background: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border: none;
            overflow: hidden;
        }
        .section-accent-line {
            height: 6px;
            background: var(--accent);
            width: 100%;
        }
        h2.section-title {
            color: var(--accent);
            font-size: 1.9rem;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }
        .lead-muted {
            color: var(--muted);
            line-height: 1.75;
            font-weight: 300;
        }

        .about-section, .services-section {
            padding: 1.5rem;
        }

        .accent-decor {
            position: relative;
        }
        .accent-decor::before,
        .accent-decor::after {
            content: "";
            position: absolute;
            left: 0;
            width: 100%;
            height: 6px;
            background: var(--accent);
        }
        .accent-decor::before { top: 0; border-radius: 12px 12px 0 0; }
        .accent-decor::after { bottom: 0; border-radius: 0 0 12px 12px; }

        .img-rounded-shadow {
            border-radius: 10px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
            transition: transform .25s ease, box-shadow .25s ease;
            object-fit: cover;
        }
        .img-rounded-shadow:hover { transform: scale(1.03); box-shadow: 0 12px 30px rgba(0,0,0,0.12); }

        @media (max-width: 991.98px) {
            nav { height: auto; padding: .75rem 1rem; }
            .main-content { padding-top: 120px; }
        }
        @media (max-width: 767.98px) {
            nav h1 { font-size: 22px; }
            nav ul li a { font-size: 15px; }
            .main-content { padding-top: 110px; }
        }
    </style>
@endsection

@section('content')
    <main>
        <div class="container main-content" id="mainContent">

            <section class="mb-4">
                <div class="card accent-card p-4">
                    <div class="section-accent-line"></div>

                    <div class="row align-items-center g-4 py-3">
                        <div class="col-lg-8">
                            <div class="px-2">
                                <h2 class="section-title">About Us </h2>

                                <p class="lead-muted">
                                    We are a professional event planners that specialize in weddings, corporate events, and parties. We pride ourselves on being able to assist you with your event from start to finish so that everything runs smoothly from beginning to end.
                                </p>

                                <p class="lead-muted">
                                    We have worked with hundreds of clients over the last decade and specialize in weddings but also offer other types of events such as birthdays, bridal showers, and baby showers. If you are interested in having us plan your special event please give us a call or send us an email today!
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-4 text-lg-center text-start">
                            <img src="{{ asset('images/planning.jpg') }}" alt="event planner" class="img-fluid rounded shadow-sm" style="max-height:280px; object-fit:cover;" >
                        </div>
                    </div>
                </div>
            </section>

            <!-- SERVICES / TEAM SECTION -->
            <section class="mb-4">
                <div class="card accent-card p-4">
                    <div class="section-accent-line"></div>

                    <div class="row g-4 py-3">
                        <div class="col-md-7">
                            <div class="px-2">
                                <h2 class="section-title">Our Team</h2>
                                <p class="lead-muted">
                                    At Celebrations, our team is made up of passionate, experienced professionals who are dedicated to making every event unique and memorable. From creative designers to meticulous coordinators, each team member brings their expertise and enthusiasm to ensure that your celebration runs smoothly from start to finish. We pride ourselves on our strong vendor relationships, attention to detail, and personalized approach, making every moment of your event unforgettable. Our goal is simple: to turn your vision into an experience that you and your guests will cherish forever.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-5 text-center">
                            <img src="{{ asset('images/event.planning.jpg') }}" alt="Event Planning" class="img-fluid rounded shadow-sm" style="max-height:280px; object-fit:cover;">
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>
@endsection
