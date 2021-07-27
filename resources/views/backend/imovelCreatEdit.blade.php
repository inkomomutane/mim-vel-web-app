@extends('layouts.backend.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <section class="section">
                <div class="section-header">
                    <div class="section-header-back">
                        <a href="{{ URL::previous() }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    @if (\Route::current()->getName() == 'imovel.edit')
                        <h1>Editar imóvel <code>{{ $imovel->titulo }}</code></h1>
                    @else
                        <h1>Adicionar um imóvel</h1>
                    @endif
                </div>
            </section>
            <div class="card">
                <div class="card-header">
                    <h4>Imóvel</h4>
                </div>
                @include('backend.imovel_partials.form')
            </div>
        </div>
    </div>
    </div>
@endsection
@include('backend.imovel_partials.assets_push')
@section('modals')
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg w-100" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crop Image Before Upload</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row container">
                            <div class="col-md-12">
                                <img src="" id="sample_image" height="420px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="crop" class="btn btn-primary">Crop</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection
