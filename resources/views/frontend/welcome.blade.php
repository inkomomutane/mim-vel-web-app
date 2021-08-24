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
            <div class="row justify-content-start">
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
                                        @if ( $imovel->tipo_de_imovel)
                                            {{ucfirst($imovel->tipo_de_imovel->nome)}}
                                        @endif
                                        &nbsp;</a>

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
                                    @if ($imovel->cidade)
                                    {{ucfirst($imovel->cidade->nome)}}
                                    @endif
                                    &nbsp;</a>
                                <a class="badge badge-pill badge-light p-2 text-truncate"  href="">
                                    <i class="fa fa-eye"></i>&nbsp;
                                    Cod: {{ucfirst($imovel->codigo)}}  &nbsp;</a>
                                <a class="badge badge-pill badge-light p-2 text-truncate"  href="">
                                    <i class="far fa-comment-alt"></i>
                                    &nbsp; {{ucfirst($imovel->comentarios->count())}} &nbsp;</a>
                                    <a class="dropdown">


                                        <a class="badge badge-pill badge-light p-2 text-truncate dropdown-toggle"   id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-share-alt"></i>
                                            &nbsp; Partilhar &nbsp;
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{ route('imo.show', $imovel->id) }}"><i class="fab fa-facebook-f" style="color:rgb(96, 149, 248)"></i>&nbsp; Facebook</a>
                                                <a class="dropdown-item" href="https://wa.me/?text= {{ route('imo.show', $imovel->id) }}"><i class="fab fa-whatsapp    " style="color: rgb(87, 145, 1)"></i> &nbsp; Whatsapp</a>
                                                <a class="dropdown-item" href="https://twitter.com/intent/tweet?text=Share+title&url= {{ route('imo.show', $imovel->id) }}"><i class="fab fa-twitter    " style="color:hsl(187, 100%, 50%)"></i>  &nbsp;Twitter</a>
                                              </div>
                                        </a>
                                    </a>


                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="badge badge-secondary p-3 col-sm-5 my-3"  href="{{ route('imo.index') }}">
                <i class="fa fa-eye"></i>
                &nbsp; Ver Todos imoveis &nbsp;</a>

        </div>
        <div class="container pb-5">
            <div class="row d-flex justify-content-start">
                <div class="menu-content pb-20 col-lg-9">
                    <div class="title text-start">
                        <h4 class="mb-10">Imóveis procurados local</h4>
                    </div>
                </div>
            </div>
            <div class="row justify-content-start">
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
                                    @if ( $imovel->tipo_de_imovel)
                                        {{ucfirst($imovel->tipo_de_imovel->nome)}}
                                    @endif
                                    &nbsp;</a>

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
                                @if ($imovel->cidade)
                                {{ucfirst($imovel->cidade->nome)}}
                                @endif
                                &nbsp;</a>
                            <a class="badge badge-pill badge-light p-2 text-truncate"  href="">
                                <i class="fa fa-eye"></i>&nbsp;
                                Cod: {{ucfirst($imovel->codigo)}}  &nbsp;</a>
                            <a class="badge badge-pill badge-light p-2 text-truncate"  href="">
                                <i class="far fa-comment-alt"></i>
                                &nbsp; {{ucfirst($imovel->comentarios->count())}} &nbsp;</a>
                                <a class="dropdown">


                                    <a class="badge badge-pill badge-light p-2 text-truncate dropdown-toggle"   id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-share-alt"></i>
                                        &nbsp; Partilhar &nbsp;
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{ route('imo.show', $imovel->id) }}"><i class="fab fa-facebook-f" style="color:rgb(96, 149, 248)"></i>&nbsp; Facebook</a>
                                            <a class="dropdown-item" href="https://wa.me/?text= {{ route('imo.show', $imovel->id) }}"><i class="fab fa-whatsapp    " style="color: rgb(87, 145, 1)"></i> &nbsp; Whatsapp</a>
                                            <a class="dropdown-item" href="https://twitter.com/intent/tweet?text=Share+title&url= {{ route('imo.show', $imovel->id) }}"><i class="fab fa-twitter    " style="color:hsl(187, 100%, 50%)"></i>  &nbsp;Twitter</a>
                                          </div>
                                    </a>
                                </a>


                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <a class="badge badge-secondary p-3 col-sm-5 my-3"  href="{{ route('imo.index') }}">
                <i class="fa fa-eye"></i>
                &nbsp; Ver Todos imoveis &nbsp;</a>

        </div>

    </section>
    <!-- End other-issue Area -->

    <!-- Start testimonial Area -->
    <section class="testimonial-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h3 class="mb-10">Parceria</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="active-testimonial">
                    @foreach ($parceiros as $parceiro)
                    <div class="single-testimonial item d-flex flex-row">
                        <div class="thumb">
                            <img class="img-fluid"
                            @if ($parceiro->fotos->count() > 0)
                                  src="{{ asset('storage') }}/{{$parceiro->fotos->first()->url}}"
                            @endif

                             alt="">
                        </div>
                        <div class="desc">
                            <p>
                               {{$parceiro->description}}
                            </p>
                            <h4> {{$parceiro->name}}</h4>

                        </div>
                    </div>
                    @endforeach
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
    <script src="{{ asset('js/share.js') }}"></script>
@endpush
