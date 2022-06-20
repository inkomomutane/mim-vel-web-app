<div>
    <div class="card blog rounded border-0 shadow overflow-hidden">
        <div class="row align-items-center g-0">
            <div class="col-lg-3">


                {{ $image }}


                <div class="overlay bg-dark"></div>
                <div class="author">
                    <small class="text-light user d-block"><i class="uil uil-user"></i>{{ $author }}</small>
                    <small class="text-light date"><i class="uil uil-calendar-alt"></i>

                        {{ date_format($date, 'j') . ' th, ' }}
                        {{ __(date_format($date, 'F') . ', ') }}
                        {{ date_format($date, 'Y') }}

                    </small>
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-9">
                <div class="card-body content p-sm-3 p-lg-0 px-lg-3 ">
                    <small class="badge badge-rounded-3 bg-success">@svg('fluentui-building-home-24', 'fea icon-sm')
                        {{ $tipo }} </small>
                    <h5><a href="{{ $url }}" class="card-title title text-dark">{{ $title }}</a></h5>

                    <ul class="list-unstyled h6 mb-0 text-warning">
                        @for ($i = 0; $i < $ratings; $i++)
                            <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                        @endfor
                    </ul>
                    <h6>
                        <a href="{{ $url }}" class="card-title title text-dark">

                                    <strong>(MZN) {{ number_format($price, 2) }} </strong> </a>

                    </h6>
                    <p class="mb-0 text-dark"><strong><small>
                        @if ($quartos)
                                @svg('fluentui-calendar-rtl-48-o','fea icon-sm')
                                 Ano de construção :  {{ $ano }}
                                @endif
                                @if ($quartos)
                               | @svg('fluentui-bed-16-o','fea icon-sm')
                               Quartos : {{ $quartos }}
                                @endif
                                @if ($area)
                               | @svg('fluentui-ruler-24-o','fea icon-sm') Area : {{ $area }} m²
                                @endif
                                @if ($suites)
                               |  @svg('fluentui-conference-room-28-o', 'fea icon-sm')
                               Suites : {{ $suites }}
                                @endif
                                @if ($banheiros)
                               | @svg('tni-bath-o','fea icon-sm')
                               Banheiros :  {{ $banheiros }}
                                @endif
                                @if ($piscinas)
                              |  @svg('tni-pool-o','fea icon-sm')
                              Piscinas : {{ $piscinas }}
                                @endif
                                @if ($garagens)
                             |   @svg('tni-garage-o','fea icon-sm')
                             Garagens :    {{ $garagens }}
                                @endif
                                @if ($andares)
                            | @svg('iconpark-elevator-o','fea icon-sm')
                            Andares :  {{ $andares }}
                                @endif
                            </small></strong></p>

                    <p class="text-muted mb-0 text-truncate-2">
                        {!! strip_tags($description) !!}
                    </p>

                    <div class="post-meta d-flex justify-content-between mt-3">
                        <ul class="list-unstyled mb-0">
                            <li class="list-inline-item"><a href="{{ $url }}" class="text-muted comments"><i
                                        class="uil uil-comment me-1"></i>{{ $comments }}</a>
                            </li>
                        </ul>
                        <a href="{{ $url }}" class="text-muted readmore">Ver mais <i
                                class="uil uil-angle-right-b align-middle"></i></a>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</div>
