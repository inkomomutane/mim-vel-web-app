@extends('layouts.backend.dashboard')

@section('content')
    <h2 class="section-title"> Permissões</h2>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tabela de permissões</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped v_center" id="permissions">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        <i class="fas fa-th"></i>
                                    </th>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Slug</th>
                                    <th>Visualizar</th>
                                    <th>Editar</th>
                                    <th>Deletar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>
                                            <i class="fas fa-th"></i>
                                        </td>
                                        <td>{{ ucfirst($permission->id) }}</td>
                                        <td>{{ ucfirst($permission->nome) }}</td>
                                        <td>{{ ucfirst($permission->slug) }}</td>
                                        <td><a href="#" class="btn btn-info"><i class="fa fa-eye"></a></i></td>
                                        <td><a href="#" class="btn btn-secondary"><i class="fa fa-edit"></i></a></td>
                                        <td><a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('backend/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endpush
@push('jsLibs')
    <script src="{{ asset('backend/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('backend/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('backend/jquery-ui/jquery-ui.min.js') }}"></script>
@endpush
@push('js')
    <script>
        $("#permissions").dataTable({
            "lengthChange": false,
            "pageLength": 10,
            "info": false,
            "language": {
                'sSearch': 'Pesquisar Permissão',
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguinte",
                    "sPrevious": "Anterior"
                },
            }
        });
    </script>
@endpush
