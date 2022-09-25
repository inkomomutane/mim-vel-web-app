@extends('backend.layouts.app')
@section('title', request()->routeIs('imovel.edit') ? 'Editar o imovel - ' . $imovel->nome : 'Adicionar novo imovel')


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <a href="{{ route('imovel.index') }}" class="col-auto btn btn-info">
                            <i class="align-middle" data-feather="corner-up-left"></i>&nbsp; Voltar
                        </a>
                        @if (request()->routeIs('imovel.edit'))
                            <div class="col-auto ms-auto text-end mt-n1">
                                <a href="{{ route('media.show', ['imovel' => $imovel->slug]) }}" class="btn btn-purple">
                                    @svg('fluentui-image-multiple-28-o', 'feather align-middle')
                                    Media</a>
                            </div>
                        @endif
                    </div>

                </div>

            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible " role="alert"
                                style="border-left: 5px solid darkred;">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <div class="alert-message">
                                    <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li><i class="align-middle" data-feather="alert-triangle"></i> &nbsp;
                                                <strong>{{ $error }}</strong>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        <div class="container row">

                            @if (request()->routeIs('imovel.edit'))
                                <form action="{{ route('imovel.update', $imovel->slug) }}" method="post"
                                    enctype="multipart/form-data">
                                    @method('PATCH')@csrf
                                    <input type="hidden" name="unique_hash" value="{{ encrypt($imovel->id) }}">
                                @else
                                    <form action="{{ route('imovel.store') }}" method="post" enctype="multipart/form-data">
                                        @method('POST')@csrf
                            @endif

                            <div class="row justify-content-between mb-3">
                                <div class="col-sm-6">
                                    <label for="name">Título</label>
                                    <input name="titulo"
                                        value="@if (old('titulo')) {{ old('titulo') }}@elseif(request()->routeIs('imovel.edit')){{ $imovel->titulo }} @endif"
                                        type="text" class="form-control" placeholder="Título" autofocus autocomplete=""
                                        required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="name">Preço</label>
                                    <input name="preco"
                                        value="@if (old('preco')) {{ old('preco') }}@elseif(request()->routeIs('imovel.edit')){{ $imovel->preco }} @endif"
                                        type="text" class="form-control" placeholder="Preço" autofocus autocomplete=""
                                        id="preco_imovel">
                                </div>
                            </div>

                            <div class="row justify-content-between my-3">

                                <div class="col-sm-6">
                                    <label for="name">Regras de negociação</label>
                                    <select name="regra_de_negocio_id" id="regra_de_negocio_id"
                                        class="form-control"
                                        data-none-selected-text="Regras de negociação"
                                        data-show-tick="true"
                                        data-live-search="true"
                                        data-live-search-normalize="true"
                                        data-none-results-text="Nunhuma regras de negociação foi encontrada!"
                                        data-actions-box="true"
                                        data-width="auto"
                                        data-selected-text-format="count > 3"
                                        data-deselect-all-text="Clear"
                                        >

                                        @if ($regra_de_negocios)
                                                @foreach ($regra_de_negocios as $regra_de_negocio)
                                                <option value="{{ $regra_de_negocio->id }}"

                                                    @if (request()->routeIs('imovel.edit') && (!is_null($imovel->regra_de_negocio))  && $imovel->regra_de_negocio->id == $regra_de_negocio->id)
                                                    selected class=""
                                                @endif
                                                    >{{ $regra_de_negocio->name }}
                                                </option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>

                                <div class="col-sm-6">
                                    <label for="name">Imóvel para: (Arrendar, Venda ...)</label>
                                    <select name="imovel_for_id" id="imovel_for_id" class="form-control form-select">

                                        @if ($imovel_fors)
                                                @foreach ($imovel_fors as $imovel_for)
                                                <option value="{{ $imovel_for->id }}"
                                                    @if (request()->routeIs('imovel.edit') &&  (!is_null($imovel->imovel_for)) && $imovel->imovel_for->id == $imovel_for->id)
                                                    selected class=""
                                                @endif
                                                    >{{ $imovel_for->name }}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                            </div>

                            <div>
                                <label for="name">Descrição</label>
                                <textarea class="col-12" name="descricao" id="editor" rows="14">
                                    @if (old('descricao'))
                                    {!! old('descricao') !!}
                                    @elseif(request()->routeIs('imovel.edit'))
                                    {!! $imovel->descricao !!}
                                    @endif

                                </textarea>
                            </div>
                            <div class="row justify-content-between my-3">

                                @if (request()->routeIs('imovel.edit'))
                                    @livewire('imovel-bairro-select',[
                                        'bairroId' => $imovel->bairro->id
                                    ])
                                @else
                                     @livewire('imovel-bairro-select')
                                @endif


                            </div>

                            <div class="row justify-content-between my-3">

                                <div class="col-sm-6">
                                    <label for="name">Endereço</label>
                                    <input type="text" name="endereco" id="endereco" class="form-control"
                                        placeholder="Endereço"
                                        value="@if (old('endereco')) {{ old('endereco') }}@elseif(request()->routeIs('imovel.edit')){{ $imovel->endereco }} @endif">
                                </div>
                                <div class="col-sm-6">
                                    <label for="name">Mapa da localização do imóvel.</label>
                                    <input type="text" name="mapa" id="mapa" class="form-control"
                                        placeholder=" Link do Mapa da localização do imóvel."
                                        value="@if (old('mapa')) {{ old('mapa') }}@elseif(request()->routeIs('imovel.edit')){{ $imovel->mapa }} @endif">
                                </div>
                            </div>

                            <div class="row justify-content-between my-3">

                                <div class="col-sm-4">
                                    <label for="name">Tipo de Imóvel</label>
                                    <select name="tipo_de_imovel_id" id="tipo_de_imovel_id"
                                        class="form-control form-select">
                                        @foreach ($tipo_de_imovels as $tipo_de_imovel)
                                            <option value="{{ $tipo_de_imovel->id }}"

                                                @if (request()->routeIs('imovel.edit') && $imovel->tipo_de_imovel->id == $tipo_de_imovel->id)
                                                selected class=""
                                            @endif
                                                >{{ $tipo_de_imovel->nome }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <label for="name">Condição do imóvel</label>
                                    <select name="condicao_id" id="condicao_id" class="form-control form-select">
                                        @foreach ($condicaos as $condicao)
                                            <option value="{{ $condicao->id }}"
                                                @if (request()->routeIs('imovel.edit') && $imovel->condicao->id == $condicao->id)
                                                selected class=""
                                            @endif

                                                >{{ $condicao->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-sm-4">
                                    <label for="name">Estado do imóvel</label>
                                    <select name="status_id" id="status_id" class="form-control form-select">
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status->id }}"
                                                @if (request()->routeIs('imovel.edit') && $imovel->status->id == $status->id)
                                                selected class=""
                                            @endif

                                                >{{ $status->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            @if (request()->routeIs('imovel.create'))
                                <div class="row justify-content-between my-3">
                                    @livewire('upload-images')
                                </div>
                            @endif

                            <div class="row justify-content-between my-3">
                                <div class="col-sm-3">
                                    <label for="name">Ano de construção</label>
                                    <input type="text" imaskable_number name="ano" id="ano"
                                        class="form-control" placeholder="Ano de construção"
                                        value="@if (old('ano')) {{ old('ano') }}@elseif(request()->routeIs('imovel.edit')){{ $imovel->ano }} @endif">
                                </div>
                                <div class="col-sm-3">
                                    <label for="name">Área (m²)</label>
                                    <input type="text" imaskable_number name="area" id="area"
                                        class="form-control" placeholder="Área (m²)"
                                        value="@if (old('area')) {{ old('area') }}@elseif(request()->routeIs('imovel.edit')){{ $imovel->area }} @endif">
                                </div>
                                <div class="col-sm-3">
                                    <label for="name">Quartos</label>
                                    <input type="text" imaskable_number name="quartos" id="quartos"
                                        class="form-control" placeholder="Quartos"
                                        value="@if (old('quartos')) {{ old('quartos') }}@elseif(request()->routeIs('imovel.edit')){{ $imovel->quartos }} @endif">
                                </div>
                                <div class="col-sm-3">
                                    <label for="name">Suites</label>
                                    <input type="text" imaskable_number name="suites" id="suites"
                                        class="form-control" placeholder="Suites"
                                        value="@if (old('suites')) {{ old('suites') }}@elseif(request()->routeIs('imovel.edit')){{ $imovel->suites }} @endif">
                                </div>
                            </div>
                            <div class="row justify-content-between my-3">
                                <div class="col-sm-3">
                                    <label for="name">Banheiros</label>
                                    <input type="text" imaskable_number name="banheiros" id="banheiros"
                                        class="form-control" placeholder="Banheiros"
                                        value="@if (old('banheiros')) {{ old('banheiros') }}@elseif(request()->routeIs('imovel.edit')){{ $imovel->banheiros }} @endif">
                                </div>
                                <div class="col-sm-3">
                                    <label for="name">Piscinas</label>
                                    <input type="text" imaskable_number name="piscinas" id="piscinas"
                                        class="form-control" placeholder="Piscinas"
                                        value="@if (old('piscinas')) {{ old('piscinas') }}@elseif(request()->routeIs('imovel.edit')){{ $imovel->piscinas }} @endif">
                                </div>
                                <div class="col-sm-3">
                                    <label for="name">Garagens</label>
                                    <input type="text" name="garagens" id="garagens" class="form-control"
                                        placeholder="Garagens"
                                        value="@if (old('garagens')) {{ old('garagens') }}@elseif(request()->routeIs('imovel.edit')){{ $imovel->garagens }} @endif">
                                </div>
                                <div class="col-sm-3">
                                    <label for="name">Andares</label>
                                    <input type="text" name="andares" id="andares" class="form-control"
                                        placeholder="Andares"
                                        value="@if (old('andares')) {{ old('andares') }}@elseif(request()->routeIs('imovel.edit')){{ $imovel->andares }} @endif">
                                </div>
                            </div>


                            <div class="row container justify-content-center col-md-12 mt-2">
                                <input type="submit" class="btn btn-primary rounded-3 col"
                                    value="@if (request()->routeIs('imovel.edit')) Actualizar @else Guardar @endif">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            window.ClassicEditor.create(document.querySelector('#editor'));
            const currencyMask = new IMask(
                document.getElementById('preco_imovel'), {
                    mask: '(MZN) num',
                    blocks: {
                        num: {
                            mask: Number,
                            thousandsSeparator: '.',
                            placeholderChar: "M"

                        }
                    }
                });

            const fields = ['ano', 'area', 'quartos', 'suites', 'banheiros', 'piscinas', 'garagens', 'andares'];
            fields.map((e) => new IMask(document.getElementById(e), {
                mask: 'num',
                blocks: {
                    num: {
                        mask: '[000000000]',
                    }
                }
            }));

        });
    </script>
@endpush
