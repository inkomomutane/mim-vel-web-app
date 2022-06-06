@extends('backend.layouts.app')

@section('content')
<div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
        <h3><strong>Mimóvel</strong> Dashboard</h3>
    </div>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible show fade" role="alert" style="border-left: 5px solid darkgreen;">
        <div class="alert-body">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>{{ session('success') }}</strong>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible show fade" role="alert" style="border-left: 5px solid rgb(204, 7, 40);">
        <div class="alert-body">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>{{ session('error') }}</strong>
        </div>
    </div>
@endif
    <div class="col-auto ms-auto text-end mt-n1">
        <a href="{{ route('backup.create') }}" class="btn btn-primary">
            @svg('fluentui-history-16','feather') realizar backup </a>
    </div>
</div>
@endsection
