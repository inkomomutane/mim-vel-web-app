<div class="w-100">
    <form class="d-flex row" action="{{ route('posts.search') }}" method="GET" id="filterForm">
        @csrf

        <div class="col-sm-2">
            <input type="text" name="search_term" id="search_term" value="{{ Str::ucfirst(( (object) request()->session()->get('filter_posts'))->search_term ?? '' )}}"
            class="form-control text-dark fs-7 fw-bolder bg-white p-2 rounded-3 bg-light w-100" placeholder="Pesquisar ...">
        </div>
        <div class="col-sm-2">
            <select class="form-control w-100" multiple name="bairros[]" data-none-selected-text="Bairros"
                data-live-search="true" data-live-search-normalize="true"
                data-none-results-text="Nunhum bairro foi encontrado!" data-actions-box="true" data-width="auto"
                data-selected-text-format="count > 3" data-deselect-all-text="Clear">
                @foreach ($bairros as $bairro)
                    <option value="{{ $bairro->id }}" @if (
                    in_array($bairro->id,((object) request()->session()->get('filter_posts'))->bairros ?? [])) selected
                        @endif>
                        {{ $bairro->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-2">
            <select class="form-control w-100" aria-label="Default select example" multiple name="tipo_de_imovels[]"
                data-none-selected-text="Tipo de imóvel" data-live-search="true" data-live-search-normalize="true"
                data-none-results-text="Nunhum tipo de imóvel foi encontrado!" data-actions-box="true" data-width="auto"
                data-size="auto" data-selected-text-format="count > 3" data-deselect-all-text="Clear">
                @foreach ($tipoDeImovels as $tipoDeImovel)
                    <option value="{{ $tipoDeImovel->id }}" @if (
                        in_array($tipoDeImovel->id,((object) request()->session()->get('filter_posts'))->tipo_de_imovels ?? [])) selected
                            @endif >{{ $tipoDeImovel->nome }}</option>
                @endforeach
            </select>

        </div>
        <div class="col-sm-2">
            <select class="form-control w-100" data-width="auto" aria-label="Default select example" multiple
                name="condicaos[]" data-none-selected-text="Condição do imóvel" data-live-search="true"
                data-live-search-normalize="true" data-none-results-text="Nunhuma condição de imóvel foi encontrada!"
                data-actions-box="true" data-width="800" data-size="auto" data-selected-text-format="count > 3"
                data-deselect-all-text="Clear">

                @foreach ($condicaos as $condicao)
                    <option value="{{ $condicao->id }}"  @if (
                        in_array($condicao->id,((object) request()->session()->get('filter_posts'))->condicaos ?? [])) selected
                            @endif >{{ $condicao->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-2">
            <select class="form-control w-100" aria-label="Default select example" multiple name="estados[]"
                data-none-selected-text="Estado do imóvel" data-live-search="true" data-live-search-normalize="true"
                data-none-results-text="Nunhum estado de imóvel foi encontrada!" data-actions-box="true"
                data-width="800" data-selected-text-format="count > 3" data-deselect-all-text="Clear">
                @foreach ($estados as $estado)
                    <option value="{{ $estado->id }}" @if (
                        in_array($estado->id,((object) request()->session()->get('filter_posts'))->estados ?? [])) selected
                            @endif>{{ $estado->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="dropdown col-sm-1">
            <button class="dropdown-toggle p-2 text-start btn btn-light btn-outline-light" type="button"
                placeholder="Filtro" aria-label="dropdown" id="filtro" data-bs-toggle="dropdown"
                aria-expanded="false" data-bs-auto-close="outside">
                + Filtros
            </button>

            <div class="dropdown-menu p-2 shadow-md border-0 dropdown-menu-start dropdown-menu-lg-end"
                aria-labelledby="filtro" style="width: 700px">
                <div class="row p-3 m-2">
                    <div class="row w-100 p-0 m-0 mb-2 justify-content-between">
                        <div class="col-3">
                            <h6 class="text-muted mb-2 ">Preço</h6>
                        </div>
                        <div class="col-3">

                        </div>
                    </div>

                    <div class="col-4">
                        <input type="text" name="min_price" id="min_price"
                            class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="(MZN) Preço Min">
                        <small class="text-muted">No site : {{ number_format($precoMin, 2) }}</small>
                    </div>
                    <div class="col-4">
                        <input type="text" name="max_price" id="max_price"
                            class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="(MZN) Preço Max">
                        <small class="text-muted">No site :
                            {{ number_format($precoMax, 2) }}</small>
                    </div>
                    <div class="col-4">
                        <select name="rent[]" multiple class="alugar" data-none-selected-text="Opções de negociação"
                            data-live-search="true" data-live-search-normalize="true"
                            data-none-results-text="Nenhuma opção encontrada!" data-actions-box="true"
                            data-width="auto" data-selected-text-format="count > 3" data-deselect-all-text="Clear">
                            <option value="1" selected>Alugar</option>
                            <option value="0" selected>Comprar</option>
                        </select>
                    </div>
                    <h6 class="text-muted my-2">Caracteristicas</h6>

                    <div class="w-100 m-0 p-0 pt-2 row justify-content-between ">
                        <div class="col-3">
                            <input type="text" name="ano" id="ano"
                                class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="Ano">

                        </div>
                        <div class="col-3">
                            <input type="text" name="area" id="area"
                                class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="Área (m²)">
                        </div>
                        <div class="col-3">
                            <input type="text" name="quartos" id="quartos"
                                class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="Quartos">

                        </div>
                        <div class="col-3">
                            <input type="text" name="suites" id="suites"
                                class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="Suites">
                        </div>
                    </div>

                    <div class="w-100 m-0 p-0 pt-2 row justify-content-between ">
                        <div class="col-3">
                            <input type="text" name="banheiros" id="banheiros"
                                class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="Banheiros">

                        </div>
                        <div class="col-3">
                            <input type="text" name="piscinas" id="piscinas"
                                class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="Piscinas">
                        </div>
                        <div class="col-3">
                            <input type="text" name="garagens" id="garagens"
                                class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="Garagens">

                        </div>
                        <div class="col-3 mb-3">
                            <input type="text" name="andares" id="andares"
                                class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="Andares">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-1 row p-0 m-0">
            <div class="col-8">
                <button class="btn btn-outline-success p-2 px-4" type="submit">
                    @svg('fluentui-search-12', 'fea icon-sm fw-bold')</button>
            </div>
            <div class="col-4">
                <button class="btn btn-outline-danger p-2"  type="button" onclick="clearPostsFilters()" >@svg('gmdi-filter-alt-off-tt', 'fea icon-sm fw-bold')</button>
            </div>


        </div>
    </form>
</div>
