<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    @yield('seo')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('backend/css/app.css') }}" rel="stylesheet">
    @stack('css')
    @livewireStyles
</head>

<body>
    <div class="wrapper">
        @auth
            @include('backend.layouts.shared.sidebar')
        @endauth
        <div class="main">
            @include('backend.layouts.shared.navbar')
            <main class="content">
                <div class="container-fluid p-0">
                    @yield('content')
                </div>
                <div>
                    @yield('modals')
                </div>
            </main>
            @include('backend.layouts.shared.footer')
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('backend/js/app.js') }}"></script>
    <script src="{{ asset('backend/pages.js') }}"></script>
    @stack('js')
    @livewireScripts
</body>

</html>
