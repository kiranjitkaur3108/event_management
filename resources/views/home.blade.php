
@extends('layouts.app')


@section('title','Home')


@section('content')
    <section class="hero row align-items-center">
        <div class="col-md-6">
            <h1 class="display-5">Design-forward solutions for modern web apps</h1>
            <p class="lead">We build clean, maintainable Laravel applications and beautiful interfaces that perform across devices.</p>
            <a href="{{ route('about') }}" class="btn btn-primary">Learn more</a>
        </div>
        <div class="col-md-6 text-center">
            <img src="/images/hero-product.jpg" alt="modern workspace" class="img-fluid rounded shadow-sm">
        </div>
    </section>


    <section class="mt-5">
        <div class="row">
            <div class="col-md-4">
                <h4>Our Approach</h4>
                <p>We combine UX research, performance-minded development, and clean code organization to deliver stable products.</p>
            </div>
            <div class="col-md-4">
                <h4>Services</h4>
                <p>Design system setup, API-driven Laravel backends, TDD, and component-driven front-end architecture.</p>
            </div>
            <div class="col-md-4">
                <h4>Contact</h4>
                <p>Interested in working together? Reach out via the contact form and we’ll set a free consultation.</p>
            </div>
        </div>
    </section>
@endsection 

