@extends('frontend.layouts.master')
@section('title','Mirrors Academy – Hair, Makeup & Styling Course in Hyderabad')
@section('description', 'Mirrors Academy – Hair, Makeup & Styling Course in Hyderabad')
@section('main-content')
@if(isset($data['banners']) && $data['banners']->count() > 0)
<section id="banner" class="banner-section">
   <div class="swiper-container bannerSlider">
      <div class="swiper-wrapper">
         @foreach($data['banners'] as $banner)
         <div class="swiper-slide">
            <img src="{{ asset('upload/banner/' . $banner->banner_desktop_img) }}" class="dexImg" width="100%" alt="{{ $banner->banner_heading_name }}" loading="lazy" decoding="async">
            <img src="{{ asset('upload/banner/' . $banner->banner_mobile_img) }}" class="mobileBanner" width="100%" alt="{{ $banner->banner_heading_name }}" loading="lazy" decoding="async">
            <div class="container">
               <div class="bannerTextBox">
                  <h3>
                     {{ $banner->banner_heading_name }}
                  </h3>
               </div>
            </div>
         </div>
         @endforeach
      </div>
      <div class="swiper-pagination bannerSlider-pagination"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
   </div>
</section>
@endif
<section class="about-us second position-relative about-us-section">
   <div class="container position-relative">
      <div class="row justify-content-center text-center">
         <div class="col-lg-8">
            <div class="section-area mb-3 mb-md-5 d-grid gap-2 gap-md-2 reveal-single1 reveal-text text-three">
               <h1 class="fs-two">Mirrors Academy of Hair & Beauty</h1>
               <h2 class="ab-h2 subheading-og">
                  Master the art of styling in the most professional way
               </h2>
            </div>
            <div class="about-us-content">
               <p class="n3-color">
                  Mirrors Academy is the education and training arm of Mirrors Luxury Salons, designed to shape the next generation of hair and beauty professionals. With state-of-the-art facilities, expert faculty, and a globally aligned curriculum, the Academy blends creativity with technical expertise to deliver industry-ready training. Students gain hands-on experience in a professional salon environment, along with mentorship and career guidance that prepare them for real-world opportunities. Whether aspiring to join top salons, work with celebrities, or start their own ventures, Mirrors Academy equips learners with the skills, confidence, and professionalism to succeed.
               </p>
               
            </div>
         </div>
      </div>
      @if(isset($data['awards']) && $data['awards']->count() > 0)
      <div class="awards-area mt-6 mb-5">
         <div class="row gy-10 gy-md-0 justify-content-between awards-row-home">
            <div class="col-lg-12">
               <div class="swiper moments-carousel awards-carousel">
                  <div class="swiper-wrapper">
                     @foreach ($data['awards'] as $award)
                     <div class="swiper-slide transition">
                        <div class="single-item mt-2 awards-box d-center flex-column">
                           <div class="img-area">
                              <img src="{{ asset('upload/awards/' . $award->image) }}"
                                 class="w-100 transition-sec position-relative z-1" alt="img" loading="lazy" decoding="async">
                           </div>
                           <div class="text-content awards-content-hm text-center">
                              <div class="awards-title">
                                 <p class="n3-color">
                                    {!! Str::limit($award->description, 150) !!}
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endforeach
                  </div>
                  <div class="swiper-button-next"></div>
                  <div class="swiper-button-prev"></div>
               </div>
            </div>
         </div>
      </div>
      @endif
   </div>
</section>
@if(isset($data['courses']) && $data['courses']->count() > 0)
<section class="position-relative n1-bg-color our-courses pt-5">
   <div class="container">
      <div class="row gy-6 gy-md-0 mb-8 mb-md-8 justify-content-center text-center">
         <div class="col-md-8 col-lg-8 col-xl-8">
            <div class="section-area d-grid gap-3 gap-md-4 reveal-single1 reveal-text text-three">
               <h1 class="fs-two">Our Courses</h1>
               <h2 class="ou-h2">
                  Explore Certified Hair and Beauty Courses at Mirrors Academy, Hyderabad
               </h2>
            </div>
         </div>
      </div>
      <div class="row cus-row justify-content-center">
         @foreach($data['courses'] as $course)
         <div class="col-md-4 col-lg-4 mb-3">
            <div class="single-item d-grid gap-4 gap-md-4 transition d-center">
               <div class="img-area position-relative d-center image-file">
                  <a href="{{ route('courses.details', $course->slug) }}">
                    <picture>
                     <source 
                        srcset="
                              {{ url('/images/courses/' . $course->main_image) }}?w=400&q=80 400w,
                              {{ url('/images/courses/' . $course->main_image) }}?w=650&q=80 800w,
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
      </div>
      <div class="bottom-area d-center mt-6 mt-md-6">
         <a href="{{ route('courses') }}" class="btn box-style box-second first-alt alt-two d-center gap-2 py-2 py-md-3 px-3 px-md-6 px-xl-9">
            <span class="fs-seven">View All Courses</span>
         </a>
      </div>
   </div>
</section>
@endif
<!-- <section class="review-section s1-bg-color position-relative pt-120 pb-120 google-reviews-section">
   <div class="container">
      <div class="row gy-6 gy-md-0 mb-8 mb-md-10 justify-content-center text-center">
         <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="section-area d-grid gap-3 gap-md-4 reveal-single1 reveal-text text-three reveal-init">
               <h4 class="fs-two">Hear it Out from the reviewers</h4>
            </div>
         </div>
      </div>
      <div class="row gy-6 gy-lg-0 align-items-center justify-content-between">
         <div class="elfsight-app-af610a27-73ec-4ee3-8d90-a1d14865a321" data-elfsight-app-lazy></div>
      </div>
   </div>
</section> -->
<section class="why-choose-us event-section second position-relative pb-120 pt-120 why-choose-section">
   <div class="container">
      <div class="row gy-6 gy-md-0 mb-8 mb-md-10 justify-content-center text-center">
         <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="section-area d-grid gap-3 gap-md-4 reveal-single1 reveal-text text-three reveal-init">
               <h2 class="fs-two">Why Choose Us?</h2>
            </div>
         </div>
      </div>
      <div class="row cus-row gy-6 gy-xxl-7 counter-area second justify-content-center justify-content-md-start">
         <!-- HTML -->
         <div class="our-approach-content">
            <div class="benefit-column">
               <div class="benefit-item highlight">
                  <div class="benefit-icon">
                     <img src="{{asset('fronted/assets/mirror-img/choose-us/new/expert-education.svg')}}" alt="Expert Educators" loading="lazy" decoding="async">
                  </div>
                  <div class="benefit-content">
                     <h3>Expert Educators</h3>
                     <p>Master luxury salon techniques with expert training from L'Oréal Professionals.</p>
                  </div>
               </div>
               <div class="benefit-item highlight">
                  <div class="benefit-icon">
                     <img src="{{asset('fronted/assets/mirror-img/choose-us/new/live-models.svg')}}" alt="Live Models" decoding="async">
                  </div>
                  <div class="benefit-content">
                     <h3>Live Models</h3>
                     <p>Hands-on Training with Live Models for Real-World Experience.</p>
                  </div>
               </div>
               <div class="benefit-item highlight">
                  <div class="benefit-icon">
                     <img src="{{asset('fronted/assets/mirror-img/choose-us/new/student-kit.svg')}}" alt="Student Kit" decoding="async">
                  </div>
                  <div class="benefit-content">
                     <h3>Student Kit</h3>
                     <p>Fully Equipped with Premium Professional Tools for Hands-On Training.</p>
                  </div>
               </div>               
               <div class="benefit-item highlight">
                  <div class="benefit-icon">
                     <img src="{{asset('fronted/assets/mirror-img/choose-us/new/unque-curicculm.svg')}}" alt="Unique Curriculum" loading="lazy" decoding="async">
                  </div>
                  <div class="benefit-content">
                     <h3>Unique Curriculum</h3>
                     <p>Stay ahead with cutting-edge techniques, advanced equipment, and the latest industry trends.</p>
                  </div>
               </div>               
            </div>
         </div>
         <div class="our-approach-content our-approach-second">
            <div class="benefit-column">
               <div class="benefit-item highlight">
                  <div class="benefit-icon before-icon-in-mobile">
                     <img src="{{asset('fronted/assets/mirror-img/choose-us/new/dual-certification.svg')}}" alt="Dual Certification" loading="lazy" decoding="async">
                  </div>
                  <div class="benefit-content">
                     <h3>Dual Certification</h3>
                     <p>With an International Diploma from L'Oréal Paris Professional and trained at Mirrors Luxury Salon.</p>
                  </div>
               </div>
               <div class="benefit-item highlight">
                  <div class="benefit-icon">
                     <img src="{{asset('fronted/assets/mirror-img/choose-us/new/job-rediness.svg')}}" alt="Job Readiness" loading="lazy" decoding="async">
                  </div>
                  <div class="benefit-content">
                     <h3>Job Readiness</h3>
                     <p>Equipped with skills to be employable as soon as the course is completed.</p>
                  </div>
               </div>
               <div class="benefit-item highlight">
                  <div class="benefit-icon">
                     <img src="{{asset('fronted/assets/mirror-img/choose-us/new/real-world-exposure.svg')}}" alt="Real World Exposure" loading="lazy" decoding="async">
                  </div>
                  <div class="benefit-content">
                     <h3>Real World Exposure</h3>
                     <p>
                        Industry guest visits, salon exposure, and field trips to key industry locations.
                     </p>
                  </div>
               </div>
               <div class="benefit-item highlight last-last">
                  <div class="benefit-icon">
                     <img src="{{asset('fronted/assets/mirror-img/choose-us/new/community-engaement.svg')}}" alt="Community Engagement" loading="lazy" decoding="async">
                  </div>
                  <div class="benefit-content">
                     <h3>Community Engagement</h3>
                     <p>
                       Give your skills back to the deserving people in the community.
                     </p>
                  </div>
               </div>
            </div>
         </div>

         <!-- <div class="col-9 col-md-3 col-xl-3">
            <div class="single-box position-relative z-1 n1-bg-color py-4 py-md-4 px-4 px-md-4 d-center flex-column gap-1 gap-md-2 text-center why-choose-box">
               <div class="box-img mb-2 mb-md-2">
                  <img src="{{asset('fronted/assets/mirror-img/choose-us/expert-educators.svg')}}" class="transition svg-img"
                     alt="img" loading="lazy">
               </div>
               <div class="d-center gap-2 text-center">
                  <h6 class="fs-six fw-semibold n2-color transition">
                     Expert Educators
                  </h6>
               </div>
               <p class="n3-color transition">
                  Master luxury salon techniques with expert training from L'Oréal Professionals.
               </p>
            </div>
         </div>
         <div class="col-9 col-md-3 col-xl-3">
            <div class="single-box position-relative z-1 n1-bg-color py-4 py-md-4 px-4 px-md-4 d-center flex-column gap-1 gap-md-2 text-center why-choose-box">
               <div class="box-img mb-2 mb-md-2">
                  <img src="{{asset('fronted/assets/mirror-img/choose-us/live-models.svg')}}" class="transition svg-img"
                     alt="img" loading="lazy">
               </div>
               <div class="d-center gap-2 text-center">
                  <h6 class="fs-six fw-semibold n2-color transition">
                     Live Models
                  </h6>
               </div>
               <p class="n3-color transition">
                  Hands-on Training with Live Models for Real-World Experience.
               </p>
            </div>
         </div>
         <div class="col-9 col-md-3 col-xl-3">
            <div class="single-box position-relative z-1 n1-bg-color py-4 py-md-4 px-4 px-md-4 d-center flex-column gap-1 gap-md-2 text-center why-choose-box">
               <div class="box-img mb-2 mb-md-2">
                  <img src="{{asset('fronted/assets/mirror-img/choose-us/student-kit.svg')}}" class="transition svg-img"
                     alt="img" loading="lazy">
               </div>
               <div class="d-center gap-2 text-center">
                  <h6 class="fs-six fw-semibold n2-color transition">
                     Student Kit
                  </h6>
               </div>
               <p class="n3-color transition">
                  Fully Equipped with Premium Professional Tools for Hands-On Training.
               </p>
            </div>
         </div>
         <div class="col-9 col-md-3 col-xl-3">
            <div class="single-box position-relative z-1 n1-bg-color py-4 py-md-4 px-4 px-md-4 d-center flex-column gap-1 gap-md-2 text-center why-choose-box">
               <div class="box-img mb-2 mb-md-2">
                  <img src="{{asset('fronted/assets/mirror-img/choose-us/unique-curriculam.svg')}}" class="transition svg-img"
                     alt="img" loading="lazy">
               </div>
               <div class="d-center gap-2 text-center">
                  <h6 class="fs-six fw-semibold n2-color transition">
                     Unique Curriculum
                  </h6>
               </div>
               <p class="n3-color transition">
                  Stay ahead with cutting-edge techniques, advanced equipment, and the latest industry trends.
               </p>
            </div>
         </div>
         <div class="col-9 col-md-3 col-xl-3">
            <div
               class="single-box position-relative z-1 n1-bg-color py-4 py-md-4 px-4 px-md-4 d-center flex-column gap-1 gap-md-2 text-center why-choose-box">
               <div class="box-img mb-2 mb-md-2">
                  <img src="{{asset('fronted/assets/mirror-img/choose-us/dual-certification.svg')}}" class="transition svg-img"
                     alt="img" loading="lazy">
               </div>
               <div class="d-center gap-2 text-center">
                  <h6 class="fs-six fw-semibold n2-color transition">
                     Dual Certification
                  </h6>
               </div>
               <p class="n3-color transition">
                  SWith an International Diploma from L'Oréal Paris Professional and trained at Mirrors Luxury Salon.
               </p>
            </div>
         </div>
         <div class="col-9 col-md-3 col-xl-3">
            <div
               class="single-box position-relative z-1 n1-bg-color py-4 py-md-4 px-4 px-md-4 d-center flex-column gap-1 gap-md-2 text-center why-choose-box">
               <div class="box-img mb-2 mb-md-2">
                  <img src="{{asset('fronted/assets/mirror-img/choose-us/job-rediness.svg')}}" class="transition svg-img"
                     alt="img" loading="lazy">
               </div>
               <div class="d-center gap-2 text-center">
                  <h6 class="fs-six fw-semibold n2-color transition">
                     Job Readiness
                  </h6>
               </div>
               <p class="n3-color transition">
                  Equipped with skills to be employable as soon as the course is completed.
               </p>
            </div>
         </div>
         <div class="col-9 col-md-3 col-xl-3">
            <div class="single-box position-relative z-1 n1-bg-color py-4 py-md-4 px-4 px-md-4 d-center flex-column gap-1 gap-md-2 text-center why-choose-box">
               <div class="box-img mb-2 mb-md-2">
                  <img src="{{asset('fronted/assets/mirror-img/choose-us/real-world-exposure.svg')}}" class="transition svg-img"
                     alt="img" loading="lazy">
               </div>
               <div class="d-center gap-2 text-center">
                  <h6 class="fs-six fw-semibold n2-color transition">
                     Real World Exposure
                  </h6>
               </div>
               <p class="n3-color transition">
                  Industry guest visits, salon exposure, and field trips to key industry locations.
               </p>
            </div>
         </div>
         <div class="col-9 col-md-3 col-xl-3">
            <div class="single-box position-relative z-1 n1-bg-color py-4 py-md-4 px-4 px-md-4 d-center flex-column gap-1 gap-md-2 text-center why-choose-box">
               <div class="box-img mb-2 mb-md-2">
                  <img src="{{asset('fronted/assets/mirror-img/choose-us/community-engagement.svg')}}" class="transition svg-img"
                     alt="img" loading="lazy">
               </div>
               <div class="d-center gap-2 text-center">
                  <h6 class="fs-six fw-semibold n2-color transition">
                     Community Engagement
                  </h6>
               </div>
               <p class="n3-color transition">
                  Give your skills back to the deserving people in the community.
               </p>
            </div>
         </div> -->
      </div>
      @if(isset($data['videos']) && $data['videos']->count() > 0)
         <div class="home-video-section mt-10 eaight-style">
            <div class="row gy-6 gy-xxl-7 home-video justify-content-center justify-content-md-start">
               @foreach ($data['videos'] as $video)
               <div class="col-20 video-wrapper mb-sm-1 mb-md-1 mb-lg-5 mb-xl-0 pe-xl-2 ps-xl-2">
                  <div class="test-video-section position-relative">
                     <div class="video-skeleton-loader"></div>                     
                     <div class="embed-responsive-div embed-responsive-16by9">
                        <video class="embed-responsive-item lazy-video"
                           controls
                           muted
                           playsinline
                           preload="none"
                           controlslist="nodownload">
                           <source data-src="{{ asset('upload/video/' . $video->file) }}" type="video/mp4">
                           Your browser does not support the video tag.
                        </video>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
         @endif


   </div>
</section>
<section class="resister-today-section contact-section schedule-section position-relative s1-bg-color">
   <div class="container">
      <div class="row gy-6 gy-md-0 mb-8 mb-md-10 justify-content-center text-center">
         <div class="col-md-8 col-lg-8 col-xl-6">
            <div class="section-area d-grid gap-3 gap-md-4 reveal-single1 reveal-text text-one reveal-init">
               <h2 class="fs-two">Register today</h2>
            </div>
         </div>
      </div>
      <div class="row gy-8 gy-lg-0 justify-content-center">
         <div class="col-lg-6 order-1 order-lg-0">
            <div class="single-box h-100 position-relative me-0 me-lg-6">
               <iframe class="h-100 border-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.2827298339103!2d78.38584589999999!3d17.4461768!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb91376f1730c9%3A0x56c32b7ff5ecaf3b!2sMirrors%20Academy%20of%20Hair%20and%20Beauty!5e0!3m2!1sen!2sin!4v1760166195844!5m2!1sen!2sin"></iframe>
               <div class="abs-area">
                  <div class="video-bg-thumb third pe-none d-center d-none d-sm-flex position-absolute h-100 w-100 top-0">
                     <span class="popup-video btn-popup-animation transition position-absolute z-1 d-center rounded-circle">
                        <span class="d-center fs-three n2-color z-1">
                           <i class="ph ph-map-pin"></i>
                        </span>
                     </span>
                  </div>
                  <div class="w-100 position-absolute bottom-0">
                     <div class="px-3 px-md-6 py-4 py-md-6 m-4 m-md-8 n1-bg-color d-grid gap-3 gap-md-5">

                        <div class="d-center flex-wrap flex-sm-nowrap flex-lg-wrap flex-xl-nowrap gap-3 gap-md-5">
                           <a href="{{ route('contact-us') }}" class="btn box-style box-second second-alt alt-nineteen transition d-center py-2 py-md-3 px-4 px-md-6 w-100">
                              <span class="fs-eight fw-semibold">Contact</span>
                           </a>
                           <a href="tel:+919618991818" aria-label="Phone Number" class="d-center gap-2 gap-md-3 py-2 py-md-3 px-4 px-md-6 w-100">
                              <span class="d-center fs-six n2-color">
                                 <i class="ph ph-phone-call"></i>
                              </span>
                              <span class="d-center fs-eight n2-color text-capitalize">+91-9618991818</span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
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
@endsection
@push('scripts')
<script>
$(document).ready(function() {
   let $lazyVideos = $("video.lazy-video");

   function loadVideo($video, observer) {
      $video.find("source[data-src]").each(function() {
         $(this).attr("src", $(this).data("src"));
      });
      $video[0].load();

      // Hide skeleton once video starts loading
      $video.on('loadeddata canplay', function() {
         $(this).closest('.test-video-section')
            .find('.video-skeleton-loader')
            .fadeOut(400);
      });

      // autoplay muted
      $video[0].muted = true;
      $video[0].play().catch(() => {});

      if (observer) observer.unobserve($video[0]);
   }

   if ("IntersectionObserver" in window) {
      let lazyVideoObserver = new IntersectionObserver(function(entries, observer) {
         entries.forEach(function(entry) {
            if (entry.isIntersecting) {
               loadVideo($(entry.target), observer);
            }
         });
      });
      $lazyVideos.each(function() {
         lazyVideoObserver.observe(this);
      });
   } else {
      $lazyVideos.each(function() {
         loadVideo($(this), null);
      });
   }
});
</script>


@endpush