<div class="w-100">


    <form class="d-flex row justify-content-center" action="{{ route('posts.search') }}" method="POST" id="filterForm-mobile">
        <div class="col-sm-12 py-2">
            <span class="btn btn-outline-danger w-100" id="clearFormChoices">
                @svg('fluentui-filter-dismiss-16', 'fea icon-sm')
                Limpar</span>
        </div>
        <div class="col-sm-12">
            <button class="btn btn-outline-success w-100" type="submit">
                @svg('fluentui-arrow-sync-circle-24', 'fea icon-sm fw-bold')
                Pesquisar</button>
        </div>


        @csrf
        <input type="hidden" name="search" value="{{$search}}" readonly>
        <div class="col-sm-12 my-2">
            <select class="form-control w-100 form-select bairros-mobile m-0 mr-3 w-100 rounded-3 bg-white"
                aria-label="Default select example" multiple name="bairros[]"
                data-none-selected-text="Bairros"
                data-live-search="true"
                data-live-search-normalize="true"
                data-none-results-text="Nenhum bairro encontrado!"
                data-actions-box="true"
                data-width="auto"
                data-selected-text-format="count > 3"
                data-deselect-all-text="Clear"
                >
                 @foreach ($bairros as $bairro)
                    <option value="{{ $bairro->id }}" >{{ $bairro->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-12 my-2">
            <select class="form-control w-100 form-select tipos-mobile m-0 mr-3 w-100 rounded-3 bg-white"
                aria-label="Default select example" multiple name="tipo_de_imovels[]"
                data-none-selected-text="Tipo de imóvel"
                data-live-search="true"
                data-live-search-normalize="true"
                data-none-results-text="Nenhum tipo de imóvel encontrado!"
                data-actions-box="true"
                data-width="auto"
                data-selected-text-format="count > 3"
                data-deselect-all-text="Clear"

                >

                @foreach ($tipoDeImovels as $tipoDeImovel)
                    <option value="{{ $tipoDeImovel->id }}" >{{ $tipoDeImovel->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-12 my-2">
            <select class="form-control w-100 form-select condicao-mobile m-0 mr-3 w-100 rounded-3 bg-white"
                aria-label="Default select example" multiple name="condicaos[]"

                data-none-selected-text="Condição do imóvel"
                data-live-search="true"
                data-live-search-normalize="true"
                data-none-results-text="Nenhuma condição do imóvel encontrada!"
                data-actions-box="true"
                data-width="auto"
                data-selected-text-format="count > 3"
                data-deselect-all-text="Clear"

                >
                @foreach ($condicaos as $condicao)
                    <option value="{{ $condicao->id }}" >{{ $condicao->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-12 my-2">
            <select class="form-control w-100 form-select estado-mobile m-0 mr-3 w-100 rounded-3 bg-white"
                aria-label="Default select example" multiple name="estados[]"
                data-none-selected-text="Estado do imóvel"
                data-live-search="true"
                data-live-search-normalize="true"
                data-none-results-text="Nenhum estado de imóvel encontrado!"
                data-actions-box="true"
                data-width="auto"
                data-selected-text-format="count > 3"
                data-deselect-all-text="Clear"

                >
                @foreach ($estados as $estado)
                    <option value="{{ $estado->id }}">{{ $estado->nome }}</option>
                @endforeach
            </select>
        </div>
        <h6 class="text-muted mb-2 ">Preço</h6>
        <div class="col-sm-12 my-2">
            <input type="text" name="min_price" id="min_price-mobile"
                class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="(MZN) Preço Min">
            <small class="text-muted">No site : {{ number_format($precoMin, 2) }}</small>
        </div>
        <div class="col-sm-12 my-2">
            <input type="text" name="max_price" id="max_price-mobile"
                class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="(MZN) Preço Max">
            <small class="text-muted">No site :
                {{ number_format($precoMax, 2) }}</small>
        </div>

        <div class="col-sm-12 my-2">
            <select name="rent[]" multiple class="alugar-mobile"
            data-none-selected-text="Opções de negociação"
            data-live-search="true"
            data-live-search-normalize="true"
            data-none-results-text="Nenhuma opção encontrada!"
            data-actions-box="true"
            data-width="auto"
            data-selected-text-format="count > 3"
            data-deselect-all-text="Clear"
            >

                <option value="1" selected>Alugar</option>
                <option value="0" selected>Comprar</option>
            </select>
        </div>

        <h6 class="text-muted my-2">Caracteristicas</h6>

        <div class="w-100 m-0 p-0 pt-2 row justify-content-between ">
            <div class="col-sm-12 my-2">
                <input type="text" name="ano" id="ano-mobile"
                    class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="Ano">

            </div>
            <div class="col-sm-12 my-2">
                <input type="text" name="area" id="area-mobile"
                    class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="Área (m²)">
            </div>
            <div class="col-sm-12 my-2">
                <input type="text" name="quartos" id="quartos-mobile"
                    class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="Quartos">

            </div>
            <div class="col-sm-12 my-2">
                <input type="text" name="suites" id="suites-mobile"
                    class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="Suites">
            </div>
        </div>

        <div class="w-100 m-0 p-0 pt-2 row justify-content-between ">
            <div class="col-sm-12 my-2">
                <input type="text" name="banheiros" id="banheiros-mobile"
                    class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="Banheiros">

            </div>
            <div class="col-sm-12 my-2">
                <input type="text" name="piscinas" id="piscinas-mobile"
                    class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="Piscinas">
            </div>
            <div class="col-sm-12 my-2">
                <input type="text" name="garagens" id="garagens-mobile"
                    class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="Garagens">

            </div>
            <div class="col-sm-12 my-2 mb-3">
                <input type="text" name="andares" id="andares-mobile"
                    class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="Andares">
            </div>
        </div>

    </form>
</div>
