{{-- @extends('website.layouts.website')
@section('title',config('app.name','laravel'))
@section('content')
<section>
    <div class="card">
        <div class="card-body">
            "Hello Word"
        </div>
    </div>
</section>
@endsection --}}
<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Landrick - Saas & Software Landing Page Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
        <meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern" />
        <meta name="author" content="Shreethemes" />
        <meta name="email" content="shreethemes@gmail.com" />
        <meta name="website" content="http://shreethemes.in" />
        <meta name="Version" content="v3.0.0" />
        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('website/images/favicon.ico')}}">
        <!-- Bootstrap -->

        <link href="{{ asset('website/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="{{ asset('website/css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
        {{-- <link rel="stylesheet" href="{{ asset('website/css/app.css') }}"> --}}
         <!-- Slider -->
        <link rel="stylesheet" href="{{ asset('website/css/tiny-slider.css')}}"/>
         <!-- Main Css -->
        <link href="{{ asset('website/css/style.css')}}" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="{{ asset('website/css/colors/default.css')}}" rel="stylesheet" id="color-opt">

    </head>

    <body>
        <!-- Loader -->
        <!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> -->
        <!-- Loader -->

        <!-- Navbar STart -->
        <header id="topnav" class="defaultscroll sticky">
            <div class="container">
                <!-- Logo container-->
                <a class="logo" href="index.html">
                    <span class="logo-light-mode">
                        <img src="{{ asset('website/images/logo-dark.png')}}" class="l-dark" height="24" alt="">
                        <img src="{{ asset('website/images/logo-light.png')}}" class="l-light" height="24" alt="">
                    </span>
                    <img src="{{ asset('website/images/logo-light.png')}}" height="24" class="logo-dark-mode" alt="">
                </a>
                <div class="buy-button">
                    <a href="https://1.envato.market/4n73n" class="btn btn-primary" target="_blank">Buy Now</a>
                </div><!--end login button-->
                <!-- End Logo container-->
                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>

                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu nav-light">
                        <li><a href="index.html" class="sub-menu-item">Home</a></li>
                        <li class="has-submenu parent-parent-menu-item">
                            <a href="javascript:void(0)">Landing</a><span class="menu-arrow"></span>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                        <li><a href="index-saas.html" class="sub-menu-item">Saas</a></li>
                                        <li><a href="index-classic-saas.html" class="sub-menu-item">Classic Saas</a></li>
                                        <li><a href="index-agency.html" class="sub-menu-item">Agency</a></li>
                                        <li><a href="index-apps.html" class="sub-menu-item">Application</a></li>
                                        <li><a href="index-classic-app.html" class="sub-menu-item">Classic Application</a></li>
                                        <li><a href="index-studio.html" class="sub-menu-item">Studio</a></li>
                                        <li><a href="index-marketing.html" class="sub-menu-item">Marketing</a></li>
                                        <li><a href="index-enterprise.html" class="sub-menu-item">Enterprise</a></li>
                                        <li><a href="index-services.html" class="sub-menu-item">Service</a></li>
                                        <li><a href="index-payments.html" class="sub-menu-item">Payments</a></li>
                                        <li><a href="index-crypto.html" class="sub-menu-item">Cryptocurrency</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <ul>
                                        <li><a href="index-it-solution.html" class="sub-menu-item">IT Solution </a></li>
                                        <li><a href="index-business.html" class="sub-menu-item">Business</a></li>
                                        <li><a href="index-modern-business.html" class="sub-menu-item">Modern Business</a></li>
                                        <li><a href="index-corporate.html" class="sub-menu-item">Corporate Business</a></li>
                                        <li><a href="index-hotel.html" class="sub-menu-item">Hotel</a></li>
                                        <li><a href="index-construction.html" class="sub-menu-item">Construction</a></li>
                                        <li><a href="index-real-estate.html" class="sub-menu-item">Real Estate</a></li>
                                        <li><a href="index-developer.html" class="sub-menu-item">Developer</a></li>
                                        <li><a href="index-seo-agency.html" class="sub-menu-item">SEO Agency</a></li>
                                        <li><a href="index-hospital.html" class="sub-menu-item">Hospital</a></li>
                                        <li><a href="index-hosting.html" class="sub-menu-item">Hosting & Domain</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <ul>
                                        <li><a href="index-finance.html" class="sub-menu-item">Finance <span class="badge bg-danger">New</span></a></li>
                                        <li><a href="index-videocall.html" class="sub-menu-item">Video Conference <span class="badge bg-danger">New</span></a></li>
                                        <li><a href="index-it-solution-two.html" class="sub-menu-item">IT Solution Two <span class="badge bg-danger">New</span></a></li>
                                        <li><a href="index-freelancer.html" class="sub-menu-item">Freelance <span class="badge bg-danger">New</span></a></li>
                                        <li><a href="index-blockchain.html" class="sub-menu-item">Blockchain <span class="badge bg-danger">New</span></a></li>
                                        <li><a href="index-crypto-two.html" class="sub-menu-item">Cryptocurrency Two <span class="badge bg-danger">New</span></a></li>
                                        <li><a href="index-integration.html" class="sub-menu-item">Integration</a></li>
                                        <li><a href="index-task-management.html" class="sub-menu-item">Task Management </a></li>
                                        <li><a href="index-email-inbox.html" class="sub-menu-item">Email Inbox </a></li>
                                        <li><a href="index-travel.html" class="sub-menu-item">Travel </a></li>
                                        <li><a href="index-blog.html" class="sub-menu-item">Blog </a></li>
                                    </ul>
                                </li>

                                <li>
                                    <ul>
                                        <li><a href="index-landing-one.html" class="sub-menu-item">Landing One </a></li>
                                        <li><a href="index-landing-two.html" class="sub-menu-item">Landing Two </a></li>
                                        <li><a href="index-landing-three.html" class="sub-menu-item">Landing Three </a></li>
                                        <li><a href="index-landing-four.html" class="sub-menu-item">Landing Four</a></li>
                                        <li><a href="index-shop.html" class="sub-menu-item">Shop</a></li>
                                        <li><a href="index-insurance.html" class="sub-menu-item">Insurance</a></li>
                                        <li><a href="index-online-learning.html" class="sub-menu-item">Online Learning</a></li>
                                        <li><a href="index-personal.html" class="sub-menu-item">Personal</a></li>
                                        <li><a href="index-coworking.html" class="sub-menu-item">Coworking</a></li>
                                        <li><a href="index-course.html" class="sub-menu-item">Course</a></li>
                                        <li><a href="forums.html" class="sub-menu-item">Forums </a></li>
                                    </ul>
                                </li>

                                <li>
                                    <ul>
                                        <li><a href="index-event.html" class="sub-menu-item">Event</a></li>
                                        <li><a href="index-single-product.html" class="sub-menu-item">Product</a></li>
                                        <li><a href="index-portfolio.html" class="sub-menu-item">Portfolio</a></li>
                                        <li><a href="index-job.html" class="sub-menu-item">Job</a></li>
                                        <li><a href="index-social-marketing.html" class="sub-menu-item">Social Media</a></li>
                                        <li><a href="index-digital-agency.html" class="sub-menu-item">Digital Agency</a></li>
                                        <li><a href="index-car-riding.html" class="sub-menu-item">Car Ride</a></li>
                                        <li><a href="index-customer.html" class="sub-menu-item">Customer</a></li>
                                        <li><a href="index-software.html" class="sub-menu-item">Software</a></li>
                                        <li><a href="index-ebook.html" class="sub-menu-item">E-Book</a></li>
                                        <li><a href="index-onepage.html" class="sub-menu-item">Saas <span class="badge bg-warning ms-2">Onepage</span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="has-submenu parent-parent-menu-item">
                            <a href="javascript:void(0)">Pages</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Company </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="page-aboutus.html" class="sub-menu-item"> About Us</a></li>
                                        <li><a href="page-aboutus-two.html" class="sub-menu-item"> About Us Two </a></li>
                                        <li><a href="page-services.html" class="sub-menu-item">Services</a></li>
                                        <li><a href="page-history.html" class="sub-menu-item">History </a></li>
                                        <li><a href="page-team.html" class="sub-menu-item"> Team</a></li>
                                        <li><a href="page-pricing.html" class="sub-menu-item">Pricing</a></li>
                                    </ul>
                                </li>
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Account </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="account-profile.html" class="sub-menu-item">Profile</a></li>
                                        <li><a href="account-members.html" class="sub-menu-item">Members </a></li>
                                        <li><a href="account-works.html" class="sub-menu-item">Works </a></li>
                                        <li><a href="account-messages.html" class="sub-menu-item">Messages </a></li>
                                        <li><a href="account-payments.html" class="sub-menu-item">Payments </a></li>
                                        <li><a href="account-setting.html" class="sub-menu-item">Setting</a></li>
                                        <li><a href="page-invoice.html" class="sub-menu-item">Invoice</a></li>
                                    </ul>
                                </li>
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Shop</a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="shop-grids.html" class="sub-menu-item">Product Grids</a></li>
                                        <li><a href="shop-lists.html" class="sub-menu-item">Product List</a></li>
                                        <li><a href="shop-product-detail.html" class="sub-menu-item">Product Details</a></li>
                                        <li><a href="shop-cart.html" class="sub-menu-item">Shop Cart</a></li>
                                        <li><a href="shop-checkouts.html" class="sub-menu-item">Checkouts</a></li>
                                        <li><a href="shop-myaccount.html" class="sub-menu-item">My Account</a></li>
                                    </ul>
                                </li>
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Help center </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="helpcenter-overview.html" class="sub-menu-item">Helpcenter</a></li>
                                        <li><a href="helpcenter-faqs.html" class="sub-menu-item">Faqs</a></li>
                                        <li><a href="helpcenter-guides.html" class="sub-menu-item">Guides</a></li>
                                        <li><a href="helpcenter-support-request.html" class="sub-menu-item">Support Call</a></li>
                                    </ul>
                                </li>
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Forums </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="forums.html" class="sub-menu-item">Overview </a></li>
                                        <li><a href="forums-topic.html" class="sub-menu-item">Forum Topic </a></li>
                                        <li><a href="forums-comments.html" class="sub-menu-item">Forum Comments </a></li>
                                    </ul>
                                </li>
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Email Template</a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="email-confirmation.html" class="sub-menu-item">Confirmation</a></li>
                                        <li><a href="email-password-reset.html" class="sub-menu-item">Reset Password</a></li>
                                        <li><a href="email-alert.html" class="sub-menu-item">Alert</a></li>
                                        <li><a href="email-invoice.html" class="sub-menu-item">Invoice</a></li>
                                    </ul>
                                </li>
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)">Careers</a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="page-jobs.html" class="sub-menu-item">Jobs</a></li>
                                        <li><a href="page-jobs-sidebar.html" class="sub-menu-item">Jobs - Sidebar</a></li>
                                        <li><a href="page-job-detail.html" class="sub-menu-item">Job Detail</a></li>
                                        <li><a href="page-job-apply.html" class="sub-menu-item">Job Apply</a></li>
                                        <li><a href="page-job-company-list.html" class="sub-menu-item">Company Listing</a></li>
                                        <li><a href="page-job-company.html" class="sub-menu-item">Company Detail</a></li>
                                        <li><a href="page-job-candidate-list.html" class="sub-menu-item">Candidate Listing</a></li>
                                        <li><a href="page-job-candidate.html" class="sub-menu-item">Candidate Detail</a></li>
                                    </ul>
                                </li>
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Blog </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="page-blog-grid.html" class="sub-menu-item">Blog Grid</a></li>
                                        <li><a href="page-blog-sidebar.html" class="sub-menu-item">Blog with Sidebar</a></li>
                                        <li><a href="page-blog-list.html" class="sub-menu-item">Blog Listing</a></li>
                                        <li><a href="page-blog-list-sidebar.html" class="sub-menu-item">Blog List & Sidebar</a></li>
                                        <li><a href="page-blog-detail.html" class="sub-menu-item">Blog Detail</a></li>
                                        <li><a href="page-blog-detail-two.html" class="sub-menu-item">Blog Detail 2 </a></li>
                                    </ul>
                                </li>
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Case Study </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="page-cases.html" class="sub-menu-item">All Cases </a></li>
                                        <li><a href="page-case-detail.html" class="sub-menu-item">Case Detail </a></li>
                                    </ul>
                                </li>
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Portfolio</a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="page-portfolio-modern.html" class="sub-menu-item">Portfolio Modern</a></li>
                                        <li><a href="page-portfolio-classic.html" class="sub-menu-item">Portfolio Classic</a></li>
                                        <li><a href="page-portfolio-grid.html" class="sub-menu-item">Portfolio Grid</a></li>
                                        <li><a href="page-portfolio-masonry.html" class="sub-menu-item">Portfolio Masonry</a></li>
                                        <li><a href="page-portfolio-detail.html" class="sub-menu-item">Portfolio Detail</a></li>
                                    </ul>
                                </li>
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Auth Pages</a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="auth-login.html" class="sub-menu-item">Login</a></li>
                                        <li><a href="auth-cover-login.html" class="sub-menu-item">Login Cover</a></li>
                                        <li><a href="auth-login-three.html" class="sub-menu-item">Login Simple</a></li>
                                        <li><a href="auth-signup.html" class="sub-menu-item">Signup</a></li>
                                        <li><a href="auth-cover-signup.html" class="sub-menu-item">Signup Cover</a></li>
                                        <li><a href="auth-signup-three.html" class="sub-menu-item">Signup Simple</a></li>
                                        <li><a href="auth-re-password.html" class="sub-menu-item">Reset Password</a></li>
                                        <li><a href="auth-cover-re-password.html" class="sub-menu-item">Reset Password Cover</a></li>
                                        <li><a href="auth-re-password-three.html" class="sub-menu-item">Reset Password Simple</a></li>
                                    </ul>
                                </li>
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Utility </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="page-terms.html" class="sub-menu-item">Terms of Services</a></li>
                                        <li><a href="page-privacy.html" class="sub-menu-item">Privacy Policy</a></li>
                                    </ul>
                                </li>
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Special</a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="page-comingsoon.html" class="sub-menu-item">Coming Soon</a></li>
                                        <li><a href="page-comingsoon2.html" class="sub-menu-item">Coming Soon Two</a></li>
                                        <li><a href="page-maintenance.html" class="sub-menu-item">Maintenance</a></li>
                                        <li><a href="page-error.html" class="sub-menu-item">Error</a></li>
                                        <li><a href="page-thankyou.html" class="sub-menu-item">Thank you</a></li>
                                    </ul>
                                </li>
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Contact </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="page-contact-detail.html" class="sub-menu-item">Contact Detail</a></li>
                                        <li><a href="page-contact-one.html" class="sub-menu-item">Contact One</a></li>
                                        <li><a href="page-contact-two.html" class="sub-menu-item">Contact Two</a></li>
                                        <li><a href="page-contact-three.html" class="sub-menu-item">Contact Three</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="has-submenu parent-menu-item">
                            <a href="javascript:void(0)">Docs</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="documentation.html" class="sub-menu-item">Documentation</a></li>
                                <li><a href="changelog.html" class="sub-menu-item">Changelog</a></li>
                                <li><a href="components.html" class="sub-menu-item">Components</a></li>
                                <li><a href="widget.html" class="sub-menu-item">Widget</a></li>
                            </ul>
                        </li>
                    </ul><!--end navigation menu-->
                    <div class="buy-menu-btn d-none">
                        <a href="https://1.envato.market/4n73n" target="_blank" class="btn btn-primary">Buy Now</a>
                    </div><!--end login button-->
                </div><!--end navigation-->
            </div><!--end container-->
        </header><!--end header-->
        <!-- Navbar End -->

        <!-- Hero Start -->
        <section class="bg-half-260 d-table w-100" id="home">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="row mt-5 justify-content-center">
                    <div class="col-12">
                        <div class="title-heading text-center">
                            <h4 class="display-4 fw-bold text-white title-dark mb-3">Find your perfect property</h4>
                            <p class="para-desc text-white-50 mb-0 mx-auto">Launch your campaign and benefit from our expertise on designing and managing conversion centered bootstrap v5 html page.</p>
                        </div>
                    </div>
                </div><!--end row-->
            </div> <!--end container-->
        </section><!--end section-->
        <!-- Hero End -->

        <!-- Start -->
        <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-11 col-12 text-center mt-sm-0 pt-sm-0">
                        <div class="text-center features-absolute">
                            <ul class="nav nav-pills shadow border-bottom flex-column flex-sm-row d-md-inline-flex nav-justified mb-0 bg-white rounded-top position-relative overflow-hidden" id="pills-tab" role="tablist">
                                <li class="nav-item m-1">
                                    <a class="nav-link py-2 px-5 active rounded" id="buy-login" data-bs-toggle="pill" href="#buy" role="tab" aria-controls="buy" aria-selected="false">
                                        <div class="text-center">
                                            <h6 class="mb-0">Buy</h6>
                                        </div>
                                    </a><!--end nav link-->
                                </li><!--end nav item-->

                                <li class="nav-item m-1">
                                    <a class="nav-link py-2 px-5 rounded" id="sold-login" data-bs-toggle="pill" href="#sold" role="tab" aria-controls="sold" aria-selected="false">
                                        <div class="text-center">
                                            <h6 class="mb-0">Sold</h6>
                                        </div>
                                    </a><!--end nav link-->
                                </li><!--end nav item-->

                                <li class="nav-item m-1">
                                    <a class="nav-link py-2 px-5 rounded" id="rent-login" data-bs-toggle="pill" href="#rent" role="tab" aria-controls="rent" aria-selected="false">
                                        <div class="text-center">
                                            <h6 class="mb-0">Rent</h6>
                                        </div>
                                    </a><!--end nav link-->
                                </li><!--end nav item-->
                            </ul>

                            <div class="tab-content bg-white rounded-bottom shadow" id="pills-tabContent">
                                <div class="card border-0 tab-pane fade show active" id="buy" role="tabpanel" aria-labelledby="buy-login">
                                    <form class="card-body text-start">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Search :</label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="search" class="fea icon-sm icons"></i>
                                                        <input name="name" id="name" type="text" class="form-control ps-5" placeholder="Search your home :">
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-3 col-md-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Select Categories:</label>
                                                    <select class="form-control custom-select" id="buy-properties">
                                                        <option>Houses</option>
                                                        <option>Apartment</option>
                                                        <option>Offices</option>
                                                        <option>Townhome</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-3 col-md-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Min Price :</label>
                                                    <select class="form-control custom-select" id="buy-min-price">
                                                        <option>Min Price</option>
                                                        <option>500</option>
                                                        <option>1000</option>
                                                        <option>2000</option>
                                                        <option>3000</option>
                                                        <option>4000</option>
                                                        <option>5000</option>
                                                        <option>6000</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-3 col-md-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Max Price :</label>
                                                    <select class="form-control custom-select" id="buy-max-price">
                                                        <option>Max Price</option>
                                                        <option>500</option>
                                                        <option>1000</option>
                                                        <option>2000</option>
                                                        <option>3000</option>
                                                        <option>4000</option>
                                                        <option>5000</option>
                                                        <option>6000</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-12">
                                                <a href="javascript:void(0)" class="btn btn-primary">Search now</a>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </form><!--end form-->
                                </div><!--end teb pane-->

                                <div class="card border-0 tab-pane fade" id="sold" role="tabpanel" aria-labelledby="sold-login">
                                    <form class="card-body text-start">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 col-12">
                                                <div class="mb-3 text-start">
                                                    <label class="form-label">Search :</label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="search" class="fea icon-sm icons"></i>
                                                        <input name="name" id="name1" type="text" class="form-control ps-5" placeholder="Search your home :">
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-3 col-md-6 col-12">
                                                <div class="mb-3 text-start">
                                                    <label class="form-label">Select Categories:</label>
                                                    <select class="form-control custom-select" id="buy-properties2">
                                                        <option>Houses</option>
                                                        <option>Apartment</option>
                                                        <option>Offices</option>
                                                        <option>Townhome</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-3 col-md-6 col-12">
                                                <div class="mb-3 text-start">
                                                    <label class="form-label">Min Price :</label>
                                                    <select class="form-control custom-select" id="buy-min-price2">
                                                        <option>Min Price</option>
                                                        <option>500</option>
                                                        <option>1000</option>
                                                        <option>2000</option>
                                                        <option>3000</option>
                                                        <option>4000</option>
                                                        <option>5000</option>
                                                        <option>6000</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-3 col-md-6 col-12">
                                                <div class="mb-3 text-start">
                                                    <label class="form-label">Max Price :</label>
                                                    <select class="form-control custom-select" id="buy-max-price2">
                                                        <option>Max Price</option>
                                                        <option>500</option>
                                                        <option>1000</option>
                                                        <option>2000</option>
                                                        <option>3000</option>
                                                        <option>4000</option>
                                                        <option>5000</option>
                                                        <option>6000</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-12">
                                                <a href="javascript:void(0)" class="btn btn-primary">Search now</a>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </form><!--end form-->
                                </div><!--end teb pane-->

                                <div class="card border-0 tab-pane fade" id="rent" role="tabpanel" aria-labelledby="rent-login">
                                    <form class="card-body text-start">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 col-12">
                                                <div class="mb-3 text-start">
                                                    <label class="form-label">Search :</label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="search" class="fea icon-sm icons"></i>
                                                        <input name="name" id="name2" type="text" class="form-control ps-5" placeholder="Search your home :">
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-3 col-md-6 col-12">
                                                <div class="mb-3 text-start">
                                                    <label class="form-label">Select Categories:</label>
                                                    <select class="form-control custom-select" id="buy-properties3">
                                                        <option>Houses</option>
                                                        <option>Apartment</option>
                                                        <option>Offices</option>
                                                        <option>Townhome</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-3 col-md-6 col-12">
                                                <div class="mb-3 text-start">
                                                    <label class="form-label">Min Price :</label>
                                                    <select class="form-control custom-select" id="buy-min-price3">
                                                        <option>Min Price</option>
                                                        <option>500</option>
                                                        <option>1000</option>
                                                        <option>2000</option>
                                                        <option>3000</option>
                                                        <option>4000</option>
                                                        <option>5000</option>
                                                        <option>6000</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-3 col-md-6 col-12">
                                                <div class="mb-3 text-start">
                                                    <label class="form-label">Max Price :</label>
                                                    <select class="form-control custom-select" id="buy-max-price3">
                                                        <option>Max Price</option>
                                                        <option>500</option>
                                                        <option>1000</option>
                                                        <option>2000</option>
                                                        <option>3000</option>
                                                        <option>4000</option>
                                                        <option>5000</option>
                                                        <option>6000</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-12">
                                                <a href="javascript:void(0)" class="btn btn-primary">Search now</a>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </form><!--end form-->
                                </div><!--end teb pane-->
                            </div><!--end tab content-->
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container mt-100 mt-60">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title mb-4 pb-2 text-center">
                            <span class="badge rounded-pill bg-soft-primary">Process</span>
                            <h4 class="title mt-3 mb-4">How it work</h4>
                            <p class="text-muted para-desc mb-0 mx-auto">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                        <div class="card border-0 text-center features feature-clean rounded">
                            <div class="icons text-primary text-center mx-auto">
                                <i class="uil uil-map-marker-plus d-block rounded h3 mb-0"></i>
                            </div>

                            <div class="card-body p-0 mt-4">
                                <a href="javascript:void(0)" class="title h5 text-dark">Map Search</a>
                                <p class="text-muted mt-3 mb-0">Composed in a pseudo-Latin language which more or less pseudo-Latin language corresponds.</p>
                                <div class="mt-2">
                                    <a href="javascript:void(0)" class="text-primary">Read More <i data-feather="arrow-right" class="fea icon-sm"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                        <div class="card border-0 text-center features feature-clean rounded">
                            <div class="icons text-primary text-center mx-auto">
                                <i class="uil uil-estate d-block rounded h3 mb-0"></i>
                            </div>

                            <div class="card-body p-0 mt-4">
                                <a href="javascript:void(0)" class="title h5 text-dark">Property Lookup</a>
                                <p class="text-muted mt-3 mb-0">Composed in a pseudo-Latin language which more or less pseudo-Latin language corresponds.</p>
                                <div class="mt-2">
                                    <a href="javascript:void(0)" class="text-primary">Read More <i data-feather="arrow-right" class="fea icon-sm"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                        <div class="card border-0 text-center features feature-clean rounded">
                            <div class="icons text-primary text-center mx-auto">
                                <i class="uil uil-house-user d-block rounded h3 mb-0"></i>
                            </div>

                            <div class="card-body p-0 mt-4">
                                <a href="javascript:void(0)" class="title h5 text-dark">Buy / Sell Property</a>
                                <p class="text-muted mt-3 mb-0">Composed in a pseudo-Latin language which more or less pseudo-Latin language corresponds.</p>
                                <div class="mt-2">
                                    <a href="javascript:void(0)" class="text-primary">Read More <i data-feather="arrow-right" class="fea icon-sm"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container mt-100 mt-60">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <div class="section-title text-center text-lg-start mb-4 mb-lg-0">
                            <span class="badge rounded-pill bg-soft-primary">Featured Items</span>
                            <h4 class="title mt-3 mb-4">Latest Property</h4>
                            <p class="text-muted mx-auto mx-lg-star para-desc mb-0">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                            <div class="mt-4 d-none d-lg-block">
                                <a href="javascript:void(0)" class="btn btn-primary">See More</a>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-8 mt-4 mt-lg-0 pt-2 pt-lg-0">
                        <div class="tiny-two-item">
                            <div class="tiny-slide">
                                <div class="card client-testi shop-list border-0 shadow position-relative overflow-hidden m-2">
                                    <div class="shop-image position-relative overflow-hidden shadow">
                                        <a href="shop-product-detail.html"><img src="{{ asset('website/images/real/p1.jpg')}}" class="img-fluid" alt=""></a>
                                        <ul class="list-unstyled shop-icons">
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-primary"><i class="uil uil-estate icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-primary"><i class="uil uil-heart icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-primary"><i class="uil uil-camera icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body content p-4">
                                        <a href="javascript:void(0)" class="text-dark product-name h6">Luxury Apartment In chelsea</a>
                                        <ul class="list-unstyled text-muted mt-2 mb-0">
                                            <li class="list-inline-item me-3"><i class="uil uil-bed me-1"></i>1 Bed</li>
                                            <li class="list-inline-item"><i class="uil uil-bath me-1"></i>1 Bath</li>
                                        </ul>
                                        <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                            <li class="list-inline-item"><b>$ 44000</b></li>
                                            <li class="list-inline-item text-muted">$ 850 / sqft</li>
                                        </ul>
                                    </div>
                                </div><!--end items-->
                            </div>

                            <div class="tiny-slide">
                                <div class="card client-testi shop-list border-0 shadow position-relative overflow-hidden m-2">
                                    <div class="shop-image position-relative overflow-hidden shadow">
                                        <a href="shop-product-detail.html"><img src="{{ asset('website/images/real/p2.jpg')}}" class="img-fluid" alt=""></a>
                                        <ul class="list-unstyled shop-icons">
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-primary"><i class="uil uil-estate icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-primary"><i class="uil uil-heart icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-primary"><i class="uil uil-camera icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body content p-4">
                                        <a href="javascript:void(0)" class="text-dark product-name h6">Luxury Apartment In chelsea</a>
                                        <ul class="list-unstyled text-muted mt-2 mb-0">
                                            <li class="list-inline-item me-3"><i class="uil uil-bed me-1"></i>1 Bed</li>
                                            <li class="list-inline-item"><i class="uil uil-bath me-1"></i>1 Bath</li>
                                        </ul>
                                        <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                            <li class="list-inline-item"><b>$ 44000</b></li>
                                            <li class="list-inline-item text-muted">$ 850 / sqft</li>
                                        </ul>
                                    </div>
                                </div><!--end items-->
                            </div>

                            <div class="tiny-slide">
                                <div class="card client-testi shop-list border-0 shadow position-relative overflow-hidden m-2">
                                    <div class="shop-image position-relative overflow-hidden shadow">
                                        <a href="shop-product-detail.html"><img src="{{ asset('website/images/real/p3.jpg')}}" class="img-fluid" alt=""></a>
                                        <ul class="list-unstyled shop-icons">
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-primary"><i class="uil uil-estate icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-primary"><i class="uil uil-heart icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-primary"><i class="uil uil-camera icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body content p-4">
                                        <a href="javascript:void(0)" class="text-dark product-name h6">Luxury Apartment In chelsea</a>
                                        <ul class="list-unstyled text-muted mt-2 mb-0">
                                            <li class="list-inline-item me-3"><i class="uil uil-bed me-1"></i>1 Bed</li>
                                            <li class="list-inline-item"><i class="uil uil-bath me-1"></i>1 Bath</li>
                                        </ul>
                                        <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                            <li class="list-inline-item"><b>$ 44000</b></li>
                                            <li class="list-inline-item text-muted">$ 850 / sqft</li>
                                        </ul>
                                    </div>
                                </div><!--end items-->
                            </div>

                            <div class="tiny-slide">
                                <div class="card client-testi shop-list border-0 shadow position-relative overflow-hidden m-2">
                                    <div class="shop-image position-relative overflow-hidden shadow">
                                        <a href="shop-product-detail.html"><img src="{{ asset('website/images/real/p4.jpg')}}" class="img-fluid" alt=""></a>
                                        <ul class="list-unstyled shop-icons">
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-primary"><i class="uil uil-estate icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-primary"><i class="uil uil-heart icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-primary"><i class="uil uil-camera icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body content p-4">
                                        <a href="javascript:void(0)" class="text-dark product-name h6">Luxury Apartment In chelsea</a>
                                        <ul class="list-unstyled text-muted mt-2 mb-0">
                                            <li class="list-inline-item me-3"><i class="uil uil-bed me-1"></i>1 Bed</li>
                                            <li class="list-inline-item"><i class="uil uil-bath me-1"></i>1 Bath</li>
                                        </ul>
                                        <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                            <li class="list-inline-item"><b>$ 44000</b></li>
                                            <li class="list-inline-item text-muted">$ 850 / sqft</li>
                                        </ul>
                                    </div>
                                </div><!--end items-->
                            </div>

                            <div class="tiny-slide">
                                <div class="card client-testi shop-list border-0 shadow position-relative overflow-hidden m-2">
                                    <div class="shop-image position-relative overflow-hidden shadow">
                                        <a href="shop-product-detail.html"><img src="{{ asset('website/images/real/p5.jpg')}}" class="img-fluid" alt=""></a>
                                        <ul class="list-unstyled shop-icons">
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-primary"><i class="uil uil-estate icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-primary"><i class="uil uil-heart icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-primary"><i class="uil uil-camera icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body content p-4">
                                        <a href="javascript:void(0)" class="text-dark product-name h6">Luxury Apartment In chelsea</a>
                                        <ul class="list-unstyled text-muted mt-2 mb-0">
                                            <li class="list-inline-item me-3"><i class="uil uil-bed me-1"></i>1 Bed</li>
                                            <li class="list-inline-item"><i class="uil uil-bath me-1"></i>1 Bath</li>
                                        </ul>
                                        <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                            <li class="list-inline-item"><b>$ 44000</b></li>
                                            <li class="list-inline-item text-muted">$ 850 / sqft</li>
                                        </ul>
                                    </div>
                                </div><!--end items-->
                            </div>

                            <div class="tiny-slide">
                                <div class="card client-testi shop-list border-0 shadow position-relative overflow-hidden m-2">
                                    <div class="shop-image position-relative overflow-hidden shadow">
                                        <a href="shop-product-detail.html"><img src="{{ asset('website/images/real/p6.jpg')}}" class="img-fluid" alt=""></a>
                                        <ul class="list-unstyled shop-icons">
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-primary"><i class="uil uil-estate icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-primary"><i class="uil uil-heart icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-primary"><i class="uil uil-camera icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body content p-4">
                                        <a href="javascript:void(0)" class="text-dark product-name h6">Luxury Apartment In chelsea</a>
                                        <ul class="list-unstyled text-muted mt-2 mb-0">
                                            <li class="list-inline-item me-3"><i class="uil uil-bed me-1"></i>1 Bed</li>
                                            <li class="list-inline-item"><i class="uil uil-bath me-1"></i>1 Bath</li>
                                        </ul>
                                        <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                            <li class="list-inline-item"><b>$ 44000</b></li>
                                            <li class="list-inline-item text-muted">$ 850 / sqft</li>
                                        </ul>
                                    </div>
                                </div><!--end items-->
                            </div>

                            <div class="tiny-slide">
                                <div class="card client-testi shop-list border-0 shadow position-relative overflow-hidden m-2">
                                    <div class="shop-image position-relative overflow-hidden shadow">
                                        <a href="shop-product-detail.html"><img src="{{ asset('website/images/real/p7.jpg')}}" class="img-fluid" alt=""></a>
                                        <ul class="list-unstyled shop-icons">
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-primary"><i class="uil uil-estate icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-primary"><i class="uil uil-heart icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-primary"><i class="uil uil-camera icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body content p-4">
                                        <a href="javascript:void(0)" class="text-dark product-name h6">Luxury Apartment In chelsea</a>
                                        <ul class="list-unstyled text-muted mt-2 mb-0">
                                            <li class="list-inline-item me-3"><i class="uil uil-bed me-1"></i>1 Bed</li>
                                            <li class="list-inline-item"><i class="uil uil-bath me-1"></i>1 Bath</li>
                                        </ul>
                                        <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                            <li class="list-inline-item"><b>$ 44000</b></li>
                                            <li class="list-inline-item text-muted">$ 850 / sqft</li>
                                        </ul>
                                    </div>
                                </div><!--end items-->
                            </div>

                            <div class="tiny-slide">
                                <div class="card client-testi shop-list border-0 shadow position-relative overflow-hidden m-2">
                                    <div class="shop-image position-relative overflow-hidden shadow">
                                        <a href="shop-product-detail.html"><img src="{{ asset('website/images/real/p8.jpg')}}" class="img-fluid" alt=""></a>
                                        <ul class="list-unstyled shop-icons">
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-primary"><i class="uil uil-estate icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-primary"><i class="uil uil-heart icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-primary"><i class="uil uil-camera icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body content p-4">
                                        <a href="javascript:void(0)" class="text-dark product-name h6">Luxury Apartment In chelsea</a>
                                        <ul class="list-unstyled text-muted mt-2 mb-0">
                                            <li class="list-inline-item me-3"><i class="uil uil-bed me-1"></i>1 Bed</li>
                                            <li class="list-inline-item"><i class="uil uil-bath me-1"></i>1 Bath</li>
                                        </ul>
                                        <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                            <li class="list-inline-item"><b>$ 44000</b></li>
                                            <li class="list-inline-item text-muted">$ 850 / sqft</li>
                                        </ul>
                                    </div>
                                </div><!--end items-->
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container-fluid mt-100 mt-60">
                <div class="rounded shadow py-5" style="background: url('{{ asset('website/images/real/1.jpg')}}') center center;">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="rounded p-4 bg-light">
                                    <div class="tiny-single-item">
                                        <div class="tiny-slider">
                                            <div class="client-testi text-center">
                                                <p class="h6 text-muted fst-italic fw-normal">" The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. It contains a series of real Latin words. "</p>
                                                <div class="commenter mt-4">
                                                    <img src="{{ asset('website/images/client/01.jpg')}}" class="avatar avatar-small rounded-circle d-block mx-auto shadow-lg" alt="">
                                                    <div class="content mt-4">
                                                        <ul class="list-unstyled h6 text-warning mb-0">
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        </ul>
                                                        <h5 class="text-primary mb-0">Ronald Kinsey</h5>
                                                        <small class="text-muted">User</small>
                                                    </div>
                                                </div>
                                            </div><!--end review content-->
                                        </div>

                                        <div class="tiny-slider">
                                            <div class="client-testi text-center">
                                                <p class="h6 text-muted fst-italic fw-normal">" The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. It contains a series of real Latin words. "</p>
                                                <div class="commenter mt-4">
                                                    <img src="{{ asset('website/images/client/02.jpg')}}" class="avatar avatar-small rounded-circle d-block mx-auto shadow-lg" alt="">
                                                    <div class="content mt-4">
                                                        <ul class="list-unstyled h6 text-warning mb-0">
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        </ul>
                                                        <h5 class="text-primary mb-0">Raquel Service</h5>
                                                        <small class="text-muted">App User</small>
                                                    </div>
                                                </div>
                                            </div><!--end review content-->
                                        </div>

                                        <div class="tiny-slider">
                                            <div class="client-testi text-center">
                                                <p class="h6 text-muted fst-italic fw-normal">" The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. It contains a series of real Latin words. "</p>
                                                <div class="commenter mt-4">
                                                    <img src="{{ asset('website/images/client/03.jpg')}}" class="avatar avatar-small rounded-circle d-block mx-auto shadow-lg" alt="">
                                                    <div class="content mt-4">
                                                        <ul class="list-unstyled h6 text-warning mb-0">
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        </ul>
                                                        <h5 class="text-primary mb-0">Leona Moore</h5>
                                                        <small class="text-muted">Client</small>
                                                    </div>
                                                </div>
                                            </div><!--end review content-->
                                        </div>

                                        <div class="tiny-slider">
                                            <div class="client-testi text-center">
                                                <p class="h6 text-muted fst-italic fw-normal">" The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. It contains a series of real Latin words. "</p>
                                                <div class="commenter mt-4">
                                                    <img src="{{ asset('website/images/client/04.jpg')}}" class="avatar avatar-small rounded-circle d-block mx-auto shadow-lg" alt="">
                                                    <div class="content mt-4">
                                                        <ul class="list-unstyled h6 text-warning mb-0">
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        </ul>
                                                        <h5 class="text-primary mb-0">Mark Rose</h5>
                                                        <small class="text-muted">CEO</small>
                                                    </div>
                                                </div>
                                            </div><!--end review content-->
                                        </div>

                                        <div class="tiny-slider">
                                            <div class="client-testi text-center">
                                                <p class="h6 text-muted fst-italic fw-normal">" The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. It contains a series of real Latin words. "</p>
                                                <div class="commenter mt-4">
                                                    <img src="{{ asset('website/images/client/05.jpg')}}" class="avatar avatar-small rounded-circle d-block mx-auto shadow-lg" alt="">
                                                    <div class="content mt-4">
                                                        <ul class="list-unstyled h6 text-warning mb-0">
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        </ul>
                                                        <h5 class="text-primary mb-0">Marsha Donoho</h5>
                                                        <small class="text-muted">User</small>
                                                    </div>
                                                </div>
                                            </div><!--end review content-->
                                        </div>

                                        <div class="tiny-slider">
                                            <div class="client-testi text-center">
                                                <p class="h6 text-muted fst-italic fw-normal">" The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. It contains a series of real Latin words. "</p>
                                                <div class="commenter mt-4">
                                                    <img src="{{ asset('website/images/client/06.jpg')}}" class="avatar avatar-small rounded-circle d-block mx-auto shadow-lg" alt="">
                                                    <div class="content mt-4">
                                                        <ul class="list-unstyled h6 text-warning mb-0">
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                                        </ul>
                                                        <h5 class="text-primary mb-0">Xavier Giancola</h5>
                                                        <small class="text-muted">App User</small>
                                                    </div>
                                                </div>
                                            </div><!--end review content-->
                                        </div>
                                    </div><!--end owl carousel-->
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end container-->
                </div>
            </div><!--end container fluid-->

            <div class="container mt-100 mt-60">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title mb-4 pb-2 text-center">
                            <h4 class="title mb-4">Our Experts</h4>
                            <p class="text-muted para-desc mb-0 mx-auto">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    <div class="col-lg-3 col-md-6 mt-4 pt-2">
                        <div class="card team bg-light text-center rounded shadow border-0">
                            <div class="card-body">
                                <div class="position-relative">
                                    <img src="{{ asset('website/images/client/01.jpg')}}" class="img-fluid avatar avatar-ex-large rounded-circle shadow" alt="">
                                    <ul class="list-unstyled social-icon team-icon mb-0 mt-4">
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                                    </ul><!--end icon-->
                                </div>
                                <div class="content pt-3">
                                    <h5 class="mb-0"><a href="javascript:void(0)" class="name text-dark">Ronny Jofra</a></h5>
                                    <small class="designation text-muted">Commercial Broker</small>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-3 col-md-6 mt-4 pt-2">
                        <div class="card team bg-light text-center rounded shadow border-0">
                            <div class="card-body">
                                <div class="position-relative">
                                    <img src="{{ asset('website/images/client/04.jpg')}}" class="img-fluid avatar avatar-ex-large rounded-circle shadow" alt="">
                                    <ul class="list-unstyled social-icon team-icon mb-0 mt-4">
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                                    </ul><!--end icon-->
                                </div>
                                <div class="content pt-3">
                                    <h5 class="mb-0"><a href="javascript:void(0)" class="name text-dark">Micheal Carlo</a></h5>
                                    <small class="designation text-muted">Commercial Broker</small>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-3 col-md-6 mt-4 pt-2">
                        <div class="card team bg-light text-center rounded shadow border-0">
                            <div class="card-body">
                                <div class="position-relative">
                                    <img src="{{ asset('website/images/client/03.jpg')}}" class="img-fluid avatar avatar-ex-large rounded-circle shadow" alt="">
                                    <ul class="list-unstyled social-icon team-icon mb-0 mt-4">
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                                    </ul><!--end icon-->
                                </div>
                                <div class="content pt-3">
                                    <h5 class="mb-0"><a href="javascript:void(0)" class="name text-dark">Aliana Rosy</a></h5>
                                    <small class="designation text-muted">Commercial Broker</small>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-3 col-md-6 mt-4 pt-2">
                        <div class="card team bg-light text-center rounded shadow border-0">
                            <div class="card-body">
                                <div class="position-relative">
                                    <img src="{{ asset('website/images/client/02.jpg')}}" class="img-fluid avatar avatar-ex-large rounded-circle shadow" alt="">
                                    <ul class="list-unstyled social-icon team-icon mb-0 mt-4">
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                                    </ul><!--end icon-->
                                </div>
                                <div class="content pt-3">
                                    <h5 class="mb-0"><a href="javascript:void(0)" class="name text-dark">Sofia Razaq</a></h5>
                                    <small class="designation text-muted">Commercial Broker</small>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End -->

        <section class="section pt-0" style="background: url('{{ asset('website/images/real/build.png')}}') bottom no-repeat;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <div class="section-title mb-4 pb-2">
                            <h4 class="title mb-4">Latest Blog & News</h4>
                            <p class="text-muted para-desc mx-auto mb-0">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="card blog rounded border-0 shadow">
                            <div class="position-relative">
                                <img src="{{ asset('website/images/real/p1.jpg')}}" class="card-img-top rounded-top" alt="...">
                            <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body content">
                                <h5><a href="javascript:void(0)" class="card-title title text-dark">Design your apps in your own way</a></h5>
                                <div class="post-meta d-flex justify-content-between mt-3">
                                    <ul class="list-unstyled mb-0">
                                        <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                                    </ul>
                                    <a href="page-blog-detail.html" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                                </div>
                            </div>
                            <div class="author">
                                <small class="text-light user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>
                                <small class="text-light date"><i class="uil uil-calendar-alt"></i> 13th August, 2019</small>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="card blog rounded border-0 shadow">
                            <div class="position-relative">
                                <img src="{{ asset('website/images/real/p2.jpg')}}" class="card-img-top rounded-top" alt="...">
                            <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body content">
                                <h5><a href="javascript:void(0)" class="card-title title text-dark">How apps is changing the IT world</a></h5>
                                <div class="post-meta d-flex justify-content-between mt-3">
                                    <ul class="list-unstyled mb-0">
                                        <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                                    </ul>
                                    <a href="page-blog-detail.html" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                                </div>
                            </div>
                            <div class="author">
                                <small class="text-light user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>
                                <small class="text-light date"><i class="uil uil-calendar-alt"></i> 13th August, 2019</small>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="card blog rounded border-0 shadow">
                            <div class="position-relative">
                                <img src="{{ asset('website/images/real/p3.jpg')}}" class="card-img-top rounded-top" alt="...">
                            <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body content">
                                <h5><a href="javascript:void(0)" class="card-title title text-dark">Smartest Applications for Business</a></h5>
                                <div class="post-meta d-flex justify-content-between mt-3">
                                    <ul class="list-unstyled mb-0">
                                        <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                                    </ul>
                                    <a href="page-blog-detail.html" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                                </div>
                            </div>
                            <div class="author">
                                <small class="text-light user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>
                                <small class="text-light date"><i class="uil uil-calendar-alt"></i> 13th August, 2019</small>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                        <a href="#" class="logo-footer">
                            <img src="{{ asset('website/images/logo-light.png')}}" height="24" alt="">
                        </a>
                        <p class="mt-4">Start working with Landrick that can provide everything you need to generate awareness, drive traffic, connect.</p>
                        <ul class="list-unstyled social-icon foot-social-icon mb-0 mt-4">
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                        </ul><!--end icon-->
                    </div><!--end col-->

                    <div class="col-lg-2 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <h5 class="text-light footer-head">Company</h5>
                        <ul class="list-unstyled footer-list mt-4">
                            <li><a href="page-aboutus.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> About us</a></li>
                            <li><a href="page-services.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Services</a></li>
                            <li><a href="page-team.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Team</a></li>
                            <li><a href="page-pricing.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Pricing</a></li>
                            <li><a href="page-portfolio-modern.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Project</a></li>
                            <li><a href="page-jobs.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Careers</a></li>
                            <li><a href="page-blog-grid.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Blog</a></li>
                            <li><a href="auth-cover-login.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Login</a></li>
                        </ul>
                    </div><!--end col-->

                    <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <h5 class="text-light footer-head">Usefull Links</h5>
                        <ul class="list-unstyled footer-list mt-4">
                            <li><a href="page-terms.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Terms of Services</a></li>
                            <li><a href="page-privacy.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Privacy Policy</a></li>
                            <li><a href="documentation.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Documentation</a></li>
                            <li><a href="changelog.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Changelog</a></li>
                            <li><a href="components.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Components</a></li>
                        </ul>
                    </div><!--end col-->

                    <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <h5 class="text-light footer-head">Newsletter</h5>
                        <p class="mt-4">Sign up and receive the latest tips via email.</p>
                        <form>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="foot-subscribe mb-3">
                                        <label class="form-label">Write your email <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="mail" class="fea icon-sm icons"></i>
                                            <input type="email" name="email" id="emailsubscribe" class="form-control ps-5 rounded" placeholder="Your email : " required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-grid">
                                        <input type="submit" id="submitsubscribe" name="send" class="btn btn-soft-primary" value="Subscribe">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </footer><!--end footer-->
        <footer class="footer footer-bar">
            <div class="container text-center">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="text-sm-start">
                            <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Landrick. Design with <i class="mdi mdi-heart text-danger"></i> by <a href="http://shreethemes.in/" target="_blank" class="text-reset">Shreethemes</a>.</p>
                        </div>
                    </div><!--end col-->

                    <div class="col-sm-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <ul class="list-unstyled text-sm-end mb-0">
                            <li class="list-inline-item"><a href="javascript:void(0)"><img src="{{ asset('website/images/payments/american-ex.png')}}" class="avatar avatar-ex-sm" title="American Express" alt=""></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)"><img src="{{ asset('website/images/payments/discover.png')}}" class="avatar avatar-ex-sm" title="Discover" alt=""></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)"><img src="{{ asset('website/images/payments/master-card.png')}}" class="avatar avatar-ex-sm" title="Master Card" alt=""></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)"><img src="{{ asset('website/images/payments/paypal.png')}}" class="avatar avatar-ex-sm" title="Paypal" alt=""></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)"><img src="{{ asset('website/images/payments/visa.png')}}" class="avatar avatar-ex-sm" title="Visa" alt=""></a></li>
                        </ul>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </footer><!--end footer-->
        <!-- Footer End -->

        <!-- Back to top -->
        <a href="#" onclick="topFunction()" id="back-to-top" class="btn btn-icon btn-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
        <!-- Back to top -->



        <!-- javascript -->
        <script src="{{ asset('website/js/bootstrap.bundle.min.js') }}"></script>
        <!-- SLIDER -->
        <script src="{{ asset('website/js/tiny-slider.js ') }}"></script>
        <script src="{{ asset('website/js/easy_background.js') }}"></script>
        <!-- Icons -->
        <script src="{{ asset('website/js/feather.min.js') }}"></script>
        <!-- Main Js -->
        <script src="{{ asset('website/js/plugins.init.js') }}"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
        <script src="{{ asset('website/js/app.js') }}"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->

        <script>
            easy_background("#home",
                {
                    slide: ["{{ asset('website/images/real/1.jpg')}}", "{{ asset('website/images/real/2.jpg')}}", "{{ asset('website/images/real/3.jpg')}}"],
                    delay: [2000, 2000, 2000]
                }
            );
        </script>
    </body>
</html>
