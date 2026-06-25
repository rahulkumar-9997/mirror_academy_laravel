@extends('frontend.layouts.master')
@section('title', 'Course Registration | Mirrors Academy Hyderabad')
@section('description', 'Register for professional hair, beauty, makeup, and salon management courses at Mirrors Academy Hyderabad. Start your journey with industry-recognized training and expert guidance.')
@section('main-content')
<section class="banner-section inner-banner position-relative pt-5 pb-5">
    <div class="container position-relative cus-z1">
        <div class="row">
            <div class="col-xxl-12 cus-z1 text-center">
                <div class="section-area breadcrumb-area">
                    <h1 class="breadcrub-title">Course Registration</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="position-relative s1-bg-color-rgb our-courses">
    <div class="container">
        <div class="row cus-row justify-content-center">
            <div class="col-lg-8 d-grid gap-4 gap-md-6">
                <div class="form-area enquiry-form n1-bg-color d-grid gap-3 gap-md-4 px-3 px-md-7 py-4 py-md-7">
                  @include('frontend.layouts.enquiry-form', ['showCourse' => $courses])
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
@endpush