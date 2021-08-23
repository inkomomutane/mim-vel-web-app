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
            </div>
        </div>
    </section>
    <section class="other-issue-area pb-3 pt-5">
        <div class="container">
            <div class="row d-flex justify-content-start">
                <div class="row col-sm-10 justify-content-start d-flex">
                    <div class="container row">
                        <div class="col-sm-12 row">
                        <table class="table table-bordered col-sm-10" style="margin-left: 15px;">
                            <thead>
                                <th>Propriedades</th>
                                <th>Descrição</th>
                            </thead>
                            <tbody>
                                @if ($imovel->preco)
                                    <tr>
                                        <td>Preço</td>
                                        <td>{{ $imovel->preco }} MTN</td>
                                    </tr>
                                @endif

                                @if ($imovel->area)
                                    <tr>
                                        <td>Area (m²)</td>{{ $imovel->area }} (m²)<td></td>
                                    </tr>
                                @endif

                                @if ($imovel->ano)
                                    <tr>
                                        <td>Ano de construção</td>
                                        <td>{{ $imovel->ano->year }}</td>
                                    </tr>

                                @endif

                                @if ($imovel->status)
                                    <tr>
                                        <td>Estado</td>
                                        <td>{{ $imovel->status->nome }}</td>
                                    </tr>
                                @endif


                                <strong>

                                    @if ($imovel->bairro)
                                        <tr>
                                            <td>Localização</td>
                                            <td>{{ $imovel->bairro->cidade->nome . ', ' . $imovel->bairro->nome . ', ' . $imovel->endereco }}
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>Localização</td>
                                            <td>{{ $imovel->endereco }}</td>
                                        </tr>
                                    @endif

                                    @if ($imovel->tipo_de_imovel)
                                        <tr>
                                            <td>Tipo de imóvel</td>
                                            <td>{{ $imovel->tipo_de_imovel->nome }}</td>
                                        </tr>

                                    @endif

                                    @if ($imovel->condicao)
                                        <tr>
                                            <td>Condição</td>
                                            <td>{{ $imovel->condicao->nome }}</td>
                                        </tr>

                                    @endif
                                    @if ($imovel->andar)
                                        <tr>
                                            <td>Andares</td>
                                            <td>{{ $imovel->andar }}</td>
                                        </tr>
                                    @endif
                                    @if ($imovel->suites)
                                        <tr>
                                            <td>Suites</td>
                                            <td>{{ $imovel->suites }}</td>
                                        </tr>
                                    @endif

                                    @if ($imovel->quartos)
                                        <tr>
                                            <td>Quartos</td>
                                            <td>{{ $imovel->quartos }}</td>
                                        </tr>
                                    @endif
                                    @if ($imovel->garagens)
                                        <tr>
                                            <td>Garagens</td>
                                            <td>{{ $imovel->garagens }}</td>
                                        </tr>
                                    @endif
                                    @if ($imovel->piscinas)
                                        <tr>
                                            <td>Piscinas</td>
                                            <td>{{ $imovel->piscinas }}</td>
                                        </tr>
                                    @endif
                                    @if ($imovel->user)
                                        <tr>
                                            <td>Corretor</td>
                                            <td>{{ $imovel->user->name }}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>
                                            <a href="#" class="genric-btn success   text-uppercase w-100">Agendar Visita</a>
                                        </td>
                                        <td>
                                            <a href="#" class="genric-btn success   text-uppercase w-100">Falar com corretor</a>
                                        </td>
                                        </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-100">
                <h5 class="mt-20 mb-20">Descrição</h5>
                <p class="excert">
                    {!! ucfirst($imovel->descricao) !!}
                </p>
            </div>
        </div>
    </section>
    <!--Maps-->
    <section class="other-issue-area py-4">
        <div class="container">

            @if ($imovel->mapa)
            <h5 class="mt-20 mb-20 w-100">Mapa da localização</h5>
            <div class="embed-responsive embed-responsive-21by9">
                {!! $imovel->mapa !!}
            </div>
            @endif

            <div class="row container justify-content-between">


                <!-- comment area-->
                <div class="comments-area w-100 scroll">
                    <h4>{{ $imovel->comentarios->count() }} Comentários</h4>
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
            <div class="row container justify-content-between py-5">
                <a href="{{ route('complaint',$imovel->id) }}" class="genric-btn danger radius"> <i class="fas fa-home"></i> &nbsp; &nbsp; Denûnciar o imóvel</a>
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
