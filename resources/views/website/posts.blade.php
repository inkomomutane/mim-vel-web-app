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

        <!-- Shape Start -->
        <div class="position-relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!--Shape End-->

        <!-- Blog STart -->
        <section class="section">
            <div class="container">
                <div class="row">
                   @foreach ($posts as $imovel)
                   <div class="col-lg-4 col-md-6 mb-4 pb-2">
                    <div class="card blog rounded border-0 shadow overflow-hidden">
                        <div class="position-relative">
                           @if ($imovel->getFirstMedia('posts')->img('',['class'=>'cover-image']))
                            {{$imovel->getFirstMedia('posts')->img('',['class'=>'cover-image'])}}
                            @else
                            <img  src="https://via.placeholder.com/{{ rand(200,500) }}x{{ rand(300,1000) }}" class="cover-image" alt="...">
                           @endif
                            <div class="overlay rounded-top bg-dark"></div>

                        </div>
                        <div class="card-body content">
                            <h5><a href="{{ route('posts.show', $imovel->slug) }}" class="card-title title text-dark">{{$imovel->titulo}}</a></h5>
                            <div class="post-meta d-flex justify-content-between mt-3">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                                </ul>
                                <a href="{{ route('posts.show', $imovel->slug) }}" class="text-muted readmore">Ver mais <i class="uil uil-angle-right-b align-middle"></i></a>
                            </div>
                        </div>
                        <div class="author">
                            <small class="text-light user d-block"><i class="uil uil-user"></i> {{$imovel->corretor->name}}</small>
                            <small class="text-light date"><i class="uil uil-calendar-alt"></i>{{date_format($imovel->created_at,'j').'th, '}}{{__(date_format($imovel->created_at,'F'). ', ')}}
                                {{date_format($imovel->created_at,'Y')}}</small>
                        </div>
                    </div>
                </div>
                   @endforeach


                  {{$posts->links()}}
                    <!-- PAGINATION END -->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- Blog End -->
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