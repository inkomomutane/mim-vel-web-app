{{-- file:///C:/Users/USER/Downloads/landrickhtml-311/landrickhtml-311/Landrick_v3.1.1/HTML/page-job-company.html --}}
@extends('website.layouts.website')
@section('title', 'Sobre-nós')
@section('content')
    <!-- Hero Start -->
    <section class="bg-half bg-dark d-table w-100" id="posts">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level">
                        <h4 class="display-4 fw-bold text-white title-dark mb-3"> Sobre nós </h4>
                        <div class="page-next">
                            <nav aria-label="breadcrumb" class="d-inline-block">
                                <ul class="breadcrumb bg-white rounded shadow mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Mimóvel</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sobre nós</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>  <!--end col-->
            </div><!--end row-->
        </div> <!--end container-->

    </section>
    <!--end section-->
    <!-- Hero End -->
    <!-- Company Detail Start -->
    <section class=" bg-facebook-darken p-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12  d-block rounded-3 ">
                    <div class="company-list card border-0 rounded shadow bg-white sticky sticky-bar">
                        <div class="rounded-3 shadow bg-white">
                            <div class="text-center py-2 border-bottom bg-facebook rounded-3">
                                <img src="{{ asset('website/images/logo.jpg') }}"
                                    class="img-fluid cover-image d-block rounded-3 p-4  rounded-3" alt="">
                            </div>
                            <div class="p-4">
                                <h5>Detalhes :</h5>
                                <ul class="list-unstyled mb-4">
                                    <li class="h6"><i data-feather="map-pin"
                                            class="fea icon-sm text-warning me-3"></i><span class="text-muted">&nbsp;
                                            Localização :</span>&nbsp; Beira, Sofala.</li>
                                    <li class="h6"><i data-feather="link"
                                            class="fea icon-sm text-warning me-3"></i><span class="text-muted">&nbsp;
                                            Empresa :</span>&nbsp; Mimóvel</li>
                                    <li class="h6"><i data-feather="facebook"
                                            class="fea icon-sm text-warning me-3"></i><a
                                            href="https://www.facebook.com/mimovel.meuimovel" target="_blank"
                                            class="text-dark"><span class="text-muted">&nbsp; Redes :</span>&nbsp;
                                            Facebook</a></li>
                                    <li class="h6"><i data-feather="instagram"
                                            class="fea icon-sm text-warning me-3"></i><a
                                            href="https://www.instagram.com/mimovel_imobiliaria" target="_blank"
                                            class="text-dark"><span class="text-muted">&nbsp; Redes :</span>&nbsp;
                                            Instagram</a></li>
                                </ul>
                                <div class="d-grid">
                                    <a href="{{ route('contacto') }}" class="btn btn-primary">Contactar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-12 mt-4 pt-2 mt-sm-0 pt-sm-0">
                    <div class="ms-md-4 rounded-3 bg-white p-5">
                        <h5 class="text-muted">Sobre nós :</h5>
                        <p class="text-muted"></p>
                        <h5 class="mt-lg-5 mt-4 text-muted">Localização no Mapa :</h5>
                        <div class="map mt-4 pt-2">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1876.5760910156741!2d34.83344555794339!3d-19.833512773555636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1f2a6b28c102d913%3A0xa02e05127dc570d!2zTWltw7N2ZWw!5e0!3m2!1spt-PT!2smz!4v1654153828771!5m2!1spt-PT!2smz"
                                style="border:0" class="rounded" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
@endsection
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
@push('js')
<script>
    easy_background("#posts",
        {
            slide: ["{{ asset('website/images/real/p9 (3).jpg')}}"],
            delay: [200]
        }
    );
</script>
@endpush
