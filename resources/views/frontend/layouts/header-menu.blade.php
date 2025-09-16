<header class="header-section index-two px-2 px-md-6">
    <div class="container-fluid">
        <div class="main-navbar px-0 px-xl-8">
            <nav class="navbar-custom">
                <div class="d-flex align-items-center justify-content-between">
                    <a href="{{ url('/') }}" class="nav-brand d-flex align-items-center gap-2 d-lg-none">
                        <img src="{{asset('fronted/assets/mirror-img/Mirros-Academy-Logo.png')}}" alt="logo">
                    </a>
                    <div class="d-flex gap-6">
                        <button class="navbar-toggle-btn d-block d-lg-none" type="button">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="navbar-toggle-item navbar-toggle-for-mobile">
                    <div
                        class="d-flex gap-5 flex-column flex-lg-row align-items-start align-items-lg-center justify-content-center mt-5 mt-lg-0">
                        <ul class="custom-nav d-lg-flex d-grid gap-3 gap-lg-4 order-1 order-xxl-0 header-menu-ul">
                            <li class="menu-link padding-for">
                                <a href="{{ url('/') }}" class="n2-color slide-vertical">Home</a>
                            </li>
                            @if(isset($menuCourses) && $menuCourses->count() > 0)
                                <li class="menu-item position-relative padding-for submenu-li">
                                    <button
                                        class="position-relative pe-5 z-1 slide-vertical"
                                        >
                                        Courses
                                    </button>
                                    <ul class="sub-menu sub-menubg p-lg-3">
                                        @foreach($menuCourses as $course)
                                            <li class="menu-link py-1 py-lg-1">
                                                <a href="{{ route('courses.details', $course->slug) }}"
                                                   class="n2-color  slide-horizontal">{{ $course->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                            <li class="menu-link padding-for">
                                <a href="{{ route('gallery') }}" class="n2-color slide-vertical"
                                >Gallery</a>
                            </li>
                            <li class="menu-link padding-for">
                                <a href="{{ route('about-us') }}" class="n2-color  slide-vertical"
                                    >About Us</a>
                            </li>
                            
                            <!-- <li class="menu-link padding-for">
                                <a href="{{ route('founders-message') }}" wire:navigate class="n2-color  slide-vertical"
                                    >Founder’s Message</a>
                            </li> -->
                            <li class="menu-link padding-for">
                                <a href="{{ route('founders-message') }}" wire:navigate class="n2-color  slide-vertical"
                                    >Founder’s Message</a>
                            </li>
                            <li class="menu-link padding-for">
                                <a href="{{ route('contact-us') }}" class="n2-color  slide-vertical"
                                    >Contact Us</a>
                            </li>
                        </ul>
                        <!-- <a href="index.html"
                                class="navbar-brand logo d-none d-lg-flex d-xl-flex d-lg-flex gap-2 align-items-center">
                                <img src="assets/images/fav-11.png" alt="logo">
                                <img src="assets/images/logo-text.png" class="d-none d-lg-none d-xl-flex" alt="logo">
                            </a> -->

                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>