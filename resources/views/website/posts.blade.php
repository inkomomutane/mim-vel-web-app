@extends('website.layouts.website')
@section('title', 'Imóveis')
@section('content')
    <!-- Hero Start -->
    <section class="bg-half bg-dark d-table w-100" id="posts">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level">
                        <h1 class="heading text-white title-dark mb-4" style="opacity: 0.5; font-family: 'Montserrat', sans-serif;"><span style="color: rgb(6, 98, 149)">M</span><span style="color: rgb(254, 104, 1)">IMÓVEL</span><span style="color: rgb(6, 98, 149);font-size:30px">.COM</span></h1>

                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- Hero End -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top p-3 shadow-sm">
        <div class="container-fluid">
            <span class="navbar-toggler border-0">
                <a href="#" class="text-dark fw-bolder" data-bs-toggle="offcanvas" data-bs-target="#filtros"
                    aria-controls="offcanvasRight">
                    @svg('fluentui-filter-16', 'fea icon-sm')
                    Filtros
                </a>
            </span>

            <div class="collapse navbar-collapse">
                @livewire('post-filter')
            </div>
        </div>
    </nav>
    <section class="p-3 bg-facebook-darken">
        <div class="container">
            <div class="row">
                <div class="posts-rendered">
                    @foreach ($posts as $imovel)
                        <div class="col-lg-12 col-12 mb-4 pb-2 " data-aos="fade-up" data-aos-duration="300">
                            <x-post-card :imovel="$imovel" author="{{ $imovel->corretor->name }}" title="{{ $imovel->titulo }}"
                                :description="$imovel->descricao" price="{{ $imovel->preco }}" :ratings="$imovel->stars()" quartos="{{ $imovel->quartos }}"
                                area="{{ $imovel->area }}" suites="{{ $imovel->suites }}" banheiros="{{ $imovel->banheiros }}"
                                piscinas="{{ $imovel->piscinas }}" garagens="{{ $imovel->garagens }}"
                                url="{{ route('posts.show', $imovel->slug) }}" :date="$imovel->created_at"
                                comments="{{ $imovel->comentarios->count() }}" ano="{{ $imovel->ano }}"
                                tipo="{{ $imovel->tipo_de_imovel->nome }}" :andares="$imovel->andares" :ano="$imovel->ano">
                                <x-slot:image>
                                    @if ($imovel->getFirstMedia('posts'))
                                        {{ $imovel->getFirstMedia('posts')->img('', ['class' => 'slide-inner image-fluid cover-image-5'])->lazy() }}
                                    @else
                                        <img src="{{ asset('website/images/placeholder.png') }}"
                                            class="slide-inner image-fluid cover-image-5" alt="No Image">
                                    @endif
                                </x-slot:image>
                            </x-post-card>
                        </div>
                    @endforeach
                    <div class="col-12 mt-4 pt-2  row justify-content-between">
                        <div class="col-sm-12">
                            {{ $posts->links() }}
                        </div>
                    </div>
                    @push('js')
                        <script>
                            window.addEventListener('page-updated', (e) => {
                                document.documentElement.scrollTop = document.querySelector('#posts').clientHeight;
                            });
                        </script>
                    @endpush
                </div>
            </div>
        </div>

    </section>
    <!--end col-->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="filtros" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Filtrar Imóveis</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            @livewire('post-filter-mobile')
        </div>
    </div>

    <form action="{{ route('clear_filters') }}" id="clear_posts_filters" method="post">@csrf</form>
    @endsection
@push('js')
    <script>
         window.easy_background("#posts", {
            slide: ["{{ asset('website/images/real/p9 (3).jpg') }}"],
            delay: [200]
        });
    </script>

    <script>
        function clearPostsFilters(){
            document.querySelector('#clear_posts_filters').submit();
        }
    </script>
    <script src="{{ asset('website/js/page/posts.js') }}"></script>
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

@endpush
