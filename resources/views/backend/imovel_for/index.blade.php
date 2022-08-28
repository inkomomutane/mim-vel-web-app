@extends('backend.layouts.app')
@section('title','Tipos de transação')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <h5 class="card-title col-auto">Tipos de transação</h5>
                        <a href="{{ route('imovel_for.create') }}" class="col-auto btn btn-purple">
                            @svg('fluentui-handshake-20-o','feather align-middle') &nbsp; <span class="align-middle">Nova regra de negociação</span>
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
                        <table id="imovel_fors_table" class="table table-responsive display table-hover my-0 w-100">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tipo de transação</th>
                                <th>Prefixo nos imóveis</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($imovel_fors as $imovel_for)
                            <tr>
                                <td>{{$imovel_for->id}}</td>
                                <td>{{$imovel_for->name}}</td>
                                <td>{{$imovel_for->slug_text}}</td>
                                <td><a class="btn btn-warning" href="{{route('imovel_for.edit',$imovel_for->id)}}">Editar</a></td>
                                <td><button class="btn btn-danger" onclick="document.getElementById('imovel_for_{{$imovel_for->id}}_delete').submit()">Delete</button>
                                    <form action="{{route('imovel_for.destroy',$imovel_for->id)}}" method="post" id="imovel_for_{{$imovel_for->id}}_delete">
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
                                        <th>Tipo de transação</th>
                                        <th>Prefixo nos imóveis</th>
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
