@extends('layouts.backend.dashboard')

@section('content')

            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        <h4>Basic DataTables</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped v_center" id="table-1">
                                    <thead>
                                        <tr>
                                        <th class="text-center">
                                            <i class="fas fa-th"></i>
                                        </th>
                                        <th>Task Name</th>
                                        <th>Progress</th>
                                        <th>Members</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td>
                                            <i class="fas fa-th"></i>
                                        </td>
                                        <td>Create a mobile app</td>
                                        <td class="align-middle">
                                            <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                                            <div class="progress-bar bg-success" data-width="100%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                                        </td>
                                        <td>2018-01-20</td>
                                        <td><div class="badge badge-success">Completed</div></td>
                                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                        </tr>
                                        <tr>
                                        <td>
                                            <i class="fas fa-th"></i>
                                        </td>
                                        <td>Redesign homepage</td>
                                        <td class="align-middle">
                                            <div class="progress" data-height="4" data-toggle="tooltip" title="0%">
                                            <div class="progress-bar" data-width="0"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Nur Alpiana">
                                            <img alt="image" src="assets/img/avatar/avatar-3.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Hariono Yusup">
                                            <img alt="image" src="assets/img/avatar/avatar-4.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Bagus Dwi Cahya">
                                        </td>
                                        <td>2018-04-10</td>
                                        <td><div class="badge badge-info">Todo</div></td>
                                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                        </tr>
                                        <tr>
                                        <td>
                                            <i class="fas fa-th"></i>
                                        </td>
                                        <td>Backup database</td>
                                        <td class="align-middle">
                                            <div class="progress" data-height="4" data-toggle="tooltip" title="70%">
                                            <div class="progress-bar bg-warning" data-width="70%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Debra Stewart">
                                            <img alt="image" src="assets/img/avatar/avatar-2.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Susie Willis">
                                        </td>
                                        <td>2018-01-29</td>
                                        <td><div class="badge badge-warning">In Progress</div></td>
                                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                        </tr>
                                        <tr>
                                        <td>
                                            <i class="fas fa-th"></i>
                                        </td>
                                        <td>Input data</td>
                                        <td class="align-middle">
                                            <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                                            <div class="progress-bar bg-success" data-width="100%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <img alt="image" src="assets/img/avatar/avatar-2.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Debra Stewart">
                                            <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Isnap Kiswandi">
                                            <img alt="image" src="assets/img/avatar/avatar-4.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Yudi Nawawi">
                                            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Khaerul Anwar">
                                        </td>
                                        <td>2018-01-16</td>
                                        <td><div class="badge badge-success">Completed</div></td>
                                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                        </tr>
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
<script src="{{ asset('backend/js/modules-datatables.js') }}"></script>
@endpush
