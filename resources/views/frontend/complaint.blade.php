@extends('layouts.frontend.app')
@section('title', 'Denûnciar o Imóvel')
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

<section class="other-issue-area pb-5 pt-5" style="background: #f0eff1">
    <div class="container">
        <div class="container row">
            <div class="mr-auto ml-auto conatiner row p-4 col-sm-10 justify-content-start d-flex bg-white" id="sobre">
                  <div class="col-sm-12">
                    <h5 style="font-weight: 600">Porque denuncia este imóvel? </h5>
                    <form class="row contact_form" action="{{ route('complaint.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <input type="text" name="imovel_id" hidden value="{{$imovel->id}}">
                        <div class="col-md-4 py-1">
                            <div class="form-group">
                                <label for="">Código de imóvel</label>
                                <input class="form-control" type="text"  disabled value="{{$imovel->codigo}}">
                            </div>
                        </div>
                        <div class="col-md-6 py-1">
                            <div class="form-group">
                                <label for="">Titulo de imóvel</label>
                                <input class="form-control text-truncate" type="text"  disabled value="{{$imovel->titulo}}">
                            </div>
                        </div>
                        <div class="col-md-12 py-1">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nome_do_denunciante" name="nome_do_denunciante" placeholder="Seu nome (Opcional)">
                            </div>
                            <div class="form-group">
                                <label for="">Motivo da deûncia.</label>

                                    <select class="form-control" name="denuncia_id" >

                                        @foreach ($denuncias as $denuncia)
                                        <option selected value="{{$denuncia->id}}">{{$denuncia->denuncia}}</option>
                                        @endforeach
                                    </select>

                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" name="denuncia"  rows="1"  placeholder="Outro motivo da denûncia (opcional)"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="btn theme_btn button_hover">
                                <i class="fas fa-exclamation-triangle    "></i>
                                &nbsp; Denûnciar</button>
                        </div>
                    </form>
                  </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('banner')
    @if ($images->count() > 0)
        <section class="banner_section">
            <div class="owl-carousel" id="banner_carousel">
                @foreach ($images as $image)
                    <img src="{{ asset('/storage') }}/{{ $image }}" class="img-fluid">
                @endforeach
            </div>
        </section>
    @endif
@endsection

@push('css')
<style>
    #sobre img{
        max-width: 100%;
    }
</style>
@endpush
