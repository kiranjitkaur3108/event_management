@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <div class="row align-items-center">
        <div class="col-md-6">
            <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <h2>About This Project</h2>
            <p>This project was designed to demonstrate Laravel’s Blade templating engine.</p>
            <p>It includes shared layouts, partials, and reusable UI components that make front-end development faster and cleaner.</p>
            <a href="{{ url('/contact') }}" class="btn btn-primary mt-3">Contact Us</a>
        </div>
    </div>
@endsection
