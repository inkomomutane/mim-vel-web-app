@extends('website.layouts.website')
@section('title', 'Imóveis')
@section('seo')
    {!! seo()->for($imovel) !!}
@endsection
@section('content')
    <section class="splide swiper-slider-hero position-relative d-block" aria-labelledby="carousel-heading" id="home"
        style="height: 75vh">
        <div class="splide__track swiper-container">
            <ul class="splide__list">
                @forelse ($imovel->getMedia('posts') as $media)
                    <div class="splide__slide d-flex align-items-center overflow-hidden">
                        @if ($media)
                            @if (collect($media->responsive_images)->isEmpty())
                                <img src="{{ $media->getUrl('thumb') }}" data-splide-lazy="{{ $media->getUrl() }}"
                                    alt="{{ $media->name }}">
                            @else
                                <img data-splide-lazy-srcset="{{ $media->getSrcset() }}" sizes="100vw"
                                    data-splide-lazy="{{ $media->getUrl() }}" alt="{{ $media->name }}">
                            @endif
                        @else
                            <img src="{{ asset('website/images/placeholder.png') }}" class="cover-slide-image"
                                alt="Sem Imagem" loading="lazy">
                        @endif
                        <div class="bg-overlay">

                        </div>
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="title-heading text-center">
                                        <h1 class="heading text-white title-dark mb-4"
                                            style="opacity: 0.5; font-family: 'Montserrat', sans-serif;"><span
                                                style="color: rgb(6, 98, 149)">M</span><span
                                                style="color: rgb(254, 104, 1)">IMÓVEL</span><span
                                                style="color: rgb(6, 98, 149);font-size:30px">.COM</span></h1>
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
                    <div class="splide__slide d-flex align-items-center overflow-hidden">
                        <img src="{{ asset('website/images/placeholder.png') }}" class="slide-inner" alt="Sem Imagem">
                        <div class="bg-overlay">
                        </div>
                        <div class="position-absolute top-50 start-50 translate-middle">
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
            </ul>


        </div>
        <div class="splide__progress">
            <div class="splide__progress__bar">
            </div>
        </div>
        <div class="splide__arrows splide__arrows--ltr">
            <button class="splide__arrow splide__arrow--prev" type="button" aria-label="Previous slide"
                aria-controls="splide01-track">
                <x-fluentui-arrow-right-16 />
            </button>
            <button class="splide__arrow splide__arrow--next" type="button" aria-label="Next slide"
                aria-controls="splide02-track">
                @svg('fluentui-arrow-right-12')

            </button>
        </div>
    </section>
    <section id="thumbnail-carousel" class="splide"
        aria-label="The carousel with thumbnails. Selecting a thumbnail will change the Beautiful Gallery carousel.">
        <div class="splide__track">
            <ul class="splide__list justify-content-center">
                @forelse ($imovel->getMedia('posts') as $media)
                    <div class="splide__slide d-flex align-items-center overflow-hidden p-1">
                        @if ($media)
                            {{ $media->img('thumb', ['class' => 'cover-slide-image rounded-3']) }}
                        @else
                            <img src="{{ asset('website/images/placeholder.png') }}" class="cover-slide-image"
                                alt="Sem Imagem" loading="lazy">
                        @endif
                        <!-- end slide-inner -->
                    </div>
                @empty
                    <div class="splide__slide d-flex align-items-center overflow-hidden p-1">
                        <img src="{{ asset('website/images/placeholder.png') }}" class="rounded-3" alt="Sem Imagem">
                    </div>
                @endforelse
            </ul>
        </div>
        <div class="splide__arrows splide__arrows--ltr">
            <button class="splide__arrow splide__arrow--prev" type="button" aria-label="Previous slide"
                aria-controls="splide01-track">
                <x-fluentui-arrow-right-16 />
            </button>
            <button class="splide__arrow splide__arrow--next" type="button" aria-label="Next slide"
                aria-controls="splide02-track">
                <x-fluentui-arrow-right-16 />

            </button>
        </div>
    </section>
    <!--end section-->
    <section class="section bg-facebook-darken p-5">
        <div class="container">
            <div class="row justify-content-center ">

                <div class="col-lg-8 row">
                    <div class="col-12 rounded-3 p-2 bg-white">
                        <div class="m-3">
                            <span class="badge rounded-pill text-dark p-2  " style="background: #efefef">
                                @if ($imovel->isForRent())
                                    Para aluguel
                                @else
                                    Para compra
                                @endif
                            </span>
                        </div>
                        <div class="mx-3 w-100">
                            <h5 class="text-dark fw-bolder">
                                {{ Str::ucfirst($imovel->titulo) }}
                            </h5>
                        </div>
                        <div class="mx-3 w-100">
                            <h5 class="text-dark fs-6 fw-light">
                                @svg('fluentui-location-12-o', 'fea icon-sm text-muted')
                                {{ Str::ucfirst($imovel->endereco) }}
                            </h5>
                        </div>
                        <div class="mx-3 w-100">
                            <p class="text-success fw-bold">
                                <small>MZN</small> <strong class="fs-4">
                                    {{ number_format($imovel->preco, 2) }}</strong>
                            </p>
                        </div>


                    </div>
                    <div class="accordion p-0 m-0 my-2" id="buyingquestion">
                        <div class="accordion-item col-12 rounded-3 p-2 my-2 bg-white ">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button border-0 bg-white text-dark fw-bold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    Propriedades
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse border-0 collapse show"
                                aria-labelledby="headingOne" data-bs-parent="#buyingquestion">
                                <div class="accordion-body text-muted bg-white">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion p-0 m-0" id="descricao">
                        <div class="accordion-item col-12 rounded-3 p-2 my-2 bg-white ">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button border-0 bg-white text-dark fw-bold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#descricao_one" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    Descrição
                                </button>
                            </h2>
                            <div id="descricao_one" class="accordion-collapse border-0 collapse show"
                                aria-labelledby="headingOne" data-bs-parent="#descricao">
                                <div class="accordion-body text-muted bg-white">
                                    <div class="text-muted text-dark">
                                        <div class="row justify-content-start p-3 ">
                                            {!! $imovel->descricao !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @if ($imovel->mapa)
                        <div class="accordion p-0 m-0 my-2" id="mapa">
                            <div class="accordion-item col-12 rounded-3 p-2 my-2 bg-white ">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button border-0 bg-white text-dark fw-bold" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#mapa_one" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        Localização no Mapa
                                    </button>
                                </h2>
                                <div id="mapa_one" class="accordion-collapse border-0 collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#mapa">
                                    <div class="accordion-body text-muted bg-white">
                                        <div class="text-muted text-dark">
                                            <div class="row justify-content-start rounded-3">
                                                {!! $imovel->mapa !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif --}}


                    <div class="accordion p-0 m-0" id="comments">
                        <div class="accordion-item col-12 rounded-3 p-0 m-0 bg-white ">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button border-0 bg-white text-dark fw-bold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#comment" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    Comentários
                                </button>
                            </h2>
                            <div id="comment" class="accordion-collapse border-0 collapse show"
                                aria-labelledby="headingOne" data-bs-parent="#comments">
                                <div class="accordion-body text-muted bg-white">
                                    <div class="text-muted text-dark">
                                        <div class="row justify-content-start rounded-3">
                                            @livewire('comments', ['imovel' => $imovel])
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 row mx-2 ">
                    <div class="col-12 rounded-3 p-0 m-0 px-2 ">
                        <div class="sticky-bar">
                            <div class="accordion p-0 m-0 my-2 " id="contact">
                                <div class="accordion-item col-12 rounded-3 p-0 m-0 bg-white ">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button border-0 bg-white text-dark fw-bold"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#contact_one"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            Contactar o corretor
                                        </button>
                                    </h2>
                                    <div id="contact_one" class="accordion-collapse border-0 collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#contact">
                                        <div class="accordion-body text-muted bg-white">
                                            <h4 class="fs-4 fw-bolder">{{ $imovel->corretor->name }}</h4>

                                            <div class="text-muted text-dark">
                                                <div class="row justify-content-start rounded-3">
                                                    <div class="p-2 rounded-3 bg-white col-12">
                                                        <a href="tel:{{ $imovel->corretor->contacto }}"
                                                            class="btn btn-outline-info rounded-pill">@svg('fluentui-call-outbound-28-o', 'fea   icon-sm')</i>
                                                            &nbsp;
                                                            Ligar para o corretor</a>
                                                    </div>
                                                    <div class="p-2 rounded-3 bg-white col-12">
                                                        <a href="" class="btn  btn-outline-info rounded-pill"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal">@svg('fluentui-calendar-chat-24-o', 'fea  icon-sm')</i> &nbsp;
                                                            Enviar uma mensagem </a>
                                                    </div>
                                                    <div class="p-2 rounded-3 bg-white col-12">
                                                        <a href="" class="btn btn-outline-info rounded-pill"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#avaliar">@svg('fluentui-star-24-o', 'fea   icon-sm')</i> &nbsp; Avaliar
                                                            o imóvel </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion p-0 m-0 " id="share">
                                <div class="accordion-item col-12 rounded-3 p-0 m-0 bg-white ">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button border-0 bg-white text-dark fw-bold"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#share_one"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            Partilhar Imóvel
                                        </button>
                                    </h2>
                                    <div id="share_one" class="accordion-collapse border-0 collapse show"
                                        aria-labelledby="share_one" data-bs-parent="#share">
                                        <div class="accordion-body text-muted bg-white">
                                            <div class="text-muted text-dark">
                                                <div class="row justify-content-start rounded-3">
                                                    @foreach ($socialMedias as $key => $socialMedia)
                                                        <div class="p-2 rounded-3 bg-white col-6">
                                                            <a href=" {{ $socialMedia }}" target="_blank"
                                                                class="btn btn-outline-info rounded-pill">@svg('fab-' . $key, 'fea icon-sm')</i>&nbsp;
                                                                {{ $key }} </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @livewire('message-agenda', ['corretor_id' => $imovel->corretor_id, 'imovel_id' => $imovel->id])
    @livewire('avaliar', ['imovel_id' => $imovel->id])

    <section class="section bg-facebook-darken p-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 pb-2">
                        <span class="badge rounded-pill bg-soft-warning">Imóveis relacionados</span>
                        <h4 class="title mb-4 text-dark">Imóveis relacionados</h4>
                        <p class="text-muted para-desc mx-auto mb-0"></p>
                    </div>
                </div>
                <!--end col-->
            </div>
            <div class="tiny-four-item">
                @foreach ($imovel->relectedImovels() as $imovel)
                    <div class="tiny-slide">

                        <div class="card blog border-0 shadow position-relative overflow-hidden m-2">
                            <div class="shop-image position-relative overflow-hidden shadow">
                                <a href="{{ route('posts.show', $imovel->slug) }}">
                                    @if ($imovel->getFirstMedia('posts'))
                                        {{ $imovel->getFirstMedia('posts')->img('', ['class' => 'cover-image']) }}
                                    @else
                                        <img src="{{ asset('website/images/placeholder.png') }}" class="cover-image"
                                            alt="...">
                                    @endif
                                </a>
                            </div>
                            <div class="card-body content p-4">
                                <a href="{{ route('posts.show', $imovel->slug) }}"
                                    class="text-dark product-name h6 d-inline-block ">{{ $imovel->titulo }}</a>
                            </div>
                            <div class="author">
                                <small class="text-light user d-block"><i class="uil uil-user"></i>
                                    {{ $imovel->corretor->name }}</small>
                                <small class="text-light date"><i
                                        class="uil uil-calendar-alt"></i>{{ ' ' . date_format($imovel->created_at, 'j') . ' th, ' }}{{ __(date_format($imovel->created_at, 'F') . ', ') }}
                                    {{ date_format($imovel->created_at, 'Y') }}</small>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
@push('css')
    <style>
        .bg-overlay {
            background: rgba(0, 0, 0, .3) !important;
        }
    </style>
@endpush
@push('js')
    <script src="{{ asset('website/js/page/post.js') }}"></script>
@endpush
