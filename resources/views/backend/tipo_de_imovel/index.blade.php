@extends('backend.layouts.app')
@section('title','Tipos de Imóveis')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <h5 class="card-title col-auto">Tipos de Imóveis</h5>
                        <a href="{{ route('tipo_de_imovel.create') }}" class="col-auto btn btn-purple">
                            @svg('fluentui-tasks-app-20-o','feather align-middle') &nbsp; <span class="align-middle">Novo tipo de imóvel</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible show fade" role="alert" style="border-left: 5px solid darkgreen;">
                                <div class="alert-body">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <strong>{{ session('success') }}</strong>
                                </div>
                            </div>
                        @endif
                        <table id="tipo_de_imovels_table" class="table table-responsive display table-hover my-0 w-100">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tipo de Imóvel</th>
                                <th>Icon</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tipo_de_imovels as $tipo_de_imovel)
                            <tr>
                                <td>{{$tipo_de_imovel->id}}</td>
                                <td>{{$tipo_de_imovel->nome}}</td>
                                <td>
                                    <img class="img-fluid"  style="height: 25px" src="{{$tipo_de_imovel->getFirstMediaUrl('icons')}}">
                                </td>
                                <td><a class="btn btn-warning" href="{{route('tipo_de_imovel.edit',$tipo_de_imovel->id)}}">Editar</a></td>
                                <td><button class="btn btn-danger" onclick="document.getElementById('tipo_de_imovel_{{$tipo_de_imovel->id}}_delete').submit()">Delete</button>
                                    <form action="{{route('tipo_de_imovel.destroy',$tipo_de_imovel->id)}}" method="post" id="tipo_de_imovel_{{$tipo_de_imovel->id}}_delete">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Tipo de Imóvel</th>
                                        <th>Icon</th>
                                        <th>Editar</th>
                                        <th>Deletar</th>
                                    </tr>

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>

    </script>
@endpush
