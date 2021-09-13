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
                @error('nome')
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
                <h4>Sore Mimóvel</h4>
            </div>
            <div class="card-body">

                <form action="{{ route('sobre.update') }}" method="post">
                    @csrf

                <div class="form-group row mb-4">
                    <div class="col-sm-12 col-md-12">
                        <textarea class="summernote" name="sobre_nos">
                            {{$sobre}}
                        </textarea>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-12 ">
                        <button class="btn btn-primary float-right">Publicar</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset('backend/summernote/summernote-bs4.css') }}">
@endpush
@push('js')
<script src="{{ asset('backend/summernote/summernote-bs4.js') }}"></script>
@endpush
