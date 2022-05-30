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
        <title>{{config('app.name','Mimóvel')}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Mimóvel é uma empresa de aluguel, compra de imóveis localizada na cidade da beira, reconhecida pelos seus excelentes edificios que superam as expectativas dos clientes." />
        <meta name="keywords" content="Imóveis, Mimóvel, Casas, Arendar, Comprar, Aluguar" />
        <meta name="author" content="Administrator" />
        <meta name="website" content="{{config('app.url')}}" />
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
                        <li class="active"><a href="{{ route('welcome') }}"  >Início</a></li>
                        <li><a href="{{ route('welcome') }}" >Todos imóveis</a></li>
                        <li><a href="{{ route('welcome') }}" >Sobre nós</a></li>
                        <li><a href="{{ route('welcome') }}" >Contactos</a></li>
                        <li><a href="{{ route('welcome') }}" >Termos e Condições</a></li>

                    </ul>

                    <!--end navigation menu-->
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
                            <h4 class="display-4 fw-bold text-white title-dark mb-3">Mimóvel</h4>
                            <p class="para-desc text-white-50 mb-0 mx-auto">Mimóvel é uma empresa de aluguel, compra de imóveis localizada na cidade da beira, reconhecida pelos seus excelentes edificios que superam as expectativas dos clientes.</p>
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
