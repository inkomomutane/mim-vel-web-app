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
                <button class="close" data-dismiss="alert"><span>×</span></button>
                @error('name')
                    <strong>{{ $message }}</strong><br>
                @enderror

                @error('password')
                    <strong>{{ $message }}</strong><br>
                @enderror
                @error('email')
                    <strong>{{ $message }}</strong><br>
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
                    <h4>Tabela de usuários</h4>
                    <div class="card-header-action">
                        <button class="btn btn-info" data-toggle="modal" data-target="#novoUser"><i
                                class="fas fa-plus"></i><span> Novo usuário</span></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped v_center" id="users">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        <i class="fas fa-th"></i>
                                    </th>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Editar</th>
                                    <th>Delatar</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td><i class="fas fa-th"></i></td>
                                        <td>{{ ucfirst($user->id) }}</td>
                                        <td>{{ ucfirst($user->name) }}</td>
                                        <td><button class="btn btn-secondary" data-toggle="modal" data-target="#EditUser"
                                                data-code="{{ ucfirst($user) }}"><i class="fa fa-edit"></i></button>
                                        </td>
                                        <td><a href="#" class="btn btn-danger" data-toggle="modal"
                                                data-target="#DeleteUser" data-code="{{ ucfirst($user) }}"><i
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
    <div class="modal fade" tabindex="-1" role="dialog" id="novoUser">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Novo usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="container form-group row">
                          <div class="col-md-12">
                                <input id="nome" type="text" class="form-control" name="name"
                                    placeholder="Digite nome do usuário" required autocomplete="name" autofocus value="{{ old('name') }}">
                            </div>
                            <div class="py-2 col-md-12">
                                <input id="email" type="email" class="form-control" name="email"
                                    placeholder="Digite o email do usuário" required autocomplete="email" autofocus value="{{ old('email') }}">
                            </div>
                            <div class="py-2 col-md-12">
                                <input id="password" type="password" class="form-control" name="password"
                                    placeholder="Digite o password do usuário" required autocomplete="new-password" autofocus>
                            </div>
                            <div class="py-2 col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                    placeholder="Confirme o password do usuário" required autocomplete="new-password" autofocus>
                            </div>

                            <div class="py-2 col-md-12">
                                <label for="roles">Permissões</label>
                                <select name="roles" id="create_roles" class="form-control">
                                    @foreach ($roles as $role)
                                        <option value="{{$role->name}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
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

    <div class="modal fade" tabindex="-1" role="dialog" id="EditUser">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('user.index') }}" method="post" id="edit_form">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="container form-group row">
                            <div class="col-md-4">
                                <input id="id_edit" type="text" class="form-control" name="id" placeholder="Digite Id"
                                    required autocomplete="id" autofocus disabled>
                            </div>
                            <div class="py-2 col-md-12">
                                <input id="nome_edit" type="text" class="form-control" name="name"
                                    placeholder="Digite nome do usuário" required autocomplete="name" autofocus>
                            </div>
                            <div class="py-2 col-md-12">
                                <input id="email_edit" type="email" class="form-control" name="email"
                                    placeholder="Digite o email do usuário" required autocomplete="email" autofocus value="{{ old('email') }}">
                            </div>
                            <div class="py-2 col-md-12">
                                <input id="password_edit" type="password" class="form-control" name="password"
                                    placeholder="Digite o password do usuário"  autocomplete="new-password" autofocus>
                            </div>
                            <div class="py-2 col-md-12">
                                <input id="password-confirm_edit" type="password" class="form-control" name="password_confirmation"
                                    placeholder="Confirme o password do usuário"  autocomplete="new-password" autofocus>
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
    <div class="modal fade" tabindex="-1" role="dialog" id="DeleteUser">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Deletar usuário</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('user.index') }}" method="post" id="delete_form">
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
@endpush
@push('cssLibs')
    <link rel="stylesheet" href="{{ asset('backend/prism/prism.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/cropper/cropper.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/jquery-selectric/selectric.css') }}">
@endpush
@push('jsLibs')
    <script src="{{ asset('backend/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('backend/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('backend/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('backend/prism/prism.js') }}"></script>
    <script src="{{ asset('backend/cropper/cropper.js') }}"></script>
    <script src="{{ asset('backend/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/jquery-selectric/jquery.selectric.min.js') }}"></script>

@endpush
@push('js')
    <script>
        $("#users").dataTable({
            "lengthChange": false,
            "pageLength": 5,
            "info": false,
            "language": {
                'sSearch': 'Pesquisar usuários',
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguinte",
                    "sPrevious": "Anterior"
                },
            }
        });
        $(function() {
            $('#EditUser').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var code = button.data('code');
                var modal = $(this);
                var form = modal.find('#edit_form');
                form.attr('action', '{!! route('user.index') !!}' + '/' + code.id);
                modal.find('#id_edit').val(code.id);
                modal.find('#nome_edit').val(code.name);
                modal.find('#email_edit').val(code.email);
            });
        });
        $(function() {
            $('#DeleteUser').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var code = button.data('code');
                var modal = $(this);
                var form = modal.find('#delete_form');
                form.attr('action', '{!! route('user.index') !!}' + '/' + code.id);
            });
        });
        $(function(){
          // $('select').selectric();
        });
    </script>
@endpush
