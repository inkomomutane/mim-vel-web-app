@extends('website.layouts.website')
@section('title', config('app.name', 'Mimóvel'))
@section('content')
    <!-- Hero Start -->
    <section class="bg-half d-table w-100" id="home">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-12">
                    <div class="title-heading text-center my-3">
                        <h4 class="display-4 fw-bold text-white title-dark mb-3">
                            <img src="{{ asset('website/images/logo-light.png') }}" alt="Mimóvel" width="250">
                        </h4>
                        {{-- <p class="para-desc text-white-50 mb-0 mx-auto">Agência Imobiliária: Intermediações na compra, venda
                            e arendamento de imóveis.</p> --}}
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- Hero End -->

    <!-- Start -->
    <section class="section  bg-facebook">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-11 col-12 text-center mt-sm-0 pt-sm-0 p-5">

                    <div class="text-center features-absolute bg-dark-light p-sm-0 p-md-2 p-lg-5 rounded-3">

                        <div class="tab-content bg-white rounded-3 shadow">

                            <div class="card border-0 tab-pane fade show active" id="rent" role="tabpanel" aria-labelledby="rent-login">
                                <form class="card-body text-start" action="{{ route('posts.search') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="home_link" id="home_link" readonly value="{{Hash::make('home_link')}}">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6 col-12">
                                            <div class="mb-3 text-start">
                                                <div class="form-icon position-relative">

                                                    <i data-feather="search" class="fea icon-sm icons"></i>
                                                    <input name="search" id="location" type="text"
                                                        class="form-control ps-5 p-2" placeholder="Pesquisar por titulo, bairro, cidade... :">

                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->

                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="mb-3 text-start">
                                                <select class="form-control form-select alugar p-2" id="buy-properties3"
                                                    name="rent[]" multiple>
                                                    <option placeholder> Arendar ou comprar</option>
                                                    <option value="1">Alugar</option>
                                                    <option value="0">Comprar</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-6 col-12 ">
                                            <button type="submit" class="btn btn-warning">
                                                <i data-feather="search" class="fea icon-sm icons"></i>
                                                Pesquisar</button>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>
                                <!--end form-->
                            </div>
                            <!--end teb pane-->
                        </div>
                        <!--end tab content-->
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->


        <div class="container mt-100 mt-60">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="section-title text-center text-lg-start mb-4 mb-lg-0">
                        <span class="badge rounded-pill bg-soft-warning">Destaque</span>
                        <h4 class="title mt-3 mb-4 text-dark">Imóveis mais destacados</h4>
                        <p class="text-muted mx-auto mx-lg-star para-desc mb-0">Imóveis mais visitados e visualizados por
                            usuário do site.
                        </p>
                        <div class="mt-4 d-none d-lg-block">
                            <a href="{{ route('posts') }}" class="btn btn-warning">Ver mais</a>
                        </div>
                    </div>
                </div>
                <!--end col-->

                <div class="col-lg-8 mt-4 mt-lg-0 pt-2 pt-lg-0">
                    <div class="tiny-two-item">

                        @foreach ($destacados as $imovel)
                        <div class="tiny-slide">

                            <div class="card blog border-0 shadow position-relative overflow-hidden m-2">
                                <div class="shop-image position-relative overflow-hidden shadow">
                                    <a href="{{ route('posts.show', $imovel->slug) }}">
                                        @if ($imovel->getFirstMedia('posts'))
                                            {{ $imovel->getFirstMedia('posts')->img('', ['class' => 'cover-image']) }}
                                        @else
                                            <img src="{{ asset('website/images/placeholder.png') }}"
                                                class="cover-image" alt="...">
                                        @endif
                                    </a>
                                </div>
                                <div class="card-body content p-4">
                                    <a href="{{ route('posts.show', $imovel->slug) }}"
                                        class="text-dark product-name h6 d-inline-block ">{{ $imovel->titulo }}</a>
                                    <div class="rating">
                                        <ul class="list-unstyled mb-0">

                                            @for ($i = 0; $i < $imovel->stars(); $i++)
                                                <li class="list-inline-item"><i
                                                        class="mdi mdi-star h5 mb-0 text-warning"></i></li>
                                            @endfor
                                            <li class="list-inline-item text-end">&nbsp; &nbsp;
                                                ({{ $imovel->ratings->count() }} <i
                                                    class="uil uil-user text-muted"></i>)</li>
                                        </ul>
                                    </div>
                                    <ul class="list-unstyled d-flex justify-content-between border-top mt-3 pt-3 mb-0">
                                        <li class="text-muted small">
                                            <i class="uil uil-comment me-1 fea icon-sm text-info"></i>
                                            {{ $imovel->comentarios->count() }} Comentários
                                        </li>
                                        <li class="text-muted small ms-3">
                                            <small>(MZN)</small><strong class="h6">
                                                {{ number_format($imovel->preco,2) }}</strong>
                                        </li>
                                    </ul>
                                    <div class="post-meta d-flex justify-content-end mt-3">
                                        <a href="{{ route('posts.show', $imovel->slug) }}"
                                            class="text-muted readmore text-primary">
                                            <span class="badge rounded-pill bg-soft-primary p-2"> Ver Mais <i
                                                    class="uil uil-angle-right-b align-middle"></i> </span>
                                        </a>
                                    </div>
                                </div>

                            <div class="author">
                                <small class="text-light user d-block"><i class="uil uil-user"></i>
                                    {{ $imovel->corretor->name }}</small>
                                <small class="text-light date"><i
                                        class="uil uil-calendar-alt"></i>{{ ' '. date_format($imovel->created_at, 'j') . ' th, ' }}{{ __(date_format($imovel->created_at, 'F') . ', ') }}
                                    {{ date_format($imovel->created_at, 'Y') }}</small>
                            </div>
                            </div>

                        </div>
                        @endforeach


                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- End -->


    @if(!is_null($banners))
    <section class="section bg-dark p-0 pb-4">
        <div class="tiny-single-item">
            @foreach ($banners as $banner)
            <div class="tiny-slide">
                <div class="card blog border-0 shadow position-relative overflow-hidden m-0">
                    <div class="shop-image position-relative overflow-hidden shadow">
                        {{ $banner->img('', ['class' => 'cover-image-publicity']) }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif


    <section class="section pt-5 bg-facebook-darken"
        style="background: url('{{ asset('website/images/real/build.png') }}') bottom no-repeat;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 pb-2">
                        <span class="badge rounded-pill bg-soft-warning">Recentes</span>
                        <h4 class="title mb-4 text-dark">Imóveis publicados recentemente</h4>
                        <p class="text-muted para-desc mx-auto mb-0"></p>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="row">

                @foreach ($recents as $imovel)
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="card blog rounded border-0 shadow-lg">
                            <a href="{{ route('posts.show', $imovel->slug) }}">
                                <div class="position-relative">
                                    @if ($imovel->getFirstMedia('posts'))
                                        {{ $imovel->getFirstMedia('posts')->img('', ['class' => 'cover-image rounded']) }}
                                    @else
                                        <img src="{{ asset('website/images/placeholder.png') }}"
                                            class="cover-image" alt="...">
                                        @endif <div class="overlay rounded-top bg-dark"></div>
                                </div>
                            </a>
                            <div class="card-body content">
                                <a href="{{ route('posts.show', $imovel->slug) }}"
                                        class="text-dark product-name h6 d-inline-block ">{{ $imovel->titulo }}</a>
                                <div class="rating">
                                    <ul class="list-unstyled mb-0">

                                        @for ($i = 0; $i < $imovel->stars(); $i++)
                                            <li class="list-inline-item"><i class="mdi mdi-star h5 mb-0 text-warning"></i>
                                            </li>
                                        @endfor
                                        <li class="list-inline-item text-end">&nbsp; &nbsp;
                                            ({{ $imovel->ratings->count() }} <i class="uil uil-user text-muted"></i>)
                                        </li>
                                    </ul>
                                </div>
                                <ul class="list-unstyled d-flex justify-content-between border-top mt-3 pt-3 mb-0">
                                    <li class="text-muted small">
                                        <i class="uil uil-comment me-1 fea icon-sm text-info"></i>
                                        {{ $imovel->comentarios->count() }} Comentários
                                    </li>
                                    <li class="text-muted small ms-3">
                                        <small>(MZN)</small><strong class="h6">
                                            {{ number_format($imovel->preco,2) }}</strong>
                                    </li>
                                </ul>
                                <div class="post-meta d-flex justify-content-end mt-3">
                                    <a href="{{ route('posts.show', $imovel->slug) }}"
                                        class="text-muted readmore text-primary">
                                        <span class="badge rounded-pill bg-soft-primary p-2"> Ver Mais <i
                                                class="uil uil-angle-right-b align-middle"></i> </span>
                                    </a>
                                </div>
                            </div>
                            <div class="author">
                                <small class="text-light user d-block"><i class="uil uil-user"></i>
                                    {{ $imovel->corretor->name }}</small>
                                <small class="text-light date"><i
                                        class="uil uil-calendar-alt"></i>{{' '. date_format($imovel->created_at, 'j') . 'th, ' }}{{ __(date_format($imovel->created_at, 'F') . ', ') }}
                                    {{ date_format($imovel->created_at, 'Y') }}</small>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                @endforeach

                <div class="mt-4 d-none d-lg-block col-12">
                    <a href="{{ route('posts') }}" class="w-100  btn btn-warning rounded-pill">Ver todos imóvels</a>
                </div>
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
@endsection
@push('js')
    <script>
        easy_background("#home", {
            slide: ["{{ asset('website/images/real/1.jpg') }}", "{{ asset('website/images/real/2.jpg') }}",
                "{{ asset('website/images/real/3.jpg') }}"
            ],
            delay: [8000, 10000, 12000, ]
        });
    </script>
    <script src="{{ asset('website/js/page/welcome.js') }}"></script>
@endpush
@section('seo')
    <title>@yield('title')</title>
    <meta name="description"
        content="Mimóvel é uma empresa de aluguel, compra de imóveis localizada na cidade da beira, reconhecida pelos seus excelentes edificios que superam as expectativas dos clientes." />
    <meta name="keywords" content="Imóveis, Mimóvel, Casas, Arendar, Comprar, Aluguar" />
    <meta name="author" content="Administrator" />
    <meta name="website" content="{{ config('app.url') }}" />
@endsection
@push('css')
<style>
    .bg-dark-light {
        background-color: #3c414a9c !important;
    }
    .bg-facebook{
        background-color: #f6f6f6 !important;

    }

    .bg-facebook-darken{
        background-color: #dde6e9 !important;

    }
    .cover-image-publicity{
        height: 360px !important;
        width: 100% !important;
        object-fit: cover;
    }
</style>
@endpush
