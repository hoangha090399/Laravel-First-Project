<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    
    <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
    <!-- Favicon -->
    <link rel="icon" href={{ asset('assets/img/brand/favicon.png') }} type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href={{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700') }}>
    <!-- Icons -->
    <link rel="stylesheet" href={{ asset('assets/vendor/nucleo/css/nucleo.css') }} type="text/css">
    <link rel="stylesheet" href={{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }} type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href={{ asset('assets/css/argon.css?v=1.2.0') }} type="text/css">

    <link
    rel="stylesheet"
    href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
    crossorigin="anonymous"
    />
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400"
        rel="stylesheet"
    />
</head>