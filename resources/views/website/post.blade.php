{{-- file:///C:/Users/USER/Downloads/landrickhtml-311/landrickhtml-311/Landrick_v3.1.1/HTML/index-corporate.html
file:///C:/Users/USER/Downloads/landrickhtml-311/landrickhtml-311/Landrick_v3.1.1/HTML/page-blog-detail-two.html
file:///C:/Users/USER/Downloads/landrickhtml-311/landrickhtml-311/Landrick_v3.1.1/HTML/shop-product-detail.html --}}

@extends('website.layouts.website')
@section('title','Imóveis')
@section('seo')
    {!! seo()->for($imovel) !!}
@endsection
@section('content')        <!-- Hero Start -->
<section class="bg-half d-table w-100" id="home">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-12">
                <div class="title-heading text-center my-3">
                    <h4 class="display-4 fw-bold text-white title-dark mb-3">Imóvel</h4>
                    <h5 class="para-desc text-white-50 mb-0 mx-auto">{{$imovel->titulo}}</h5>
                </div>
            </div>
        </div><!--end row-->
    </div> <!--end container-->
    
</section><!--end section-->

<!-- Hero End -->
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-md-2 d-none d-md-block">
                        <ul class="list-unstyled text-center sticky-bar social-icon mb-0">
                            <li class="mb-3 h6">Share</li>
                            <li><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                            <li><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                            <li><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                            <li><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                        </ul><!--end icon-->
                    </div>

                    <div class="col-md-10">
                        <p class="text-muted">This is required when, for example, the final text is not yet available. Dummy text is also known as 'fill text'. It is said that song composers of the past used dummy texts as lyrics when writing melodies in order to have a 'ready-made' text to sing with the melody.</p>
                        
                        <ul class="list-unstyled d-flex justify-content-between mt-4">
                            <li class="list-inline-item user me-2"><a href="javascript:void(0)" class="text-muted"><i class="uil uil-user text-dark"></i> Calvin Carlo</a></li>
                            <li class="list-inline-item date text-muted"><i class="uil uil-calendar-alt text-dark"></i> 13th August, 2019</li>
                        </ul>
                        
                        <img src="images/blog/bg1.jpg" class="img-fluid rounded-md shadow" alt="">

                        <h5 class="mt-4">Mornings contain the secret to an extraordinarily successful life</h5>

                        <p class="text-muted">Due to its widespread use as filler text for layouts, non-readability is of great importance: human perception is tuned to recognize certain patterns and repetitions in texts. If the distribution of letters and 'words' is random, the reader will not be distracted from making a neutral judgement on the visual impact and readability of the typefaces (typography), or the distribution of text on the page (layout or type area).</p>

                        <h5 class="mt-4">Comments :</h5>

                        <ul class="media-list list-unstyled mb-0">
                            <li class="mt-4">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <a class="pe-3" href="#">
                                            <img src="images/client/01.jpg" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                                        </a>
                                        <div class="flex-1 commentor-detail">
                                            <h6 class="mb-0"><a href="javascript:void(0)" class="text-dark media-heading">Lorenzo Peterson</a></h6>
                                            <small class="text-muted">15th August, 2019 at 01:25 pm</small>
                                        </div>
                                    </div>
                                    <a href="#" class="text-muted"><i class="mdi mdi-reply"></i> Reply</a>
                                </div>
                                <div class="mt-3">
                                    <p class="text-muted fst-italic p-3 bg-light rounded">" There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour "</p>
                                </div>
                            </li>

                            <li class="mt-4">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <a class="pe-3" href="#">
                                            <img src="images/client/02.jpg" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                                        </a>
                                        <div class="flex-1 commentor-detail">
                                            <h6 class="mb-0"><a href="javascript:void(0)" class="media-heading text-dark">Tammy Camacho</a></h6>
                                            <small class="text-muted">15th August, 2019 at 05:44 pm</small>
                                        </div>
                                    </div>
                                    <a href="#" class="text-muted"><i class="mdi mdi-reply"></i> Reply</a>
                                </div>
                                <div class="mt-3">
                                    <p class="text-muted fst-italic p-3 bg-light rounded">" There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour "</p>
                                </div>
                            </li>
                            
                            <li class="mt-4">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <a class="pe-3" href="#">
                                            <img src="images/client/03.jpg" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                                        </a>
                                        <div class="flex-1 commentor-detail">
                                            <h6 class="mb-0"><a href="javascript:void(0)" class="media-heading text-dark">Tammy Camacho</a></h6>
                                            <small class="text-muted">16th August, 2019 at 03:44 pm</small>
                                        </div>
                                    </div>
                                    <a href="#" class="text-muted"><i class="mdi mdi-reply"></i> Reply</a>
                                </div>
                                <div class="mt-3">
                                    <p class="text-muted fst-italic p-3 bg-light rounded">" There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour "</p>
                                </div>

                                <ul class="list-unstyled ps-4 ps-md-5 sub-comment">
                                    <li class="mt-4">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <a class="pe-3" href="#">
                                                    <img src="images/client/01.jpg" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                                                </a>
                                                <div class="flex-1 commentor-detail">
                                                    <h6 class="mb-0"><a href="javascript:void(0)" class="text-dark media-heading">Lorenzo Peterson</a></h6>
                                                    <small class="text-muted">17th August, 2019 at 01:25 pm</small>
                                                </div>
                                            </div>
                                            <a href="#" class="text-muted"><i class="mdi mdi-reply"></i> Reply</a>
                                        </div>
                                        <div class="mt-3">
                                            <p class="text-muted fst-italic p-3 bg-light rounded">" There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour "</p>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <h5 class="mt-4">Leave A Comment :</h5>

                        <form class="mt-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Your Comment</label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="message-circle" class="fea icon-sm icons"></i>
                                            <textarea id="message" placeholder="Your Comment" rows="5" name="message" class="form-control ps-5" required=""></textarea>
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Name <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                            <input id="name" name="name" type="text" placeholder="Name" class="form-control ps-5" required="">
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="mail" class="fea icon-sm icons"></i>
                                            <input id="email" type="email" placeholder="Email" name="email" class="form-control ps-5" required="">
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="send d-grid">
                                        <button type="submit" class="btn btn-primary">Send Message</button>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </form><!--end form-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  
@endsection

@push('js')
<script>
    easy_background("#home",
{
    slide: [

    @foreach ($imovel->getMedia('posts') as $media)
    "{{$media->getUrl()}}",
    @endforeach
    ],
    delay: [ @foreach ($imovel->getMedia('posts') as $media) 8000, @endforeach]
}
);
</script>
@endpush