@php
$metaTitle = $course->meta_title ?? $course->title. ' | Mirrors Academy Hyderabad';
$metaDesc = $course->meta_description ?? $course->short_content ?? $course->description;
$metaDescription = \Illuminate\Support\Str::limit(strip_tags($metaDesc), 160);
@endphp
@extends('frontend.layouts.master')
@section('title', $metaTitle)
@section('description', $metaDescription)
@section('main-content')
<section class="banner-section inner-banner position-relative pt-10 pb-10">
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
                <div class="section-sidebar s1-bg-color-rgb position-relative">
                    <div class="sidebar-toggler position-relative">
                        <div class="row">
                            <div class="col-xl-8 col-xxl-8 cus-z1 mt-10 mt-xl-0 d-grid gap-7 gap-md-10">
                                <div class="ttr-post-text single-area blog-post-data">
                                    @if($course->page_image && file_exists(public_path('upload/courses/' . $course->page_image)))
                                    <div class="single-item text-center">
                                        <img src="{{ asset('upload/courses/' . $course->page_image) }}" alt="{{ $course->title }}" class="border-radius w-100" loading="lazy">
                                    </div>
                                    @elseif($course->main_image && file_exists(public_path('upload/courses/' . $course->main_image)))
                                    <div class="single-item text-center">
                                        <img src="{{ asset('upload/courses/' . $course->main_image) }}" alt="{{ $course->title }}" class="border-radius w-100">
                                    </div>
                                    @endif
                                    <div class="course-de-ti mt-5">
                                        @if($course->short_content)
                                        <h4 class="n2-color highlight-cursor-head cou-title">
                                            {{ $course->short_content }}
                                        </h4>
                                        @else
                                        <h2 class="n2-color highlight-cursor-head cou-title">
                                            {{ $course->title }}
                                        </h2>
                                        @endif
                                    </div>
                                    <div class="course-details">
                                        <div class="paragraph-area d-grid gap-2 gap-md-3">
                                            {!! clean_html_content($course->description) !!}
                                        </div>
                                    </div>
                                    @if($course->additionalContents && $course->additionalContents->count() > 0)
                                    <div class="course-addition-section accordion ttr-accordion1" id="accordionRow1">
                                        @foreach ($course->additionalContents as $additionalContent)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading{{ $loop->index }}">
                                                <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}"
                                                    type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapse{{ $loop->index }}"
                                                    aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                                    aria-controls="collapse{{ $loop->index }}">
                                                    {{ $additionalContent->title }}
                                                </button>
                                            </h2>
                                            <div id="collapse{{ $loop->index }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="heading{{ $loop->index }}"
                                                data-bs-parent="#accordionRow1">
                                                <div class="accordion-body additional-content-courses">
                                                    {!! clean_html_content($additionalContent->description) !!}
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
                                    @if($course->eligibilitiesContent && $course->eligibilitiesContent->count() > 0)
                                        <div class="course-eligibity-section mt-10">
                                            <div class="course_eligibity-title">
                                                <div class="course-de-ti mt-5">
                                                    <h2 class="n2-color highlight-cursor-head cou-title">
                                                        Eligibility
                                                    </h2>
                                                </div>
                                                <div class="course_el_content mt-5">
                                                    <div class="row">
                                                        @foreach ($course->eligibilitiesContent as $eligibilitiesContent)
                                                            <div class="col-lg-4 mb-3">
                                                                <div class="co-eligibity-cont single-item nc-bg-color px-3 px-md-3 py-3 py-md-3">
                                                                    <div class="icon-area-c">
                                                                        <span>
                                                                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                                        </span>
                                                                    </div>
                                                                    <p>
                                                                        {{ $eligibilitiesContent->content }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
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
                                    <div class="cus-scrollbar side-wrapper">
                                        <div class="sidebar-wrapper pb-12 pb-lg-0 d-flex flex-column gap-6 mobile-sidebar-bg-color">
                                            <div class="sidebar-area">
                                                <div class="d-grid rounded-1">
                                                    <div class="item-wrapper">
                                                        <div class="courses-bg-color">
                                                            <div class="course_title_div">
                                                                <h6 class="highlight_title">
                                                                    A Course By
                                                                </h6>
                                                            </div>
                                                            <div class="">
                                                                <div class="courses-img">
                                                                    <img src="{{asset('fronted/assets/mirror-img/Mirros-Academy-Logo-white.png')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           @if($course->course_duration || $course->course_opening_days)
                                            <div class="course_duration_section">
                                                <div class="course_duration_wrapper ">
                                                    @if($course->course_duration)
                                                        <div class="co-duration">
                                                            <div class="duration-icon d-center justify-content-center gap-3 gap-md-4">
                                                                <div class="du_icon ">
                                                                    <span class="co-icon rounded-circle">
                                                                        <i class="fa fa-calendar-days"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="du_content">
                                                                    <h6>Duration</h6>
                                                                </div>
                                                            </div>
                                                            <div class="duration_content">
                                                                <div class="coueli">
                                                                    {{ $course->course_duration }}
                                                                </div>
                                                                @if($course->course_opening_days)
                                                                <span>
                                                                    <em>{{ $course->course_opening_days }}</em>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if($course->course_timings)
                                                        <div class="co-timings">
                                                            <div class="duration-icon d-center justify-content-center gap-3 gap-md-4">
                                                                <div class="du_icon ">
                                                                    <span class="co-icon rounded-circle">
                                                                        <i class="far fa-clock"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="du_content">
                                                                    <h6>Timings</h6>
                                                                </div>
                                                            </div>
                                                            <div class="duration_content">
                                                                <div class="coueli">
                                                                    {{ $course->course_timings }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            @endif
                                            @if($course->highlightsContents && $course->highlightsContents->count() > 0)
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
                                                                @foreach ($course->highlightsContents as $highlightsContent)
                                                                <li class="content-area d-center justify-content-start gap-3 gap-md-4">
                                                                    <span class="co-icon rounded-circle">
                                                                        <i class="{{ $highlightsContent->icon}}"></i>
                                                                    </span>
                                                                    <div class="d-grid gap-1 gap-md-2">
                                                                        <h6 class="n2-color fw-semibold fs-eight">
                                                                            {{ $highlightsContent->content }}
                                                                        </h6>
                                                                    </div>
                                                                </li>
                                                                @endforeach

                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="sidebar-area">
                                                <div class="co-enquiry-today-btn">
                                                    <div class="bottom-area d-center mt-5 mt-md-5">
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

@endpush