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
<link rel="stylesheet" href="{{ asset('backend/jquery-selectric/selectric.css') }}">
<link rel="stylesheet" href="{{ asset('backend/bootstrap-daterangepicker/daterangepicker.css') }}">

<style>
    .rx{
        font-size: 60px !important;
    }
</style>
@endpush
@push('jsLibs')
<script src="{{ asset('backend/js/chart.min.js') }}"></script>
<script src="{{ asset('backend/prism/prism.js') }}"></script>
<script src="{{ asset('backend/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('backend/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
@endpush
@push('js')

<script src="{{ asset('backend/js/app.js') }}"></script>
<script>
        "use strict";
        chart([],[]);

        $('.daterange-cus').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            },
            drops: 'down',
            opens: 'right'
        });
        $('.daterange-btn').daterangepicker({
            ranges: {
                'Hoje': [moment(), moment()],
                'Ontem': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Últimos 7 Dias': [moment().subtract(6, 'days'), moment()],
                'Últimos 30 Dias': [moment().subtract(29, 'days'), moment()],
                'Este Mês': [moment().startOf('month'), moment().endOf('month')],
                'Mês Passado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                    'month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        }, function(start, end) {
            $.ajax({
                type: "get",
                url: "{{ url('/filtered_data') }}/" + start.format('DD-MM-Y') + "/" + end.format('DD-MM-Y'),
                data: "data",
                dataType: "json",
                success: function(response) {
                    chart(response.keys,response.values)
                },
                error: function(err) {
                    console.log(err);
                }
            });

            console.log(start.format('DD-MM-Y') + ";" + end.format('DD-MM-Y'));
            $('.daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        });

        $(".colorpickerinput").colorpicker({
            format: 'hex',
            component: '.input-group-append',
        });


        function chart(keys,values) {
            var ctx = document.getElementById("myChart").getContext('2d');
        var meses = keys ;
        var mesesData = values;
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: meses,
                datasets: [{
                        label: '',
                        data: mesesData,
                        borderWidth: 2,
                        backgroundColor: 'rgba(254,86,83,.7)',
                        borderWidth: 0,
                        borderColor: 'transparent',
                        pointBorderWidth: 0,
                        pointRadius: 3.5,
                        pointBackgroundColor: 'transparent',
                        pointHoverBackgroundColor: 'rgba(254,86,83,.8)',
                    },

                ]
            },
            options: {
                legend: {
                    display: true
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: true,
                            drawBorder: false,
                            color: '#f2f2f2',
                        },
                        ticks: {
                            beginAtZero: true,
                            stepSize: 50,
                            callback: function(value, index, values) {
                                return '' + value;
                            }
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: true,
                            tickMarkLength: 15,
                        }
                    }]
                },
            }
        });
        }
</script>

@endpush
