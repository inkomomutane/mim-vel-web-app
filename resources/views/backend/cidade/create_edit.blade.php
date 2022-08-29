@extends('backend.layouts.app')
@section('title', request()->routeIs('cidade.edit') ? 'Editar a cidade - ' . $cidade->nome : 'Criar nova cidade')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <a href="{{ route('cidade.index') }}" class="col-auto btn btn-info">
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

                            @if (request()->routeIs('cidade.edit'))
                                <form action="{{ route('cidade.update', $cidade->id) }}" method="post">
                                    @method('PATCH')@csrf
                                    <input type="hidden" name="unique_hash" value="{{encrypt($cidade->id)}}">
                                @else
                                    <form action="{{ route('cidade.store') }}" method="post">
                                        @method('POST')@csrf
                            @endif

                            <div class="row justify-content-between mb-3">
                                <div class="col-sm-6">
                                    <label for="name">Selecione província</label>
                                    <select name="province_id" id="province_id"
                                        class="form-control form-select">
                                        @if ($provinces)
                                                @foreach ($provinces as $province)
                                                <option value="{{ $province->id }}"
                                                    @if (request()->routeIs('cidade.edit') && (!is_null($cidade->province))  && $cidade->province->id == $province->id)
                                                    selected class="option-selected"
                                                @endif
                                                    >{{ $province->name }}
                                                </option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>

                                <div class="row col-md-6">
                                    <label for="name">Nome da cidade</label>
                                    <input name="nome" value="@if(old('nome')){{old('nome')}}@elseif(request()->routeIs('cidade.edit')){{ $cidade->nome }}@endif" type="text" class="form-control"
                                        placeholder="Nome do cidade" autofocus autocomplete="" required >
                                </div>





                            </div>

                            <div class="row container justify-content-center col-md-12">
                                <input type="submit" class="btn btn-primary rounded-3 col" value="@if (request()->routeIs('cidade.edit')) Actualizar @else Guardar @endif">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
