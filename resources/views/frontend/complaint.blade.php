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
