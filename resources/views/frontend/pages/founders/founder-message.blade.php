@extends('frontend.layouts.master')
@section('title','Founder’s Message – Mirrors Academy Hyderabad')
@section('description', 'Read the inspiring message from the founder of Mirrors Academy. Discover the vision, passion, and values driving Hyderabad’s top hair and beauty training institute.')
@push('styles')

@endpush
@section('main-content')
<section class="banner-section inner-banner position-relative pt-10 pb-10">
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
                    <div class="reveal-single reveal-object object-one image-hover">
                        <img src="{{asset('fronted/assets/mirror-img/about-us/vijayala-mam-mirrors-owner.webp')}}" class="w-100 circle-img border-radius" alt="awards">
                    </div>                    
                </div>
            </div>
            <div class="col-md-6 ps-3 ps-lg-10 overflow-hidden">
                <div class="d-grid gap-1 gap-md-1 pt-30">
                    <p class="n3-color">
                       It was my dream to <strong>take Hyderabad onto the global fashion map</strong> and make it a hotspot in India for beauty care. For this to come true, it was necessary to raise the standards of education in hair and beauty care in Hyderabad, and create great careers and opportunities for enthusiastic learners. <strong> The Mirrors Academy of Hair & Beauty in collaboration with L’Oreal Professionnel</strong> is the right step in that direction, and I’m sure my students will be role models for others to emulate.
                    </p>
                    <p class="n3-color">
                        A bright academician, a successful sportsperson, entrepreneur, counselor, social worker, philanthropist and a happy homemaker, Dr. Vijayalakshmi is everything a woman spires to be. Hardworking, addicted to success, she chases her dreams and goals with gusto to achieve them.
                    </p>
                    <p class="n3-color">
                       Credited to ushering in global beauty trends to Hyderabad, Dr. Vijayalakshmi has been instrumental in transforming the City into a beauty care destination with Mirrors Spa & Salon. A globe-trotter in search of the latest spa and salon innovations and technologies, she ensures that they are replicated in Hyderabad at Mirrors.
                    </p>
                    <p class="n3-color">
                       She is an active philanthropist, sponsoring the needs of at least 100 poor and underprivileged cancer patients who come to Indo-American Cancer Centre in Hyderabad with their families to obtain treatment. As a member of the Film Censor Board, she dons the mantle of sizing up scenes that show women in poor light.
                    </p>
                    <p class="n3-color">
                       Dr. Vijayalakshmi was conferred with an Honorary Doctorate (PhD) by the prestigious Concord University, USA, for her outstanding commitment to humanitarian care for cancer patients.
                    </p>
                </div>
                
            </div>
        </div>
    </div>
</section>

@endsection
@push('scripts')

@endpush