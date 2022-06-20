<div class="w-100">
    <form class="d-flex row" action="{{ route('search-posts') }}" method="POST">
        @csrf
        <div class="col-sm-2">
            <select class="form-control form-select bairros p-3 m-0 mx-3  w-100 rounded-3 bg-white"
                aria-label="Default select example" multiple name="bairros[]">
                <option placeholder class="bg-white">Bairros</option>
                @foreach ($bairros as $bairro)
                    <option value="{{ $bairro->id }}" class="text-truncate">{{ $bairro->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-2">
            <select class="form-control form-select tipos p-3 m-0 mx-3  w-100 rounded-3 bg-white"
                aria-label="Default select example" multiple name="tipo_de_imovels[]">
                <option placeholder class="bg-white">Tipo de Imóvel</option>
                @foreach ($tipoDeImovels as $tipoDeImovel)
                    <option value="{{ $tipoDeImovel->id }}" class="text-truncate">{{ $tipoDeImovel->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-2">
            <select class="form-control form-select condicao p-3 m-0 mx-3  w-100 rounded-3 bg-white"
                aria-label="Default select example" multiple name="condicaos[]">
                <option placeholder class="bg-white">Condição</option>
                @foreach ($condicaos as $condicao)
                    <option value="{{ $condicao->id }}" class="text-truncate">{{ $condicao->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-2">
            <select class="form-control form-select estado p-3 m-0 mx-3  w-100 rounded-3 bg-white"
                aria-label="Default select example" multiple name="estados[]">
                <option placeholder class="bg-white">Estado</option>
                @foreach ($estados as $estado)
<option value="{{$estado->id}}">{{$estado->nome}}</option>
                @endforeach
            </select>
        </div>
        <div class="dropdown col-sm-1">
            <button class="form-control dropdown-toggle p-2 text-start" type="text" placeholder="Filtro"
                aria-label="dropdown" id="filtro" data-bs-toggle="dropdown" aria-expanded="false"
                data-bs-auto-close="outside">
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

                    <div class="col-6">
                        <input type="text" name="min_price" id="min_price"
                            class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="(MZN) Preço Min">
                        <small class="text-muted">Menor preço no site :(MZN) {{number_format($precoMin,2)}}</small>
                    </div>
                    <div class="col-6">
                        <input type="text" name="max_price" id="max_price"
                            class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="(MZN) Preço Max">
                        <small class="text-muted">Maior preço no site :(MZN)  {{number_format($precoMax,2)}}</small>
                    </div>
                    <h6 class="text-muted my-2">Caracteristicas</h6>

                    <div class="w-100 m-0 p-0 pt-2 row justify-content-between ">
                        <div class="col-3">
                            <input type="text" name="" id="ano"
                                class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="Ano">

                        </div>
                        <div class="col-3">
                            <input type="text" name="" id="area"
                                class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="Área (m²)">
                        </div>
                        <div class="col-3">
                            <input type="text" name="" id="quartos"
                                class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="Quartos">

                        </div>
                        <div class="col-3">
                            <input type="text" name="" id="suites"
                                class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="Suites">
                        </div>
                    </div>

                    <div class="w-100 m-0 p-0 pt-2 row justify-content-between ">
                        <div class="col-3">
                            <input type="text" name="" id="banheiros"
                                class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="Banheiros">

                        </div>
                        <div class="col-3">
                            <input type="text" name="" id="piscinas"
                                class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="Piscinas">
                        </div>
                        <div class="col-3">
                            <input type="text" name="" id="garagens"
                                class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="Garagens">

                        </div>
                        <div class="col-3 mb-3">
                            <input type="text" name="" id="andares"
                                class="form-control  bg-white p-2 rounded-3 bg-light w-100" placeholder="Andares">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">

            <button class="btn btn-outline-success" type="submit">
                @svg('fluentui-arrow-sync-circle-24', 'fea icon-sm fw-bold')
                Pesquisar</button>
                <span class="btn btn-outline-danger" id="clearFormChoices">
                    @svg('fluentui-filter-dismiss-16', 'fea icon-sm')
                    Limpar Filtros</span>
        </div>
    </form>
</div>
