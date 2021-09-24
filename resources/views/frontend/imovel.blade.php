@extends('layouts.frontend.app')
@section('title', Str::ucfirst($imovel->titulo))

@section('sessions')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible show fade w-80 col-sm-10 ml-auto mr-auto mt-4">
            <div class="alert-body">
                <button class="close" data-dismiss="alert"><span>×</span></button>
                <strong>{{ session('success') }}</strong>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible show fade w-80 col-sm-10 ml-auto mr-auto mt-4">
            <div class="alert-body">
                <button class="close" data-dismiss="alert"><span>×</span></button>
                <strong>{{ session('error') }}</strong>
            </div>
        </div>
    @endif
    @if (session('errors'))
        <div class="alert alert-danger alert-dismissible show fade w-80 col-sm-10 ml-auto mr-auto mt-4">
            <div class="alert-body">
                <button class="close" data-dismiss="alert"><span>×</span></button>

                    <strong>
                        <i class="fas fa-exclamation-triangle    "></i>
                        &nbsp; Por favor insira os dados correctamente nos campos!</strong>


            </div>
        </div>
    @endif
@endsection
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
                                        <i class="fas fa-swimming-pool    " style="font-size: 15px"></i>
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
                                        <i class="fas fa-warehouse    " style="font-size: 15px"></i>
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
                    <button class="agendar-button col-6 bg-warning py-3 justify-content-center d-flex  align-items-center" data-toggle="modal" data-target="#agendar">
                            <i class="fas fa-calendar"></i>
                            &nbsp; Angendar
                        </button>
                        <button class="agendar-button col-6 bg-warning py-3 justify-content-center d-flex  align-items-center" data-toggle="modal" data-target="#falar_com_o_corretor" >
                            <i class="fas fa-comment-alt"></i>
                            &nbsp; Falar com corretor
                        </button>
                </div>
            </div>

            <div class="container row py-2 mt-3  agendar-section">
                <div class="mr-auto ml-auto conatiner row col-sm-12 col-md-10 justify-content-center d-flex ">
                    <a href="{{ route('complaint', $imovel->id) }}" class="col-sm-12 bg-danger py-3 justify-content-center d-flex  align-items-center" style="color: #f0eff1;font-weight: 800">
                        <i class="fas fa-exclamation-triangle"></i>
                       &nbsp;  &nbsp; Denûnciar imóvel
                    </a>
                </div>
            </div>
            <div class="container row py-2 mt-3">
                <div class="mx-auto container pb-3 row col-sm-12 col-md-10 justify-content-start d-flex  align-items-center bg-white">

                   @if ($imovel->comentarios->count() > 0)
                   <div class="comments-area w-100" style="overflow:auto; max-height: 500px" >
                    <div class="comment-list">
                        @foreach ($imovel->comentarios as $comment)
                        <div class="single-comment justify-content-between d-flex pt-4">
                            <div class="user justify-content-start d-flex">
                                <div class="desc p-3 bg-white">
                                    <h6><a href="#">{{$comment->nome}}</a></h6>
                                    <p class="comment">
                                        {{ $comment->comentario }}
                                    </p>
                                    <p class="date"> {{date_format($comment->created_at,'M d, Y h:m:s')}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                   @endif
                    <div class="comment-form w-100">
                        <form action="{{ route('comentar') }}" method="post">
                            @csrf
                            <input type="hidden" name="imovel_id" value="{{$imovel->id}}">
                            <div class="form-group form-inline">
                              <div class="form-group col-lg-6 col-md-6 name">
                                <input type="text" class="form-control" id="nome" placeholder="Seu nome" name="nome" required>
                              </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control mb-10" rows="5" name="comentario" placeholder="Comentario" required></textarea>
                            </div>
                            <button type="submit" class="primary-btn button_hover">Comentar</button>
                        </form>
                    </div>
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
    <link rel="stylesheet" href="{{ asset('frontend/home/css/daterangepicker.css') }}">
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

     </script>
    <script src="{{ asset('frontend/home/js/daterangepicker.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("select").selectric();
            $('.pgwSlideshow').pgwSlideshow({});
            $('.datetimepicker').daterangepicker({
                locale: {format: 'YYYY-MM-DD hh:mm'},
                singleDatePicker: true,
                timePicker: true,
                timePicker24Hour: true,
            });
        });
    </script>
@endpush
@section('float_button')
<section class=" agendar-section-mobile">
<div class=" w-100 mr-0 ml-0 row w-100 pl-0 pr-0">
    <button class="agendar-button  w-100 mr-0 ml-0 pr-0 pl-0 col-6 bg-warning py-3 justify-content-center d-flex  align-items-center" data-toggle="modal" data-target="#agendar">
        <i class="fas fa-calendar"></i>
        &nbsp; Angendar
    </button>
    <button class="agendar-button w-100 col-6 mr-0 ml-0 pr-0 pl-0 bg-warning py-3 justify-content-center d-flex  align-items-center">
        <i class="fas fa-comment-alt"></i>
        &nbsp; Falar com corretor
    </button>
</div>
</section>
@endsection
@section('modals')
<div class="modal fade" tabindex="-1" role="dialog" id="agendar">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agendar visita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('agendar_visita') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group">

                       <input type="hidden" name="corretor_id" value="{{$imovel->postado_por}}">
                       <input type="hidden" name="imovel_id" value="{{$imovel->id}}">

                        <label for="">Nome do cliente</label>
                        <input type="text" name="nome_cliente" id="nome_cliente"
                        class="form-control" placeholder="Nome do cliente" aria-describedby="Agendar visita" required autocomplete="nome_cliente" autofocus value="{{ old('nome_cliente') }}">
                        <label for="">Contacto do cliente</label>
                        <input type="text" name="contacto" id="contacto" class="form-control" placeholder="Contacto: ex (+258) 84 XXX XXXX"
                        required autocomplete="contacto" autofocus value="{{ old('contacto') }}">
                        <label for="">Data da visita</label>
                        <input type="date" name="horario" id="horario" class="form-control" placeholder="Data da visita" required
                        autocomplete="horario" autofocus value="{{ old('horario') }}">
                          <input  id="" class="btn btn-success w-100 py-2 mt-2" type="submit" value="Enviar">
                      </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
