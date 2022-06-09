@extends('backend.layouts.app')
@section('title','Bairros')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <h5 class="card-title col-auto">Bairros</h5>
                        <a href="{{ route('bairro.create') }}" class="col-auto btn btn-purple">
                            @svg('fluentui-city-16-o','feather align-middle') &nbsp; <span class="align-middle">Novo bairro</span>
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
                        <table id="bairros_table" class="table table-responsive display table-hover my-0 w-100">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Bairro</th>
                                <th>Cidade</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bairros as $bairro)
                            <tr>
                                <td>{{$bairro->id}}</td>
                                <td>{{$bairro->nome}}</td>
                                <td>{{$bairro->cidade->nome}}</td>
                                <td><a class="btn btn-warning" href="{{route('bairro.edit',$bairro->id)}}">Editar</a></td>
                                <td><button class="btn btn-danger" onclick="document.getElementById('bairro_{{$bairro->id}}_delete').submit()">Delete</button>
                                    <form action="{{route('bairro.destroy',$bairro->id)}}" method="post" id="bairro_{{$bairro->id}}_delete">
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
                                        <th>Bairro</th>
                                        <th>Cidade</th>
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
