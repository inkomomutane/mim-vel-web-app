@extends('backend.layouts.app')
@section('title', request()->routeIs('imovel_for.edit') ? 'Editar o Tipo de transação - ' . $imovel_for->name : 'Criar novo tipo de transação')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <a href="{{ route('imovel_for.index') }}" class="col-auto btn btn-info">
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

                            @if (request()->routeIs('imovel_for.edit'))
                                <form action="{{ route('imovel_for.update', $imovel_for->id) }}" method="post">
                                    @method('PATCH')@csrf
                                    <input type="hidden" name="unique_hash" value="{{encrypt($imovel_for->id)}}">
                                @else
                                    <form action="{{ route('imovel_for.store') }}" method="post">
                                        @method('POST')@csrf
                            @endif

                            <div class="row justify-content-between mb-3">

                                <div class="row col-md-6">
                                    <label for="name">Tipo de transação</label>
                                    <input name="name" value="@if(old('name')){{old('name')}}@elseif(request()->routeIs('imovel_for.edit')){{ $imovel_for->name }}@endif" type="text" class="form-control"
                                        placeholder="Nome do tipo de transação" autofocus autocomplete="" required >
                                </div>
                                <div class="row col-md-6">
                                    <label for="slug_text">Prefixo nos imóveis</label>
                                    <input name="slug_text" value="@if(old('slug_text')){{old('slug_text')}}@elseif(request()->routeIs('imovel_for.edit')){{ $imovel_for->slug_text }}@endif" type="text" class="form-control"
                                        placeholder="Prefixo nos imóveis" autofocus autocomplete="" required >
                                </div>
                            </div>

                            <div class="row container justify-content-center col-md-12">
                                <input type="submit" class="btn btn-primary rounded-3 col" value="@if (request()->routeIs('imovel_for.edit')) Actualizar @else Guardar @endif">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
