@extends('backend.layouts.app')
@section('title', request()->routeIs('tipo_de_imovel.edit') ? 'Editar o tipo de imóvel - ' . $tipo_de_imovel->nome : 'Criar novo tipo de imóvel')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <a href="{{ route('tipo_de_imovel.index') }}" class="col-auto btn btn-info">
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

                            @if (request()->routeIs('tipo_de_imovel.edit'))
                                <form action="{{ route('tipo_de_imovel.update', $tipo_de_imovel->id) }}" method="post">
                                    @method('PATCH')@csrf
                                    <input type="hidden" name="unique_hash" value="{{encrypt($tipo_de_imovel->id)}}">
                                @else
                                    <form action="{{ route('tipo_de_imovel.store') }}" method="post">
                                        @method('POST')@csrf
                            @endif

                            <div class="row justify-content-between mb-3">

                                <label for="name">Tipo de Imóvel</label>
                                <div class="row col-md-12">
                                    <input name="nome" value="@if(old('nome')){{old('nome')}}@elseif(request()->routeIs('tipo_de_imovel.edit')){{ $tipo_de_imovel->nome }}@endif" type="text" class="form-control"
                                        placeholder="Tipo de imóvel" autofocus autocomplete="" required >
                                </div>
                            </div>

                            <div class="row container justify-content-center col-md-12">
                                <input type="submit" class="btn btn-primary rounded-3 col" value="@if (request()->routeIs('tipo_de_imovel.edit')) Actualizar @else Guardar @endif">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
