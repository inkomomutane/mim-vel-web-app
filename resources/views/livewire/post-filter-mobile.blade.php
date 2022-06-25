<div class="w-100">


    <form class="d-flex row" action="{{ route('posts.search') }}" method="POST" id="filterForm-mobile">
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
            <select class="form-control form-select bairros-mobile p-3 m-0 mx-3  w-100 rounded-3 bg-white"
                aria-label="Default select example" multiple name="bairros[]">
                <option placeholder class="bg-white">Bairros</option>
                @foreach ($bairros as $bairro)
                    <option value="{{ $bairro->id }}" class="text-truncate">{{ $bairro->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-12 my-2">
            <select class="form-control form-select tipos-mobile p-3 m-0 mx-3  w-100 rounded-3 bg-white"
                aria-label="Default select example" multiple name="tipo_de_imovels[]">
                <option placeholder class="bg-white">Tipo de Imóvel</option>
                @foreach ($tipoDeImovels as $tipoDeImovel)
                    <option value="{{ $tipoDeImovel->id }}" class="text-truncate">{{ $tipoDeImovel->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-12 my-2">
            <select class="form-control form-select condicao-mobile p-3 m-0 mx-3  w-100 rounded-3 bg-white"
                aria-label="Default select example" multiple name="condicaos[]">
                <option placeholder class="bg-white">Condição</option>
                @foreach ($condicaos as $condicao)
                    <option value="{{ $condicao->id }}" class="text-truncate">{{ $condicao->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-12 my-2">
            <select class="form-control form-select estado-mobile p-3 m-0 mx-3  w-100 rounded-3 bg-white"
                aria-label="Default select example" multiple name="estados[]">
                <option placeholder class="bg-white">Estado</option>
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
            <select name="rent[]" multiple class="alugar-mobile">
                <option placeholder>Alugar ou comprar</option>
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
