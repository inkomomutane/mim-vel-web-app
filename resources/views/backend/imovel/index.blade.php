@extends('backend.layouts.app')
@section('title','Imovel')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <h5 class="card-title col-auto">Imovel</h5>
                        <a href="{{ route('imovel.create') }}" class="col-auto btn btn-purple">
                            @svg('fluentui-city-16-o','feather align-middle') &nbsp; <span class="align-middle">Nova imovel</span>
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
                        @if (session('error'))
                        <div class="alert alert-danger alert-dismissible show fade" role="alert" style="border-left: 5px solid rgb(100, 0, 0);">
                            <div class="alert-body">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong>{{ session('error') }}</strong>
                            </div>
                        </div>
                    @endif
                        <table id="imovels_table" class="table table-responsive display table-hover my-0 w-100">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Título</th>
                                <th>Media</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($imovels as $imovel)
                            <tr>
                                <td>{{$imovel->id}}</td>
                                <td>{{$imovel->titulo}}</td>
                                <td><a class="btn btn-purple" href="{{route('media.show',['imovel'=> $imovel->slug])}}">
                                    @svg('fluentui-image-multiple-28-o' ,'feather align-middle') Media
                                    </a></td>

                                <td><a class="btn btn-warning" href="{{route('imovel.edit',$imovel->slug)}}">Editar</a></td>
                                <td>
                                    <button class="btn btn-danger" onclick="document.getElementById('imovel_{{$imovel->id}}_delete').submit()">Delete</button>
                                    <form action="{{route('imovel.destroy',$imovel->slug)}}" method="post" id="imovel_{{$imovel->id}}_delete">
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
                                        <th>Título</th>
                                        <th>Media</th>
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
