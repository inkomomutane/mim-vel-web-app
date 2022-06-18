@extends('website.layouts.website')
@section('title','Imóveis')
@section('content')
        <!-- Hero Start -->
        <section class="bg-half bg-dark d-table w-100" id="posts">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <div class="page-next-level">
                            <h4 class="display-4 fw-bold text-white title-dark mb-3"> Imóveis </h4>
                            <div class="page-next">
                                <nav aria-label="breadcrumb" class="d-inline-block">
                                    <ul class="breadcrumb bg-white rounded shadow mb-0">
                                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Mimóvel</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Posts</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>  <!--end col-->
                </div><!--end row-->
            </div> <!--end container-->
        </section><!--end section-->
        <!-- Hero End -->



        @livewire('search-imovel')

@endsection
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
@section('seo')
<title>@yield('title')</title>
<meta name="description"
    content="Mimóvel é uma empresa de aluguel, compra de imóveis localizada na cidade da beira, reconhecida pelos seus excelentes edificios que superam as expectativas dos clientes." />
<meta name="keywords" content="Imóveis, Mimóvel, Casas, Arendar, Comprar, Aluguar" />
<meta name="author" content="Administrator" />
<meta name="website" content="{{ config('app.url') }}" />
@endsection



