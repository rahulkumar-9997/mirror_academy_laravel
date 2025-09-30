@php
$metaTitle = $course->meta_title ?? $course->title. ' | Mirrors Academy Hyderabad';
$metaDesc = $course->meta_description ?? $course->short_content ?? $course->description;
$metaDescription = \Illuminate\Support\Str::limit(strip_tags($metaDesc), 160);
@endphp
@extends('frontend.layouts.master')
@section('title', $metaTitle)
@section('description', $metaDescription)
@push('styles')
<link rel="stylesheet" href="{{ asset('fronted/assets/js/plugins/fancybox/jquery.fancybox.min.css') }}">
@endpush
@section('main-content')
<section class="banner-section inner-banner position-relative pt-5 pb-5">
    <div class="container position-relative cus-z1">
        <div class="row">
            <div class="col-xxl-12 cus-z1 text-center">
                <div class="section-area breadcrumb-area">
                    <h1 class="breadcrub-title">
                        {{ $course->title }}
                    </h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog-details s1-bg-color-rgb pt-60 pb-60 position-relative">
    <div class="container">
        <div class="row justify-content-center gy-7 gy-xl-0">
            <div class="col-lg-12 gy-6 gy-lg-0">
                <div class="section-sidebar position-relative">
                    <div class="sidebar-toggler position-relative">
                        <div class="row">
                            <div class="col-xl-9 col-xxl-9 cus-z1 mt-10 mt-xl-0 d-grid gap-7 gap-md-10">
                                <div class="ttr-post-text single-area blog-post-data course-post-data">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h2 class="n2-color highlight-cursor-head cou-mobile-title ">
                                                {{ $course->title }}
                                            </h2>
                                            @php
                                            $imageUrl = null;
                                            if($course->page_image && file_exists(public_path('upload/courses/' . $course->page_image))) {
                                            $imageUrl = asset('upload/courses/' . $course->page_image);
                                            } elseif($course->main_image && file_exists(public_path('upload/courses/' . $course->main_image))) {
                                            $imageUrl = asset('upload/courses/' . $course->main_image);
                                            }
                                            @endphp

                                            @if($imageUrl)
                                            <div class="co-image-details">
                                                <picture>
                                                    <source media="(max-width: 767px)" srcset="{{ $imageUrl }}">
                                                    <img
                                                        class="img-fluid blur-up lazyload border-radius w-100"
                                                        data-src="{{ $imageUrl }}"
                                                        src="{{ $imageUrl }}"
                                                        srcset="{{ $imageUrl }} 600w, {{ $imageUrl }} 1200w"
                                                        sizes="(max-width: 600px) 600px, 1200px"
                                                        alt="{{ $course->title }}"
                                                        title="{{ $course->title }}"
                                                        loading="lazy"
                                                        width="300"
                                                        height="400"
                                                        onload="this.style.opacity=1"
                                                        style="opacity: 0; transition: opacity 0.5s;">
                                                </picture>
                                            </div>
                                            @endif
                                            <div class="text">
                                                <div class="course-de-ti">
                                                    @if($course->short_content)
                                                    <h4 class="n2-color highlight-cursor-head cou-title">
                                                        {{ $course->short_content }}
                                                    </h4>
                                                    @endif
                                                </div>
                                                <div class="course-details">
                                                    <div class="paragraph-area">
                                                        {!! clean_html_content($course->description) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            @if($course->additionalContents && $course->additionalContents->count() > 0)
                                            <div class="course-de-ti mt-5">
                                                <h2 class="n2-color highlight-cursor-head cou-title">
                                                    Course Module
                                                </h2>
                                            </div>
                                            <div class="course-addition-section eaightcoloumn accordion ttr-accordion1" id="accordionRow1">
                                                @foreach ($course->additionalContents as $additionalContent)
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="heading{{ $loop->index }}">
                                                        <button class="accordion-button"
                                                            type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapse{{ $loop->index }}"
                                                            aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                                            aria-controls="collapse{{ $loop->index }}">
                                                            {{ $additionalContent->title }}
                                                        </button>
                                                    </h2>
                                                    <div id="collapse{{ $loop->index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $loop->index }}"
                                                        data-bs-parent="#accordionRow1">
                                                        <div class="accordion-body additional-content-courses">
                                                            {!! clean_html_content($additionalContent->description) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            @endif

                                            <div class="d-grid n1-bg-color highlight_div faqs-couse">
                                                <div class="item-wrapper">
                                                    <div class="highlight_title_div">
                                                        <h6 class="highlight_title">
                                                            ACADEMY FAQ’S:
                                                        </h6>
                                                    </div>
                                                    <div class="px-2 px-md-2 py-2 py-md-2">
                                                        <div class="course-addition-section accordion ttr-accordion1" id="accordionRowFaqs">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="faqs1">
                                                                    <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaqs0" aria-expanded="true" aria-controls="collapseFaqs0">
                                                                        Who can join the courses offered by Mirrors academy?
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseFaqs0" class="accordion-collapse collapse show" aria-labelledby="faqs1" data-bs-parent="#accordionRowFaqs">
                                                                    <div class="accordion-body additional-content-courses">
                                                                        <p>
                                                                            Our courses are open to everyone passionate about beauty and hairstyling—whether you're a beginner, a salon professional, or someone looking to upgrade their skill.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="faqs2">
                                                                    <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaqs2" aria-expanded="true" aria-controls="collapseFaqs2">
                                                                        How do I enroll in a course?
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseFaqs2" class="accordion-collapse collapse" aria-labelledby="faqs2" data-bs-parent="#accordionRowFaqs">
                                                                    <div class="accordion-body additional-content-courses">
                                                                        <p>
                                                                            You can enroll online through our website and instagram, or visit our academy in person. Our team will guide you through the admission process.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="faqs3">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaqs3" aria-expanded="true" aria-controls="collapseFaqs3">
                                                                        Will I receive a certificate after completing the course?
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseFaqs3" class="accordion-collapse collapse" aria-labelledby="faqs3" data-bs-parent="#accordionRowFaqs">
                                                                    <div class="accordion-body additional-content-courses">
                                                                        <p>
                                                                            Yes, all our courses include a certification upon successful completion, which is recognized in the industry.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="faqs4">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaqs4" aria-expanded="true" aria-controls="collapseFaqs4">
                                                                        Are the training sessions practical or theoretical?
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseFaqs4" class="accordion-collapse collapse" aria-labelledby="faqs4" data-bs-parent="#accordionRowFaqs">
                                                                    <div class="accordion-body additional-content-courses">
                                                                        <p>
                                                                            Our training is a balanced mix of hands-on practical sessions, demonstrations, and essential theory, designed to prepare you for real-world work.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="accordion-item">
                                                                <h2 class="accordion-header" id="faqs5">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaqs5" aria-expanded="true" aria-controls="collapseFaqs5">
                                                                        What’s the duration of the courses?
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseFaqs5" class="accordion-collapse collapse" aria-labelledby="faqs5" data-bs-parent="#accordionRowFaqs">
                                                                    <div class="accordion-body additional-content-courses">
                                                                        <p>
                                                                            Each course has a different duration. You’ll find complete details under each course listing.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                            <!-- <div class="accordion-item">
                                                                <h2 class="accordion-header" id="faqs6">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaqs6" aria-expanded="true" aria-controls="collapseFaqs6">
                                                                        Are there any exams or assessments during the course?
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseFaqs6" class="accordion-collapse collapse" aria-labelledby="faqs6" data-bs-parent="#accordionRowFaqs">
                                                                    <div class="accordion-body additional-content-courses">
                                                                        <p>
                                                                            Yes, you’ll be evaluated through practicals and assignments to track your progress.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="faqs7">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaqs7" aria-expanded="true" aria-controls="collapseFaqs7">
                                                                        Will I learn current trends and international techniques?
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseFaqs7" class="accordion-collapse collapse" aria-labelledby="faqs7" data-bs-parent="#accordionRowFaqs">
                                                                    <div class="accordion-body additional-content-courses">
                                                                        <p>
                                                                            Yes, you’ll be evaluated through practicals and assignments to track your progress.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="accordion-item">
                                                                <h2 class="accordion-header" id="faqs8">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaqs8" aria-expanded="true" aria-controls="collapseFaqs8">
                                                                        Are the courses available online?
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseFaqs8" class="accordion-collapse collapse" aria-labelledby="faqs8" data-bs-parent="#accordionRowFaqs">
                                                                    <div class="accordion-body additional-content-courses">
                                                                        <p>
                                                                            No, we don’t offer online classes. Our courses are designed for in-person training, as the practical sessions require hands-on experience and personalized guidance for the best learning outcome.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div> -->

                                                            <!-- <div class="accordion-item">
                                                                <h2 class="accordion-header" id="faqs9">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaqs9" aria-expanded="true" aria-controls="collapseFaqs9">
                                                                        Do I get to work on real clients during the training?
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseFaqs9" class="accordion-collapse collapse" aria-labelledby="faqs9" data-bs-parent="#accordionRowFaqs">
                                                                    <div class="accordion-body additional-content-courses">
                                                                        <p>
                                                                            Yes, you’ll have opportunities to practice on live models under the guidance of our expert trainers.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="faqs10">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaqs10" aria-expanded="true" aria-controls="collapseFaqs10">
                                                                        Is EMI or installment payment available?
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseFaqs10" class="accordion-collapse collapse" aria-labelledby="faqs10" data-bs-parent="#accordionRowFaqs">
                                                                    <div class="accordion-body additional-content-courses">
                                                                        <p>
                                                                            Yes. We offer flexible installment payment options. Please connect with our team for details.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="accordion-item">
                                                                <h2 class="accordion-header" id="faqs11">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaqs11" aria-expanded="true" aria-controls="collapseFaqs11">
                                                                        Are the trainers certified or experienced?
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseFaqs11" class="accordion-collapse collapse" aria-labelledby="faqs11" data-bs-parent="#accordionRowFaqs">
                                                                    <div class="accordion-body additional-content-courses">
                                                                        <p>
                                                                            Yes, all our trainers are professionally certified and have real industry experience.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div> -->

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-3 col-xxl-3">
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
                                    <div class="cus-scrollbar side-wrapper">
                                        <div class="sidebar-wrapper pb-12 pb-lg-0 d-flex flex-column gap-3 mobile-sidebar-bg-color">
                                            <div class="sidebar-area">
                                                @php
                                                $certificates = [
                                                [
                                                'image' => $course->course_certificate,
                                                'title' => $course->course_certificate_title_1,
                                                ],
                                                [
                                                'image' => $course->course_certificate_image_2,
                                                'title' => $course->course_certificate_title_2,
                                                ],
                                                ];

                                                $certCount = collect($certificates)->filter(fn($c) => !empty($c['image']))->count();
                                                $colClass = $certCount === 1 ? 'col-lg-12' : 'col-lg-12';
                                                @endphp

                                                <div class="row">
                                                    @foreach($certificates as $cert)
                                                    @if($cert['image'])
                                                    <div class="{{ $colClass }} mb-sm-1 mb-md-1 mb-lg-5 mb-xl-3 pe-xl-0 ps-xl-2 mb-3">
                                                        <div class="rounded-1">
                                                            <div class="item-wrapper">
                                                                <div class="certificate_img">
                                                                    <div class="single-item position-relative">
                                                                        <a class="lightbox"
                                                                            title="{{ $course->title }}"
                                                                            data-fancybox="{{ $course->title }}"
                                                                            data-caption="{{ $course->title }}"
                                                                            href="{{ asset('upload/courses/' . $cert['image']) }}">
                                                                            <img src="{{ asset('upload/courses/' . $cert['image']) }}" class="w-100" alt="{{ $course->title }}" loading="lazy">
                                                                        </a>
                                                                    </div>
                                                                    @if($cert['title'])
                                                                    <div class="course-certificate-title">
                                                                        <h5>{{ $cert['title'] }}</h5>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @endforeach
                                                </div>

                                            </div>
                                            <div class="sidebar-area">
                                                @if($course->highlightsContents && $course->highlightsContents->count() > 0)
                                                <div class="course-eligibity-section mt-1">
                                                    <div class="course_eligibity-title">
                                                        <div class="course-de-ti">
                                                            <h2 class="n2-color highlight-cursor-head cou-title">
                                                                Course Highlights
                                                            </h2>
                                                        </div>
                                                        <div class="course_el_content mt-5">
                                                            <div class="row">
                                                                @foreach ($course->highlightsContents as $highlightsContent)
                                                                <div class="col-lg-6 mb-3 mb-sm-1 mb-md-1 mb-lg-5 mb-xl-3 pe-xl-0 ps-xl-2">
                                                                    <div class="co-eligibity-cont single-item nc-bg-color px-3 px-md-3 py-3 py-md-3">
                                                                        <div class="icon-area-c">
                                                                            <span>
                                                                                <i class="{{ $highlightsContent->icon}}"></i>
                                                                            </span>
                                                                        </div>
                                                                        <p>
                                                                            {{ $highlightsContent->content }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @if($course->course_pdf_file)
                                                <div class="course-pdf-file">
                                                    <div class="bottom-area d-center mt-5 mt-md-5 mb-3">
                                                        <a href="{{ asset('upload/courses/' . $course->course_pdf_file) }}"
                                                            class="btn box-style box-second first-alt alt-two d-center gap-2 py-2 py-md-3 px-3 px-md-6 px-xl-9" download="{{ $course->course_pdf_file }}">
                                                            <span class="fs-seven">Download Course PDF File</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="co-enquiry-today-btn">
                                                    <div class="bottom-area d-center mt-2 mt-md-5">
                                                        <a href="javascript:void(0)"
                                                            data-popup-enquiry="true"
                                                            data-title="Enquiry to ({{ $course->title }})"
                                                            data-url="{{ route('course-enquiry') }}"
                                                            data-size="md"
                                                            data-coursename="{{ $course->title }}"
                                                            class="btn box-style box-second first-alt alt-two d-center gap-2 py-2 py-md-3 px-3 px-md-6 px-xl-9">
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
@include('frontend.layouts.common-modal')
@endsection
@push('scripts')
<script src="{{ asset('fronted/assets/js/plugins/fancybox/jquery.fancybox.js') }}"></script>
@endpush