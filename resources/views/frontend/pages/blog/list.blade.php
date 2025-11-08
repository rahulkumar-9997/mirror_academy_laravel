@extends('frontend.layouts.master')
@section('title','Blog Mirrors Academy – Hyderabad Beauty Academy')
@section('description', 'Get in touch with Mirrors Academy, Hyderabad’s top hair and beauty academy. Call, email, or visit us to know more about our courses and enrollment process.')
@push('styles')

@endpush
@section('main-content')
<section class="banner-section inner-banner position-relative pt-5 pb-5">
    <div class="container position-relative cus-z1">
        <div class="row">
            <div class="col-xxl-12 cus-z1 text-center">
                <div class="section-area breadcrumb-area">
                    <h1 class="breadcrub-title">Blog</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="position-relative s1-bg-color-rgb our-courses">
    <div class="container">
        <div class="row cus-row justify-content-center">
            @if($blogs->count() > 0)
                @foreach($blogs as $blog)
                    <div class="col-md-4 col-lg-4 mb-3">
                        <div class="single-item d-grid gap-4 gap-md-4 transition d-center">
                            <div class="img-area position-relative d-center image-file">
                                <a href="{{ route('blog.details', $blog->slug) }}">
                                    <picture>
                                        <source 
                                            srcset="
                                                {{ asset('upload/blog/' . $blog->featured_image) }}?w=400&q=80 400w,
                                                {{ asset('upload/blog/' . $blog->featured_image) }}?w=800&q=80 800w,
                                                {{ asset('upload/blog/' . $blog->featured_image) }}?w=1200&q=80 1200w
                                            " 
                                            sizes="(max-width: 600px) 400px, (max-width: 992px) 800px, 1200px" 
                                            type="image/webp">
                                        <img 
                                            src="{{ asset('upload/blog/' . $blog->featured_image) }}?w=600&q=80&fm=jpg" 
                                            srcset="
                                                {{ asset('upload/blog/' . $blog->featured_image) }}?w=400&q=80&fm=jpg 400w,
                                                {{ asset('upload/blog/' . $blog->featured_image) }}?w=650&q=80&fm=jpg 800w,
                                                {{ asset('upload/blog/' . $blog->featured_image) }}?w=800&q=80&fm=jpg 1200w
                                            "
                                            sizes="(max-width: 600px) 400px, (max-width: 992px) 800px, 1200px"
                                            class="w-100 border-radius"
                                            alt="{{ $blog->title }}"
                                            loading="lazy"
                                            decoding="async">
                                    </picture>
                                </a>
                            </div>
                            <div class="abs-area">
                                <div class="d-grid gap-1 gap-md-2">
                                    <div class="course-content course-content-list">
                                        <a href="{{ route('blog.details', $blog->slug) }}">
                                            <h5 class="n2-color">
                                                {{ $blog->title }}
                                            </h5>
                                            <div>
                                                <p>
                                                    {!! clean_html_content(Str::limit(strip_tags($blog->short_desc ?? $blog->content), 150)) !!}
                                                </p>
                                            </div>
                                        </a>
                                        <div class="mt-2">
                                            <a href="{{ route('blog.details', $blog->slug) }}" class="btn btn-sm btn-outline-dark">
                                                Read More →
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- Pagination --}}
                <div class="col-12 mt-4">
                    <div class="d-flex justify-content-center">
                        {{ $blogs->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            @else
                <div class="col-12 text-center">
                    <p class="text-muted">No blogs available right now.</p>
                </div>
            @endif
        </div>
    </div>
</section>

@endsection
@push('scripts')

@endpush