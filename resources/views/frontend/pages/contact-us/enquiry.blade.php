@extends('frontend.layouts.master')
@section('title','Contact Mirrors Academy – Hyderabad Beauty Academy')
@section('description', 'Get in touch with Mirrors Academy, Hyderabad’s top hair and beauty academy. Call, email, or visit us to know more about our courses and enrollment process.')
@push('styles')

@endpush
@section('main-content')
<section class="banner-section inner-banner position-relative pt-10 pb-10">
    <div class="container position-relative cus-z1">
        <div class="row">
            <div class="col-xxl-12 cus-z1 text-center">
                <div class="section-area breadcrumb-area">
                    <h1 class="breadcrub-title">Contact Us</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact-section second s1-bg-color-rgb pt-60 pb-60 contact-us-page">
    <div class="container">
        <div class="row gy-8 gy-lg-0 align-items-center justify-content-center">
            <div class="col-md-9 col-lg-5 order-1 order-lg-0">
                <div class="d-grid gap-3 gap-md-4 reveal-single1 reveal-text text-one reveal-init">                   
                    <div class="section-text d-grid gap-3 gap-md-4">
                        <h2 class="fs-two">Have any Query? Get in touch with us!</h2>                        
                    </div>
                    
                    <div class="row">
                        <div class="col-12 col-xxl-6 d-flex flex-column gap-1 gap-md-1 mb-2">
                            <div class="contact-box">
                                <div class="d-flex gap-4 mb-2">
                                    <span class="d-center p6-color fs-five">
                                        <i class="ph ph-envelope-open"></i>
                                    </span>
                                    <span class="n2-color">Our Location</span>
                                </div>
                                <p class="n3-color">
                                    Honda Showroom, 2nd floor, Plot No.2, Krutika Layout, Hitech City Main Rd, opposite Pride, Hyderabad, Telangana 500081</p>
                            </div>
                        </div>
                        <div class="col-12 col-xxl-6 d-flex flex-column gap-1 gap-md-1">
                            <div class="contact-box">
                                <div class="d-flex gap-4 mb-2">
                                    <span class="d-center p6-color fs-five">
                                        <i class="ph ph-phone-call"></i>
                                    </span>
                                    <span class="n2-color">Call Us</span>
                                </div>
                                <p class="n3-color">
                                    <a href="tel:+919618991818" class="n3-color">+91-9618991818</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <ul class="d-center justify-content-center gap-2 gap-md-3 social-area mt-5">
                        <li>
                            <a href="https://www.facebook.com/MirrorsAcademy/" aria-label="Facebook" class="d-center n1-bg-color rounded-circle transition" target="_blank">
                                <span class="d-center fs-seven p6-color">
                                    <i class="fab fa-facebook-f"></i>
                                </span>
                            </a>
                        </li>                        
                        <li>
                            <a href="https://www.instagram.com/mirrorsacademy/" aria-label="Instagram" class="d-center n1-bg-color rounded-circle transition" target="_blank">
                                <span class="d-center fs-seven p6-color">
                                    <i class="fab fa-instagram"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/@MirrorsLuxurySalons" aria-label="dribbble" class="d-center n1-bg-color rounded-circle transition" target="_blank">
                                <span class="d-center fs-seven p6-color">
                                    <i class="fa-brands fa-youtube"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 d-grid gap-4 gap-md-6">
                <div class="form-area enquiry-form n1-bg-color d-grid gap-3 gap-md-4 px-3 px-md-7 py-4 py-md-7">
                    @include('frontend.layouts.enquiry-form')
                </div>
            </div>
        </div>
    </div>    
</section>
<section class="contact-section second pt-60 pb-60 contact-us-page-map">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="single-box position-relative position-relative">
                    <iframe src="https://maps.google.com/maps?q=Mirrors%20Academy%20of%20Hair%20and%20Beauty&t=m&z=10&output=embed&iwloc=near" class="border-0" title="Mirrors Academy of Hair and Beauty"></iframe>
                </div>
            </div>
        </div>
    </div>   
</section>



@endsection
@push('scripts')

@endpush