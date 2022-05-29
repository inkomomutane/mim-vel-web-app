@extends('backend.layouts.app')
@section('title', request()->routeIs('imovel.edit') ? 'Editar o imovel - ' . $imovel->nome : 'Adicionar novo imovel')


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <a href="{{ route('imovel.index') }}" class="col-auto btn btn-info">
                            <i class="align-middle" data-feather="corner-up-left"></i>&nbsp; Voltar
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible " role="alert"
                                style="border-left: 5px solid darkred;">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <div class="alert-message">
                                    <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li><i class="align-middle" data-feather="alert-triangle"></i> &nbsp;
                                                <strong>{{ $error }}</strong>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        <div class="container row">

                            @if (request()->routeIs('imovel.edit'))
                                <form action="{{ route('imovel.update', $imovel->slug) }}" method="post">
                                    @method('PATCH')@csrf
                                    <input type="hidden" name="unique_hash" value="{{encrypt($imovel->id)}}">
                                @else
                                    <form action="{{ route('imovel.store') }}" method="post">
                                        @method('POST')@csrf
                            @endif

                            <div class="row justify-content-between mb-3">
                                <div class="col-sm-8">
                                    <label for="name">Título</label>
                                    <input name="titulo" value="@if(old('titulo')){{old('titulo')}}@elseif(request()->routeIs('imovel.edit')){{ $imovel->titulo }}@endif" type="text" class="form-control"
                                        placeholder="Título" autofocus autocomplete="" required >
                                </div>
                                <div class="col-sm-4">
                                    <label for="name">Preço</label>
                                    <input name="preco" value="@if(old('preco')){{old('preco')}}@elseif(request()->routeIs('imovel.edit')){{ $imovel->preco }}@endif" type="text" class="form-control"
                                        placeholder="Preço" autofocus autocomplete=""  id="preco_imovel">
                                </div>
                            </div>
                            <div>
                                <label for="name">Descrição</label>
                                <textarea class="col-12" name="descricao" id="editor">
                                    @if(old('descricao'))
                                    {!! old('descricao') !!}
                                    @elseif(request()->routeIs('imovel.edit'))
                                    {!! $imovel->descricao !!}
                                    @endif

                                </textarea>
                            </div>
                            <div class="row justify-content-between my-3">
                                <div class="col-sm-4">
                                    <label for="name">Bairro</label>
                                    <select name="bairro_id" id="bairro_id" class="form-control form-select">
                                        @foreach ($bairros as $bairro )
                                            <option value="{{$bairro->id}}">{{$bairro->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-8">
                                    <label for="name">Endereço</label>
                                    <input type="text" name="endereco" id="endereco" class="form-control" placeholder="Endereço" value="@if(old('endereco')){{old('endereco')}}@elseif(request()->routeIs('imovel.edit')){{ $imovel->endereco }}@endif">
                                </div>
                            </div>

                            <div class="row justify-content-between my-3">
                                <div class="w-100">
                                    <label for="name">Mapa da localização do imóvel.</label>
                                    <input type="text" name="mapa" id="mapa" class="form-control" placeholder=" Link do Mapa da localização do imóvel."
                                    value="@if(old('mapa')){{old('mapa')}}@elseif(request()->routeIs('imovel.edit')){{ $imovel->mapa }}@endif"

                                    >
                                </div>
                            </div>

                            <div class="row justify-content-between my-3">

                                <div class="col-sm-4">
                                    <label for="name">Tipo de Imóvel</label>
                                <select name="tipo_de_imovel_id" id="tipo_de_imovel_id" class="form-control form-select">
                                    @foreach ($tipo_de_imovels as $tipo_de_imovel )
                                        <option value="{{$tipo_de_imovel->id}}">{{$tipo_de_imovel->nome}}</option>
                                    @endforeach
                                </select>
                                </div>

                                <div class="col-sm-4">
                                    <label for="name">Condição do imóvel</label>
                                <select name="condicao_id" id="condicao_id" class="form-control form-select">
                                    @foreach ($condicaos as $condicao )
                                        <option value="{{$condicao->id}}">{{$condicao->nome}}</option>
                                    @endforeach
                                </select>
                                </div>


                                <div class="col-sm-4">
                                    <label for="name">Estado do imóvel</label>
                                <select name="status_id" id="status_id" class="form-control form-select">
                                    @foreach ($statuses as $status )
                                        <option value="{{$status->id}}">{{$status->nome}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="row justify-content-between my-3">
                                @livewire('upload-images')
                            </div>


                            <div class="row container justify-content-center col-md-12 mt-2">
                                <input type="submit" class="btn btn-primary rounded-3 col" value="@if (request()->routeIs('imovel.edit')) Actualizar @else Guardar @endif">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
