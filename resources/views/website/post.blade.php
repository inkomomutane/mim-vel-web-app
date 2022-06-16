{{-- file:///C:/Users/USER/Downloads/landrickhtml-311/landrickhtml-311/Landrick_v3.1.1/HTML/index-corporate.html
file:///C:/Users/USER/Downloads/landrickhtml-311/landrickhtml-311/Landrick_v3.1.1/HTML/page-blog-detail-two.html
file:///C:/Users/USER/Downloads/landrickhtml-311/landrickhtml-311/Landrick_v3.1.1/HTML/shop-product-detail.html --}}

@extends('website.layouts.website')
@section('title', 'Imóveis')
@section('seo')
    {!! seo()->for($imovel) !!}
@endsection
@section('content')
    <section class="swiper-slider-hero position-relative d-block" id="home" style="height: 75vh">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @forelse ($imovel->getMedia('posts') as $media)
                    <div class="swiper-slide d-flex align-items-center overflow-hidden ">
                        @if ($media)
                            {{ $media->img('', ['class' => 'slide-inner cover-slide-image']) }}
                        @else
                            <img src="{{ asset('website/images/placeholder.png') }}" class="slide-inner" alt="No Image">
                        @endif
                        <div class="bg-overlay">
                        </div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="title-heading text-center">
                                        <h1 class="heading text-white title-dark mb-4">Imóvel</h1>
                                        <p class="para-desc mx-auto text-white-50">{{ $imovel->titulo }}</p>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!-- end slide-inner -->
                    </div>
                @empty
                    <div class="swiper-slide d-flex align-items-center overflow-hidden">
                        <img src="{{ asset('website/images/placeholder.png') }}" class="slide-inner" alt="No Image">
                        <div class="bg-overlay">
                        </div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="title-heading text-center">
                                        <h1 class="heading text-white title-dark mb-4">Imóvel</h1>
                                        <p class="para-desc mx-auto text-white-50">{{ $imovel->titulo }}</p>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                @endforelse
            </div>
            <!-- end swiper-wrapper -->

            <!-- swipper controls -->
            <div class="swiper-button-next border rounded-circle text-center"></div>
            <div class="swiper-button-prev border rounded-circle text-center"></div>
        </div>
        <!--end container-->
    </section>
    <section class="row justify-content-center" style="margin: -1.3rem; z-index:99; position: relative;">
        <div aria-label="breadcrumb" class="d-inline-block col-5">
            <ul class="breadcrumb bg-white rounded shadow mb-0">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Mimóvel</a></li>
                <li class="breadcrumb-item"><a href="{{ route('posts') }}">Posts</a></lt>
                <li class="breadcrumb-item active" aria-current="page">{{ $imovel->titulo }}</li>
            </ul>
        </div>
    </section>

    <!--end section-->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row">
                        <!-- Share media -->
                        <div class="col-md-2 d-none d-md-block">
                            <ul class="list-unstyled text-center sticky-bar social-icon mb-0">
                                <li class="mb-3 h6">Partilhar</li>

                                @foreach ($socialMedias as $key => $socialMedia)
                                    <li><a href=" {{ $socialMedia }}" target="_blank"
                                            class="rounded">@svg('fab-' . $key, 'fea icon-sm')</i></a></li>
                                @endforeach
                                <li>
                                    <h5 class="mt-4  text-center text-muted">
                                        <strong> {{ $imovel->preco }} MZN </strong>
                                    </h5>
                                </li>
                            </ul>
                        </div>
                        <!-- End media -->

                        <div class="col-md-7 row">
                            <ul class="list-unstyled d-flex justify-content-between mt-0">
                                <li class="list-inline-item user me-2">
                                    <span class="text-muted"> <strong>Autor :</strong> &nbsp; <i
                                            class="uil uil-user text-dark"></i> &nbsp;
                                        {{ $imovel->corretor->name }}</span>
                                </li>
                                <li class="list-inline-item date text-muted"><i class="uil uil-calendar-alt text-dark"></i>
                                    {{ date_format($imovel->created_at, 'j') . 'th, ' }}{{ __(date_format($imovel->created_at, 'F') . ', ') }}
                                    {{ date_format($imovel->created_at, 'Y') }}</li>
                            </ul>

                            <div class="row justify-content-between">
                                <h5 class="mt-1 col-8">
                                    {{ $imovel->titulo }}
                                </h5>
                                <h5 class="mt-1 col-4 text-end text-muted ">
                                    <strong> {{ $imovel->preco }} MZN </strong>
                                </h5>
                            </div>
                            <h6 class="mt-4">Descrição</h6>
                            <div class="text-muted">
                                {!! $imovel->descricao !!}
                            </div>


                            <h6 class="mt-2">Propriedades</h6>
                            <div class="text-muted text-dark">
                                <div class="row justify-content-start p-3">
                                    @if ($imovel->endereco)
                                        <div class="col-md-4 py-1">
                                            Endereço: <strong>&nbsp; {{ $imovel->endereco }}</strong>
                                        </div>
                                    @endif
                                    @if ($imovel->bairro)
                                        <div class="col-md-4 py-1">
                                            Bairro: <strong> &nbsp; {{ $imovel->bairro->nome }}</strong>
                                        </div>
                                    @endif
                                    @if ($imovel->bairro->cidade)
                                        <div class="col-md-4 py-1">
                                            Cidade: <strong>&nbsp; {{ $imovel->bairro->cidade->nome }}</strong>
                                        </div>
                                    @endif

                                    @if ($imovel->tipo_de_imovel)
                                        <div class="col-md-4  py-1">
                                            Tipo: <strong>&nbsp; {{ $imovel->tipo_de_imovel->nome }}</strong>
                                        </div>
                                    @endif

                                    @if ($imovel->condicao)
                                        <div class="col-md-4  py-1">
                                            Condição : <strong>&nbsp; {{ $imovel->condicao->nome }}</strong>
                                        </div>
                                    @endif


                                    @if ($imovel->ano)
                                        <div class="col-md-4 py-1">
                                            Ano de construção : <strong>&nbsp; {{ $imovel->ano }}</strong>
                                        </div>
                                    @endif

                                    @if ($imovel->area)
                                        <div class="col-md-4 py-1">
                                            Área (m²) : <strong>&nbsp; {{ $imovel->area }}</strong>
                                        </div>
                                    @endif

                                    @if ($imovel->quartos)
                                        <div class="col-md-4 py-1">
                                            Quartos : <strong>&nbsp; {{ $imovel->quartos }}</strong>
                                        </div>
                                    @endif

                                    @if ($imovel->suites)
                                        <div class="col-md-4 py-1">
                                            Suites : <strong>&nbsp; {{ $imovel->suites }}</strong>
                                        </div>
                                    @endif

                                    @if ($imovel->banheiros)
                                        <div class="col-md-4 py-1">
                                            Banheiros : <strong>&nbsp; {{ $imovel->banheiros }}</strong>
                                        </div>
                                    @endif

                                    @if ($imovel->piscinas)
                                        <div class="col-md-4 py-1">
                                            Piscinas : <strong>&nbsp; {{ $imovel->piscinas }}</strong>
                                        </div>
                                    @endif

                                    @if ($imovel->garagens)
                                        <div class="col-md-4 py-1">
                                            Garagens : <strong>&nbsp; {{ $imovel->garagens }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <h6 class="mt-4">Mapa</h6>
                            @if ($imovel->mapa)
                                <div class="col-sm-12">
                                    <div class="card map border-0">
                                        <div class="card-body p-0 ratio ratio-16x9">
                                            {!! $imovel->mapa !!}
                                        </div>
                                    </div>
                            @endif

                            @livewire('comments', ['imovel' => $imovel])
                        </div>
                    </div>
                    <!-- Share media -->
                    <div class="col-md-2 d-none d-md-block">
                        <ul class="list-unstyled text-start sticky-bar  mb-0 pl-2 text-muted">
                            <li class="mb-3 h6">Contactar corretor</li>

                            <li class="pb-3">
                                <a href="tel:{{ $imovel->corretor->contacto }}" class="rounded mb-2">@svg('fluentui-call-outbound-28-o', 'fea icon-md text-muted')</i> &nbsp;
                                    Chamada </a>
                            </li>
                            <li class="pb-3">

                                <a href="" target="_blank" class="rounded mb-2"  data-bs-toggle="modal" data-bs-target="#exampleModal">@svg('fluentui-calendar-chat-24-o', 'fea icon-md text-muted')</i> &nbsp; Mensagem </a>

                            </li>
                        </ul>
                    </div>


                </div>
            </div>
        </div>
        </div>
    </section>
    @livewire('message-agenda', ['corretor_id' => $imovel->corretor_id, 'imovel_id' => $imovel->id])

@endsection
@push('css')
    <link href="{{ asset('website/css/swiper.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@push('js')
    <script src="{{ asset('website/js/swiper.min.js') }}"></script>
@endpush
