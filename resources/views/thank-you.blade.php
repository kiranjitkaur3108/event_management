@extends('layouts.app')

@section('title', 'Thank You')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 70vh; background-color: #f3eade;">
        <div class="text-center p-4 rounded shadow-sm bg-white" style="max-width: 500px; width: 100%;">
            <h1 class="fw-bold" style="color: #ae674e;">🎉 Thank You!</h1>
            <p class="text-muted mb-4">Your feedback has been submitted successfully.</p>
            <a href="{{ route('home') }}" class="btn" style="background-color: #ae674e; color: white; font-weight: bold;">
                Go Back Home
            </a>
        </div>
    </div>
@endsection
