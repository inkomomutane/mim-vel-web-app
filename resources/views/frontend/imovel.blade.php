@extends('layouts.frontend.main.root')

@section('content')
    <section class="other-issue-area bg-light pt-5 mt-3">
        <div class="container">
            <div class="row d-flex justify-content-start">
                <div class="demo col-sm-8 ">
                    <div class="item">
                        <div class="clearfix" style="width: 755px">
                            <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                @foreach ($imovel->fotos as $foto)
                                    <li data-thumb="{{ asset('storage/') }}/{{ $foto->url }}">
                                        <img src="{{ asset('storage/') }}/{{ $foto->url }}">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 pl-4 mt-4 row d-flex justify-content-center ">
                    <form action="#">
                        <div class="mt-10">
                            <input type="text" name="first_name" placeholder="First Name" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'First Name'" required="" class="single-input">
                        </div>
                        <div class="mt-10">
                            <input type="email" name="EMAIL" placeholder="Email address" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Email address'" required="" class="single-input">
                        </div>
                        <div class="input-group-icon mt-10">
                            <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                            <input type="text" name="address" placeholder="Contact" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Address'" required="" class="single-input">
                        </div>

                        <div class="mt-10">
                            <textarea class="single-textarea" placeholder="Message" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Message'" required=""></textarea>
                        </div>
                        <div class="switch-wrap d-flex justify-content-start pt-3">
                            <div class="confirm-switch">
                                <input type="checkbox" id="confirm-switch" checked="">
                                <label for="confirm-switch"></label>
                            </div>
                            <p class="pl-3">Receber notificações</p>
                        </div>
                        <div class="input-group-icon mt-10">
                            <button type="submit" class="w-100 genric-btn success-border">Enviar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="other-issue-area pb-3 pt-5">
        <div class="container">
            <div class="row d-flex justify-content-start">
                <div class="row col-sm-10 justify-content-start d-flex">
                    <div class="container row">
                        <h5 class="pb-3 w-100">Propriedades:</h5>
                        @if ($imovel->preco)
                            <div class="col-sm-4 description">Preço: <strong>{{ $imovel->preco }} MTN</strong></div>
                        @endif
                        @if ($imovel->area)
                            <div class="col-sm-4 description">Area (m²):<strong>{{ $imovel->area }} (m²)</strong></div>
                        @endif

                        @if ($imovel->ano)
                            <div class="col-sm-4 description">Ano de construção: <strong>{{ $imovel->ano->year }}</strong>
                            </div>

                        @endif
                        @if ($imovel->status)
                            <div class="col-sm-4 description">Estado: <strong>{{ $imovel->status->nome }}</strong></div>
                        @endif

                        <div class="col-sm-4 description text-truncate">Localização:
                            <strong>

                                @if ($imovel->bairro )
                                {{ $imovel->bairro->cidade->nome . ', ' . $imovel->bairro->nome . ', ' . $imovel->endereco }}
                                @else
                                    {{$imovel->endereco }}
                                @endif
                                </strong>
                        </div>
                        @if ($imovel->tipo_de_imovel)
                            <div class="col-sm-4 description">Tipo de imóvel:
                                <strong>{{ $imovel->tipo_de_imovel->nome }}</strong></div>
                        @endif

                        @if ($imovel->condicao)
                            <div class="col-sm-4 description">Condição: <strong>{{ $imovel->condicao->nome }}</strong>
                            </div>
                        @endif
                        @if ($imovel->andar)
                            <div class="col-sm-4 description">Andares: <strong>{{ $imovel->andar }}</strong></div>
                        @endif
                        @if ($imovel->suites)
                            <div class="col-sm-4 description">Suites: <strong>{{ $imovel->suites }}</strong></div>
                        @endif

                        @if ($imovel->quartos)
                            <div class="col-sm-4 description">Quartos: <strong>{{ $imovel->quartos }}</strong></div>
                        @endif
                        @if ($imovel->garagens)
                            <div class="col-sm-4 description">Garagens: <strong>{{ $imovel->garagens }}</strong></div>
                        @endif
                        @if ($imovel->piscinas)
                            <div class="col-sm-4 description">Piscinas: <strong>{{ $imovel->piscinas }}</strong></div>
                        @endif
                        @if ($imovel->user)
                            <div class="col-sm-4 description">Corretor: <strong>{{ $imovel->user->name }}</strong></div>
                        @endif

                    </div>
                </div>

                <div class="w-100">
                    <h5 class="mt-20 mb-20">Descrição</h5>
                    <p class="excert">
                        {!! ucfirst($imovel->descricao) !!}
                    </p>

                </div>
            </div>
        </div>
    </section>
    <!--Maps-->
    <section class="other-issue-area py-4">
        <div class="container">
            <h5 class="mt-20 mb-20 w-100">Mapa da localização</h5>
            <div class="embed-responsive embed-responsive-21by9">
                {!! $imovel->mapa!!}
              </div>
            <div class="row container justify-content-between">


                <!-- comment area-->
                <div class="comments-area w-100 scroll">
                    <h4>{{$imovel->comentarios->count()}} Comentários</h4>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="{{ asset('frontend/img/blog/c1.jpg') }}" alt="">
                                </div>
                                <div class="desc get">
                                    <h5><a href="#">Emilly Blunt</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list left-padding">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="{{ asset('frontend/img/blog/c2.jpg') }}" alt="">
                                </div>
                                <div class="desc get">
                                    <h5><a href="#">Elsie Cunningham</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list left-padding">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="{{ asset('frontend/img/blog/c3.jpg') }}" alt="">
                                </div>
                                <div class="desc sent">
                                    <h5><a href="#">Annie Stephens</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="{{ asset('frontend/img/blog/c4.jpg') }}" alt="">
                                </div>
                                <div class="desc get">
                                    <h5><a href="#">Maria Luna</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message-input">
                    <div class="wrap">
                        <input type="text" placeholder="Digite seu comentario...">
                        <button class="submit"><i class="far fa-comment-alt" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Mpas-->


@endsection
@push('js')
    <script src="{{ asset('frontend/js/lightslider.js') }}"></script>


    <script>
        $(document).ready(function() {
            $("#content-slider").lightSlider({
                loop: true,
                keyPress: true
            });
            $('#image-gallery').lightSlider({
                gallery: true,
                item: 1,
                thumbItem: 6,
                slideMargin: 0,
                speed: 3000,
                auto: false,
                loop: true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }
            });
        });
    </script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/lightslider.css') }}" />
    <style>
        .demo {
            margin-top: 30px;
        }

        li.lslide img {
            width: 100%;
        }

        .chocolat-overlay {
            background-color: #151515;
        }

        .chocolat-wrapper {
            z-index: 999;

        }

        .maps iframe {
            height: 400px;
            width: 100% !important;
        }

    </style>
@endpush
