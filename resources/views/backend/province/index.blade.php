@extends('backend.layouts.app')
@section('title','Províncias')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <h5 class="card-title col-auto">Províncias</h5>
                        <a href="{{ route('province.create') }}" class="col-auto btn btn-purple">
                            @svg('fluentui-city-24','feather align-middle') &nbsp; <span class="align-middle">Nova province</span>
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
                        <table id="provinces_table" class="table table-responsive display table-hover my-0 w-100">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Província</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($provinces as $province)
                            <tr>
                                <td>{{$province->id}}</td>
                                <td>{{$province->name}}</td>
                                <td><a class="btn btn-warning" href="{{route('province.edit',$province->id)}}">Editar</a></td>
                                <td><button class="btn btn-danger" onclick="document.getElementById('province_{{$province->id}}_delete').submit()">Delete</button>
                                    <form action="{{route('province.destroy',$province->id)}}" method="post" id="province_{{$province->id}}_delete">
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
                                        <th>Província</th>
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
