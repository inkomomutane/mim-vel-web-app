<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="{{ url('/favicon.ico') }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        @yield('seo')
        <!-- Scripts -->
        @stack('css')
        @routes
        @vite(['resources/js/website/app.ts', "resources/css/website.css"])
        @vite('resources/js/website/header.ts')
    </head>
    <body class=" font-sans  antialiased scroll-smooth selection:bg-orange-400 selection:text-white">
        @yield('header')
         @yield('hero')
        <main>
            @yield('content')
        </main>
        @include('website.layouts.footer')
        @stack('js')
    </body>
</html>
