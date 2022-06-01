@extends('website.layouts.website')
@section('title',config('app.name','Mimóvel'))
@section('content')
        <!-- Hero Start -->
        <section class="bg-half d-table w-100" id="home">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="row mt-5 justify-content-center">
                    <div class="col-12">
                        <div class="title-heading text-center my-3">
                            <h4 class="display-4 fw-bold text-white title-dark mb-3">Mimóvel</h4>
                            <p class="para-desc text-white-50 mb-0 mx-auto">Agência Imobiliária: Intermediações na compra, venda e arendamento de imóveis.</p>
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
                                            <h6 class="mb-0">Comprar</h6>
                                        </div>
                                    </a><!--end nav link-->
                                </li><!--end nav item-->

                                <li class="nav-item m-1">
                                    <a class="nav-link py-2 px-5 rounded" id="rent-login" data-bs-toggle="pill" href="#rent" role="tab" aria-controls="rent" aria-selected="false">
                                        <div class="text-center">
                                            <h6 class="mb-0">Arendar</h6>
                                        </div>
                                    </a><!--end nav link-->
                                </li><!--end nav item-->
                            </ul>

                            <div class="tab-content bg-white rounded-bottom shadow" id="pills-tabContent">
                                <div class="card border-0 tab-pane fade show active" id="buy" role="tabpanel" aria-labelledby="buy-login">
                                    <form class="card-body text-start">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 col-12">
                                                <div class="mb-3 text-start">
                                                    <label class="form-label">Pesquisar :</label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="search" class="fea icon-sm icons"></i>
                                                        <input name="location" id="location" type="text" class="form-control ps-5" placeholder="Pesquisar por localização:">
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-3 col-md-6 col-12">
                                                <div class="mb-3 text-start">
                                                    <label class="form-label">Selecione tipo de imóvel:</label>
                                                    <select class="form-control custom-select" id="buy-properties3" name="tipo_de_imovel">
                                                        <option>Houses</option>
                                                        <option>Apartment</option>
                                                        <option>Offices</option>
                                                        <option>Townhome</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-3 col-md-6 col-12">
                                                <div class="mb-3 text-start">
                                                    <label class="form-label">Preço mínimo (MZN) :</label>
                                                    <select class="form-control custom-select" id="buy-min-price3">
                                                        <option>Preço mínimo</option>
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
                                                    <label class="form-label">Preço máximo (MZN) :</label>
                                                    <select class="form-control custom-select" id="buy-max-price3">
                                                        <option>Preço máximo</option>
                                                        <option>500</option>
                                                        <option>1000</option>
                                                        <option>2000</option>
                                                        <option>3000</option>
                                                        <option>4000</option>
                                                        <option>5000</option>
                                                        <option>+5000</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-12">
                                                <a href="javascript:void(0)" class="btn btn-warning">
                                                    <i data-feather="search" class="fea icon-sm icons"></i>
                                                    Pesquisar</a>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </form><!--end form-->
                                </div><!--end teb pane-->

                                <div class="card border-0 tab-pane fade" id="rent" role="tabpanel" aria-labelledby="rent-login">
                                    <form class="card-body text-start">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 col-12">
                                                <div class="mb-3 text-start">
                                                    <label class="form-label">Pesquisar :</label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="search" class="fea icon-sm icons"></i>
                                                        <input name="location" id="location" type="text" class="form-control ps-5" placeholder="Pesquisar por localização:">
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-3 col-md-6 col-12">
                                                <div class="mb-3 text-start">
                                                    <label class="form-label">Selecione tipo de imóvel:</label>
                                                    <select class="form-control custom-select" id="buy-properties3" name="tipo_de_imovel">
                                                        <option>Houses</option>
                                                        <option>Apartment</option>
                                                        <option>Offices</option>
                                                        <option>Townhome</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-3 col-md-6 col-12">
                                                <div class="mb-3 text-start">
                                                    <label class="form-label">Preço mínimo (MZN) :</label>
                                                    <select class="form-control custom-select" id="buy-min-price3">
                                                        <option>Preço mínimo</option>
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
                                                    <label class="form-label">Preço máximo (MZN) :</label>
                                                    <select class="form-control custom-select" id="buy-max-price3">
                                                        <option>Preço máximo</option>
                                                        <option>500</option>
                                                        <option>1000</option>
                                                        <option>2000</option>
                                                        <option>3000</option>
                                                        <option>4000</option>
                                                        <option>5000</option>
                                                        <option>+5000</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-12">
                                                <a href="javascript:void(0)" class="btn btn-warning">
                                                    <i data-feather="search" class="fea icon-sm icons"></i>
                                                    Pesquisar</a>
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
                            <span class="badge rounded-pill bg-soft-warning">Destaque</span>
                            <h4 class="title mt-3 mb-4">Imóveis mais destacados</h4>
                            <p class="text-muted mx-auto mx-lg-star para-desc mb-0">Imóveis mais visitados e visualizados por usuário do site.
                                </p>
                            <div class="mt-4 d-none d-lg-block">
                                <a href="javascript:void(0)" class="btn btn-warning">Ver mais</a>
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
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-warning"><i class="uil uil-estate icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-warning"><i class="uil uil-heart icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-warning"><i class="uil uil-camera icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body content p-4">
                                        <a href="javascript:void(0)" class="text-dark product-name h6">Luxury Apartment In chelsea</a>
                                        <ul class="list-unstyled text-muted mt-2 mb-0">
                                            <li class="list-inline-item me-3"><i class="uil uil-bed me-1"></i>1 Bed</li>
                                            <li class="list-inline-item"><i class="uil uil-bath me-1"></i>1 Bath</li>
                                        </ul>
                                        <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                            <li class="list-inline-item"><b>MZN  44000</b></li>
                                            <li class="list-inline-item text-muted">MZN  850 </li>
                                        </ul>
                                    </div>
                                </div><!--end items-->
                            </div>

                            <div class="tiny-slide">
                                <div class="card client-testi shop-list border-0 shadow position-relative overflow-hidden m-2">
                                    <div class="shop-image position-relative overflow-hidden shadow">
                                        <a href="shop-product-detail.html"><img src="{{ asset('website/images/real/p2.jpg')}}" class="img-fluid" alt=""></a>
                                        <ul class="list-unstyled shop-icons">
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-warning"><i class="uil uil-estate icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-warning"><i class="uil uil-heart icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-warning"><i class="uil uil-camera icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body content p-4">
                                        <a href="javascript:void(0)" class="text-dark product-name h6">Luxury Apartment In chelsea</a>
                                        <ul class="list-unstyled text-muted mt-2 mb-0">
                                            <li class="list-inline-item me-3"><i class="uil uil-bed me-1"></i>1 Bed</li>
                                            <li class="list-inline-item"><i class="uil uil-bath me-1"></i>1 Bath</li>
                                        </ul>
                                        <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                            <li class="list-inline-item"><b>MZN  44000</b></li>
                                            <li class="list-inline-item text-muted">MZN  850 </li>
                                        </ul>
                                    </div>
                                </div><!--end items-->
                            </div>

                            <div class="tiny-slide">
                                <div class="card client-testi shop-list border-0 shadow position-relative overflow-hidden m-2">
                                    <div class="shop-image position-relative overflow-hidden shadow">
                                        <a href="shop-product-detail.html"><img src="{{ asset('website/images/real/p3.jpg')}}" class="img-fluid" alt=""></a>
                                        <ul class="list-unstyled shop-icons">
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-warning"><i class="uil uil-estate icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-warning"><i class="uil uil-heart icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-warning"><i class="uil uil-camera icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body content p-4">
                                        <a href="javascript:void(0)" class="text-dark product-name h6">Luxury Apartment In chelsea</a>
                                        <ul class="list-unstyled text-muted mt-2 mb-0">
                                            <li class="list-inline-item me-3"><i class="uil uil-bed me-1"></i>1 Bed</li>
                                            <li class="list-inline-item"><i class="uil uil-bath me-1"></i>1 Bath</li>
                                        </ul>
                                        <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                            <li class="list-inline-item"><b>MZN  44000</b></li>
                                            <li class="list-inline-item text-muted">MZN  850 </li>
                                        </ul>
                                    </div>
                                </div><!--end items-->
                            </div>

                            <div class="tiny-slide">
                                <div class="card client-testi shop-list border-0 shadow position-relative overflow-hidden m-2">
                                    <div class="shop-image position-relative overflow-hidden shadow">
                                        <a href="shop-product-detail.html"><img src="{{ asset('website/images/real/p4.jpg')}}" class="img-fluid" alt=""></a>
                                        <ul class="list-unstyled shop-icons">
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-warning"><i class="uil uil-estate icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-warning"><i class="uil uil-heart icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-warning"><i class="uil uil-camera icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body content p-4">
                                        <a href="javascript:void(0)" class="text-dark product-name h6">Luxury Apartment In chelsea</a>
                                        <ul class="list-unstyled text-muted mt-2 mb-0">
                                            <li class="list-inline-item me-3"><i class="uil uil-bed me-1"></i>1 Bed</li>
                                            <li class="list-inline-item"><i class="uil uil-bath me-1"></i>1 Bath</li>
                                        </ul>
                                        <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                            <li class="list-inline-item"><b>MZN  44000</b></li>
                                            <li class="list-inline-item text-muted">MZN  850 </li>
                                        </ul>
                                    </div>
                                </div><!--end items-->
                            </div>

                            <div class="tiny-slide">
                                <div class="card client-testi shop-list border-0 shadow position-relative overflow-hidden m-2">
                                    <div class="shop-image position-relative overflow-hidden shadow">
                                        <a href="shop-product-detail.html"><img src="{{ asset('website/images/real/p5.jpg')}}" class="img-fluid" alt=""></a>
                                        <ul class="list-unstyled shop-icons">
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-warning"><i class="uil uil-estate icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-warning"><i class="uil uil-heart icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-warning"><i class="uil uil-camera icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body content p-4">
                                        <a href="javascript:void(0)" class="text-dark product-name h6">Luxury Apartment In chelsea</a>
                                        <ul class="list-unstyled text-muted mt-2 mb-0">
                                            <li class="list-inline-item me-3"><i class="uil uil-bed me-1"></i>1 Bed</li>
                                            <li class="list-inline-item"><i class="uil uil-bath me-1"></i>1 Bath</li>
                                        </ul>
                                        <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                            <li class="list-inline-item"><b>MZN  44000</b></li>
                                            <li class="list-inline-item text-muted">MZN  850 </li>
                                        </ul>
                                    </div>
                                </div><!--end items-->
                            </div>

                            <div class="tiny-slide">
                                <div class="card client-testi shop-list border-0 shadow position-relative overflow-hidden m-2">
                                    <div class="shop-image position-relative overflow-hidden shadow">
                                        <a href="shop-product-detail.html"><img src="{{ asset('website/images/real/p6.jpg')}}" class="img-fluid" alt=""></a>
                                        <ul class="list-unstyled shop-icons">
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-warning"><i class="uil uil-estate icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-warning"><i class="uil uil-heart icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-warning"><i class="uil uil-camera icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body content p-4">
                                        <a href="javascript:void(0)" class="text-dark product-name h6">Luxury Apartment In chelsea</a>
                                        <ul class="list-unstyled text-muted mt-2 mb-0">
                                            <li class="list-inline-item me-3"><i class="uil uil-bed me-1"></i>1 Bed</li>
                                            <li class="list-inline-item"><i class="uil uil-bath me-1"></i>1 Bath</li>
                                        </ul>
                                        <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                            <li class="list-inline-item"><b>MZN  44000</b></li>
                                            <li class="list-inline-item text-muted">MZN  850 </li>
                                        </ul>
                                    </div>
                                </div><!--end items-->
                            </div>

                            <div class="tiny-slide">
                                <div class="card client-testi shop-list border-0 shadow position-relative overflow-hidden m-2">
                                    <div class="shop-image position-relative overflow-hidden shadow">
                                        <a href="shop-product-detail.html"><img src="{{ asset('website/images/real/p7.jpg')}}" class="img-fluid" alt=""></a>
                                        <ul class="list-unstyled shop-icons">
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-warning"><i class="uil uil-estate icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-warning"><i class="uil uil-heart icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-warning"><i class="uil uil-camera icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body content p-4">
                                        <a href="javascript:void(0)" class="text-dark product-name h6">Luxury Apartment In chelsea</a>
                                        <ul class="list-unstyled text-muted mt-2 mb-0">
                                            <li class="list-inline-item me-3"><i class="uil uil-bed me-1"></i>1 Bed</li>
                                            <li class="list-inline-item"><i class="uil uil-bath me-1"></i>1 Bath</li>
                                        </ul>
                                        <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                            <li class="list-inline-item"><b>MZN  44000</b></li>
                                            <li class="list-inline-item text-muted">MZN  850 </li>
                                        </ul>
                                    </div>
                                </div><!--end items-->
                            </div>

                            <div class="tiny-slide">
                                <div class="card client-testi shop-list border-0 shadow position-relative overflow-hidden m-2">
                                    <div class="shop-image position-relative overflow-hidden shadow">
                                        <a href="shop-product-detail.html"><img src="{{ asset('website/images/real/p8.jpg')}}" class="img-fluid" alt=""></a>
                                        <ul class="list-unstyled shop-icons">
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-warning"><i class="uil uil-estate icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-warning"><i class="uil uil-heart icons"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-warning"><i class="uil uil-camera icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body content p-4">
                                        <a href="javascript:void(0)" class="text-dark product-name h6">Luxury Apartment In chelsea</a>
                                        <ul class="list-unstyled text-muted mt-2 mb-0">
                                            <li class="list-inline-item me-3"><i class="uil uil-bed me-1"></i>1 Bed</li>
                                            <li class="list-inline-item"><i class="uil uil-bath me-1"></i>1 Bath</li>
                                        </ul>
                                        <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                            <li class="list-inline-item"><b>MZN  44000</b></li>
                                            <li class="list-inline-item text-muted">MZN  850 </li>
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
                            <span class="badge rounded-pill bg-soft-warning">Recentes</span>
                            <h4 class="title mb-4">Imóveis publicados recentemente</h4>
                            <p class="text-muted para-desc mx-auto mb-0"></p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">

                    @foreach ($recents as $imovel )

                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="card blog rounded border-0 shadow">
                            <div class="position-relative">
                                @if ($imovel->getFirstMedia('posts'))
                                {{$imovel->getFirstMedia('posts')}}
                                @else
                                <img  src="https://via.placeholder.com/{{ rand(200,500) }}x{{ rand(300,1000) }}" class="cover-image" alt="...">
                               @endif   <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body content">
                                <h5><a href="javascript:void(0)" class="card-title title text-dark">Design your apps in your own way</a></h5>
                                <div class="post-meta d-flex justify-content-between mt-3">
                                    <ul class="list-unstyled mb-0">
                                        <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                                    </ul>
                                    <a href="page-blog-detail.html" class="text-muted readmore">Ver Mais <i class="uil uil-angle-right-b align-middle"></i></a>
                                </div>
                            </div>
                            <div class="author">
                                <small class="text-light user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>
                                <small class="text-light date"><i class="uil uil-calendar-alt"></i> 13th August, 2019</small>
                            </div>
                        </div>
                    </div><!--end col-->
                    @endforeach

                    <div class="mt-4 d-none d-lg-block">
                        <a href="{{ route('posts') }}" class="btn btn-warning">Ver mais</a>
                    </div>
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
@endsection
@push('js')
<script>
    easy_background("#home",
        {
            slide: ["{{ asset('website/images/real/1.jpg')}}", "{{ asset('website/images/real/2.jpg')}}", "{{ asset('website/images/real/3.jpg')}}"],
            delay: [8000, 10000, 12000]
        }
    );
</script>
@endpush
