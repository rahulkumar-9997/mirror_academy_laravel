@extends('frontend.layouts.master')
@section('title','Hair & Beauty Courses – Mirrors Academy Hyderabad')
@section('description', 'Explore professional hair, beauty, and makeup courses at Mirrors Academy. Industry-certified programs, hands-on training & Oréal certification in Hyderabad.')
@section('main-content')
<section class="banner-section inner-banner position-relative pt-5 pb-5">
    <div class="container position-relative cus-z1">
        <div class="row">
            <div class="col-xxl-12 cus-z1 text-center">
                <div class="section-area breadcrumb-area">
                    <h1 class="breadcrub-title">Our Courses</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="position-relative s1-bg-color-rgb our-courses">
    <div class="container">
        <div class="row cus-row justify-content-center">
            @if(isset($data['courses']) && $data['courses']->count() > 0)
            @foreach($data['courses'] as $course)
            <div class="col-md-4 col-lg-4 mb-3">
                <div class="single-item d-grid gap-4 gap-md-4 transition d-center">
                    <div class="img-area position-relative d-center image-file">
                        <a href="{{ route('courses.details', $course->slug) }}">
                            <picture>
                                <source 
                                    srcset="
                                        {{ url('/images/courses/' . $course->main_image) }}?w=400&q=80 400w,
                                        {{ url('/images/courses/' . $course->main_image) }}?w=800&q=80 800w,
                                        {{ url('/images/courses/' . $course->main_image) }}?w=800&q=80 1200w
                                    " 
                                    sizes="(max-width: 600px) 400px, (max-width: 992px) 800px, 1200px" 
                                    type="image/webp">
                                <img 
                                    src="{{ url('/images/courses/' . $course->main_image) }}?w=600&q=80&fm=jpg" 
                                    srcset="
                                        {{ url('/images/courses/' . $course->main_image) }}?w=400&q=80&fm=jpg 400w,
                                        {{ url('/images/courses/' . $course->main_image) }}?w=650&q=80&fm=jpg 800w,
                                        {{ url('/images/courses/' . $course->main_image) }}?w=800&q=80&fm=jpg 1200w
                                    "
                                    sizes="(max-width: 600px) 400px, (max-width: 992px) 800px, 1200px"
                                    class="w-100 border-radius"
                                    alt="{{ $course->title }}"
                                    loading="lazy"
                                    decoding="async">
                            </picture>
                        </a>
                    </div>
                    <div class="abs-area">
                        <div class="d-grid gap-1 gap-md-2">
                            <div class="course-content course-content-list">
                                <a href="{{ route('courses.details', $course->slug) }}">
                                    <h5 class="n2-color">
                                        {{ $course->title }}
                                    </h5>
                                    <div>
                                        <p> {!! clean_html_content(Str::limit(strip_tags($course->description), 200)) !!}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endsection
@push('scripts')
@endpush