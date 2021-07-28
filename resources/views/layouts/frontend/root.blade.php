<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mimóvel') }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('frontend/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">

    <!-- CSS Libraries -->
    @stack('cssLibs')
    <!-- Page Specific CSS File -->
    @stack('css')
    <!-- Template CSS -->

</head>

<body class="layout-3">

    <div id="app">
        <header id="header">
            <div class="header-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-6 col-6 header-top-left">
                            <ul>
                                <li><a href="#">Visit Us</a></li>
                                <li><a href="#">Buy Tickets</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-6 header-top-right">
                            <div class="header-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-behance"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container main-menu">
                <div class="row align-items-center justify-content-between d-flex">
                    <div id="logo">
                        <a href="index.html"><img src="frontend/img/logo.png" alt="" title="" /></a>
                    </div>
                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="packages.html">Packages</a></li>
                            <li><a href="hotels.html">Hotels</a></li>
                            <li><a href="insurance.html">Insurence</a></li>
                            <li class="menu-has-children"><a href="">Blog</a>
                                <ul>
                                    <li><a href="blog-home.html">Blog Home</a></li>
                                    <li><a href="blog-single.html">Blog Single</a></li>
                                </ul>
                            </li>
                            <li class="menu-has-children"><a href="">Pages</a>
                                <ul>
                                    <li><a href="elements.html">Elements</a></li>
                                    <li class="menu-has-children"><a href="">Level 2 </a>
                                        <ul>
                                            <li><a href="#">Item One</a></li>
                                            <li><a href="#">Item Two</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav><!-- #nav-menu-container -->
                </div>
            </div>
        </header><!-- #header -->


        <!-- start banner Area -->
        <section class="about-banner relative">
            <div class="overlay overlay-bg"></div>
            <div class="container">
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="about-content col-lg-12">
                        <h1 class="text-white">
                            Mimóvel
                        </h1>
                        <p class="text-white link-nav"><a href="index.html">Home </a> <span
                                class="lnr lnr-arrow-right"></span> <a href="about.html"> About Us</a></p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- start footer Area -->
    <footer class="footer-area section-gap">
        <div class="container">

            <div class="row">
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>About Agency</h6>
                        <p>
                            The world has become so fast paced that people don’t want to stand by reading a page of
                            information, they would much rather look at a presentation and understand the message. It
                            has come to a point
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Navigation Links</h6>
                        <div class="row">
                            <div class="col">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Feature</a></li>
                                    <li><a href="#">Services</a></li>
                                    <li><a href="#">Portfolio</a></li>
                                </ul>
                            </div>
                            <div class="col">
                                <ul>
                                    <li><a href="#">Team</a></li>
                                    <li><a href="#">Pricing</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Newsletter</h6>
                        <p>
                            For business professionals caught between high OEM price and mediocre print and graphic
                            output.
                        </p>
                        <div id="mc_embed_signup">
                            <form target="_blank"
                                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                method="get" class="subscription relative">
                                <div class="input-group d-flex flex-row">
                                    <input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Email Address '" required="" type="email">
                                    <button class="btn bb-btn"><span class="lnr lnr-location"></span></button>
                                </div>
                                <div class="mt-10 info"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget mail-chimp">
                        <h6 class="mb-20">InstaFeed</h6>
                        <ul class="instafeed d-flex flex-wrap">
                            <li><img src="frontend/img/i1.jpg" alt=""></li>
                            <li><img src="frontend/img/i2.jpg" alt=""></li>
                            <li><img src="frontend/img/i3.jpg" alt=""></li>
                            <li><img src="frontend/img/i4.jpg" alt=""></li>
                            <li><img src="frontend/img/i5.jpg" alt=""></li>
                            <li><img src="frontend/img/i6.jpg" alt=""></li>
                            <li><img src="frontend/img/i7.jpg" alt=""></li>
                            <li><img src="frontend/img/i8.jpg" alt=""></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row footer-bottom d-flex justify-content-between align-items-center">
                <p class="col-lg-8 col-sm-12 footer-text m-0">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i
                        class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com"
                        target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                <div class="col-lg-4 col-sm-12 footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-behance"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->

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
</body>

</html>
