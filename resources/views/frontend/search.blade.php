@extends('layouts.frontend.main.root')
@section('banner')

    <div class="owl-carousel owl-theme col-sm-12">
        <section class="about-banner relative" style="
        background: url({{ asset('frontend/img/top-banner.jpg') }}) center;
      ">
            <div class="overlay overlay-bg"></div>
            <div class="container">
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="about-content col-lg-12">
                        <h1 class="text-white">
                            Contacte - nos
                        </h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="about-banner relative" style="
            background: url({{ asset('frontend/img/top-banner.jpg') }}) center;
            ">
            <div class="overlay overlay-bg"></div>
            <div class="container">
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="about-content col-lg-12">
                        <h1 class="text-white">
                            Mimóvel
                        </h1>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection



@section('content')


<div class="whole-wrap pt-5 bg-white">
    <div class="container-fluid row">
        <div class="col-sm-12">

        </div>
    </div>
</div>



<div class="whole-wrap py-5">
    <div class="container">

        <div class="section-top-border">

            <h6>
                @if (Route::is('imovel.search'))
                 Cerca de {{$imoveis->count()}} resultados encontrados ...
                @endif
            </h6>
            @foreach ($imoveis as $imovel)
            <a href="{{ route('imo.show',$imovel->id) }}" style="color: #000">
            <div class="row py-3 bg-white shadow-sm mb-2" style="box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06)">
                <div class="col-md-3">

                    <img src="{{ asset('storage/')}}/{{ $imovel->fotos->first()?$imovel->fotos->first()->url:''}}" alt="" class="img-fluid">
                </div>
                <div class="col-md-9 mt-sm-20 left-align-p">
                    <h5>{{ucfirst($imovel->titulo)}}</h5>
                    <hr>
                    <strong style="font-weight: 501">
                        @if ($imovel->bairro)
                        {{ucfirst($imovel->bairro->cidade->nome)}}, {{$imovel->bairro->nome}}
                        @endif  &nbsp;&nbsp;  Preço: {{ round($imovel->preco,2)}} MTN </strong>
                    <p class="text-truncate">{!! $imovel->descricao !!}</p>

                   @if ($imovel->user)
                       <strong style="font-weight: 501">Corretor: {{$imovel->user->name}}</strong>
                   @endif
                </div>

            </div>
        </a>
            @endforeach

            <div class="row float-right">
                {{ $imoveis->links() }}
            </div>
        </div>

    </div>
</div>
@endsection


@push('js')
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                loop: true,
                lazyLoad: true,
                items: 1,
                responsiveClass: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true
            });
        });
    </script>
@endpush
