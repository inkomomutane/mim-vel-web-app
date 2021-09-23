@extends('layouts.frontend.app')
@section('title', Str::ucfirst($imovel->titulo))
@section('content')
    <section class="other-issue-area pb-3 pt-5" style="background: #f0eff1">
        <div class="container">
            <div class="container row">
                <div class="mr-auto ml-auto conatiner row col-sm-12 col-md-10 justify-content-start d-flex">
                    <table class="w-100 bg-white">
                        <thead>
                            <tr>
                                <th colspan="2" class="p-2">Propriedades</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="pt-1">
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                            @if ($imovel->bairro)
                                <tr class="row py-2 ml-3 mr-3">
                                    <td class="col-6">
                                        <i class="fa fa-map-marker-alt" style="font-size: 15px"></i>
                                        &nbsp; Localização
                                    </td>
                                    <td class="col-6">
                                        @if ($imovel->bairro->cidade)
                                            {{ Str::ucfirst($imovel->bairro->cidade->nome) }} &nbsp;-&nbsp;
                                        @endif {{ Str::ucfirst($imovel->bairro->nome) }}
                            @endif
                            @if ($imovel->endereco)
                                &nbsp;-&nbsp; {{ Str::ucfirst(__(' ') . $imovel->endereco) }}
                                </td>
                                </tr>
                            @endif
                            @if ($imovel->preco)
                                <tr class="row py-2 ml-3 mr-3">
                                    <td class="col-6">
                                        <i class="fa fa-money-bill-wave" style="font-size: 15px"></i>
                                        &nbsp; Preço
                                    </td>
                                    <td class="col-6">
                                        {{ $imovel->preco }} &nbsp; MZN
                                    </td>
                                </tr>
                            @endif
                            @if ($imovel->tipo_de_imovel)
                                <tr class="row py-2 ml-3 mr-3">
                                    <td class="col-6">
                                        <i class="fa fa-hotel " style="font-size: 15px"></i>
                                        &nbsp; Tipo de imóvel
                                    </td>
                                    <td class="col-6">
                                        {{ Str::upper($imovel->tipo_de_imovel->nome) }} &nbsp;&nbsp;
                                    </td>
                                </tr>
                            @endif
                            @if ($imovel->area)
                                <tr class="row py-2 ml-3 mr-3">

                                    <td class="col-6">
                                        <i class="fa fa-ruler" style="font-size: 15px"></i>
                                        &nbsp; Área
                                    </td>
                                    <td class="col-6">
                                        {{ Str::upper($imovel->area . ' (m²)') }} &nbsp;&nbsp;
                                    </td>
                                </tr>
                            @endif
                            @if ($imovel->status)
                                <tr class="row py-2 ml-3 mr-3">
                                    <td class="col-6">
                                        <i class="fas fa-check-double" style="font-size: 15px"></i>
                                        &nbsp; Estado
                                    </td>
                                    <td class="col-6">
                                        {{ Str::upper($imovel->status->nome) }} &nbsp;&nbsp;
                                    </td>
                                </tr>
                            @endif
                            @if ($imovel->ano)
                                <tr class="row py-2 ml-3 mr-3">
                                    <td class="col-6">
                                        <i class="fas fa-calendar-alt" style="font-size: 15px"></i>
                                        &nbsp; Ano de construção
                                    </td>
                                    <td class="col-6">
                                        {{ Str::upper($imovel->ano->year) }} &nbsp;&nbsp;
                                    </td>
                                </tr>
                            @endif
                            @if ($imovel->quartos)
                                <tr class="row py-2 ml-3 mr-3">
                                    <td class="col-6">
                                        <i class="fas fa-bed" style="font-size: 15px"></i>
                                        &nbsp; Quartos
                                    </td>
                                    <td class="col-6">
                                        {{ Str::upper($imovel->quartos) }} &nbsp;&nbsp;
                                    </td>
                                </tr>
                            @endif
                            @if ($imovel->suites)
                                <tr class="row py-2 ml-3 mr-3">
                                    <td class="col-6">
                                        <i class="fas fa-bed" style="font-size: 15px"></i>
                                        &nbsp; Suítes
                                    </td>
                                    <td class="col-6">
                                        {{ Str::upper($imovel->suites) }} &nbsp;&nbsp;
                                    </td>
                                </tr>
                            @endif
                            @if ($imovel->banheiros)
                                <tr class="row py-2 ml-3 mr-3">
                                    <td class="col-6">
                                        <i class="fas fa-toilet-paper " style="font-size: 15px"></i>
                                        &nbsp; Banheiros
                                    </td>
                                    <td class="col-6">
                                        {{ $imovel->banheiros }} &nbsp;&nbsp;
                                    </td>
                                </tr>
                            @endif
                            @if ($imovel->piscinas)
                                <tr class="row py-2 ml-3 mr-3">
                                    <td class="col-6">
                                        <i class="fas fa-toilet-paper " style="font-size: 15px"></i>
                                        &nbsp; Piscinas
                                    </td>
                                    <td class="col-6">
                                        {{ $imovel->piscinas }} &nbsp;&nbsp;
                                    </td>
                                </tr>
                            @endif
                            @if ($imovel->garagens)
                                <tr class="row py-2 ml-3 mr-3">
                                    <td class="col-6">
                                        <i class="fas fa-toilet-paper " style="font-size: 15px"></i>
                                        &nbsp; Garagens
                                    </td>
                                    <td class="col-6">
                                        {{ $imovel->garagens }} &nbsp;&nbsp;
                                    </td>
                                </tr>
                            @endif
                            <tr class="pt-1">
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @if ($imovel->descricao)
                <div class="container row py-2 mt-3 ">
                    <div class="mr-auto ml-auto conatiner row col-sm-12 col-md-10 justify-content-start d-flex ">
                        <div class="w-100 bg-white p-4
                    ">

                            <h5 style="font-weight: 600">Descrição</h5>
                            <p>
                                {{ $imovel->descricao }}
                            </p>
                        </div>

                    </div>
                </div>
            @endif
            @if ($imovel->mapa)
                <div class="container row py-2 mt-3 ">
                    <div class="mr-auto ml-auto conatiner row col-sm-12 col-md-10 justify-content-start d-flex ">
                        <div class="w-100 bg-white p-4
                    ">
                            <h5 class="mb-3 " style="font-weight: 600">Mapa da localização do imóvel</h5>
                            <div class="iframe-content w-100 embed-responsive embed-responsive-16by9">
                                {!! $imovel->mapa !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="container row py-2 mt-3  agendar-section">
                <div class="mr-auto ml-auto conatiner row col-sm-12 col-md-10 justify-content-center d-flex ">
                    <div class="agendar-button col-6 bg-warning py-3 justify-content-center d-flex  align-items-center">
                            <i class="fas fa-calendar"></i>
                            &nbsp; Angendar
                        </div>
                        <div class="agendar-button col-6 bg-warning py-3 justify-content-center d-flex  align-items-center">
                            <i class="fas fa-comment-alt"></i>
                            &nbsp; Falar com corretor
                        </div>
                </div>
            </div>

            <div class="container row py-2 mt-3  agendar-section">
                <div class="mr-auto ml-auto conatiner row col-sm-12 col-md-10 justify-content-center d-flex ">
                    <a href="http://" class="col-sm-12 bg-danger py-3 justify-content-center d-flex  align-items-center" style="color: #f0eff1;font-weight: 800">
                        <i class="fas fa-exclamation-triangle"></i>
                       &nbsp;  &nbsp; Denûnciar imóvel
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('banner')
    <section class="banner_section">
        <ul class="pgwSlideshow">
            @foreach ($imovel->fotos as $image)
                <li>
                    <img src="{{ asset('/storage') }}/{{ $image['url'] }}" class="img-fluid">
                </li>
            @endforeach
        </ul>
    </section>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('/frontend/home/css/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/home/css/imovel.style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/home/css/pgwslideshow.min.css') }}">
    <style>
        .pgwSlideshow .ps-list li .ps-item.ps-selected {
            border: 1px solid #c4c0c0 !important;
        }
        .pgwSlideshow .ps-list li img{
            height: auto !important;
        } div.ps-list ul{
            width: auto !important;
            margin-right: auto !important;
            margin-left: auto !important;
            display: flex !important;
        }
        .pgwSlideshow .ps-list li .ps-item.ps-selected img{
            margin: 0  !important;
        }
        .ps-list{
            display: flex !important;
        }
    </style>
@endpush
@push('js')
    <script src="{{ asset('frontend/home/js/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('frontend/home/js/pgwslideshow.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("select").selectric();
            $('.pgwSlideshow').pgwSlideshow({});
        });
    </script>
@endpush
@section('float_button')
<section class=" agendar-section-mobile">
<div class=" w-100 mr-0 ml-0 row w-100 pl-0 pr-0">
    <div class="agendar-button  w-100 mr-0 ml-0 pr-0 pl-0 col-6 bg-warning py-3 justify-content-center d-flex  align-items-center">
        <i class="fas fa-calendar"></i>
        &nbsp; Angendar
    </div>
    <div class="agendar-button w-100 col-6 mr-0 ml-0 pr-0 pl-0 bg-warning py-3 justify-content-center d-flex  align-items-center">
        <i class="fas fa-comment-alt"></i>
        &nbsp; Falar com corretor
    </div>
</div>
</section>
@endsection
