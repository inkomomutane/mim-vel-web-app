<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ url('/favicon.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" id="token">
    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script>
        window.addEventListener('load', () => {
            const preloader = document.querySelector('.preloader');
            preloader?.classList.add('hidden');
        });
    </script>
    @routes
    @vite(['resources/js/app.ts', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>

<body class="font-sans  antialiased scroll-smooth ">
    <x-preloader />
    @inertia
</body>

</html>
