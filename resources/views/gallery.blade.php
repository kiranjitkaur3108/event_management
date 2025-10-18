@extends('layouts.app')

@section('title', 'Gallery | Celebrations')

@section('content')
    <section class="container py-5">
        <h2 class="text-center fw-bold mb-5" style="color:#6A3F3F; font-family: Garamond, serif;">Our Gallery</h2>

        <!-- Gallery Grid -->
        <div class="row g-4">
            @foreach($images as $img)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="gallery-item rounded shadow-sm overflow-hidden position-relative">
                        <div class="ratio ratio-1x1"
                             style="background: url('{{ asset($img->image_path) }}') center/cover no-repeat; transition: transform 0.3s ease;">
                        </div>
                        <div class="overlay-text d-flex align-items-center justify-content-center">
                            <span>{{ $img->event_name }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </section>

    <style>
        body {
            background-color: #f4e9dd;
        }

        /* Zoom effect on hover */
        .gallery-item:hover .ratio {
            transform: scale(1.05);
        }

        /* Event name overlay */
        .gallery-item .overlay-text {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.4); /* dark overlay */
            color: #fff;
            font-weight: 600;
            font-size: 1.1rem;
            opacity: 0;
            transition: opacity 0.3s ease;
            text-align: center;
        }

        .gallery-item:hover .overlay-text {
            opacity: 1;
        }

        .overlay-text span {
            padding: 0 0.5rem;
            text-align: center;
            font-family: Garamond, serif;
        }
    </style>
@endsection
