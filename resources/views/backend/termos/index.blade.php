@extends('backend.layouts.app')
@section('title', 'Editar Termos e condições')
@section('content')
    <div class="container">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible show fade" role="alert"
                style="border-left: 5px solid darkgreen;">
                <div class="alert-body">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ session('success') }}</strong>
                </div>
            </div>
        @endif


        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <a href="{{ URL::previous() }}" class="col-auto btn btn-info">
                            <i class="align-middle" data-feather="corner-up-left"></i>&nbsp; Voltar
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible " role="alert"
                                style="border-left: 5px solid darkred;">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <div class="alert-message">
                                    <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li><i class="align-middle" data-feather="alert-triangle"></i> &nbsp;
                                                <strong>{{ $error }}</strong>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        <div class="container row">
                            <form action="{{ route('termos.update') }}" method="post">
                                @method('PATCH')
                                @csrf
                                <div class="row justify-content-between mb-3">
                                    <div class="col-12">
                                      <div class="row my-3  p-0 m-0 justify-content-between">
                                        <label for="termos" class="col">Editar termos e Conições</label>
                                        <input type="submit" class="btn btn-primary rounded-3 col-auto" value="Actualizar termos">
                                      </div>
                                        <textarea name="termos" type="text" class="fcol-12 w-100 " placeholder="Editar termos e Conições" autofocus
                                            autocomplete="" required id="editor">
                                        @if (old('termos')){!! old('termos') !!}
                                        @elseif(request()->routeIs('termos.index'))
                                        {!! $termo->termos !!}
                                        @endif
                                    </textarea>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script>
            document.addEventListener("DOMContentLoaded", function() {
     window.ClassicEditor.create(document.querySelector('#editor'));});
</script>
@endpush
