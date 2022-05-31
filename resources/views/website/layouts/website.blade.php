<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="description"
        content="Mimóvel é uma empresa de aluguel, compra de imóveis localizada na cidade da beira, reconhecida pelos seus excelentes edificios que superam as expectativas dos clientes." />
    <meta name="keywords" content="Imóveis, Mimóvel, Casas, Arendar, Comprar, Aluguar" />
    <meta name="author" content="Administrator" />
    <meta name="website" content="{{ config('app.url') }}" />
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('website/images/favicon.ico') }}">
    <!-- Bootstrap -->

    <link href="{{ asset('website/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons -->
    <link href="{{ asset('website/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
    {{-- <link rel="stylesheet" href="{{ asset('website/css/app.css') }}"> --}}
    <!-- Slider -->
    <link rel="stylesheet" href="{{ asset('website/css/tiny-slider.css') }}" />
    <!-- Main Css -->
    <link href="{{ asset('website/css/style.css') }}" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="{{ asset('website/css/colors/default.css') }}" rel="stylesheet" id="color-opt">
    @stack('css')
</head>

<body>

            <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div>
        <!-- Loader -->
    @include('website.layouts.shared.navbar')
    <main>
        @yield('content')
    </main>
    @include('website.layouts.shared.footer')

    @include('website.layouts.shared.chatplugin')



    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top" class="btn btn-icon btn-warning back-to-top">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-arrow-up icons">
            <line x1="12" y1="19" x2="12" y2="5"></line>
            <polyline points="5 12 12 5 19 12"></polyline>
        </svg>
    </a>
    <!-- Back to top -->



    <!-- javascript -->
    <script src="{{ asset('website/js/bootstrap.bundle.min.js') }}"></script>
    <!-- SLIDER -->
    <script src="{{ asset('website/js/tiny-slider.js ') }}"></script>
    <script src="{{ asset('website/js/easy_background.js') }}"></script>
    <!-- Icons -->
    <script src="{{ asset('website/js/feather.min.js') }}"></script>
    <!-- Main Js -->
    <script src="{{ asset('website/js/plugins.init.js') }}"></script>
    <!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
    <script src="{{ asset('website/js/app.js') }}"></script>
    <!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->

    @stack('js')



</body>

</html>
