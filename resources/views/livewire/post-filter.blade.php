<div class="w-100">
    <form class="d-flex row">
        <div class="col-sm-2">
            <select class="form-control form-select choices p-3 m-0 mx-3  w-100 rounded-3 bg-white" aria-label="Default select example" multiple>
                <option placeholder class="bg-white">Bairros</option>
                <option >Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
           </div>
           
           <div class="col-sm-2">
            <select class="form-control form-select bairros p-3 m-0 mx-3  w-100 rounded-3 bg-white" aria-label="Default select example" multiple>
                <option placeholder class="bg-white">Tipo de Imóvel</option>
                <option >Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
           </div>
           <div class="col-sm-2">
            <select class="form-control form-select condicao p-3 m-0 mx-3  w-100 rounded-3 bg-white" aria-label="Default select example" multiple>
                <option placeholder class="bg-white">Condicao</option>
                <option >Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
           </div>

           <div class="col-sm-2">
            <select class="form-control form-select estado p-3 m-0 mx-3  w-100 rounded-3 bg-white" aria-label="Default select example" multiple>
                <option placeholder class="bg-white">Estado</option>
                <option >Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
           </div>
    
         <div class="dropdown col-sm-2">
            <button class="form-control dropdown-toggle p-2" type="location" placeholder="Preço" aria-label="Search"
                id="location" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" >
                @svg('fluentui-filter-16', 'fea icon-sm')
                Mais filtros
            </button>
            <ul class="dropdown-menu p-3 shadow-md rounded-3 border-0" aria-labelledby="location">
                <li>
                    <small class="text-muted dropdown-item p-2 rounded-3 ">Nenhuma cidade ou bairro encontrada</small>
                </li>
                <li>
                    <button class="dropdown-item rounded-3 p-0 mx-2 text-dark" type="button">
                        <input class="form-check-input align-middle p-2 " type="checkbox" value=""
                            id="locationCheck1">
                        <label class="form-check-label p-2 m-0 align-middle w-100" for="locationCheck1">
                            Default checkbox
                        </label>
                    </button>
                </li>
            </ul>
        </div>
        <div class="col-sm-2">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </div>
    </form>
</div>
