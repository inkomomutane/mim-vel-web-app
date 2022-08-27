@extends('backend.layouts.app')
@section('title', request()->routeIs('regra_de_negocio.edit') ? 'Editar a regra de negociação - ' . $regra_de_negocio->name : 'Criar nova regra de nogociação')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <a href="{{ route('regra_de_negocio.index') }}" class="col-auto btn btn-info">
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

                            @if (request()->routeIs('regra_de_negocio.edit'))
                                <form action="{{ route('regra_de_negocio.update', $regra_de_negocio->id) }}" method="post">
                                    @method('PATCH')@csrf
                                    <input type="hidden" name="unique_hash" value="{{encrypt($regra_de_negocio->id)}}">
                                @else
                                    <form action="{{ route('regra_de_negocio.store') }}" method="post">
                                        @method('POST')@csrf
                            @endif

                            <div class="row justify-content-between mb-3">

                                <div class="row col-md-12">
                                    <label for="name">Regra de negociação</label>
                                    <input name="name" value="@if(old('name')){{old('name')}}@elseif(request()->routeIs('regra_de_negocio.edit')){{ $regra_de_negocio->name }}@endif" type="text" class="form-control"
                                        placeholder="Nome da regra de negociação" autofocus autocomplete="" required >
                                </div>
                            </div>

                            <div class="row container justify-content-center col-md-12">
                                <input type="submit" class="btn btn-primary rounded-3 col" value="@if (request()->routeIs('regra_de_negocio.edit')) Actualizar @else Guardar @endif">
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
