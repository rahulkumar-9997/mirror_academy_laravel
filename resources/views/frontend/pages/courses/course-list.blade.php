@extends('frontend.layouts.master')
@section('title','Hair & Beauty Courses – Mirrors Academy Hyderabad')
@section('description', 'Explore professional hair, beauty, and makeup courses at Mirrors Academy. Industry-certified programs, hands-on training & Oréal certification in Hyderabad.')
@section('main-content')
<section class="banner-section inner-banner position-relative pt-10 pb-10">
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
            <div class="col-md-4 col-lg-4">
                <div class="single-item d-grid gap-4 gap-md-4 transition d-center">
                    <div class="img-area position-relative d-center">
                        <a href="{{ route('courses.details', 'sss') }}">
                            <img src="{{asset('fronted/assets/mirror-img/courses/beginners-hairdressing-foundation.webp')}}" class="w-100"
                            alt="blog">
                        </a>
                    </div>
                    <div class="abs-area">
                        <div class="d-grid gap-1 gap-md-2">
                            <div class="course-content">
                                <a href="{{ route('courses.details', 'sss') }}">
                                    <h5 class="n2-color">
                                        Beginners Hairdressing Foundation
                                    </h5>
                                    <p class="n3-color">
                                        Over a comprehensive duration of 4 months, six days a week, you'll immerse
                                        yourself in the art and science of hairdressing, with professional and
                                        industry experts.
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="single-item d-grid gap-4 gap-md-4 transition d-center">
                    <div class="img-area position-relative d-center">
                        <a href="{{ route('courses.details', 'sss') }}">
                            <img src="{{asset('fronted/assets/mirror-img/courses/professional-aesthetician.webp')}}" class="w-100" alt="blog">
                        </a>
                    </div>
                    <div class="abs-area">
                        <div class="d-grid gap-1 gap-md-2">
                            <div class="course-content">
                                <a href="{{ route('courses.details', 'sss') }}">
                                    <h5 class="n2-color">
                                        Professional Aesthetician
                                    </h5>
                                    <p class="n3-color">
                                        Over a comprehensive duration of 4 months, six days a week, you'll immerse
                                        yourself in the art and science of hairdressing, with professional and
                                        industry experts.
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="single-item d-grid gap-4 gap-md-4 transition d-center">
                    <div class="img-area position-relative d-center">
                        <img src="{{asset('fronted/assets/mirror-img/courses/advance-haircut.webp')}}" class="w-100" alt="blog">
                    </div>
                    <div class="abs-area">
                        <div class="d-grid gap-1 gap-md-2">
                            <div class="course-content">
                                <a href="{{ route('courses.details', 'sss') }}">
                                    <h5 class="n2-color">
                                        Advance Haircut
                                    </h5>
                                    <p class="n3-color">
                                        Over a comprehensive duration of 4 months, six days a week, you'll immerse
                                        yourself in the art and science of hairdressing, with professional and
                                        industry experts.
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
@push('scripts')
@endpush