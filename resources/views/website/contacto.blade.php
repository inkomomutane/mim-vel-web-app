{{-- <iframe src="
" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
@extends('website.layouts.website')
@section('title', 'contacto')
@section('content')
    <!-- Google Map start -->
    <section>
        <div class="container-fluid mt-4 pt-5 d-table">
            <div class="row justify-content-center">
                <div class="col-12 p-0">
                    <div class="card map border-0">
                        <div class="card-body p-0">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1876.5760910156741!2d34.83344555794339!3d-19.833512773555636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1f2a6b28c102d913%3A0xa02e05127dc570d!2zTWltw7N2ZWw!5e0!3m2!1spt-PT!2smz!4v1654153828771!5m2!1spt-PT!2smz"
                                style="border:0" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
                <!--end col-->
                <nav aria-label="breadcrumb" class="d-inline-block col-6 col-md-3" style="margin-top: -1.3rem">
                    <ul class="breadcrumb bg-white rounded shadow mb-0 row">
                        <li class="breadcrumb-item col-5 text-end"><a href="{{ route('welcome') }}">Mimóvel</a></li>
                        <li class="breadcrumb-item active col-5 text-start" aria-current="page">Contactos</li>
                    </ul>
                </nav>
            </div>
            <!--end row-->
        </div>
    </section>
    <!-- Google Map -->

    <section class="section pb-0">
        <div class="container">
            <div class="row">
                <div class=" col-sm-12 col-md-4">
                    <div class="card border-0 text-center features feature-clean">
                        <div class="icons text-primary text-center mx-auto">
                            <i class="uil uil-phone d-block rounded h3 mb-0"></i>
                        </div>
                        <div class="content mt-3">
                            <h5 class="fw-bold">Contactos</h5>
                            <p class="text-muted">Ligue já!</p>
                            <a href="tel:+258849500900" class="text-primary" aria-label="Vodacom"> (+258 ) 84 9500 900</a><br>
                            <a href="tel:+258869500900" class="text-primary"> ( +258 ) 86 9500 900 </a>
                        </div>
                    </div>
                </div><!--end col-->
                
                <div class=" col-sm-12 col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="card border-0 text-center features feature-clean">
                        <div class="icons text-primary text-center mx-auto">
                            <i class="uil uil-envelope d-block rounded h3 mb-0"></i>
                        </div>
                        <div class="content mt-3">
                            <h5 class="fw-bold">Email</h5>
                            <p class="text-muted">Envie sua mensagem a qualquer hora!</p>
                            <a href="mailto:support@mimovel.com" class="text-primary">Support@mimovel.com</a>
                        </div>
                    </div>
                </div><!--end col-->
                
                <div class=" col-sm-12 col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="card border-0 text-center features feature-clean">
                        <div class="icons text-primary text-center mx-auto">
                            <i class="uil uil-map-marker d-block rounded h3 mb-0"></i>
                        </div>
                        <div class="content mt-3">
                            <h5 class="fw-bold">Localização</h5>
                            
                            <p class="text-muted">Rua governador Augusto Castilho<br>Sofala, Beira, 2100</p>
        
                            <a target="_blank" href="https://goo.gl/maps/sSWKpxoYVZFFG6ej7" class="text-primary lightbox">Ver no Google Maps</a>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container mt-100 mt-60 mb-5">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 order-2 order-md-1 p-5">
                    <div class="card border-0 p-5">
                        <div class="card-body p-0 p-5">
                            <img src="{{ asset('website/images/contact.svg') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-6 col-md-6 pt-2 pt-sm-0 order-1 order-md-2">
                    <div class="card shadow rounded border-0">
                        <div class="card-body py-5">
                            <h4 class="card-title">Envie sua mensagem</h4>
                            <div class="custom-form mt-3">
                                <form method="post" name="myForm" >
                                    <p id="error-msg" class="mb-0"></p>
                                    <div id="simple-msg"></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Teu nome <span class="text-danger"></span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                                    <input name="name" id="name" type="text" class="form-control ps-5" placeholder="Teu nome :">
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Teu email <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="mail" class="fea icon-sm icons"></i>
                                                    <input name="email" id="email" type="email" class="form-control ps-5" placeholder="Teu email :">
                                                </div>
                                            </div> 
                                        </div><!--end col-->
    
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Assunto  <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="book" class="fea icon-sm icons"></i>
                                                    <input name="subject" id="subject" class="form-control ps-5" placeholder="Assunto :">
                                                </div>
                                            </div>
                                        </div><!--end col-->
    
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Mensagem <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="message-circle" class="fea icon-sm icons clearfix"></i>
                                                    <textarea name="comments" id="comments" rows="4" class="form-control ps-5" placeholder="Messagem :"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" id="submit" name="send" class="btn btn-primary">Enviar mensagem</button>
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form>
                            </div><!--end custom-form-->
                        </div>
                    </div>
                </div><!--end col-->

                
            </div><!--end row-->
        </div><!--end container-->
    </section>

    
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
