@extends('layouts.frontend.app')
@section('title', 'Contacto')
@section('banner')

    <section class="banner_section">
        <div class="iframe-content w-100 embed-responsive embed-responsive-21by9">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1641.3966554472267!2d34.83366851623823!3d-19.833836550799266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1f2a6b28c102d913%3A0xa02e05127dc570d!2zTWltw7N2ZWw!5e1!3m2!1spt-PT!2smz!4v1632402546694!5m2!1spt-PT!2smz"
                height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>
@endsection
@section('content')
    <section class="other-issue-area pb-5 pt-5" style="background: #f0eff1">
        <div class="container">
            <div class="container row">
                <div class="mr-auto ml-auto conatiner row p-4 col-sm-10 justify-content-start d-flex bg-white">


                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact_info p-4">
                                <div class="info_item">
                                    <i class="lnr lnr-home"></i>

                                    <h6>&nbsp; Beira, Chaimite</h6>
                                    <p></p>
                                </div>
                                <div class="info_item">
                                    <i class="lnr lnr-phone-handset"></i>
                                    <h6><a href="tel:+258849500900"> ( +258 ) 84 9500 900 </a></h6>
                                    <p></p>
                                </div>
                                <div class="info_item">
                                    <i class="lnr lnr-phone-handset"></i>
                                    <h6><a href="tel:+258869500900"> ( +258 ) 86 9500 900 </a></h6>
                                    <p></p>
                                </div>
                                <div class="info_item">
                                    <i class="lnr lnr-envelope"></i>
                                    <h6><a href="support@mimovel.com">support@mimovel.com</a></h6>
                                    <p>Envie sua mensagem a qualquer hora!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('css')
    <style>
        h5 ,span{
            font-size: 30px;
            font-weight: 600;
        }

    </style>
@endpush
