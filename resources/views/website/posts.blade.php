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
                        <h4 class="display-4 fw-bold text-white title-dark mb-3"> Imóveis </h4>

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
                <a href="#" class="text-dark" data-bs-toggle="offcanvas" data-bs-target="#filtros"
                    aria-controls="offcanvasRight">
                    @svg('fluentui-filter-16', 'fea icon-md')
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
                @livewire('search-imovel')
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

        </div>
    </div>


    {{-- <div class="container" style="padding-top: 3.5rem">
        <div class="dropdown mt-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown button
            </button>
        </div>
        <div class="d-flex dropdown-hover-all">
          <div class="dropdown mt-3">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton222" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dropdown Hover
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton222">
                  <a class="dropdown-item" href="#">Action</a>
                  <div class="dropdown dropend">
                      <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Layouts</a>
                      <div class="dropdown-menu" aria-labelledby="dropdown-layouts">
                          <a class="dropdown-item" href="#">Basic</a>
                          <a class="dropdown-item" href="#">Compact Aside</a>
                          <div class="dropdown-divider"></div>
                          <div class="dropdown dropend">
                              <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Custom</a>
                              <div class="dropdown-menu" aria-labelledby="dropdown-layouts">
                                  <a class="dropdown-item" href="#">Fullscreen</a>
                                  <a class="dropdown-item" href="#">Empty</a>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="#">Magic</a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
        </div>
    </div> --}}
    @endsection
@push('js')
    <script>
        easy_background("#posts", {
            slide: ["{{ asset('website/images/real/p9 (3).jpg') }}"],
            delay: [200]
        });
    </script>
    <script src="{{ asset('website/js/aos.js') }}"></script>
    <script>


        </script>
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
    <link href="{{ asset('website/css/aos.css') }}" rel="stylesheet" type="text/css" />
@endpush
