@extends('layouts.backend.dashboard')

@section('content')
<h2 class="section-title"> Bairros</h2>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tabela de bairros</h4>
                    <div class="card-header-action">
                        <button class="btn btn-info" data-toggle="modal" data-target="#novoBairro"><i class="fas fa-plus"></i><span> Novo bairro</span></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped v_center" id="bairros">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        <i class="fas fa-th"></i>
                                    </th>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>visualizar</th>
                                    <th>Editar</th>
                                    <th>Delater</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bairros as $bairro)
                                    <tr>
                                        <td>
                                            <i class="fas fa-th"></i>
                                        </td>
                                        <td>{{ ucfirst($bairro->id) }}</td>
                                        <td>{{ ucfirst($bairro->nome) }}</td>

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
</div>

@endsection

@section('modals')
<div class="modal fade" tabindex="-1" role="dialog" id="novoBairro">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Novo bairro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('bairro.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="container form-group row">

                        <div class="col-md-12">
                            <input id="nome" type="text" class="form-control" name="nome" placeholder="Digite nome de bairro" required autocomplete="nome" autofocus>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Gravar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('backend/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endpush
@push('cssLibs')
    <link rel="stylesheet" href="{{ asset('backend/prism/prism.css') }}">
@endpush
@push('jsLibs')
    <script src="{{ asset('backend/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('backend/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('backend/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('backend/prism/prism.js') }}"></script>

@endpush
@push('js')
    <script>
        $("#bairros").dataTable({
            "lengthChange": false,
            "pageLength": 10,
            "info": false,
            "language": {
                'sSearch': 'Pesquisar bairros',
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
