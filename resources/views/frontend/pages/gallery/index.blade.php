@extends('frontend.layouts.master')
@section('title','Gallery – Mirrors Academy Hyderabad')
@section('description', 'Explore the Mirrors Academy gallery showcasing student work, training sessions, events, and salon experiences at Hyderabad’s premier hair and beauty academy.')
@push('styles')
<link rel="stylesheet" href="{{ asset('fronted/assets/js/plugins/fancybox/jquery.fancybox.min.css') }}">
@endpush
@section('main-content')
<section class="banner-section inner-banner position-relative pt-10 pb-10">
    <div class="container position-relative cus-z1">
        <div class="row">
            <div class="col-xxl-12 cus-z1 text-center">
                <div class="section-area breadcrumb-area">
                    <h1 class="breadcrub-title">Our Gallery</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="gallery-section s1-bg-color-rgb pt-60 pb-60">
    <div class="container">
        <div class="row grid-services media-box-image justify-content-center">
            @if(isset($galleries) && $galleries->count() > 0)
                @foreach ($galleries as $gallery) 
                    <div class="col-md-4 col-xxl-4 d-center gap-4 gap-md-4">
                        <article class="single_blog agree_bazar_image">
                            <figure>
                                <div class="blog_thumb border border-radius">
                                    <a class="lightbox" title="" data-fancybox="images-1" data-caption="{{ $gallery->title}}" href="{{ asset('upload/gallery/' . $gallery->image) }}">
                                        <div class="media">
                                            <img src="{{ asset('upload/gallery/' . $gallery->image) }}" alt="{{ $gallery->title}}" class="img-responsive main-img" loading="lazy">
                                        </div>
                                        <!---->
                                    </a>
                                </div>
                            </figure>
                        </article>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script src="{{ asset('fronted/assets/js/plugins/fancybox/jquery.fancybox.js') }}"></script>
@endpush