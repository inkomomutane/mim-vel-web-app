    <!-- General JS Scripts -->
    <script src="{{ asset('frontend/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('frontend/js/easing.min.js') }}"></script>
    <script src="{{ asset('frontend/js/hoverIntent.js') }}"></script>
    <script src="{{ asset('frontend/js/superfish.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/mail-script.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    <!-- JS Libraies -->
    @stack('jsLibs')
    <!-- Page Specific JS File -->
    @stack('js')
    <!-- Template JS File -->
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                loop: true,
                lazyLoad: true,
                items: 5,
            singleItem: true,
                responsiveClass: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                singleItem: true,
                maxHeight: 400,
                maxWidth:300
            });
        });
    </script>
