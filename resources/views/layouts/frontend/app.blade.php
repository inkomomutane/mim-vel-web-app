<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('frontend/home/image/Logo.png') }}" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/home/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/home/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/home/vendors/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('frontend/home/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css') }}">
    <!--link rel="stylesheet" href="{{ asset('frontend/home/vendors/nice-select/css/nice-select.css') }}"-->
    <link rel="stylesheet" href="{{ asset('frontend/home/vendors/owl-carousel/owl.carousel.min.css') }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('frontend/home/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/home/css/responsive.css') }}">
    <style>
        div.owl-stage-outer div.owl-stage div.owl-item img.img-fluid {
            max-height: 400px;
        }
        .hotel_booking_area{
            position: relative;
top: -90px;
z-index: 19;
        }.footer_title {
    font-size: 16px;
    line-height: 24px;
    font-weight: 600;
    color: #6c6868;
    text-transform: uppercase;
    margin-bottom: 28px;
}
        body{
            background: #f0eff1 !important;
            font-family: "Helvetica Neue",Arial,sans-serif;
            font-weight: 400;
        }
    </style>
    @stack('css')
</head>

<body>
    <!--================Header Area =================-->
    @include('layouts.frontend.navbar.navbar')
    <!--================End Area =================-->

    <!--================ Header Carousel  =================-->
            @yield('banner')
    <!--================ End Header Carousel =================-->

    @yield('content')

    <!--================ start footer Area  =================-->
    @include('layouts.frontend.footer.footer')
    <!--================ End footer Area  =================-->

    @yield('float_button')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('/frontend/home/js/jquery-3.2.1.min.js') }}"></script>
    <script src="/frontend/home/js/popper.js"></script>
    <script src="/frontend/home/js/bootstrap.min.js"></script>
    <script src="/frontend/home/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="/frontend/home/js/jquery.ajaxchimp.min.js"></script>
    <script src="/frontend/home/js/mail-script.js"></script>
    <script src="/frontend/home/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js"></script>
    <!--script src="/frontend/home/vendors/nice-select/js/jquery.nice-select.js"></script-->
    <script src="/frontend/home/js/mail-script.js"></script>
    <script src="/frontend/home/js/stellar.js"></script>
    <script src="/frontend/home/vendors/lightbox/simpleLightbox.min.js"></script>
    <script src="/frontend/home/js/custom.js"></script>
    <script src="{{ asset('backend/fontawesome/js/all.min.js') }}"></script>
    <script>
        $("#banner_carousel").owlCarousel({
            loop: true,
            margin: 0,
            items: 1,
            nav: false,
            autoplay: true,
            dots: true,
            smartSpeed: 1500,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
            }
        });
    </script>
    @stack('js')
</body>

</html>
