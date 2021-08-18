<form action="
                @if (\Route::current()->getName() == 'imovel.edit') {{ route('imovel.update', $imovel->id) }}
@else
    {{ route('imovel.store') }} @endif
    " method="post" id="createImovel">

    @if (\Route::current()->getName() == 'imovel.edit')
        @method('PATCH')
    @else
        @method('POST')
    @endif
    @csrf
    <div class="card-body">
        <div class="form-group row mb-4">
            <div class="col-sm-6">
                <label class="col-form-label text-md-left col-sm-12">Título do imóvel no site</label>
                <div class="col-sm-12">
                    <input type="text" name="titulo" id="titulo" class="form-control"
                        placeholder="Título do imóvel no site" @if (\Route::current()->getName() == 'imovel.edit') value = "{{ $imovel->titulo }}" @endif required autofocus>
                </div>
            </div>
            <div class="col-sm-6">
                <label class="col-form-label text-md-left col-sm-12">Tipo de imóvel</label>
                <div class="col-sm-12 col-md-12">
                    <select class="form-control selectric" name="tipo_de_imovel_id" id="tipo_de_imovel_id">
                        <option disabled> </option>
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
                            <option value="{{ $cidade->id }}" @if (\Route::current()->getName() == 'imovel.edit' && $imovel->cidade_id == $cidade->id) selected @endif>{{ $cidade->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <label class="col-form-label text-md-left col-sm-12">Bairro</label>
                <div class="col-sm-12 col-md-12">
                    <select class="form-control selectric" name="bairro_id" id="bairro_id">
                        <option disabled = "true" hidden></option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <label class="col-form-label text-md-left col-sm-12">Endereço</label>
                <div class="col-sm-12 col-md-12">
                    <input type="text" name="endereco" id="endereco" class="form-control" placeholder="Endereço" @if (\Route::current()->getName() == 'imovel.edit') value = '{{ $imovel->endereco }}' @endif>
                </div>
            </div>
        </div>
        <div class="form-group row mb-4">
            <div class="col-sm-3">
                <label class="col-form-label text-md-left col-sm-12">Preço </label>
                <div class="col-sm-12">
                    <input type="text" name="preco" id="preco" class="form-control" placeholder="Preço (MZN)" @if (\Route::current()->getName() == 'imovel.edit') value = '{{ $imovel->preco }}' @endif>
                </div>
            </div>
            <div class="col-sm-3">
                <label class="col-form-label text-md-left col-sm-12">Ano (Data) </label>
                <div class="col-sm-12">
                    <input type="date" name="ano" id="ano" class="form-control" @if (\Route::current()->getName() == 'imovel.edit' && $imovel->ano) value = '{{ date_format($imovel->ano, 'Y-m-d') }}' @endif>
                </div>
            </div>
            <div class="col-sm-3">
                <label class="col-form-label text-md-left col-sm-12">Andares</label>
                <div class="col-sm-12">
                    <input type="text" name="andar" id="andar" class="form-control" placeholder="0" @if (\Route::current()->getName() == 'imovel.edit') value = '{{ $imovel->andar }}' @endif>
                </div>
            </div>
            <div class="col-sm-3">
                <label class="col-form-label text-md-left col-sm-12">Status</label>
                <div class="col-sm-12">
                    <select name="status_id" id="status_id" class="form-control selectric">
                        @foreach ($statuses as $status)
                            <option value="{{ $status->id }}" @if (\Route::current()->getName() == 'imovel.edit' && $imovel->status_id == $status->id) selected @endif>{{ $status->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group row mb-4">
            <div class="col-sm-2">
                <label class="col-form-label text-md-left col-sm-12">Area (m²)</label>
                <div class="col-sm-12">
                    <input type="text" name="area" id="area" class="form-control" placeholder="0 m²" @if (\Route::current()->getName() == 'imovel.edit') value = '{{ $imovel->area }}' @endif>
                </div>
            </div>
            <div class="col-sm-2">
                <label class="col-form-label text-md-left col-sm-12">Quartos </label>
                <div class="col-sm-12">
                    <input type="text" name="quartos" id="quartos" class="form-control" placeholder="0" @if (\Route::current()->getName() == 'imovel.edit') value = '{{ $imovel->quartos }}' @endif>
                </div>
            </div>
            <div class="col-sm-2">
                <label class="col-form-label text-md-left col-sm-12">Banheiros</label>
                <div class="col-sm-12">
                    <input type="text" name="banheiros" id="banheiros" class="form-control" placeholder="0" @if (\Route::current()->getName() == 'imovel.edit') value = '{{ $imovel->banheiros }}' @endif>
                </div>
            </div>
            <div class="col-sm-2">
                <label class="col-form-label text-md-left col-sm-12">Piscinas</label>
                <div class="col-sm-12">
                    <input type="text" name="piscinas" id="piscinas" class="form-control" placeholder="0" @if (\Route::current()->getName() == 'imovel.edit') value = '{{ $imovel->piscinas }}' @endif>
                </div>
            </div>
            <div class="col-sm-2">
                <label class="col-form-label text-md-left col-sm-12">Garagens</label>
                <div class="col-sm-12">
                    <input type="text" name="garagens" id="garagens" class="form-control" placeholder="0" @if (\Route::current()->getName() == 'imovel.edit') value = '{{ $imovel->garagens }}' @endif>
                </div>
            </div>
            <div class="col-sm-2">
                <label class="col-form-label text-md-left col-sm-12">Suítes</label>
                <div class="col-sm-12">
                    <input type="text" name="suites" id="suites" class="form-control" placeholder="0" @if (\Route::current()->getName() == 'imovel.edit') value = '{{ $imovel->suites }}' @endif>
                </div>
            </div>
        </div>
        <div class="form-group row mb-4">
            <div class="col-sm-12">
                <div class="section-title">Mapa da localização do imóvel</div>
                <div class="col-sm-12">
                <textarea name="mapa" class="form-control" style="height: 200px" placeholder="Por favor insira o Embeded do mapa (<iframe>...</iframe>)"
                >@if (\Route::current()->getName() == 'imovel.edit'){{ $imovel->mapa }}@endif</textarea>
                </div>
            </div>
        </div>

        <div class="form-group row mb-4">
            <div class="col-sm-12">
                <div class="section-title">Descrição</div>
                <div class="col-sm-12 ">
                    <textarea class="summernote-simple form-control bg-light" name="descricao" id="descricao"> @if (\Route::current()->getName() == 'imovel.edit')
                                    {{ $imovel->descricao }}
                                @endif</textarea>
                </div>
            </div>
        </div>
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
            <div class="col-sm-12">
                <input type="submit" class="btn btn-success right" value="Registar">
            </div>
        </div>
</form>
