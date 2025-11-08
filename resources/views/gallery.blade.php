@extends('layouts.app')

@section('title', 'Gallery | Celebrations')

@section('content')
    <section class="container py-5">
        <h2 class="text-center fw-bold mb-5" style="color:#6A3F3F; font-family: Garamond, serif;">Our Gallery</h2>

        @foreach($groupedImages as $event => $images)
            <div class="mb-5">
                <h4 class="text-center fw-semibold mb-4" style="font-family: Garamond, serif; color:#6A3F3F;">
                    {{ $event }}
                </h4>
                <div class="row g-4 justify-content-center">
                    @foreach($images->take(4) as $img)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="gallery-item rounded shadow-sm overflow-hidden position-relative">
                                <div class="ratio ratio-1x1"
                                     style="background: url('{{ asset($img->image_path) }}') center/cover no-repeat; transition: transform 0.3s ease;">
                                </div>
                            </div>
                        </div>
                    @endforeach

                        @if($images->count() > 4)
                            @php $remaining = $images->count() - 4; @endphp
                            <div class="col-12 text-center mt-2">
                                <a href="#" class="more-link" data-bs-toggle="modal" data-bs-target="#modal{{ Str::slug($event) }}">
                                    +{{ $remaining }} more
                                </a>
                            </div>
                        @endif


                </div>
            </div>

            <!-- Modal for viewing all images of this event -->
            <div class="modal fade" id="modal{{ Str::slug($event) }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $event }} - Gallery</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">
                                @foreach($images as $img)
                                    <div class="col-md-4 col-sm-6">
                                        <img src="{{ asset($img->image_path) }}" class="img-fluid rounded shadow-sm" alt="{{ $event }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>

<style>
        body {
            background-color: #f4e9dd;
        }

        .gallery-item .ratio {
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .gallery-item:hover .ratio {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }

        .gallery-item .overlay-text {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.35);
            color: #fff;
            font-weight: 600;
            font-size: 1.05rem;
            opacity: 0;
            transition: opacity 0.25s ease;
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

        .more-link {
            font-weight: 600;
            font-size: 1rem;
            color: #6A3F3F;
            text-decoration: underline;
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .more-link:hover {
            color: #a15c4d;
        }

        .modal-body img {
            transition: transform 0.3s ease;
        }

        .modal-body img:hover {
            transform: scale(1.05);
        }
    </style>
@endsection