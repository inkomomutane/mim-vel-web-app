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
                <div class="card-body">
                    <div class="form-group row mb-4">
                        <div class="col-sm-6">
                            <label class="col-form-label text-md-left col-sm-12">Título do imóvel no site</label>
                            <div class="col-sm-12">
                                <input type="text" name="titulo" id="titulo" class="form-control"
                                    placeholder="Título do imóvel no site" @if (\Route::current()->getName() == 'imovel.edit') value = "{{ $imovel->titulo }}" @endif>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label text-md-left col-sm-12">Tipo de imóvel</label>
                            <div class="col-sm-12 col-md-12">
                                <select class="form-control selectric" name="tipo_de_imovel_id" id="tipo_de_imovel_id">
                                    @foreach ($tipoDeImoveis as $tipoDeImovel)
                                        <option value="{{ $tipoDeImovel->id }}" @if (\Route::current()->getName() == 'imovel.edit' && $imovel->tipo_de_imovel_id == $tipoDeImovel->id) selected @endif>{{ $tipoDeImovel->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="form-group row mb-4">
                        <div class="col-sm-4">
                            <label class="col-form-label text-md-left col-sm-12">Cidade</label>
                            <div class="col-sm-12 col-md-12">
                                <select class="form-control selectric" name="cidade_id" id="cidade_id">
                                    @foreach ($cidades as $cidade)
                                        <option value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label text-md-left col-sm-12">Bairro</label>
                            <div class="col-sm-12 col-md-12">
                                <select class="form-control selectric" name="bairro_id" id="bairro_id">
                                    @foreach ($bairros as $barro)
                                        <option value="{{ $barro->id }}">{{ $barro->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label text-md-left col-sm-12">Endereço</label>
                            <div class="col-sm-12 col-md-12">
                                <input type="text" name="endereco" id="endereco" class="form-control"
                                    placeholder="Endereço">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <div class="col-sm-3">
                            <label class="col-form-label text-md-left col-sm-12">Preço </label>
                            <div class="col-sm-12">
                                <input type="text" name="preco" id="preco" class="form-control" placeholder="Preço (MZN)">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="col-form-label text-md-left col-sm-12">Ano (Data) </label>
                            <div class="col-sm-12">
                                <input type="date" name="ano" id="ano" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="col-form-label text-md-left col-sm-12">Andares</label>
                            <div class="col-sm-12">
                                <input type="text" name="andar" id="andar" class="form-control" placeholder="0">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="col-form-label text-md-left col-sm-12">Status</label>
                            <div class="col-sm-12">
                                <select name="status_id" id="status_id" class="form-control selectric">
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <div class="col-sm-2">
                            <label class="col-form-label text-md-left col-sm-12">Area (m²)</label>
                            <div class="col-sm-12">
                                <input type="text" name="area" id="area" class="form-control" placeholder="0 m²">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label class="col-form-label text-md-left col-sm-12">Quartos </label>
                            <div class="col-sm-12">
                                <input type="text" name="quartos" id="quartos" class="form-control" placeholder="0">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label class="col-form-label text-md-left col-sm-12">Banheiros</label>
                            <div class="col-sm-12">
                                <input type="text" name="banheiros" id="banheiros" class="form-control" placeholder="0">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label class="col-form-label text-md-left col-sm-12">Piscinas</label>
                            <div class="col-sm-12">
                                <input type="text" name="piscinas" id="piscinas" class="form-control" placeholder="0">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label class="col-form-label text-md-left col-sm-12">Garagens</label>
                            <div class="col-sm-12">
                                <input type="text" name="garagens" id="garagens" class="form-control" placeholder="0">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label class="col-form-label text-md-left col-sm-12">Suítes</label>
                            <div class="col-sm-12">
                                <input type="text" name="suites" id="suites" class="form-control" placeholder="0">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <div class="col-sm-12">
                            <label class="col-form-label text-md-left col-sm-12">Descrição</label>
                            <div class="col-sm-12 ">
                                <textarea class="summernote-simple form-control bg-light" name="descricao"
                                    id="descricao"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12">
                            <button class="btn btn-success right">Registar</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('backend/jquery-selectric/selectric.css') }}">
@endpush
@push('cssLibs')
    <link rel="stylesheet" href="{{ asset('backend/summernote/summernote-bs4.css') }}">
@endpush
@push('jsLibs')
    <script src="{{ asset('backend/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('backend/jquery-selectric/jquery.selectric.min.js') }}"></script>
@endpush
@push('js')
@endpush
