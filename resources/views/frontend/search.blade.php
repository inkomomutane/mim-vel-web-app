@extends('layouts.frontend.main.root')
@section('banner')

    <div class="owl-carousel owl-theme col-sm-12">
        <section class="about-banner relative" style="
        background: url({{ asset('frontend/img/top-banner.jpg') }}) center;
      ">
            <div class="overlay overlay-bg"></div>
            <div class="container">
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="about-content col-lg-12">
                        <h1 class="text-white">
                            Contacte - nos
                        </h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="about-banner relative" style="
            background: url({{ asset('frontend/img/top-banner.jpg') }}) center;
            ">
            <div class="overlay overlay-bg"></div>
            <div class="container">
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="about-content col-lg-12">
                        <h1 class="text-white">
                            Mimóvel
                        </h1>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection



@section('content')
<div class="whole-wrap">
    <div class="container">

        <div class="section-top-border">
            <h3 class="mb-30">Results ...</h3>
            @for ($i = 0; $i < 10; $i++)
            <div class="row py-3">
                <div class="col-md-3">
                    <img src="{{ asset('frontend/img/elements/d.jpg')}}" alt="" class="img-fluid">
                </div>
                <div class="col-md-9 mt-sm-20 left-align-p">
                    <p>Recently, the US Federal government banned online casinos from operating in America by making it illegal to transfer money to them through any US bank or payment system. As a result of this law, most of the popular online casino networks such as Party Gaming and PlayTech left the United States. Overnight, online casino players found themselves being chased by the Federal government. But, after a fortnight, the online casino industry came up with a solution and new online casinos started taking root. These began to operate under a different business umbrella, and by doing that, rendered the transfer of money to and from them legal. A major part of this was enlisting electronic banking systems that would accept this new clarification and start doing business with me. Listed in this article are the electronic banking systems that accept players from the United States that wish to play in online casinos.</p>
                </div>
            </div>
            @endfor
        </div>

    </div>
</div>
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
