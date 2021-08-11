@extends('layouts.frontend.main.root')
@section('content')

    <!-- Start other-issue Area -->
    <section class="other-issue-area section-gap">
        <div class="container mb-5">
            <div class="row d-flex justify-content-start">
                <div class="menu-content pb-20 col-lg-9">
                    <div class="title text-start">
                        <h4 class="mb-10">Imóveis mais destacados</h4>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($destacados as $imovel)
                    <div class="col-sm-4 p-2">
                        <div class="card">
                            <a href="{{ route('imo.show', $imovel->id) }}">
                            <img class="card-img-top" src="{{ asset('storage/') }}/{{ $imovel->image }}"
                                alt="Imóvel do Mimóvel">
                            </a>
                            <div class="card-body">
                                <a href="{{ route('imo.show', $imovel->id) }}">
                                <h5 class="card-title text-truncate">{{ ucfirst($imovel->titulo) }}
                                    </h5>
                                    </a>

                                    <a class="badge  badge-light  p-2 text-truncate float-right" href="">
                                        MZN&nbsp;
                                        {{round($imovel->preco,2)}} &nbsp;</a></h5>
                                    </a>
                                    <a class="badge badge-light p-2 text-truncate float-right mr-2" href="">
                                        Tipo:&nbsp;
                                        {{ucfirst($imovel->tipo_de_imovel->nome)}} &nbsp;</a>
                                <strong class="card-subtitle text-truncate">
                                    Last brea
                                </strong>
                                <div class="star">
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="far fa-star "></span>
                                    <span class="far fa-star "></span>
                                    <span class="far fa-star"></span>
                                </div>

                                <p class="card-text text-truncate">{!! ucfirst($imovel->descricao) !!}</p>
                                <hr>
                                <a class="badge badge-pill badge-light p-2 text-truncate" href="">
                                    <i class="fa fa-map-marker-alt"></i>&nbsp;
                                    {{ucfirst($imovel->cidade->nome)}} &nbsp;</a>
                                <a class="badge badge-pill badge-light p-2 text-truncate"  href="">
                                    <i class="fa fa-eye"></i>&nbsp;
                                    3k &nbsp;</a>
                                <a class="badge badge-pill badge-light p-2 text-truncate"  href="">
                                    <i class="far fa-comment-alt"></i>
                                    &nbsp; {{ucfirst($imovel->comentarios->count())}} &nbsp;</a>
                                <a class="badge badge-pill badge-light p-2 text-truncate"  href="">
                                    <i class="fa fa-share-alt"></i>
                                    &nbsp; Partilhar &nbsp;</a>


                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="badge badge-pill badge-secondary p-3 float-right"  href="">
                <i class="fa fa-plus"></i>
                &nbsp; Ver mais &nbsp;</a>
        </div>
        <div class="container pb-5">
            <div class="row d-flex justify-content-start">
                <div class="menu-content pb-20 col-lg-9">
                    <div class="title text-start">
                        <h4 class="mb-10">Imóveis procurados local</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($procurados_por_localizacao as $imovel)
                <div class="col-sm-4 p-2">
                    <div class="card">
                        <a href="{{ route('imo.show', $imovel->id) }}">
                        <img class="card-img-top" src="{{ asset('storage/') }}/{{ $imovel->image }}"
                            alt="Imóvel do Mimóvel">
                        </a>
                        <div class="card-body">
                            <a href="{{ route('imo.show', $imovel->id) }}">
                            <h5 class="card-title text-truncate">{{ ucfirst($imovel->titulo) }}
                                </h5>
                                </a>

                                <a class="badge  badge-light  p-2 text-truncate float-right" href="">
                                    MZN&nbsp;
                                    {{round($imovel->preco,2)}} &nbsp;</a></h5>
                                </a>
                                <a class="badge badge-light p-2 text-truncate float-right mr-2" href="">
                                    Tipo:&nbsp;
                                    {{ucfirst($imovel->tipo_de_imovel->nome)}} &nbsp;</a>
                            <strong class="card-subtitle text-truncate">
                                Last brea
                            </strong>
                            <div class="star">
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="far fa-star "></span>
                                <span class="far fa-star "></span>
                                <span class="far fa-star"></span>
                            </div>

                            <p class="card-text text-truncate">{!! ucfirst($imovel->descricao) !!}</p>
                            <hr>
                            <a class="badge badge-pill badge-light p-2 text-truncate" href="">
                                <i class="fa fa-map-marker-alt"></i>&nbsp;
                                {{ucfirst($imovel->cidade->nome)}} &nbsp;</a>
                            <a class="badge badge-pill badge-light p-2 text-truncate"  href="">
                                <i class="fa fa-eye"></i>&nbsp;
                                3k &nbsp;</a>
                            <a class="badge badge-pill badge-light p-2 text-truncate"  href="">
                                <i class="far fa-comment-alt"></i>
                                &nbsp; {{ucfirst($imovel->comentarios->count())}} &nbsp;</a>
                            <a class="badge badge-pill badge-light p-2 text-truncate"  href="">
                                <i class="fa fa-share-alt"></i>
                                &nbsp; Partilhar &nbsp;</a>


                        </div>
                    </div>
                </div>
                @endforeach
            </div>
                    <a class="badge badge-pill badge-secondary p-3 float-right"  href="">
                        <i class="fa fa-plus"></i>
                        &nbsp; Ver mais &nbsp;</a>

        </div>

    </section>
    <!-- End other-issue Area -->

    <!-- Start testimonial Area -->
    <section class="testimonial-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Nossos corretores</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="active-testimonial">
                    <div class="single-testimonial item d-flex flex-row">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ asset('frontend/img/elements/user1.png') }}" alt="">
                        </div>
                        <div class="desc">
                            <p>
                                Do you want to be even more successful? Learn to love learning and growth. The more effort
                                you put into improving your skills, the bigger the payoff you.
                            </p>
                            <h4>Harriet Maxwell</h4>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial item d-flex flex-row">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ asset('frontend/img/elements/user2.png') }}" alt="">
                        </div>
                        <div class="desc">
                            <p>
                                A purpose is the eternal condition for success. Every former smoker can tell you just how
                                hard it is to stop smoking cigarettes. However.
                            </p>
                            <h4>Carolyn Craig</h4>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial item d-flex flex-row">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ asset('frontend/img/elements/user1.png') }}" alt="">
                        </div>
                        <div class="desc">
                            <p>
                                Do you want to be even more successful? Learn to love learning and growth. The more effort
                                you put into improving your skills, the bigger the payoff you.
                            </p>
                            <h4>Harriet Maxwell</h4>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial item d-flex flex-row">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ asset('frontend/img/elements/user2.png') }}" alt="">
                        </div>
                        <div class="desc">
                            <p>
                                A purpose is the eternal condition for success. Every former smoker can tell you just how
                                hard it is to stop smoking cigarettes. However.
                            </p>
                            <h4>Carolyn Craig</h4>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial item d-flex flex-row">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ asset('frontend/img/elements/user1.png') }}" alt="">
                        </div>
                        <div class="desc">
                            <p>
                                Do you want to be even more successful? Learn to love learning and growth. The more effort
                                you put into improving your skills, the bigger the payoff you.
                            </p>
                            <h4>Harriet Maxwell</h4>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial item d-flex flex-row">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ asset('frontend/img/elements/user2.png') }}" alt="">
                        </div>
                        <div class="desc">
                            <p>
                                owl-theme A purpose is the eternal condition for success. Every former smoker can tell you
                                just how hard it is to stop smoking cigarettes. However.
                            </p>
                            <h4>Carolyn Craig</h4>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End testimonial Area -->




@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                loop: true,
                lazyLoad: true,
                items: 1,
                responsiveClass: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true
            });
        });
    </script>
@endpush
