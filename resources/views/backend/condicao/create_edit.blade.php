@extends('backend.layouts.app')
@section('title', request()->routeIs('condicao.edit') ? 'Editar a condicao - ' . $condicao->nome : 'Criar nova condicao')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <a href="{{ route('condicao.index') }}" class="col-auto btn btn-info">
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

                            @if (request()->routeIs('condicao.edit'))
                                <form action="{{ route('condicao.update', $condicao->id) }}" method="post">
                                    @method('PATCH')@csrf
                                    <input type="hidden" name="unique_hash" value="{{encrypt($condicao->id)}}">
                                @else
                                    <form action="{{ route('condicao.store') }}" method="post">
                                        @method('POST')@csrf
                            @endif

                            <div class="row justify-content-between mb-3">

                                <label for="name">Nome da condicao da casa</label>
                                <div class="row col-md-12">
                                    <input name="nome" value="@if(old('nome')){{old('nome')}}@elseif(request()->routeIs('condicao.edit')){{ $condicao->nome }}@endif" type="text" class="form-control"
                                        placeholder="Nome do condicao da casa" autofocus autocomplete="" required >
                                </div>
                            </div>

                            <div class="row container justify-content-center col-md-12">
                                <input type="submit" class="btn btn-primary rounded-3 col" value="@if (request()->routeIs('condicao.edit')) Actualizar @else Guardar @endif">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
