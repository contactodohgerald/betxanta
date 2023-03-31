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
    
    <title>{{ config('app.name', 'Xantabets') }} - Home</title>

    <link rel="shortcut icon" href="{{ asset('favicons/images-fav.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/css-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css-fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css-jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugin-nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugin-magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugin-slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css-arafat-font.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugin-animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css-style.css') }}">

    <link href="{{ asset('toast-popup/toast.style.min.css') }}" rel="stylesheet">

    @bukStyles
</head>