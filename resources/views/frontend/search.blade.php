@extends('layouts.frontend.app')
@section('title', 'Imóveis')
@section('banner')
    <section class="banner_section bg-white " style="border-top: 1px solid rgb(236, 233, 233)">
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
                                                <input type="submit" value="Pesquisar" class="book_now_btn button_hover primary">

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
    <style>
        .section-top-border {
            border-top: none !important;
            padding: 0 !important;
        }

        .imovel-card-propriety {
            font-size: 13px;
            color: #8F8F8F;
            font-weight: 700;
        }
        .imovel-card-propriety-light{
            font-size: 13px;
            color: #4d4d4d;
            font-weight: 600;
        }
        .hotel_booking_area{
            top: 0px;
            position: relative;
            padding: 15px 0;
        }
        .hotel_booking_table{
            background: #fff;
        }

        .offer-item-price{
            color: #21a4b8;
            font-weight: 700;
            margin-top: 0;
        }
        .imovel{
            color: #797676;
        }
        .imovel:hover{
            color: #0467d8;
            text-decoration-line: #535252 ;
        }
        .book_tabel_item .form-group .input-group .form-control{
            border-color: #dddddd;
        }
        h1, h2, h3, h4, h5, h6{
            font-weight: 200
        }

    </style>
@endpush
@push('js')
    <script src="{{ asset('frontend/home/js/jquery.selectric.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("select").selectric();
        });
    </script>
@endpush

@section('content')
    <section class="latest_blog_area mb-5 row mr-0 ml-0 mt_5" style="background: #f0eff1">
        <div class="container col-sm-10">
            <div class="section-top-border">

                <h6 class="my-3 title_color" style="font-weight: 500">Resultados encontados: <span style="font-weight: 600">@if($imoveis) {{ $imoveis->total() }} @endif </span></h6>
                @foreach ($imoveis as $imovel)
                    @if ($imovel->fotos->count() > 0)
                        <div class="row @if($loop->first) mb-4 @else my-4 @endif  bg-white">
                            <div class="card-carousel col-sm-12 col-md-6 col-lg-4 col-xl-3  row p-0 m-0">
                                <div id="loop_{{ $imovel->id }}" class="carousel slide w-100 " data-ride="carousel">
                                    <div class="carousel-inner  w-100 ">

                                        @foreach ($imovel->fotos as $image)
                                            <div class="carousel-item   @if ($loop->first) active  @endif">
                                                <img class="img-fluid "
                                                    src="{{ asset('storage') }}/{{ $image->url }}" alt="post">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-8 mt-sm-20 col-xl-9 left-align-p mt-2">
                                <a href="{{ route('imo.show',$imovel->id) }}" class="imovel">
                                <h5 class="text-truncate col-sm-12 w-100 m-0 p-0 ">{{ Str::ucfirst($imovel->titulo) }}</h5>
                                </a>
                                <div class="tags container  row justify-content-start">
                                    <div class="w-100 align-items-start">
                                        @if ($imovel->bairro)
                                            <span class="imovel-card-propriety">
                                                <i class="fa fa-map-marker"></i>
                                                @if ($imovel->bairro->cidade)
                                                    {{ Str::ucfirst($imovel->bairro->cidade->nome) }} &nbsp;-&nbsp;
                                                @endif {{ Str::ucfirst($imovel->bairro->nome) }}
                                            </span>
                                        @endif
                                        @if ($imovel->endereco)
                                            <span class="imovel-card-propriety">
                                                &nbsp;-&nbsp; {{ Str::ucfirst(__(' ') . $imovel->endereco) }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="w-100 align-items-start">
                                        <span  class="imovel-card-propriety">
                                            @if ($imovel->preco)
                                                <h5 class="offer-item-price">{{ $imovel->preco }} &nbsp; MZN</h5>
                                            @endif
                                        </span>
                                    </div>
                                    <div class="w-100 align-items-start">
                                        <span  class="imovel-card-propriety">
                                            <h5>
                                            @if ($imovel->tipo_de_imovel)
                                                {{ Str::upper( $imovel->tipo_de_imovel->nome) }} &nbsp;&nbsp;
                                            @endif
                                            @if ($imovel->area)
                                              Área : {{ Str::upper( $imovel->area ." (m²)" ) }} &nbsp;&nbsp;
                                            @endif

                                            @if ($imovel->status)

                                              Estado: {{ Str::upper( $imovel->status->nome ) }} &nbsp;&nbsp;
                                            @endif
                                            @if ($imovel->ano)
                                              Ano: {{ Str::upper( $imovel->ano->year ) }} &nbsp;&nbsp;
                                            @endif
                                        </h5>
                                        </span>
                                    </div>
                                    <div class="w-100 align-items-start">
                                        <span  class="imovel-card-propriety-light">

                                            @if ($imovel->quartos)
                                            Quartos: {{ $imovel->quartos }} &nbsp;&nbsp;
                                            @endif
                                            @if ($imovel->suites)
                                            Suítes: {{ $imovel->suites }} &nbsp;&nbsp;
                                            @endif
                                            @if ($imovel->banheiros)
                                            Banheiros: {{ $imovel->banheiros }} &nbsp;&nbsp;
                                            @endif
                                            @if ($imovel->piscinas)
                                            Piscinas: {{ $imovel->piscinas }} &nbsp;&nbsp;
                                            @endif

                                            @if ($imovel->garagens)
                                            Garagens: {{ $imovel->garagens }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                    @endif
                @endforeach
                <div class="float-right"
                >
                    @if($imoveis)
                {{ $imoveis->links() }}
                @endif
                </div>
            </div>
        </div>
    </section>

@endsection
