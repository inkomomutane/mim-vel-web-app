@if ($images ?? '')
    @if ($images->count() > 1)

        <div class="owl-carousel owl-theme w-100" style="padding-top: 65px">
            @foreach ($images as $image)

                <figure class="figure">
                    <img src="{{ asset('storage') }}/{{ $image }}" class="figure-img img-fluid rounded"
                        alt="A generic square placeholder image with rounded corners in a figure.">
                      </figure>

            @endforeach
        </div>
    @elseif ($images)
        <div class="w-100">
            <img src="{{ asset('storage') }}/{{ $images->first() }}" class="figure-img img-fluid rounded"
                alt="A generic square placeholder image with rounded corners in a figure.">
            </figure>
        </div>
    @endif
@endif



{{-- <section class="about-banner relative" style="min-heigth:530px; background :
linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0) 70%) 0% 0%/cover,url({{ asset('storage') }}/{{$image}}) no-repeat center;
  ">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                </div>
            </div>
        </div>
    </section> --}}
