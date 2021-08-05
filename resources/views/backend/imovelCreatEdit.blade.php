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

