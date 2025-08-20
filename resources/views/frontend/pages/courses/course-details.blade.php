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
<section class="blog-details s1-bg-color pt-60 pb-60 position-relative">
    <div class="container">
        <div class="row justify-content-center gy-7 gy-xl-0">
            <div class="col-lg-12 gy-6 gy-lg-0">
                <div class="section-sidebar s1-bg-color position-relative">
                    <div class="sidebar-toggler position-relative">
                        <div class="row">
                            <div class="col-xl-8 col-xxl-8 cus-z1 mt-10 mt-xl-0 d-grid gap-7 gap-md-10">
                                <div class="single-area">
                                    <div class="single-item text-center">
                                        <img src="{{ asset('fronted/assets/mirror-img/courses/advance-haircut.webp')}}" alt="blog" class="border-radius">
                                    </div>
                                    <div class="course-de-ti mt-5">
                                        <h2 class="n2-color highlight-cursor-head cou-title">
                                            Leveraging AI for Smarter, More Engaging Presentations
                                        </h2>
                                    </div>
                                    <div class="course-details">
                                        <div class="paragraph-area d-grid gap-2 gap-md-3">
                                            <p class="n3-color">In the ever-evolving realm of software development, several trends are shaping the industry's landscape. Artificial intelligence and machine learning are revolutionizing tasks automation and data-driven insights. Cloud-native development is becoming prevalent, enabling scalable and resilient applications through containers and microservices. DevOps practices, coupled with CI/CD pipelines, streamline software delivery, fostering faster and more reliable releases. Low-code/no-code platforms empower non-developers to create custom solutions swiftly. IoT and edge computing are driving real-time data processing at network edges. Cybersecurity and data privacy measures are increasingly vital in software design. Blockchain technology is garnering attention for its potential in creating secure, decentralized applications. These trends collectively redefine software development methodologies, driving innovation and efficiency across diverse sectors.</p>

                                        </div>
                                    </div>
                                    <div class="course-addition-section accordion ttr-accordion1">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading1">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                                    Foundations of Hair Cutting & Highlighting
                                                </button>
                                            </h2>
                                            <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#accordionRow1">
                                                <div class="accordion-body">
                                                    <p class="mb-0">
                                                        Infertility is the inability to conceive after one year of regular, unprotected intercourse for women under 35, or after six months for women over 35.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading2">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                                                    Foundations of Hair Cutting & Highlighting
                                                </button>
                                            </h2>
                                            <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#accordionRow2">
                                                <div class="accordion-body">
                                                    <p class="mb-0">
                                                        Infertility is the inability to conceive after one year of regular, unprotected intercourse for women under 35, or after six months for women over 35.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-4 col-xxl-4">
                                <div class="sidebar-common cus-overflow cus-scrollbar sidebar-head secondary-sidebar me-n4 me-sm-1">
                                    <div class="d-center justify-content-end">
                                        <div class="d-block d-xl-none">
                                            <button class="button toggler-btn mb-4 mb-lg-0 d-flex align-items-center gap-2">
                                                <span>Sidebar Toggler</span>
                                                <span class="d-center fs-five n17-color">
                                                    <i class="ph ph-faders-horizontal"></i>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="cus-scrollbar side-wrapper rounded-4">
                                        <div class="sidebar-wrapper pb-12 pb-lg-0 d-flex flex-column gap-6">
                                            <div class="sidebar-area">
                                                <div class="d-grid n1-bg-color highlight_div">
                                                    <div class="item-wrapper">
                                                        <div class="highlight_title_div">
                                                            <h6 class="highlight_title">
                                                                Course Highlights:
                                                            </h6>
                                                        </div>
                                                        <div class="px-4 px-md-6 py-4 py-md-5">
                                                            <ul class="d-flex flex-column gap-2 gap-md-2">
                                                                <li class="content-area d-center justify-content-start gap-3 gap-md-4">
                                                                    <span class="co-icon rounded-circle">
                                                                        <i class="fa fa-graduation-cap"></i>
                                                                    </span>
                                                                    <div class="d-grid gap-1 gap-md-2">
                                                                        <h6 class="n2-color fw-semibold fs-eight">L'Oréal Professionnel ARTH Academy</h6>
                                                                    </div>
                                                                </li>
                                                                <li class="content-area d-center justify-content-start gap-3 gap-md-4">
                                                                    <span class="co-icon rounded-circle">
                                                                        <i class="fa fa-graduation-cap"></i>
                                                                    </span>
                                                                    <div class="d-grid gap-1 gap-md-2">
                                                                        <h6 class="n2-color fw-semibold fs-eight">
                                                                            Duration : 15 Days
                                                                        </h6>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sidebar-area">
                                                <div class="co-enquiry-today-btn">
                                                    <div class="bottom-area d-center mt-5 mt-md-5">
                                                        <a href="#" class="btn box-style box-second first-alt alt-two d-center gap-2 py-2 py-md-3 px-3 px-md-6 px-xl-9">
                                                            <span class="fs-seven">Enquire Today</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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