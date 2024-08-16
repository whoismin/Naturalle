<footer class="footer section has-bg-image text-center"
        style="background-image: url('{{ asset('assets/images/Footer2.jpg') }}')">
    <div class="container">

        <div class="footer-top grid-list">

            <div class="footer-brand has-before has-after">

                <a href="{{ url('/') }}" class="logo">
                    <img src="{{ asset('assets/images/LogoBrancaNaturalle.png') }}" width="270" height="80" loading="lazy" alt="Naturalle Home">
                </a>

                <address class="body-4">
                    Restaurante Naturalle, São Paulo 123
                </address>

                <a href="mailto:naturalle@gmail.com" class="body-4 contact-link">naturalle@gmail.com</a>

                <a href="tel:+5511981765432" class="body-4 contact-link">Telefone: (11) 98176-5432</a>

                <p class="body-4">
                    Funcionamento: 11:00 às 23:30
                </p>

                <div class="wrapper">
                    <div class="separator"></div>
                    <div class="separator"></div>
                    <div class="separator"></div>
                </div>

                <p class="title-1">Cadastre-se e ganhe</p>

                <p class="label-1">
                    Cadastre-se e Ganhe <span class="span">25% Off</span>
                </p>

            </div>

            <ul class="footer-list">

                <li>
                    <a href="{{ url('/') }}" class="label-2 footer-link hover-underline">Home</a>
                </li>

                <li>
                    <a href="#Menu" class="label-2 footer-link hover-underline">Menu</a>
                </li>

                <li>
                    <a href="{{ url('/sobrenos') }}" class="label-2 footer-link hover-underline">Sobre nós</a>
                </li>

                <li>
                    <a href="{{ url('/SaborSolidario') }}" class="label-2 footer-link hover-underline">Nosso Projeto</a>
                </li>

                <li>
                    <a href="{{ url('/delivery') }}" class="label-2 footer-link hover-underline">Delivery</a>
                </li>

            </ul>

            <ul class="footer-list">

                <li>
                    <a href="#" class="label-2 footer-link hover-underline">Facebook</a>
                </li>

                <li>
                    <a href="#" class="label-2 footer-link hover-underline">Instagram</a>
                </li>

                <li>
                    <a href="#" class="label-2 footer-link hover-underline">Twitter</a>
                </li>

                <li>
                    <a href="#" class="label-2 footer-link hover-underline">Google Maps</a>
                </li>

            </ul>

        </div>
        
    </div>
</footer>
