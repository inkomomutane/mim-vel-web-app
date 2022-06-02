        <!-- Footer Start -->
        <footer class="footer bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                        <a href="{{ route('welcome') }}" class="logo-footer">
                            <img src="{{ asset('website/images/logo-light.png') }}" height="24" alt="">
                        </a>
                        <p class="mt-4">Mimóvel é uma empresa de aluguel, compra de imóveis localizada na
                            cidade da beira, reconhecida pelos seus excelentes edificios que superam as expectativas dos
                            clientes.</p>
                        <ul class="list-unstyled social-icon foot-social-icon mb-0 mt-4">
                            <li class="list-inline-item"><a href="https://www.facebook.com/mimovel.meuimovel"
                                    class="rounded" target="_blank">@svg('fab-facebook', 'fea icon-sm')</a></li>
                            <li class="list-inline-item"><a href="https://www.instagram.com/mimovel_imobiliaria/"
                                    class="rounded" target="_blank">@svg('fab-instagram', 'fea icon-sm')</a></li>
                            <li class="list-inline-item"><a href="https://api.whatsapp.com/send?phone=258849500900"
                                    class="rounded" target="_blank">@svg('fab-whatsapp', 'fea icon-sm')</a></li>

                        </ul>
                        <!--end icon-->
                    </div>
                    <!--end col-->

                    <div class="col-lg-4 col-md-8 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">

                        <h5 class="text-dark footer-head">Links de navegação</h5>
                        <ul class="list-unstyled footer-list mt-4">

                            <li><a href="{{ route('welcome') }}" class="text-foot"><i
                                        class="uil uil-angle-right-b me-1"></i>Início</a></li>
                            <li><a href="{{ route('posts') }}" class="text-foot"><i
                                        class="uil uil-angle-right-b me-1"></i>Todos imóveis</a></li>
                            <li><a href="{{ route('sobre') }}" class="text-foot"><i
                                        class="uil uil-angle-right-b me-1"></i>Sobre nós</a></li>
                            <li><a href="{{ route('contacto') }}" class="text-foot"><i
                                        class="uil uil-angle-right-b me-1"></i>Contacto</a></li>
                            <li><a href="{{ route('termos') }}" class="text-foot"><i
                                        class="uil uil-angle-right-b me-1"></i>Termos e condições de uso</a></li>

                        </ul>
                    </div>
                    <!--end col-->


                    <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <h5 class="text-dark footer-head">Contactos</h5>
                        <p>
                            Beira, Chaimite <br><br>
                            <strong>Telefone - 1:</strong>&nbsp;&nbsp;<a href="tel:+258869500900"
                                class="text-foot"> ( +258 ) 86 9500 900 </a><br>
                            <strong>Telefone - 2:</strong>&nbsp;&nbsp;<a href="tel:+258849500900"
                                class="text-foot"> ( +258 ) 84 9500 900 </a><br>
                            <strong>Email:</strong>&nbsp;&nbsp;<a href="mailto:support@mimovel.com"
                                class="text-foot">support@mimovel.com</a><br>
                        </p>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </footer>
        <!--end footer-->
        <footer class="footer footer-bar text-light bg-dark">
            <div class="container text-center">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="text-sm-start">
                            <p class="mb-0">©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> {{ config('app.name', 'Mimóvel') }}. Design with <i
                                    class="mdi mdi-heart text-danger"></i>
                                by <a href="https://www.conectaapps.com" target="_blank" class="text-light">Conecta
                                    Aplicativos</a>.
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
