@extends('layouts.frontend.app')
@section('title', 'Mimóvel')
@section('content')
    <!--================ Latest Blog Area  =================-->
    <section class="latest_blog_area mb-5 row mr-0 ml-0">
        <div class="container col-sm-10">
            <div class="section_title text-start ">
                <h3 class="title_color">Imóveis mais destacados</h3>
            </div>
            <div class=" row mb_30 ml-0  mr-0">
                @foreach ($procurados_por_localizacao as $imovel)
                    @if ($imovel->fotos->count() > 0)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-recent-blog-post "
                                style=";box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);">
                                <div class="thumb">

                                    <div class="card-carousel">
                                        <div id="loop_{{ $imovel->id }}" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">

                                                @foreach ($imovel->fotos as $image)

                                                    <div class="carousel-item @if ($loop->first) active  @endif">
                                                        <img class="img-fluid"
                                                            src="{{ asset('storage') }}/{{ $image->url }}" alt="post">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <a class="carousel-control-prev" href="#loop_{{ $imovel->id }}" role="button"
                                                data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#loop_{{ $imovel->id }}" role="button"
                                                data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                                <div class="details ml-4 mr-4 pb-4">
                                    <div class="tags row">
                                        <a href="#" class="button_hover tag_btn w-40 text-truncate mt-2">Preço:
                                            {{ $imovel->preco }} MZN</a>
                                        @if ($imovel->tipo_de_imovel != null)
                                            <a href="#"
                                                class="button_hover tag_btn w-40 text-truncate mt-2 mt-2">{{ 'Tipo: ' . $imovel->tipo_de_imovel->nome }}</a>
                                        @endif
                                        <a href="#"
                                            class="button_hover tag_btn w-40 text-truncate w-40 text-truncate mt-2">Código:
                                            {{ $imovel->codigo }}</a>

                                        <a class="button_hover tag_btn dropdown-toggle w-40 text-truncate mt-2"
                                            id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Partilhar
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('imo.show', $imovel->id) }}"
                                                class="dropdown-item" href="#">
                                                Facebook
                                            </a>
                                            <a class="dropdown-item"
                                                href="https://wa.me/?text={{ route('imo.show', $imovel->id) }}">Whatsapp</a>
                                        </div>
                                    </div>
                                    <a href="{{ route('imo.show', $imovel->id) }}">
                                        <h4 class="sec_h4">{{ Str::ucfirst($imovel->titulo) }}</h4>
                                    </a>
                                    <h6 class="date title_color">{{ $imovel->created_at->toDateString() }} </h6>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-4 col-md-6">
                            <div class="single-recent-blog-post "
                                style=";box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);">
                                <div class="details ml-4 mr-4 pb-4">
                                    <div class="tags">
                                        <a href="#" class="button_hover tag_btn">Travel</a>
                                        <a href="#" class="button_hover tag_btn">Life Style</a>
                                    </div>
                                    <a href="#">
                                        <h4 class="sec_h4">{{ $imovel->titulo }}</h4>
                                    </a>
                                    <p>{{ $imovel->descricao }}</p>
                                    <h6 class="date title_color">{{ $imovel->created_at->toDateString() }} </h6>
                                </div>
                            </div>
                        </div>
                    @endif

                @endforeach
            </div>
            <a href="{{ route('imo.index') }}" class="genric-btn primary e-large col-sm-12 w-100  mt-5">Ver todos os
                imóveis</a>
            <div class="section_title text-start pt-5">
                <h3 class="title_color">Imóveis mais procurados por localização</h3>
            </div>
            <div class=" row mb_30 ml-0  mr-0">
                @foreach ($procurados_por_localizacao as $imovel)
                    @if ($imovel->fotos->count() > 0)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-recent-blog-post "
                                style=";box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);">
                                <div class="thumb">

                                    <div class="card-carousel">
                                        <div id="loop_{{ $imovel->id }}" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">

                                                @foreach ($imovel->fotos as $image)

                                                    <div class="carousel-item @if ($loop->first) active  @endif">
                                                        <img class="img-fluid"
                                                            src="{{ asset('storage') }}/{{ $image->url }}" alt="post">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <a class="carousel-control-prev" href="#loop_{{ $imovel->id }}" role="button"
                                                data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#loop_{{ $imovel->id }}" role="button"
                                                data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                                <div class="details ml-4 mr-4 pb-4">
                                    <div class="tags row">
                                        <a href="#" class="button_hover tag_btn w-40 text-truncate mt-2">Preço:
                                            {{ $imovel->preco }} MZN</a>
                                        @if ($imovel->tipo_de_imovel != null)
                                            <a href="#"
                                                class="button_hover tag_btn w-40 text-truncate mt-2 mt-2">{{ 'Tipo: ' . $imovel->tipo_de_imovel->nome }}</a>
                                        @endif
                                        <a href="#"
                                            class="button_hover tag_btn w-40 text-truncate w-40 text-truncate mt-2">Código:
                                            {{ $imovel->codigo }}</a>

                                        <a class="button_hover tag_btn dropdown-toggle w-40 text-truncate mt-2"
                                            id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Partilhar
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('imo.show', $imovel->id) }}"
                                                class="dropdown-item" href="#">
                                                Facebook
                                            </a>
                                            <a class="dropdown-item"
                                                href="https://wa.me/?text={{ route('imo.show', $imovel->id) }}">Whatsapp</a>
                                        </div>
                                    </div>
                                    <a href="{{ route('imo.show', $imovel->id) }}">
                                        <h4 class="sec_h4">{{ Str::ucfirst($imovel->titulo) }}</h4>
                                    </a>
                                    <h6 class="date title_color">{{ $imovel->created_at->toDateString() }} </h6>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-4 col-md-6">
                            <div class="single-recent-blog-post "
                                style=";box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);">
                                <div class="details ml-4 mr-4 pb-4">
                                    <div class="tags">
                                        <a href="#" class="button_hover tag_btn">Travel</a>
                                        <a href="#" class="button_hover tag_btn">Life Style</a>
                                    </div>
                                    <a href="#">
                                        <h4 class="sec_h4">{{ $imovel->titulo }}</h4>
                                    </a>
                                    <p>{{ $imovel->descricao }}</p>
                                    <h6 class="date title_color">{{ $imovel->created_at->toDateString() }} </h6>
                                </div>
                            </div>
                        </div>
                    @endif

                @endforeach
            </div>
            <a href="{{ route('imo.index') }}" class="genric-btn primary e-large col-sm-12 w-100  mt-5">Ver todos os
                imóveis</a>
        </div>
    </section>
    <!--================ Recent Area  =================-->
@endsection

@section('banner')
    <section class="banner_section">
        <div class="owl-carousel" id="banner_carousel">
            @foreach ($images as $image)
                <img src="{{ asset('/storage') }}/{{ $image }}" class="img-fluid" alt="Responsive image">
            @endforeach
        </div>

        <div class="hotel_booking_area position">
            <div class="container">
                <div class="hotel_booking_table">
                    <div class="container">
                        <div class="col-md-12">
                            <div class="boking_table">
                                <form action="{{ route('imovel.search') }}" method="post">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="book_tabel_item">
                                                <div class="form-group">
                                                    <div class='input-group date'>
                                                        <input type='text' class="form-control"
                                                            placeholder="Pesquisar imóvel (codigo, titulo ...)"
                                                            name="pesquisa" />
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-search" aria-hidden="true"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class='input-group'>
                                                        <input type='text' class="form-control w-100" name="price"
                                                            placeholder="Preço" />
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-money" aria-hidden="true"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <select class=" w-100 py-2" name="bairro" aria-placeholder="Bairro">

                                                @foreach ($bairros as $bairro)
                                                    <option value="{{ $bairro->nome }}" selected>{{ $bairro->nome }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="py-2">
                                                <select class=" w-100 py-2" name="status" aria-placeholder="Estado">
                                                    @foreach ($conditions as $condition)
                                                        <option value="{{ $condition->nome }}" selected>
                                                            {{ $condition->nome }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <select class=" w-100 py-2">

                                                @foreach ($tipo_de_imovels as $tipo)
                                                    <option value="{{ $tipo->nome }}" selected>{{ $tipo->nome }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="py-2">
                                                <select class=" w-100 py-2">


                                                    @foreach ($statuses as $status)
                                                        <option value="{{ $status->nome }}" selected>
                                                            {{ $status->nome }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="book_tabel_item">
                                                <input type="submit" value="Pesquisar" class="book_now_btn button_hover">

                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('/frontend/home/css/selectric.css') }}">
@endpush
@push('js')
    <script src="{{ asset('frontend/home/js/jquery.selectric.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("select").selectric();
        });
    </script>
@endpush
