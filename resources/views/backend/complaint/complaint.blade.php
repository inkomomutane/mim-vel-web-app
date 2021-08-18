@extends('layouts.backend.dashboard')

@section('content')
    <h2 class="section-title"> Denûncias</h2>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tabela de Denûncias</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped v_center" id="complaints">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        <i class="fas fa-th"></i>
                                    </th>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Denûncia</th>
                                    <th>Email</th>
                                    <th>Imóvel</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($complaints as $complaint)
                                    <tr>
                                        <td>
                                            <i class="fas fa-th"></i>
                                        </td>
                                        <td>{{ ucfirst($complaint->id) }}</td>
                                        <td>{{ ucfirst($complaint->nome_do_denunciante) }}</td>
                                        <td>{{ ucfirst($complaint->denuncia ) }}</td>
                                        <td>{{ ucfirst($complaint->email ) }}</td>
                                        <td><a href="{{ ucfirst($complaint->imovel_url ) }}">imovel</a> 	 </td>
                                     </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de formulario para view de Permisssion -->


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
        $("#complaints").dataTable({
            "lengthChange": false,
            "pageLength": 5,
            "info": false,
            "language": {
                'sSearch': 'Pesquisar Denûncia',
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
