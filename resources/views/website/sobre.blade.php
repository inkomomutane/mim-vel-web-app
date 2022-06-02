{{-- file:///C:/Users/USER/Downloads/landrickhtml-311/landrickhtml-311/Landrick_v3.1.1/HTML/page-job-company.html --}}
@extends('website.layouts.website')
@section('title','Sobre-nós')
@section('content')
        <!-- Hero Start -->
        <section class="bg-half-260 d-table w-100" style="background: url('{{ asset('website/images/real/p9 (3).jpg')}}') center center;">
            <div class="bg-overlay"></div>
        </section><!--end section-->
        <!-- Hero End -->
                <!-- Company Detail Start -->
                <section class="section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-5 col-12">
                                <div class="job-profile position-relative">
                                    <div class="rounded shadow bg-white">
                                        <div class="text-center py-5 border-bottom">
                                            <img src="{{ asset('website/images/logo.jpg') }}" class="avatar avatar-medium mx-auto rounded-circle d-block" alt="">
                                            <h5 class="mt-3 mb-0">Mimóvel</h5>
                                            <p class="text-muted mb-0">Imobiliária</p>
                                        </div>
        
                                        <div class="p-4">
                                            <h5>Detalhes :</h5>
                                            <ul class="list-unstyled mb-4">
                                                <li class="h6"><i data-feather="map-pin" class="fea icon-sm text-warning me-3"></i><span class="text-muted">&nbsp; Localização :</span>&nbsp; Beira, Sofala.</li>
                                                <li class="h6"><i data-feather="link" class="fea icon-sm text-warning me-3"></i><span class="text-muted">&nbsp; Empresa :</span>&nbsp; Mimóvel</li>
                                                <li class="h6"><i data-feather="facebook" class="fea icon-sm text-warning me-3"></i><a href="https://www.facebook.com/mimovel.meuimovel" target="_blank" class="text-dark"><span class="text-muted">&nbsp; Redes :</span>&nbsp; Facebbok</a></li>
                                                <li class="h6"><i data-feather="instagram" class="fea icon-sm text-warning me-3"></i><a href="https://www.instagram.com/mimovel_imobiliaria"  target="_blank" class="text-dark"><span class="text-muted">&nbsp; Redes :</span>&nbsp; Instagram</a></li>
                                            </ul>
                                            <div class="d-grid">
                                                <a href="javascript:void(0)"  class="btn btn-primary">Contactar</a>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="map mt-4 pt-2">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1876.5760910156741!2d34.83344555794339!3d-19.833512773555636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1f2a6b28c102d913%3A0xa02e05127dc570d!2zTWltw7N2ZWw!5e0!3m2!1spt-PT!2smz!4v1654153828771!5m2!1spt-PT!2smz" style="border:0" class="rounded" allowfullscreen=""></iframe>
                                    </div>
                                </div>
                            </div><!--end col-->
        
                            <div class="col-lg-8 col-md-7 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                <div class="ms-md-4">
                                    <h4>Sobre nós :</h4>
                                    <p class="text-muted"></p>
                                    <div class="row">
                                        <div class="col-12 mt-4 pt-2">
                                            <a href="{{ route('posts') }}" class="btn btn-primary">Ver imóveis <i class="uil uil-angle-right-b align-middle"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end container-->
                </section><!--end section-->
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

@endpush