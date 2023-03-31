<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="keywords" content="bet, betting, football, match, matches, best bet app, bet app, referres, book">
    <meta name="description" content="{{ config('app.slogan', 'Bet against fellow Players') }}">
    <meta name="CreativeLayers" content="ATFN">
    <meta name="MobileOptimized" content="320" />
    <meta property="og:title" content="{{ config('app.slogan', 'Bet against fellow Players') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://{{ config('app.url', 'xantabets.com') }}/;">
    <meta property="og:image" content="{{ asset('images/images-logo.png') }}">
    <meta property="og:description" content="{{ config('app.slogan', 'Bet against fellow Players') }}">
    <meta property="og:site_name" content="{{ config('app.name', 'Xantabets') }} - {{ config('app.slogan', 'Bet against fellow Players') }}">
    <meta property="og:image:width" content="600" /> 
    <meta property="og:image:height" content="415" />
    <meta property="og:image:secure_url" content="{{ asset('images/images-logo.png') }}" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="GOOGLEBOT" content="index follow"/>
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="theme-color" content="#120f54" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Xantabets') }} - Admin</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicons/images-fav.png') }}" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('admin/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">

    
</head>
