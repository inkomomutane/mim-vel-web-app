@extends('backend.layouts.app')
@section('title', request()->routeIs('bairro.edit') ? 'Editar o bairro - ' . $bairro->nome : 'Criar novo bairro')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <a href="{{ route('bairro.index') }}" class="col-auto btn btn-info">
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

                            @if (request()->routeIs('bairro.edit'))
                                <form action="{{ route('bairro.update', $bairro->id) }}" method="post">
                                    @method('PATCH')@csrf
                                    <input type="hidden" name="unique_hash" value="{{encrypt($bairro->id)}}">
                                @else
                                    <form action="{{ route('bairro.store') }}" method="post">
                                        @method('POST')@csrf
                            @endif

                            <div class="row justify-content-between mb-3">


                                <div class="row col-md-6">
                                    <label for="name">Cidade</label>
                                    <select name="cidade_id" id="cidade_id" class="form-control choices-single">
                                        @foreach ($cidades as $cidade)
                                        <option value="{{$cidade->id}}" @if(request()->routeIs('bairro.edit') && $bairro->cidade->id  == $cidade->id) selected @endif>{{$cidade->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="row col-md-6">
                                    <label for="name">Nome do bairro</label>
                                    <input name="nome" value="@if(old('nome')){{old('nome')}}@elseif(request()->routeIs('bairro.edit')){{ $bairro->nome }}@endif" type="text" class="form-control"
                                        placeholder="Nome do bairro" autofocus autocomplete="" required >
                                </div>
                            </div>

                            <div class="row container justify-content-center col-md-12">
                                <input type="submit" class="btn btn-primary rounded-3 col" value="@if (request()->routeIs('bairro.edit')) Actualizar @else Guardar @endif">
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
