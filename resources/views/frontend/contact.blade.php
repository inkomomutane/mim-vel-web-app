@extends('layouts.frontend.main.root')


@section('content')
    <div class="col-sm-12">
        <div class="embed-responsive embed-responsive-21by9">
            <iframe class="embed-responsive-item"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d742.8110752724408!2d34.83414282915825!3d-19.833570999166096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTnCsDUwJzAwLjkiUyAzNMKwNTAnMDQuOSJF!5e1!3m2!1spt-PT!2smz!4v1628713794045!5m2!1spt-PT!2smz"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
    <!-- Start contact-page Area -->
    <section class="contact-page-area section-gap py-5 m-5">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 d-flex flex-column address-wrap">
                    <div class="single-contact-address d-flex flex-row">
                        <div class="icon">
                            <span class="lnr lnr-home"></span>
                        </div>
                        <div class="contact-details">
                            <h5>Beira, Chaimite</h5>
                            <p>

                            </p>
                        </div>
                    </div>
                    <div class="single-contact-address d-flex flex-row">
                        <div class="icon">
                            <span class="lnr lnr-phone-handset"></span>
                        </div>
                        <div class="contact-details">
                            <h5> <a href="tel:+258849500900">84 9500 900</a> ou <a href="tel:+258869500900">86 9500 900</a>
                            </h5>
                            <p>Segunda a Sexta das 8:00 a 16:00</p>
                        </div>
                    </div>
                    <div class="single-contact-address d-flex flex-row">
                        <div class="icon">
                            <span class="lnr lnr-envelope"></span>
                        </div>
                        <div class="contact-details">
                            <h5>support@mimovel.com</h5>
                            <p>Envie sua mensagem a qualquer hora!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <form class="form-area contact-form text-right" id="myForm" action="mail.php" method="post">
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <input name="name" placeholder="Digite seu nome" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Digite seu nome'" class="common-input mb-20 form-control"
                                    required="" type="text" />

                                <input name="email" placeholder="digite seu email"
                                    pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Digite seu email'"
                                    class="common-input mb-20 form-control" required="" type="email" />

                                <input name="subject" placeholder="Digite o motivo" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Digite o motivo'" class="common-input mb-20 form-control"
                                    required="" type="text" />
                            </div>
                            <div class="col-lg-6 form-group">
                                <textarea class="common-textarea form-control" name="message"
                                    placeholder="Digite a mensagem" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Digite a mensagem'" required=""></textarea>
                            </div>
                            <div class="col-lg-12">
                                <div class="alert-msg" style="text-align: left;"></div>
                                <button class="genric-btn primary" style="float: right;">
                                    Enviar mensagem
                                </button>
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
