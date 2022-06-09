@extends('backend.layouts.app')
@section('title','Cidades')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <h5 class="card-title col-auto">Cidades</h5>
                        <a href="{{ route('cidade.create') }}" class="col-auto btn btn-purple">
                            @svg('fluentui-city-16-o','feather align-middle') &nbsp; <span class="align-middle">Nova cidade</span>
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
                        <table id="cidades_table" class="table table-responsive display table-hover my-0 w-100">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Cidade</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cidades as $cidade)
                            <tr>
                                <td>{{$cidade->id}}</td>
                                <td>{{$cidade->nome}}</td>
                                <td><a class="btn btn-warning" href="{{route('cidade.edit',$cidade->id)}}">Editar</a></td>
                                <td><button class="btn btn-danger" onclick="document.getElementById('cidade_{{$cidade->id}}_delete').submit()">Delete</button>
                                    <form action="{{route('cidade.destroy',$cidade->id)}}" method="post" id="cidade_{{$cidade->id}}_delete">
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
