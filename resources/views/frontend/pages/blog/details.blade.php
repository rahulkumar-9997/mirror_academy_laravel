@php
    $metaTitle = $blog->meta_title ?? $blog->title . ' | Mirrors Academy Hyderabad';
    $metaDesc = $blog->meta_description ?? $blog->short_desc ?? $blog->content;
    $metaDescription = \Illuminate\Support\Str::limit(strip_tags($metaDesc), 160);
@endphp

@extends('frontend.layouts.master')
@section('title', $metaTitle)
@section('description', $metaDescription)

@section('main-content')
<section class="banner-section inner-banner position-relative pt-5 pb-5">
    <div class="container position-relative cus-z1">
        <div class="row">
            <div class="col-xxl-12 cus-z1 text-center">
                <div class="section-area breadcrumb-area">
                    <h1 class="breadcrub-title">
                        {{ $blog->title }}
                    </h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-details s1-bg-color-rgb pt-60 pb-60 position-relative">
    <div class="container">
        <div class="row justify-content-center gy-5 gy-xl-0">
            <div class="col-lg-9">
                <div class="ttr-post-text single-area blog-post-data course-post-data">
                    @if($blog->featured_image && file_exists(public_path('upload/blog/' . $blog->featured_image)))
                        <div class="co-image-details mb-4">
                            <picture>
                                <img 
                                    class="img-fluid border-radius w-100" 
                                    src="{{ asset('upload/blog/' . $blog->featured_image) }}"
                                    alt="{{ $blog->title }}"
                                    title="{{ $blog->title }}"
                                    loading="lazy">
                            </picture>
                        </div>
                    @endif
                    @if($blog->short_desc)
                        <p class="lead text-muted mb-4">{{ $blog->short_desc }}</p>
                    @endif
                    <div class="course-details">
                        <div class="paragraph-area">
                            {!! clean_html_content($blog->content) !!}
                        </div>
                    </div>
                    @if($blog->paragraphs && $blog->paragraphs->count() > 0)
                        @foreach($blog->paragraphs as $para)
                            <div class="mt-5 border-top pt-4">
                                @if($para->title)
                                    <h4 class="n2-color mb-3">{{ $para->title }}</h4>
                                @endif
                                @if($para->image && file_exists(public_path('upload/blog/' . $para->image)))
                                    <div class="mb-3">
                                        <img src="{{ asset('upload/blog/' . $para->image) }}" 
                                             class="img-fluid border-radius w-100" 
                                             alt="{{ $para->title }}" 
                                             loading="lazy">
                                    </div>
                                @endif
                                <div class="blog-paragr">
                                    <div class="paragraph-area">
                                        <div>{!! clean_html_content($para->content) !!}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    @if($blog->images && $blog->images->count() > 0)
                        <div class="row mt-5">
                            @foreach($blog->images as $img)
                                <div class="col-md-4 mb-3">
                                    <a href="{{ asset('upload/blog/' . $img->image) }}" data-fancybox="gallery" data-caption="{{ $img->alt_text }}">
                                        <img src="{{ asset('upload/blog/' . $img->image) }}" class="img-fluid border-radius w-100" alt="{{ $img->alt_text }}" loading="lazy">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            {{-- Sidebar: Related Blogs --}}
            <div class="col-lg-3">
                <div class="sidebar-wrapper cus-scrollbar">
                    <h4 class="n2-color mb-3">Recent Blogs</h4>
                    <ul class="list-unstyled">
                        @foreach($blogList as $related)
                            <li class="mb-3 border-bottom pb-2">
                                <a href="{{ route('blog.details', $related->slug) }}" class="text-decoration-none d-block">
                                    <div class="d-flex align-items-center gap-2">
                                        @if($related->featured_image && file_exists(public_path('upload/blog/' . $related->featured_image)))
                                            <img src="{{ asset('upload/blog/' . $related->featured_image) }}" alt="{{ $related->title }}" width="60" height="60" class="rounded" loading="lazy">
                                        @endif
                                        <span class="text-dark">{{ \Illuminate\Support\Str::limit($related->title, 50) }}</span>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
