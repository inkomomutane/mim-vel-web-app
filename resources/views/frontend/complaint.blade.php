@extends('layouts.frontend.main.root')
@section('content')
    <!-- Start contact-page Area -->
<section class="other-issue-area pt-5 mt-5 ml-5 mr-5 pb-5" >
    @if (session('success'))
    <div class="alert alert-success alert-dismissible show fade ml-auto  mr-auto mb-5 col-sm-10">
        <div class="alert-body">
            <button class="close" data-dismiss="alert"><span>×</span></button>
            <strong>{{ session('success') }}</strong>
        </div>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger alert-dismissible show fade ml-auto  mr-auto mb-5 col-sm-10">
        <div class="alert-body">
            <button class="close" data-dismiss="alert"><span>×</span></button>
            <strong>{{ session('error') }}</strong>
        </div>
    </div>
@endif
@if (session('errors'))
    <div class="alert alert-danger alert-dismissible show fade ml-auto  mr-auto mb-5 col-sm-10">
        <div class="alert-body">
            <button class="close" data-dismiss="alert"><span>×</span></button>
            @error('nome')
                <strong>{{ $message }}</strong>
            @enderror
        </div>
    </div>
@endif
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form class="form-area contact-form text-right" action="{{ route('complaint.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-5 form-group">
                            <input name="nome_do_denunciante" placeholder="Digite seu nome (Opcional Anónimo)" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Digite seu nome (Opcional Anónimo)'" class="common-input mb-20 form-control"
                                type="text" />
                                <input type="hidden" name="imovel_id" value="{{$imovel->id}}">

                            <input placeholder="Link do imóvel a denunciar" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Link do imóvel a denunciar'" class="common-input mb-20 form-control"
                                required="" type="text" disabled value="{{ route('imo.show',$imovel->id) }}">
                                <label for="denuncia_id" class="float-left">Motivo da denûncia</label>
                                <select name="denuncia_id" id="" class="common-input mb-20 form-control">
                                    @foreach ($denuncias as $denuncia)
                                        <option value="{{$denuncia->id}}">{{$denuncia->denuncia}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="col-lg-5 form-group">
                            <textarea class="common-textarea form-control" name="denuncia"
                                placeholder="Outro motivo da denûncia" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Outro motivo da denûncia'" style="height: 180px"></textarea>
                        </div>
                        <div class="col-lg-2">
                            <div class="alert-msg" style="text-align: left;"></div>
                            <input type="submit" class="genric-btn danger" style="float: right;" value="Denûnciar o imóvel ">
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
