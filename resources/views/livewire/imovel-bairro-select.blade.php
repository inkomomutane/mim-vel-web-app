<div>
    <div class="row justify-content-between my-3">
        <div class="col-sm-4">
            <label>Provincia</label>
            <select class="form-control form-select" wire:model='provinceId'>
                <option disabled></option>
                @foreach ($provinces as $provincia)
                    <option value="{{ $provincia->id }}" >{{ $provincia->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-sm-4">
            <label for="name">Cidade</label>
            <select class="form-control form-select" wire:model='cidadeId'  @if (is_null($cidades)) disabled @endif>
                @if (!is_null($cidades))
                <option disabled></option>
                    @foreach ($cidades as $cidade)
                        <option value="{{ $cidade->id }}" >{{ $cidade->nome }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="col-sm-4">
            <label for="name">Bairro</label>
            <select class="form-control form-select" wire:model='bairroId' name="bairro_id"  @if (is_null($bairros)) disabled @endif>
                @if (!is_null($bairros))
                    <option disabled></option>
                    @foreach ($bairros as $bairro)
                        <option value="{{ $bairro->id }}" >{{ $bairro->nome }}</option>
                    @endforeach
                @endif
            </select>
        </div>


    </div>
</div>
