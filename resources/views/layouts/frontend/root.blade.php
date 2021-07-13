<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    @stack('cssLibs')
    <!-- Page Specific CSS File -->
    @stack('css')

    <style>
        .projectos {
            background: rgb(255, 255, 255);
        }

        .article {
            border: none !important;
            background: transparent !important;
        }

        .article .article-details {
            border-radius: 0px 0px 5px 5px;
        }

        .article .article-header .article-image {
            border-radius: 5px 5px 0 0;
        }
        footer{
            background: #4a4a4a;
            color: #f0eeea;
        }
    </style>

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/components.min.css') }} ">
</head>

<body class="layout-3">
    <div id="app">

            <!-- Start app top navbar -->
            @include('layouts.frontend.navbar.navbar')
            @yield('carousel')
            <!-- Start app main Content -->
            @include('layouts.frontend.content.content')

            <!-- Start app Footer part -->
            @include('layouts.frontend.footer.footer')

    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('backend/js/bundle.js') }}"></script>
    <script src="{{ asset('backend/js/CodiePie.js') }}"></script>

    <!-- JS Libraies -->
    @stack('jsLibs')
    <!-- Page Specific JS File -->
    @stack('js')
    <!-- Template JS File -->
    <script src="{{ asset('backend/js/scripts.js') }}"></script>
    <script src="{{ asset('backend/js/custom.js') }}"></script>
</body>
</body>

</html>
