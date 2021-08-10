@extends('layouts.frontend.main.root')

@section('content')
    <section class="other-issue-area section-gap  bg-light pt-5 mt-3">
        <div class="container">
            <div class="row d-flex justify-content-start">

                <div class="demo col-sm-8 ">
                    <div class="item">
                        <div class="clearfix" style="width: 755px" >
                            <ul id="image-gallery" class="gallery list-unstyled cS-hidden">

                                @foreach ($imovel->fotos as $foto)
                                    <li data-thumb="{{ asset('storage/') }}/{{$foto->url}}">
                                        <img src="{{ asset('storage/') }}/{{$foto->url}}">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 pl-4 mt-4 row d-flex justify-content-center ">
                    <form action="#">
                        <div class="mt-10">
                            <input type="text" name="first_name" placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required="" class="single-input">
                        </div>
                        <div class="mt-10">
                            <input type="email" name="EMAIL" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required="" class="single-input">
                        </div>
                        <div class="input-group-icon mt-10">
                            <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                            <input type="text" name="address" placeholder="Contact" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" required="" class="single-input">
                        </div>

                        <div class="mt-10">
                            <textarea class="single-textarea" placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required=""></textarea>
                        </div>
                        <div class="switch-wrap d-flex justify-content-start pt-3">
                            <div class="confirm-switch">
                                <input type="checkbox" id="confirm-switch" checked="">
                                <label for="confirm-switch"></label>
                            </div>
                            <p class="pl-3">Receber notificações</p>
                        </div>
                        <div class="input-group-icon mt-10">
                            <button type="submit" class="w-100 genric-btn success-border">Enviar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="other-issue-area py-4">
        <div class="container">
            <div class="row d-flex justify-content-start">
                <div class="progress-table-wrap">
                    <div class="progress-table">
                        <div class="table-head">
                            <div class="serial">#</div>
                            <div class="country">Countries</div>
                            <div class="visit">Visits</div>
                            <div class="percentage">Percentages</div>
                            <div class="country">Countries</div>
                            <div class="visit">Visits</div>
                            <div class="percentage">Percentages</div>

                        </div>
                        <div class="table-row">
                            <div class="serial">01</div>
                            <div class="country"> <img src="img/elements/f1.jpg" alt="flag">Canada</div>
                            <div class="visit">645032</div>

                            <div class="percentage">
                                <div class="progress">
                                    <div class="progress-bar color-1" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="country"> <img src="img/elements/f1.jpg" alt="flag">Canada</div>
                            <div class="visit">645032</div>

                            <div class="percentage">
                                <div class="progress">
                                    <div class="progress-bar color-1" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <h3 class="mt-20 mb-20">Descrição</h3>
                    <p class="excert">
                        {!! ucfirst($imovel->descricao) !!}
                    </p>

                </div>
            </div>
        </div>
    </section>
<!--Maps-->
    <section class="other-issue-area py-4">
        <div class="container">
            <h5 class="mt-20 mb-20">Mapa</h5>
            <div class="row d-flex justify-content-start maps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d156560.71495239565!2d35.07259699038019!3d-18.71783942299185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-PT!2smz!4v1628148704798!5m2!1spt-PT!2smz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="row container justify-content-between">


            <!-- comment area-->
            <div class="comments-area col-sm-8">
                <h4>05 Comments</h4>
                <div class="comment-list">
                    <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                            <div class="thumb">
                                <img src="{{ asset('frontend/img/blog/c1.jpg') }}" alt="">
                            </div>
                            <div class="desc">
                                <h5><a href="#">Emilly Blunt</a></h5>
                                <p class="date">December 4, 2017 at 3:12 pm </p>
                                <p class="comment">
                                    Never say goodbye till the end comes!
                                </p>
                            </div>
                        </div>
                        <div class="reply-btn">
                               <a href="" class="btn-reply text-uppercase">reply</a>
                        </div>
                    </div>
                </div>
                <div class="comment-list left-padding">
                    <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                            <div class="thumb">
                                <img src="{{ asset('frontend/img/blog/c2.jpg') }}" alt="">
                            </div>
                            <div class="desc">
                                <h5><a href="#">Elsie Cunningham</a></h5>
                                <p class="date">December 4, 2017 at 3:12 pm </p>
                                <p class="comment">
                                    Never say goodbye till the end comes!
                                </p>
                            </div>
                        </div>
                        <div class="reply-btn">
                               <a href="" class="btn-reply text-uppercase">reply</a>
                        </div>
                    </div>
                </div>
                <div class="comment-list left-padding">
                    <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                            <div class="thumb">
                                <img src="{{ asset('frontend/img/blog/c3.jpg') }}" alt="">
                            </div>
                            <div class="desc">
                                <h5><a href="#">Annie Stephens</a></h5>
                                <p class="date">December 4, 2017 at 3:12 pm </p>
                                <p class="comment">
                                    Never say goodbye till the end comes!
                                </p>
                            </div>
                        </div>
                        <div class="reply-btn">
                               <a href="" class="btn-reply text-uppercase">reply</a>
                        </div>
                    </div>
                </div>
                <div class="comment-list">
                    <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                            <div class="thumb">
                                <img src="{{ asset('frontend/img/blog/c4.jpg') }}" alt="">
                            </div>
                            <div class="desc">
                                <h5><a href="#">Maria Luna</a></h5>
                                <p class="date">December 4, 2017 at 3:12 pm </p>
                                <p class="comment">
                                    Never say goodbye till the end comes!
                                </p>
                            </div>
                        </div>
                        <div class="reply-btn">
                               <a href="" class="btn-reply text-uppercase">reply</a>
                        </div>
                    </div>
                </div>
                <div class="comment-list">
                    <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                            <div class="thumb">
                                <img src="{{ asset('frontend/img/blog/c5.jpg') }}" alt="">
                            </div>
                            <div class="desc">
                                <h5><a href="#">Ina Hayes</a></h5>
                                <p class="date">December 4, 2017 at 3:12 pm </p>
                                <p class="comment">
                                    Never say goodbye till the end comes!
                                </p>
                            </div>
                        </div>
                        <div class="reply-btn">
                               <a href="" class="btn-reply text-uppercase">reply</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- comment form-->
            <div class="py-5 col-sm-3 bg-white" style="border:none">

                <form  class="bg-light p-4">
                    <h4>Comment</h4>
                    <div class="form-group pt-3">
                        <textarea class="single-textarea mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                    </div>
                    <a href="#" class="primary-btn text-uppercase">Post Comment</a>
                </form>
            </div>
        </div>
        </div>
    </section>
                <!--End Mpas-->


@endsection
@push('js')
    <script src="{{ asset('frontend/js/lightslider.js') }}"></script>


    <script>
        $(document).ready(function() {
            $("#content-slider").lightSlider({
                loop: true,
                keyPress: true
            });
            $('#image-gallery').lightSlider({
                gallery: true,
                item: 1,
                thumbItem: 6,
                slideMargin: 0,
                speed: 3000,
                auto: false,
                loop: true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }
            });
        });
    </script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/lightslider.css') }}" />
    <style>
        .demo {
            margin-top: 30px;
        }

        li.lslide img {
            width: 100%;
        }
        .chocolat-overlay {
            background-color: #151515;
        }

        .chocolat-wrapper {
            z-index: 999;

        }
        .maps iframe{
            height: 400px;
            width: 100% !important;
        }

    </style>
@endpush
