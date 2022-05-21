<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('website/css/app.css') }}">
    <style>
        li.offcanvas-item{
            padding: 10px;
        }
        li.offcanvas-item.active {
            background: #eaf3ff;
            border-radius: 7px;
            
        }


        a.offcanvas-link {
            color: #1c1b1b;
            text-decoration: none !important;
            
        }

    </style>
</head>

<body>

    @include('website.layouts.shared.navbar')
    <main>
        @yield('content')
    </main>
    @include('website.layouts.shared.footer')

    @include('website.layouts.shared.chatplugin')
    <script src="{{ asset('website/js/app.js') }}"></script>

</body>

</html>
