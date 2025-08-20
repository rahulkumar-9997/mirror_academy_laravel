@extends('frontend.layouts.master')
@section('title','About Mirrors Academy – Top Beauty Institute in Hyderabad')
@section('description', 'Learn about Mirrors Academy, Hyderabad award-winning hair and beauty institute. Industry-led training, expert faculty & global certifications await you.')
@push('styles')

@endpush
@section('main-content')
<section class="banner-section inner-banner position-relative pt-10 pb-10">
    <div class="container position-relative cus-z1">
        <div class="row">
            <div class="col-xxl-12 cus-z1 text-center">
                <div class="section-area breadcrumb-area">
                    <h1 class="breadcrub-title">About Us</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-us second s1-bg-color-rgb position-relative pt-60 pb-60">
    <div class="container position-relative">       
        <div class="row align-items-center">
            <div class="col-md-6 pe-0 pe-lg-10 order-1 order-lg-0">
                <div class="image-area circle-text-bg d-center position-relative">
                    <div class="reveal-single reveal-object object-one">
                        <img src="{{asset('fronted/assets/mirror-img/about-us/awards.png')}}" class="w-100 mt-6 mt-lg-10 ms-4 ms-lg-20 circle-img border-radius" alt="awards">
                    </div>
                    <div class="circle-text position-absolute ms-0 ms-lg-n10 top-0 start-0 first n1-bg-color d-center z-1">
                        <div class="text">
                            <p class="fs-ten text-uppercase n2-color fw-mid">Year Experience * Year Experience * Year Experience *</p>
                        </div>
                        <div class="img-area p6-bg-color d-center position-relative rounded-circle cus-border border">
                            <span class="display-five n1-color position-absolute">25+</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 ps-3 ps-lg-10 overflow-hidden">
                <div class="d-grid gap-1 gap-md-1 pt-30">
                    <div class="section-area mb-2 mb-md-2 d-grid gap-1 gap-md-1 reveal-single reveal-text text-three">
                        <h2 class="fs-two">Our Story</h2>
                    </div>
                    <p class="n3-color">
                        Where excellence in beauty education meets unparalleled achievement. With a legacy spanning over a decade, Mirrors Academy has redefined beauty and wellness in Hyderabad, setting new standards in hair, body, and mind care. Our commitment to innovation and sophistication has earned us the prestigious title of a three-time National Award winner, including the esteemed National Award for Customer Service Excellence at the Indian Salon Awards 2013.
                    </p>
                    <p class="n3-color">
                        Established in the vibrant locales of Jubilee Hills and Madhapur, Mirrors Academy has consistently pushed boundaries in beauty education. We are renowned for our chic aesthetic and pioneering techniques, offering expertise in Hair Extensions, Eye-lash Extensions, Tattooing, Piercing, Air Brush Make-up, and Bridal Make-up. At Mirrors, we are dedicated to creating contemporary looks that seamlessly blend glamour with youth and vitality.
                    </p>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-6 mb-30 mb-sm-5">
                        <div class="feature-container feature-bx1 feature1 ab-page-feature">
                            <div class="icon-content">
                                <h4 class="ttr-title">
                                    Award-Winning Excellence
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 mb-30 mb-sm-5">
                        <div class="feature-container feature-bx1 feature1 ab-page-feature">
                            <div class="icon-content">
                                <h4 class="ttr-title">
                                    Celebrity-Favorite
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 mb-30 mb-sm-5">
                        <div class="feature-container feature-bx1 feature1 ab-page-feature">
                            <div class="icon-content">
                                <h4 class="ttr-title">
                                    Cutting-Edge Education
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 mb-30 mb-sm-5">
                        <div class="feature-container feature-bx1 feature1 ab-page-feature">
                            <div class="icon-content">
                                <h4 class="ttr-title">
                                    State-of-the-Art Facilities
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<section class="counter-section position-relative pt-60 pb-60 vission-mission">    
    <div class="container">
        <div class="row gy-3 gy-md-0 mb-4 mb-md-5 justify-content-between align-items-center">
            <div class="col-md-7">
                <div class="section-area d-grid gap-1 gap-md-1 reveal-single reveal-text text-one">
                    <span class="fw-semibold">Our Mission</span>
                    <p class="n3-color">
                        At Mirrors Academy, we are committed to nurturing talent and empowering individuals to excel in the art of beauty. Whether you aspire to be a skilled hairstylist, makeup artist, esthetician, or nail technician, our comprehensive programs and personalized mentorship will guide you towards a successful career in the beauty industry.
                    </p>
                    <span class="fw-semibold">Our Vision</span>
                    <p class="n3-color">
                       Our vision is to lead the next generation of beauty professionals by providing unparalleled education and fostering creativity in a dynamic and inclusive environment. We aspire to be the cornerstone of excellence in beauty education, empowering our students to innovate, inspire, and transform the industry worldwide.
                    </p>
                </div>
            </div>
            <div class="col-md-5">
                <div class="vission-mission-img">
                    <img src="{{asset('fronted/assets/mirror-img/about-us/vission-mission.jpg')}}" class="w-100 border-radius" alt="vission-mission">
                </div>
            </div>
        </div>        
    </div>
</section>
@endsection
@push('scripts')

@endpush