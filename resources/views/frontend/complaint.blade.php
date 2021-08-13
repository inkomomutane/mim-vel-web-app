@extends('layouts.frontend.main.root')
@section('content')
    <!-- Start contact-page Area -->
<section class="other-issue-area pt-5 mt-5 ml-5 mr-5 pb-5" >
    <div class="container">
        <div class="row">


            <div class="col-lg-12">
                <form class="form-area contact-form text-right" action="{{ route('complaint.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-5 form-group">
                            <input name="nome_do_denunciante" placeholder="Digite seu nome" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Digite seu nome'" class="common-input mb-20 form-control"
                                required="" type="text" />

                            <input name="email" placeholder="digite seu email"
                                pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Digite seu email'"
                                class="common-input mb-20 form-control" required="" type="email" />

                            <input name="imovel_url" placeholder="Link do imóvel a denunciar" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Link do imóvel a denunciar'" class="common-input mb-20 form-control"
                                required="" type="text" />
                        </div>
                        <div class="col-lg-5 form-group">
                            <textarea class="common-textarea form-control" name="denuncia"
                                placeholder="Digite a mensagem" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Digite a denûncia'" required="" style="height: 160px"></textarea>
                        </div>
                        <div class="col-lg-2">
                            <div class="alert-msg" style="text-align: left;"></div>
                            <input type="submit" class="genric-btn primary" style="float: right;" value="  Enviar mensagem">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<!-- End contact-page Area -->
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
