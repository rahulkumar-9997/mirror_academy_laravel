@extends('frontend.layouts.master')
@section('title','About Mirrors Academy – Top Beauty Institute in Hyderabad')
@section('description', 'Learn about Mirrors Academy, Hyderabad award-winning hair and beauty institute. Industry-led training, expert faculty & global certifications await you.')
@push('styles')

@endpush
@section('main-content')
<section class="banner-section inner-banner position-relative pt-5 pb-5">
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
                    <div class="reveal-single1 reveal-object object-one aboutimg">
                        <img src="{{asset('fronted/assets/mirror-img/about-us/founder.jpg')}}" class="w-100 mt-6 mt-lg-10 ms-4 circle-img border-radius" alt="awards" loading="lazy">
                    </div>
                    <div class="circle-text position-absolute ms-0 ms-lg-n10 top-0 start-0 first n1-bg-color d-center z-1">
                        <div class="text">
                            <p class="fs-ten text-uppercase n2-color fw-mid">Year Experience * Year Experience * </p>
                        </div>
                        <div class="img-area p6-bg-color d-center position-relative rounded-circle cus-border border">
                            <span class="exp-font n1-color position-absolute">12+</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 ps-3 ps-lg-10 overflow-hidden">
                <div class="d-grid gap-1 gap-md-1 pt-30">
                    <div class="section-area mb-2 mb-md-2 d-grid gap-1 gap-md-1 reveal-single1 reveal-text text-three">
                        <h2 class="fs-two">Founder of Mirrors Luxury Salons & Academy</h2>
                    </div>
                    <p class="n3-color">
                       When I started Mirrors Luxury Salons over 25 years ago, my dream was to put Hyderabad on the global beauty and fashion map. Mirrors soon became a symbol of luxury, innovation, and trust.
                    </p>
                    <p class="n3-color">
                       But I realized that true transformation comes through education because while salons can change appearances, education changes lives.
                    </p>
                    <p class="n3-color">
                      That vision gave birth to Mirrors Academy of Hair & Beauty - an institution that nurtures raw talent, builds skills, and creates career opportunities.
                    </p>
                    <p class="n3-color">
                      With support from global partners like L’Oréal Professionnel, our academy maintains the same world-class standards that define our salons. We focus on technical excellence, creativity, and confidence, ensuring every student is equipped to thrive in the hair and beauty industry.
                    </p>
                    <p class="n3-color">
                      At Mirrors Academy, ambition finds guidance, and passion finds purpose building the next generation of hair and beauty professionals and continuing the legacy of Mirrors.
                    </p>
                    <p>
                       <strong> — Dr. Vijayalakshmi Goodapati</strong>
                    </p>
                </div>
                <!-- <div class="row">
                    <div class="col-6 col-lg-6 col-sm-6 mb-30 mb-sm-5">
                        <div class="feature-container feature-bx1 feature1 ab-page-feature">
                            <div class="icon-content">
                                <h4 class="ttr-title">
                                    Award-Winning Excellence
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-6 col-sm-6 mb-30 mb-sm-5">
                        <div class="feature-container feature-bx1 feature1 ab-page-feature">
                            <div class="icon-content">
                                <h4 class="ttr-title">
                                    State-of-the-Art Facilities
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-6 col-sm-6 mb-30 mb-sm-5">
                        <div class="feature-container feature-bx1 feature1 ab-page-feature">
                            <div class="icon-content">
                                <h4 class="ttr-title">
                                    Expert educators
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-6 col-sm-6 mb-30 mb-sm-5">
                        <div class="feature-container feature-bx1 feature1 ab-page-feature">
                            <div class="icon-content">
                                <h4 class="ttr-title">
                                   World-Class Standards
                                </h4>
                            </div>
                        </div>
                    </div>
                </div> -->

            </div>
        </div>
    </div>
</section>
<section class="counter-section position-relative pt-60 pb-60 vission-mission">    
    <div class="container">
        <div class="row gy-3 gy-md-0 mb-4 mb-md-5 justify-content-between align-items-center">
            <div class="col-md-7">
                <div class="section-area d-grid gap-1 gap-md-1 reveal-single1 reveal-text text-one">
                    <span class="fw-semibold">Our Story</span>
                    <p class="n3-color">
                        At Mirrors Academy, we believe education in hair and beauty is not just about learning skills, it’s about shaping the future leaders of the industry.

                    </p>
                    <p class="n3-color">
                       Founded with a vision to raise the standards of professional training, Mirrors Academy offers world-class education in hair and beauty, blending global techniques with hands-on learning. Guided by expert educators and powered by state-of-the-art facilities, our structured programs focus on creativity, innovation, and discipline.
                    </p>
                    <p class="n3-color">
                      Beyond technical mastery, we emphasize personality development, client communication, and business skills, preparing our students to become confident professionals, entrepreneurs, and trendsetters.
                    </p>
                    <p class="n3-color">
                     Award-winning excellence, expert mentors, and world-class standards make Mirrors Academy a trusted destination for aspiring stylists who wish to turn their passion into a rewarding career.
                    </p>
                    <p class="n3-color">
                     Here, education meets artistry and ambition meets opportunity.
                    </p>
                </div>
            </div>
            <div class="col-md-5">
                <div class="vission-mission-img">
                    <img src="{{asset('fronted/assets/mirror-img/about-us/vission-mission-new.jpg')}}" class="w-100 border-radius" alt="vission-mission" loading="lazy">
                </div>
            </div>
            <!-- <div class="col-lg-12">
                <div class="section-area d-grid gap-1 gap-md-1 reveal-single1 reveal-text text-one">
                    
                    <span class="fw-semibold">Our Mission</span>
                    <p class="n3-color">
                        At Mirrors Academy, we are committed to nurturing talent and empowering individuals to excel in the art of hair and beauty. Whether you aspire to be a skilled hairstylist or esthetician, our comprehensive programs and personalized mentorship will guide you towards a successful career in the hair and beauty industry.
                    </p>
                    <span class="fw-semibold">Our Vision</span>
                    <p class="n3-color">
                        Our vision is to lead the next generation of hair and beauty professionals by providing unparalleled education and fostering creativity in a dynamic and inclusive environment. We aspire to be the cornerstone of excellence in hair and beauty education, empowering our students to innovate, inspire, and transform the industry worldwide.
                    </p>
                </div>
            </div> -->
        </div>        
    </div>
</section>
@endsection
@push('scripts')

@endpush