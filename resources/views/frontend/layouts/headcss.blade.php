<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="robots" content="index, follow">
<meta name="author" content="Mirror Academy">
<meta name="description" content="@yield('description')">
<meta name="keywords" content="@yield('keywords')">
<meta name="csrf-token" content="{{ csrf_token() }}">
@yield('meta')
<title>@yield('title')</title>
<link rel="shortcut icon" href="{{asset('fronted/assets/mirror-img/fav.jpg')}}" type="image/x-icon">
<link rel="stylesheet" href="{{asset('fronted/assets/css/style.min.css')}}">