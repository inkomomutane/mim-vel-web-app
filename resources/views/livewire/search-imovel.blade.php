<div>
    <!-- Start Products -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="card border-0 sidebar sticky-bar">
                        <div class="card-body p-0 pt-2">
                            <!-- SEARCH -->

                            <!-- Categories -->
                            <div class="widget">
                                <ul class="list-unstyled mt-4 mb-0 blog-categories row">
                                    <li class="col-md-12">

                                       <input class="form-check-input" type="checkbox" role="switch" name="forRent"  wire:model='forRent'
                                       >
                                       <label for="forRent">Arrendar</label>
                                       <input class="form-check-input" type="checkbox" role="switch"  name="forBuy" wire:model='forBuy'

                                       >
                                       <label for="forBuy">Comprar</label>
                                    </li>
                                    <li class="col-md-12">
                                        <label for="">Bairro</label>
                                        <select class="form-select form-control" aria-label="Ordenar imóvels"
                                            wire:model='bairro'>
                                            @foreach ($bairros as $bairro)
                                                <option value="{{ $bairro->id }}">{{ $bairro->nome }}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                    <li class="col-md-12">
                                        <label for="">Tipo de imóvel</label>
                                        <select class="form-select form-control" aria-label="Ordenar imóvels"
                                            wire:model='tipoDeImovel'>
                                            <optgroup label="Tipo de imóvel">
                                                @foreach ($tipoDeImovels as $tipoDeImovel)
                                                    <option value="{{ $tipoDeImovel->id }}">{{ $tipoDeImovel->nome }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </li>
                                    <li class="col-md-12">
                                        <label for="">Condição</label>
                                        <select class="form-select form-control" aria-label="Condição de Imóvel"
                                            wire:model='condicao'>
                                            <optgroup label="Condição de Imóvel">
                                                @foreach ($condicaoDeImovels as $condicaoDeImovel)
                                                    <option value="{{ $condicaoDeImovel->id }}">
                                                        {{ $condicaoDeImovel->nome }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </li>
                                    <li class="col-md-12 row">
                                        <div class="col-md-6">
                                            <label for="">Max</label>
                                            <div class="input-group mb-3 border rounded">
                                                <input type="number" id="precoMax" name="precoMax"
                                                    class="form-control border-0" placeholder="Max"
                                                    wire:model='precoMax'
                                                    @if ($precoMin > $precoMax) Disabled @endif>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Preço: Min</label>
                                            <div class="input-group mb-3 border rounded">
                                                <input type="number" id="precoMin" name="precoMin"
                                                    class="form-control border-0" placeholder="Min"
                                                    wire:model='precoMin'>
                                            </div>
                                        </div>

                                    </li>
                                    <li class="col-md-12">
                                        <button class="btn btn-secondary w-100" wire:click='resetFilters'> Limpar
                                            Filtro</button>
                                    </li>
                                </ul>
                            </div>
                            <!-- Categories -->
                        </div>
                    </div>
                </div>
                <!--end col-->

                <div class="col-lg-9 col-md-8 col-12 mt-5 pt-2 mt-sm-0 pt-sm-0">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-7">

                        </div>
                        <!--end col-->

                        <!--end col-->
                    </div>
                    <!--end row-->

                    <div class="row">
                        @forelse ($imovels as $imovel)
                            <div class="col-12 mt-4 pt-2">
                                <div class="card shop-list border-0 shadow position-relative">
                                    <div class="row align-items-center g-0">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="shop-image position-relative overflow-hidden">
                                                <a href="{{ route('posts.show', $imovel->slug) }}"
                                                    class="rounded-3">
                                                    @if ($imovel->getFirstMedia('posts'))
                                                        {{ $imovel->getFirstMedia('posts')->img('', ['class' => 'cover-image rounded', 'alt' => $imovel->titulo]) }}
                                                    @else
                                                        <img src="{{ asset('website/images/placeholder.png') }}"
                                                            class="cover-image rounded" alt="{{ $imovel->titulo }}">
                                                    @endif

                                                </a>
                                            </div>
                                        </div>
                                        <!--end col-->

                                        <div class="col-lg-8 col-md-6">
                                            <div class="card-body content p-4">
                                                <a href="{{ route('posts.show', $imovel->slug) }}"
                                                    class="text-dark product-name h6">{{ ucfirst($imovel->titulo) }}</a>
                                                <div class="d-lg-flex align-items-center mt-2 mb-3 row">
                                                    <ul class="list-unstyled text-warning mb-0">
                                                        @for ($i = 0; $i < $imovel->stars(); $i++)
                                                            <li class="list-inline-item"><i class="mdi mdi-star"></i>
                                                            </li>
                                                        @endfor
                                                    </ul>
                                                    <h6 class=" text-muted mb-0 me-3 ">MZN
                                                        <strong class="fst-bold h4 text-muted">
                                                            {{ $imovel->preco }}</strong>
                                                    </h6>

                                                </div>
                                                <div class="row justify-content-start">
                                                    <div class="col-md-4 text-muted">
                                                        <strong> Tipo: &nbsp; {{ $imovel->tipo_de_imovel->nome }}
                                                        </strong>
                                                    </div>
                                                    <div class="col-md-4 text-muted">
                                                        <strong> Condição: &nbsp; {{ $imovel->condicao->nome }}
                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="post-meta d-flex justify-content-between mt-3">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="list-inline-item"><span
                                                                class="text-muted comments"><i
                                                                    class="uil uil-comment me-1"></i>{{ $imovel->comentarios->count() }}
                                                                &nbsp;
                                                                Comentários</span> </li>
                                                    </ul>
                                                    <span class="badge rounded-pill bg-soft-primary p-2 ">
                                                        <a href="{{ route('posts.show', $imovel->slug) }}"
                                                            class="text-muted readmore text-primary">Ver mais <i
                                                                class="uil uil-angle-right-b align-middle"></i></a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end blog post-->
                            </div>
                            <!--end col-->

                        @empty
                        @endforelse

                    </div>
                    <!--end col-->

                    <!-- PAGINATION START -->
                    <div class="col-12 mt-4 pt-2  row justify-content-center">
                        <div class="col-sm-6">
                            {{ $imovels->links() }}
                        </div>
                    </div>
                    <!--end col-->

                    <!-- PAGINATION END -->
                </div>
                <!--end row-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
</div>
<!--end container-->
</section>
<!--end section-->
<!-- End Products -->
</div>
