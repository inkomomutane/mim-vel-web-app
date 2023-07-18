<!DOCTYPE html>
<html lang="pt" >
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
        <script>
            window.addEventListener('load', () => {
            const preloader = document.querySelector('.preloader');
            preloader?.classList.add('hidden');
            });
        </script>

</head>
    <body class=" font-sans  antialiased scroll-smooth selection:bg-orange-400 selection:text-white">
         <!-- Preloader element -->

         <x-preloader/>
@include('website.layouts.translator')

        @yield('header')
         @yield('hero')
        <main>
            @yield('content')
        </main>
      @include('website.layouts.whatsapp')
        @include('website.layouts.footer')

        @stack('bottom-butons')
        @stack('js')
    </body>
</html>
