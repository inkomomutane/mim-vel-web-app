<div class="w-100">
    <form class="d-flex row">
        <div class="col-sm-2">
            <select class="form-control form-select choices p-3 m-0 mx-3  w-100 rounded-3 bg-white"
                aria-label="Default select example" multiple>
                <option placeholder class="bg-white">Bairros</option>
                <option>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>

        <div class="col-sm-2">
            <select class="form-control form-select bairros p-3 m-0 mx-3  w-100 rounded-3 bg-white"
                aria-label="Default select example" multiple>
                <option placeholder class="bg-white">Tipo de Imóvel</option>
                <option>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="col-sm-2">
            <select class="form-control form-select condicao p-3 m-0 mx-3  w-100 rounded-3 bg-white"
                aria-label="Default select example" multiple>
                <option placeholder class="bg-white">Condicao</option>
                <option>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>

        <div class="col-sm-2">
            <select class="form-control form-select estado p-3 m-0 mx-3  w-100 rounded-3 bg-white"
                aria-label="Default select example" multiple>
                <option placeholder class="bg-white">Estado</option>
                <option>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>

        <div class="dropdown col-sm-2">
            <button class="form-control dropdown-toggle p-2 text-start" type="text" placeholder="Filtro"
                aria-label="Search" id="filtro" data-bs-toggle="dropdown" aria-expanded="false"
                data-bs-auto-close="outside">
                @svg('fluentui-filter-16', 'fea icon-sm mx-3')
                Mais filtros
            </button>

            <div class="dropdown-menu p-2 shadow-md border-0 dropdown-menu-start dropdown-menu-lg-end"
                aria-labelledby="filtro">
                <div class="dropdown  m-2">
                    <div class="btn-group dropstart w-100 m-0 p-0">
                        <a class="dropdown-item dropdown-toggle rounded-3 p-2  droped" href="#"
                            id="dropdown-layouts" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            data-bs-auto-close="outside">Preço</a>
                        <div class="dropdown-menu mx-3 p-3 shadow-md  border-0 " aria-labelledby="dropdown-layouts">
                            <label for="">Preço Minimo</label>
                            <input type="text" name="" id="" class="form-control dropdown-ite bg-white p-2 rounded-3 bg-light w-100" placeholder="(MZN) Preço Min"> 
                            <label for="">Preço Máximo</label>
                            <input type="text" name="" id="" class="form-control dropdown-ite bg-white p-2 rounded-3 bg-light w-100" placeholder="(MZN) Preço Max"> 
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item rounded-3 p-2" href="#">Something else here</a>
            </div>
        </div>

        <div class="col-sm-2">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </div>
    </form>
</div>
{{-- file:///C:/Users/USER/Downloads/landrickhtml-311/landrickhtml-311/Landrick_v3.1.1/HTML/account-profile.html --}}
