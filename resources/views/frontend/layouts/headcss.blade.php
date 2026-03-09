<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="index, follow">
<meta name="author" content="Mirror Academy">
<meta name="description" content="@yield('description')">
<meta name="keywords" content="@yield('keywords')">
<meta name="csrf-token" content="{{ csrf_token() }}">
@yield('meta')
<title>@yield('title')</title>
<link rel="canonical" href="{{ url()->current() }}" />
<link rel="shortcut icon" href="{{asset('fronted/assets/mirror-img/fav.jpg')}}" type="image/x-icon">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('fronted/assets/css/bootstrap.min.css')}}">
<link rel="preload" href="{{asset('fronted/assets/css/plugins/magnific-popup.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link rel="preload"  href="{{asset('fronted/assets/css/plugins/swiper.min.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link rel="preload" href="{{asset('fronted/assets/css/plugins/jquery-ui-min.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link rel="preload" href="{{asset('fronted/assets/css/plugins/animate.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link rel="preload" href="{{asset('fronted/assets/css/plugins/fontawesome.min.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<!-- <link rel="stylesheet" href="{{asset('fronted/assets/css/icons.min.css')}}"> -->
<link rel="stylesheet" href="{{asset('fronted/assets/css/style.min-3.css')}}?v={{ env('ASSET_VERSION', '1.0.0') }}">
<link rel="stylesheet" href="{{asset('fronted/assets/css/media-query-3.css')}}?v={{ env('ASSET_VERSION', '1.0.0') }}">
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-7WLDLS90VW"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-7WLDLS90VW');  
</script>
<script>
  /*Icon load delay */
  window.addEventListener("load", function() {
    var css = document.createElement("link");
    css.rel = "stylesheet";
    css.href = "{{asset('fronted/assets/css/icons.min.css')}}";
    document.head.appendChild(css);
  });
</script>

