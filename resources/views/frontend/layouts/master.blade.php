<!doctype html>
<html lang="en">
	<head>
		@include('frontend.layouts.headcss')
		@stack('styles')
	</head>
	<body>
		<div id="preloader">
			<div id="loader"></div>
		</div>
		<div class="scroll-wrapper z-2 d-flex justify-content-center p-2 rounded-pill position-fixed">
			<button class="scrollToTop p7-bg-color d-center flex-column rounded-circle" aria-label="scroll Bar Button">
				<span class="d-center n2-color fs-five">
					<i class="ph ph-caret-double-up"></i>
				</span>
			</button>
		</div>
		<div class="mouse-follower">
			<span class="cursor-outline"></span>
			<span class="cursor-dot"></span>
		</div>
		@include('frontend.layouts.header-top')
		@include('frontend.layouts.header-menu')
		<div class="bg-home {{ request()->is('/') ? 'home' : 'with-bg' }}">
			@yield('main-content')
		</div>
		@include('frontend.layouts.footer')
		@include('frontend.layouts.common-modal')
		@include('frontend.layouts.footerjs')
		@stack('scripts')
	</body>
</html>