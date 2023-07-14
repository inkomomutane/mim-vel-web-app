<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="{{ url('/favicon.ico') }}">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('seo')
        <!-- Scripts -->
        @stack('css')
        @routes
        @vite(['resources/js/website/app.ts', "resources/css/website.css"])
        @vite('resources/js/website/header.ts')
        @include('website.layouts.pixels')
    </head>
    <body class=" font-sans  antialiased scroll-smooth selection:bg-orange-400 selection:text-white">
        @yield('header')
         @yield('hero')
        <main>
            @yield('content')
        </main>
      @include('website.layouts.whatsapp')
        @include('website.layouts.footer')
        @stack('js')
    </body>
</html>
