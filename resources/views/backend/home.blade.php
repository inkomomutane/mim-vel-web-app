@extends('layouts.backend.dashboard')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
<div class="row container content-justify-center">
    <div class="col-sm-4">
        <div class="card gradient-bottom shadow-sm">
            <div class="card-body">
            <ul class="list-unstyled list-unstyled-border">
                <li class="media align-items-center">
                    <div class="mr-3 rounded">
                        <i class="fa fa-home rx" aria-hidden="true "></i>
                    </div>
                    <div class="media-body">
                        <div class="media-title">Total de Imóveis</div>
                        <div class="mt-1">
                        <div class="budget-price">
                            <div class="budget-price-square bg-light" data-width="100%"></div>

                        </div>
                        <h2>{{$imoveis->count()}}</h2>
                        </div>
                    </div>
                </li>
            </ul>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="card gradient-bottom shadow-sm">

            <div class="card-body">
            <ul class="list-unstyled list-unstyled-border">
                <li class="media align-items-center">
                    <div class="mr-3 rounded">
                        <i class="fas fa-calendar-minus rx" aria-hidden="true "></i>
                    </div>
                    <div class="media-body">
                        <div class="media-title">Total de Agendas</div>
                        <div class="mt-1">
                        <div class="budget-price">
                            <div class="budget-price-square bg-light" data-width="100%"></div>

                        </div>
                        <h2>{{$agendas->count()}}</h2>
                        </div>
                    </div>
                </li>
            </ul>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="card gradient-bottom shadow-sm">

            <div class="card-body">
            <ul class="list-unstyled list-unstyled-border">
                <li class="media align-items-center">
                    <div class="mr-3 rounded">
                        <i class="fas fa-exclamation-triangle rx" aria-hidden="true "></i>
                    </div>
                    <div class="media-body">
                        <div class="media-title">Total de denûncias</div>
                        <div class="mt-1">
                        <div class="budget-price">
                            <div class="budget-price-square bg-light" data-width="100%"></div>
                        </div>
                        <h2>{{$denuncias->count()}}</h2>
                        </div>
                    </div>
                </li>
            </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="card shadow-sm">
            <div class="card-header">
                <h4>Visualizações do site</h4>
            </div>
            <div class="card-body">
                <canvas id="myChart" height="100"></canvas>
            </div>
        </div>
    </div>
    <div class=" row m-0 p-0 row col-sm-4">
        <div class="w-100 col-sm-12">
            <div class="card gradient-bottom shadow-sm">
                <div class="card-body">
                <ul class="list-unstyled list-unstyled-border">
                    <li class="media align-items-center">
                        <div class="mr-3 rounded">
                            <i class="fas fa-globe rx" aria-hidden="true "></i>
                        </div>
                        <div class="media-body">
                            <div class="media-title">Total de views no site</div>
                            <div class="mt-1">
                            <div class="budget-price">
                                <div class="budget-price-square bg-light" data-width="100%"></div>
                            </div>
                            <h2>{{$web_views}}</h2>
                            </div>
                        </div>
                    </li>
                </ul>
                </div>
            </div>
        </div>
        <div class="w-100 col-sm-12">
            <div class="card gradient-bottom shadow-sm">
                <div class="card-body">
                <ul class="list-unstyled list-unstyled-border">
                    <li class="media align-items-center">
                        <div class="mr-3 rounded">
                            <i class="fas fa-eye rx" aria-hidden="true "></i>
                        </div>
                        <div class="media-body">
                            <div class="media-title">Views em Imóveis</div>
                            <div class="mt-1">
                            <div class="budget-price">
                                <div class="budget-price-square bg-light" data-width="100%"></div>
                            </div>
                            <h2>{{$imo_views}}</h2>
                            </div>
                        </div>
                    </li>
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('css')
<style>
    .rx{
        font-size: 60px !important;
    }
</style>
@endpush
@push('jsLibs')
<script src="{{ asset('backend/js/chart.min.js') }}"></script>
@endpush
@push('js')
<script src="{{ asset('backend/js/app.js') }}"></script>
<script>

</script>

@endpush
