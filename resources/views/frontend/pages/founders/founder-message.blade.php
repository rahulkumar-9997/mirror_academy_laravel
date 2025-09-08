@extends('frontend.layouts.master')
@section('title','Founder’s Message – Mirrors Academy Hyderabad')
@section('description', 'Read the inspiring message from the founder of Mirrors Academy. Discover the vision, passion, and values driving Hyderabad’s top hair and beauty training institute.')
@push('styles')

@endpush
@section('main-content')
<section class="banner-section inner-banner position-relative pt-5 pb-5">
    <div class="container position-relative cus-z1">
        <div class="row">
            <div class="col-xxl-12 cus-z1 text-center">
                <div class="section-area breadcrumb-area">
                    <h1 class="breadcrub-title">Founder’s Message</h1>
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
                    <div class="reveal-single1 reveal-object object-one image-hover">
                        <img src="{{asset('fronted/assets/mirror-img/about-us/vijayala-mam-mirrors-owner.webp')}}" class="w-100 circle-img border-radius" alt="awards" loading="lazy">
                    </div>                    
                </div>
            </div>
            <div class="col-md-6 ps-3 ps-lg-10 overflow-hidden">
                <div class="d-grid gap-1 gap-md-1 pt-30">
                    <p class="n3-color">
                      When I started <strong> Mirrors Luxury Salons more than 25 years ago</strong>, my dream was simple yet powerful — to put <strong>Hyderabad</strong> on the <strong>global</strong> beauty and fashion map. Over the years, Mirrors grew into a name that stood for luxury, innovation, and trust. For me, it was never just about salons; it was about creating experiences that uplift, inspire, and set new benchmarks in beauty and wellness.
                    </p>
                    <p class="n3-color">
                       But while building this legacy, I realized that true and lasting change in the beauty industry could only come through education. Salons can transform people’s looks, but education transforms lives. That is why I founded the Mirrors Academy of Hair & Beauty — an institution dedicated to nurturing raw talent, refining skills, and creating careers for passionate learners.
                    </p>
                    <p class="n3-color">
                       <strong> At Mirrors Academy</strong>, my vision has always been to provide the same world-class standards that define our salons. With the partnership of global partners like L’Oréal Professionnel, we ensure that our students are trained not only in technical excellence but also in creativity, professionalism, and confidence. Here, every student is given the tools and opportunities to turn their dreams into reality.
                    </p>
                    <p class="n3-color">
                       Today, as I look back at the <strong> 25-year journey of Mirrors Luxury Salons,</strong> I see a legacy of beauty, style, and innovation. And when I look at Mirrors Academy, I see the future — a place where ambition finds guidance, passion finds purpose, and the next generation of salon professionals is born.

                    </p>
                    <p class="n3-color">
                       My greatest fulfilment comes from knowing that our salons inspire confidence in our clients, and our academy empowers students to build successful, meaningful careers. Together, they carry forward the spirit of Mirrors — a spirit of excellence, transformation, and opportunity.”
                    </p>
                    <p>
                       <strong> — Dr. Vijayalakshmi Goodapati</strong>
                    </p>
                </div>
                
            </div>
        </div>
    </div>
</section>

@endsection
@push('scripts')

@endpush