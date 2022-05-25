@extends('backend.layouts.app')
@section('title', request()->routeIs('user.edit') ? 'Editar o usuário ' . $user->name : 'Criar novo usuário')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <a href="{{ route('user.index') }}" class="col-auto btn btn-info">
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

                            @if (request()->routeIs('user.edit'))
                                <form action="{{ route('user.update', $user->id) }}" method="post">
                                    @method('PATCH')@csrf
                                @else
                                    <form action="{{ route('user.store') }}" method="post">
                                        @method('POST')@csrf
                            @endif

                            <div class="row justify-content-between mb-3">
                                <div class="row col-md-6">
                                    <label for="name">Nome de usuário</label>
                                    <input name="name" value="@if(old('name')){{old('name')}}@elseif (request()->routeIs('user.edit')){{ $user->name }}@endif" type="text" class="form-control"
                                        placeholder="Nome de usuário" autofocus autocomplete="{{old('name')}}" required>
                                </div>
                                <div class="row col-md-6">
                                    <label for="name">Nome do email</label>
                                    <input name="email" value="@if(old('email')){{old('email')}}@elseif (request()->routeIs('user.edit')){{ $user->email }}@endif" type="email" class="form-control"
                                        placeholder="Nome do email" autofocus autocomplete="{{old('email')}}" required>
                                </div>
                            </div>
                            <div class="row justify-content-between mb-3">
                            <div class="row col-md-6">
                                <label for="name">Senha</label>
                                <input name="password" type="password" class="form-control" placeholder="Senha" autofocus
                                    autocomplete="" @if(!request()->routeIs('user.edit')) required @endif value="@if(old('password')){{old('password')}}@endif">
                            </div>
                            <div class="row col-md-6">
                                <label for="name">Confirmar senha</label>
                                <input name="password_confirmation" type="password" class="form-control"
                                    placeholder="Confirmar senha" autofocus autocomplete=""  @if(!request()->routeIs('user.edit')) required @endif value="@if(old('password_confirmation')){{old('password_confirmation')}}@endif">
                            </div>
                            </div>
                            <div class="row justify-content-between mb-3">

                            <div class="row col-sm-12">
                                <label for="name">Previlêgio</label>
                                <select class="form-control form-select" name="role_id">
                                    <optgroup label="Previlêgios">
                                        @foreach (\Spatie\Permission\Models\Role::all() as $role)
                                            <option value="{{ $role->id }}" @if (request()->routeIs('user.edit') && $role->id == $user->roles->first()->id) selected="true" @endif>{{ $role->name }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                            </div>

                            <div class="container justify-content-center row">
                                <input type="submit" class="btn btn-primary rounded-3 col" value="@if (request()->routeIs('user.edit')) Actualizar @else Guardar @endif">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
