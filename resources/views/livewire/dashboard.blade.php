<div>
    <div class="container-fluid p-0">

        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Painel</strong> Administrativo</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-xxl-12 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Total de Imoveis</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                @svg('fluentui-tasks-app-20-o', 'feather align-middle')
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{ $imoveis }}</h1>
                                    <div class="mb-0">
                                        <span class="badge badge-primary-light"> <i
                                                class="mdi mdi-arrow-bottom-right"></i>
                                        </span>
                                        <span class="text-muted"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Visitas no site</h5>
                                        </div>
                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                @svg('fluentui-people-community-16-o', 'feather align-middle')
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{ $visitas }}</h1>
                                    <div class="mb-0">
                                        <span class="badge badge-success-light"> <i
                                                class="mdi mdi-arrow-bottom-right"></i>
                                        </span>
                                        <span class="text-muted"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">usuários</h5>
                                        </div>
                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                @svg('fluentui-people-community-16-o', 'feather align-middle')
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{ $users }}</h1>
                                    <div class="mb-0">
                                        <span class="badge badge-success-light"> <i
                                                class="mdi mdi-arrow-bottom-right"></i>
                                        </span>
                                        <span class="text-muted"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Mensagens não lidas</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                @svg('fluentui-chat-multiple-20-o', 'feather align-middle')
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{ $mensagens }}</h1>
                                    <div class="mb-0">
                                        <span class="badge badge-success-light"> <i
                                                class="mdi mdi-arrow-bottom-right"></i>
                                        </span>
                                        <span class="text-muted"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
                <div class="card flex-fill w-100">
                    <div class="card-header row shadow-sm">

                        <h5 class="card-title mb-0 col-6">Gráfico de visitas no site</h5>
                        <div class="float-end col-6">
                            {{-- <form class="row g-2" wire:submit.prevent='send'>
                                @csrf
                                <div class="col-12">
                                    <input type="text" name="dates" class="form-control bg-light border-0 py-2"
                                        id="dates">
                                </div>
                            </form> --}}
                        </div>
                    </div>
                    <div class="card-body px-4">
                        <div class="chart chart-sm">
                            <canvas id="chartjs-dashboard-line"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @push('js')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                console.log(@js($data));
                $('#dates').on('apply.daterangepicker', function(ev, picker) {
                    document.querySelector("#dates").val = this.value;
                    console.log(this.value);
                    @this.set("dates", this.value);
                });
                var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
                var gradientLight = ctx.createLinearGradient(0, 0, 0, 225);
                gradientLight.addColorStop(0, "rgba(215, 227, 244, 1)");
                gradientLight.addColorStop(1, "rgba(215, 227, 244, 0)");


                // Line chart
                new Chart(document.getElementById("chartjs-dashboard-line"), {
                    type: "line",
                    data: {
                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
                            "Dec"
                        ],
                        datasets: [{
                            label: "Visitas no site",
                            tension: 0.3,
                            fill: true,
                            backgroundColor: gradientLight,
                            borderColor: window.theme.primary,
                            data: @js($data)
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            display: false
                        },
                        tooltips: {
                            intersect: false
                        },
                        hover: {
                            intersect: true
                        },
                        plugins: {
                            filler: {
                                propagate: false
                            }
                        },

                    }
                });
            });
        </script>
    @endpush

</div>
