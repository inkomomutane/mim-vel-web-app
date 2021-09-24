@extends('layouts.backend.dashboard')

@section('sessions')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert"><span>×</span></button>
                <strong>{{ session('success') }}</strong>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert"><span>×</span></button>
                <strong>{{ session('error') }}</strong>
            </div>
        </div>
    @endif
    @if (session('errors'))
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">

                {{$errors}}
                <button class="close" data-dismiss="alert"><span>×</span></button>
                @error('local_de_encontro')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
        </div>
    @endif
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tabela de agendas</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped v_center" id="agendas">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        <i class="fas fa-th"></i>
                                    </th>
                                    <th>Nome do cliente</th>
                                    <th>Contacto</th>
                                    <th>Código do imóvel</th>
                                    <th>Data da visita</th>
                                    <th>Status</th>
                                    <th>Editar</th>
                                    <th>Delatar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agendas as $agenda)
                                    <tr>
                                        <td><i class="fas fa-th"></i></td>
                                        <td>{{ ucfirst($agenda->nome_cliente ) }}</td>
                                       <td> <a href="tel:{{$agenda->contacto}}">{{$agenda->contacto}}</a></td>
                                       <td>{{$agenda->imovel->codigo}}</td>
                                       <td>{{ date_format($agenda->horario,'d-M-Y') }}</td>
                                       <td>
                                           @if ($agenda->confirmed)
                                           <span class="badge badge-pill badge-success">Confirmado</span>
                                           @else
                                           <span class="badge badge-pill badge-warning">Em espera</span>
                                           @endif
                                       </td>
                                        <td><button class="btn btn-secondary" data-toggle="modal" data-target="#EditAgenda"
                                                data-code="{{ ucfirst($agenda) }}"><i class="fa fa-edit"></i></button>
                                        </td>
                                        <td><a href="#" class="btn btn-danger" data-toggle="modal"
                                                data-target="#DeleteAgenda" data-code="{{ ucfirst($agenda) }}"><i
                                                    class="fa fa-trash"></i></a></td>
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
    <div class="modal fade" tabindex="-1" role="dialog" id="EditAgenda">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar agenda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('agenda.index') }}" method="post" id="edit_form">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="container form-group row">
                            <div class="col-md-4">
                                <input id="id_edit" type="text" class="form-control" name="id" placeholder="Digite Id"
                                    required autocomplete="id" autofocus >
                            </div>
                                <input type="hidden" name="corretor_id"  class="corretor_id_edit">
                            <div class="col-md-12">
                                <label for="">Nome do cliente</label>
                                <input id="nome_do_cliente_edit" type="text" class="form-control" name="nome_cliente"
                                    required  autofocus >
                            </div>
                            <div class="col-md-12">
                                <label for="">Contacto do cliente</label>
                                <input id="contacto_do_cliente_edit" type="text" class="form-control" name="contacto"
                                    required autofocus >
                            </div>

                            <div class="col-md-12">
                                <label for="">Id do imóvel</label>
                                <input id="imovel_id_edit" type="text" class="form-control" name="imovel_id"
                                    required autofocus >
                            </div>
                            <div class="col-md-12">
                                <label for="">Data da visita</label>
                                <input id="data_da_visita_edit" type="date" class="form-control" name="horario"
                                    required  autofocus>
                            </div>
                            <div class="py-2 col-md-12">
                                <input id="local_de_encontro_edit" type="text" class="form-control" name="local_de_encontro"
                                    placeholder="Digite local de encontro" required autocomplete="local_de_encontro" autofocus>
                            </div>
                            <div class="col-md-12 py-2">
                            <label for="cidades">Status</label>
                            <select name="confirmed" id="update_confirmed" class="selectric">
                                <option value="1">Confirmado</option>
                                    <option value="0">Não confirmado</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="DeleteAgenda">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Deletar agenda</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('agenda.index') }}" method="post" id="delete_form">
                    @csrf
                    @method('DELETE')
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Confirmar</button>
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
    <link rel="stylesheet" href="{{ asset('backend/jquery-selectric/selectric.css') }}">
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
    <script src="{{ asset('backend/jquery-selectric/jquery.selectric.min.js') }}"></script>
@endpush
@push('js')
    <script>
        $("#agendas").dataTable({
            "lengthChange": false,
            "pageLength": 5,
            "info": false,
            "language": {
                'sSearch': 'Pesquisar agendas',
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguinte",
                    "sPrevious": "Anterior"
                },
            }
        });
        $(function() {
            $('#EditAgenda').on('show.bs.modal', function(event) {

                var button = $(event.relatedTarget);
                var code = button.data('code');
                var modal = $(this);
                var form = modal.find('#edit_form');
                form.attr('action', '{!! route('agenda.index') !!}' + '/' + code.id);
                modal.find('#id_edit').val(code.id);
                modal.find('#local_de_encontro_edit').val(code.local_de_encontro);
                modal.find('#nome_do_cliente_edit').val(code.nome_cliente);
                modal.find('#contacto_do_cliente_edit').val(code.contacto);
                modal.find('#imovel_id_edit').val(code.imovel_id);
console.log(code);
                modal.find('.corretor_id_edit').val(code.corretor_id);

                modal.find('#data_da_visita_edit').val(code.horario.split('T')[0]);
                $("#update_confirmed option").attr("selected", false);
                var confirmed = code.confirmed? "1" : "0";
                $('#update_confirmed option[value="'+ confirmed +'"]').attr("selected", "selected");
                $('#update_confirmed').selectric('refresh');
            });
        });
        $(function() {
            $('#DeleteAgenda').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var code = button.data('code');
                var modal = $(this);
                var form = modal.find('#delete_form');
                form.attr('action', '{!! route('agenda.index') !!}' + '/' + code.id);

            });
        });

        $(function() {
             $('selectric').selectric({
                ignore: []
             });
        });
    </script>
@endpush
