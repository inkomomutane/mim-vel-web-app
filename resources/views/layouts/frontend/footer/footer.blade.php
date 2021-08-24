<footer class="footer-area section-gap">
    <div class="container">

        <div class="row">
            <div class="col-lg-3  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Sobre Mimóvel</h6>
                    <p>
                        Mimóvel é uma empresa de aluguel, compra de imóveis localizada
                        na cidade da beira, reconhecida pelos seus excelentes edificios
                        que superam as expectativas dos clientes.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Links de navegação</h6>
                    <div class="row">
                        <div class="col">
                            <ul>
                                <li><a href="{{ asset('') }}">Início</a></li>
                                <li><a href="{{ route('imo.index') }}">Ver  todos Imóveis</a></li>
                                <li><a href="#">Parceria</a></li>
                                <li><a href="{{ route('about') }}">Sobre nós</a></li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul>
                                <li><a href="{{ route('contact') }}">Contacto</a></li>
                                <li><a href="{{ route('termos.frontend') }}">Termos e condições de uso</a></li>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4  col-md-4 col-sm-4">
                <img src="{{ asset('/frontend/mimovel/mimovel.png') }}"  class="col" alt="" srcset="">
            </div>
        </div>


        <div class="row footer-bottom d-flex justify-content-between align-items-center">
            <p class="col-lg-8 col-sm-12 footer-text m-0">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                <script>
                    document.write(new Date().getFullYear());
                </script> Todos direitos reservados |  <a href="{{ route('termos.frontend') }}"
                   >Termos e condições de uso</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            <div class="col-lg-4 col-sm-12 footer-social">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-dribbble"></i></a>
                <a href="#"><i class="fab fa-behance"></i></a>
            </div>
        </div>
    </div>
</footer>
