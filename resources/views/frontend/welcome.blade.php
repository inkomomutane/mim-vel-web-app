@extends('layouts.frontend.root')
@section('carousel')
    <section class="section">
        <div class="section-body">
            <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('frontend/images/1.jpg') }}" alt="First slide">
                        {{-- <div class="carousel-caption d-none d-md-block">
                        <h5>Heading</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('content')
    <section class="mb-5 section">
        <div class="section-body projectos">


            <div class="container">
                <div class="p-5 col-sm-4">
                    <h3>A nossa história</h3>
                    <p>Clique aqui e comece a digitar. Voluptatem quia voluptas sit aspernatur aut odit aut fugit sed
                        quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt neque porro quisquam
                        est qui dolorem ipsum quia dolor sit amet consectetur adipisci velit sed quia non numquam eius
                        modi tempora incidunt ut labore et dolore.
                        LEIA MAIS</p>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="section-body">
                <h2 class="section-title">Actividades recentes</h2>
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-4">
                        <article class="article article-style-c">
                            <div class="article-header">
                                <div class="article-image" data-background="{{ asset('frontend/images/1.jpg') }}"></div>
                            </div>
                            <div class="article-details">
                                <div class="article-title">
                                    <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                </div>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                    nulla pariatur. </p>

                                <div class="article-cta">
                                    <a href="#">Read More <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>

                        </article>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">
                        <article class="article article-style-c">
                            <div class="article-header">
                                <div class="article-image" data-background="{{ asset('frontend/images/2.jpg') }}"></div>
                            </div>
                            <div class="article-details">
                                <div class="article-title">
                                    <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                </div>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                    nulla pariatur. </p>

                                <div class="article-cta">
                                    <a href="#">Read More <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>

                        </article>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">
                        <article class="article article-style-c">
                            <div class="article-header">
                                <div class="article-image" data-background="{{ asset('frontend/images/3.jpg') }}"></div>
                            </div>
                            <div class="article-details">
                                <div class="article-title">
                                    <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                </div>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                    nulla pariatur. </p>

                                <div class="article-cta">
                                    <a href="#">Read More <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>

                        </article>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">
                        <article class="article article-style-c">
                            <div class="article-header">
                                <div class="article-image" data-background="{{ asset('frontend/images/1.png') }}"></div>
                            </div>
                            <div class="article-details">
                                <div class="article-title">
                                    <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                </div>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                    nulla pariatur. </p>

                                <div class="article-cta">
                                    <a href="#">Read More <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>

                        </article>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">
                        <article class="article article-style-c">
                            <div class="article-header">
                                <div class="article-image" data-background="{{ asset('frontend/images/3.jpg') }}"></div>
                            </div>
                            <div class="article-details">
                                <div class="article-title">
                                    <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                </div>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                    nulla pariatur. </p>

                                <div class="article-cta">
                                    <a href="#">Read More <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>

                        </article>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">
                        <article class="article article-style-c">
                            <div class="article-header">
                                <div class="article-image" data-background="{{ asset('frontend/images/2.jpg') }}"></div>
                            </div>
                            <div class="article-details">
                                <div class="article-title">
                                    <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                </div>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                    nulla pariatur. </p>

                                <div class="article-cta">
                                    <a href="#">Read More <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>

                        </article>
                    </div>
                </div>
                <div class="pb-5 article-cta">
                    <a href="#" style="float: right">Read More <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="section-body projectos ">
            <div class="container p-5">
                <div class="col-sm-6">
                    <h5>Heading</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                        et
                        dolore magna aliqua.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                        et
                        dolore magna aliqua.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                        et
                        dolore magna aliqua.
                    </p>
                </div>
            </div>

        </div>
    </section>

@endsection

