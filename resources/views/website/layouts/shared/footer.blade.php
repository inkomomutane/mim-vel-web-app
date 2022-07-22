        <!-- Footer Start -->
        <footer class="footer text-muted">
            <div class="container px-4 px-md-0">
                <div class="row">
                    <div class="col-lg-3 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                        <a href="{{ route('welcome') }}" class="logo-footer">
                            <img src="{{ asset('website/images/logo-light.png') }}" height="24" alt="">
                        </a>
                        <p class="mt-4 lh-lg">Mimóvel é uma empresa de aluguel, compra de imóveis localizada na
                            cidade da beira, reconhecida pelos seus excelentes edificios que superam as expectativas dos
                            clientes.</p>

                        <!--end icon-->
                    </div>
                    <!--end col-->

                    <div class="col-lg-3 col-md-8 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">

                        <h5 class="text-light footer-head">Links de navegação</h5>
                        <ul class="list-unstyled footer-list mt-4">

                            <li><a href="{{ route('welcome') }}" class="text-muted text-muted"><i
                                        class="uil uil-angle-right-b me-1"></i>Início</a></li>
                            <li><a href="{{ route('posts') }}" class="text-muted"><i
                                        class="uil uil-angle-right-b me-1"></i>Todos imóveis</a></li>
                            <li><a href="{{ route('sobre') }}" class="text-muted"><i
                                        class="uil uil-angle-right-b me-1"></i>Sobre nós</a></li>
                            <li><a href="{{ route('contacto') }}" class="text-muted"><i
                                        class="uil uil-angle-right-b me-1"></i>Contacto</a></li>
                            <li><a href="{{ route('termos') }}" class="text-muted"><i
                                        class="uil uil-angle-right-b me-1"></i>Termos e condições de uso</a></li>
                            <li><a href="{{ route('politicas') }}" class="text-muted"><i
                                        class="uil uil-angle-right-b me-1"></i>Políticas de privacidade</a></li>

                        </ul>
                    </div>
                    <!--end col-->


                    <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <h5 class="text-light footer-head">Contactos</h5>
                        <p>
                            Beira, Chaimite <br><br>
                            <strong>Telefone - 1:</strong>&nbsp;&nbsp;<a href="tel:+258869500900" class="text-muted"> (
                                +258 ) 86 9500 900 </a><br>
                            <strong>Telefone - 2:</strong>&nbsp;&nbsp;<a href="tel:+258849500900" class="text-muted"> (
                                +258 ) 84 9500 900 </a><br>
                            <strong>Email:</strong>&nbsp;&nbsp;<a href="mailto:support@mimovel.com"
                                class="text-muted">Support@mimovel.com</a><br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <h5 class="text-light footer-head">Siga-nos</h5>
                        <ul class="list-unstyled social-icon foot-social-icon mb-0 mt-4">
                            <li class="list-inline-item"><a href="https://www.facebook.com/mimovel.meuimovel"
                                    class="rounded-3 text-white bg-dark" target="_blank">@svg('fab-facebook', 'fea icon-sm')</a></li>
                            <li class="list-inline-item"><a href="https://www.instagram.com/mimovel_imobiliaria/"
                                    class="rounded-3 text-white bg-dark" target="_blank">@svg('fab-instagram', 'fea icon-sm')</a></li>
                            <li class="list-inline-item"><a href="https://api.whatsapp.com/send?phone=258849500900"
                                    class="rounded-3 text-white bg-dark" target="_blank">@svg('fab-whatsapp', 'fea icon-sm')</a></li>

                        </ul>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </footer>
        <!--end footer-->
        <footer class="footer footer-bar text-light border-0 p-3" style="background: #1b2132">
            <div class="container text-center">
                <div class="row align-items-center justify-content-center">
                    <div class="col-sm-6">
                        <div class="text-sm-center">
                            <p class="mb-0"> Copyright ©
                                 {{ config('app.name', 'Mimóvel') }}  {{ now()->year }}
                            </p>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </footer>
        <!--end footer-->
        <!-- Footer End -->
