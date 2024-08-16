<header class="header" data-header>
    <div class="container">

        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('assets/images/LogoBrancaNaturalle.png') }}" width="200" height="50" alt="Grilli - Home">
        </a>

        <nav class="navbar" data-navbar>

            <button class="close-btn" aria-label="close menu" data-nav-toggler>
                <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
            </button>

            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('assets/images/LogoBrancaNaturalle.png') }}" width="160" height="50" alt="Grilli - Home">
            </a>

            <ul class="navbar-list">

                <li class="navbar-item">
                    <a href="{{ url('/') }}" class="navbar-link hover-underline {{ request()->is('/') ? 'active' : '' }}">
                        <div class="separator"></div>
                        <span class="span">Home</span>
                    </a>
                </li>

                <li class="navbar-item">
                    <a href="#Menu" class="navbar-link hover-underline">
                        <div class="separator"></div>
                        <span class="span">Menu</span>
                    </a>
                </li>

                <li class="navbar-item">
                    <a href="#about" class="navbar-link hover-underline">
                        <div class="separator"></div>
                        <span class="span">Sobre nós</span>
                    </a>
                </li>

                <li class="navbar-item">
                    <a href="{{ url('/SaborSolidario') }}" class="navbar-link hover-underline">
                        <div class="separator"></div>
                        <span class="span">Nosso Projeto</span>
                    </a>
                </li>

                <li class="navbar-item">
                    <a href="{{ url('/home') }}" class="navbar-link hover-underline">
                        <div class="separator"></div>
                        <span class="span">Delivery</span>
                    </a>
                </li>
                
            </ul>

            <div class="text-center">
                <p class="headline-1 navbar-title"></p>

                <address class="body-4">
                    Restaurant Naturalle, São Paulo 123
                    <br>
                </address>

                <p class="body-4 navbar-text">Funcionamento : 11:00 às 21:00</p>

                <a href="mailto:booking@grilli.com" class="body-4 sidebar-link">naturalle@gmail.com</a>

                <div class="separator"></div>

                <p class="contact-label">Contato</p>

                <a href="tel:+88123123456" class="body-1 contact-number hover-underline">
                    12 23123456
                </a>
            </div>

        </nav>

        <a href="{{ url('/login') }}" id="login-btn" class="btn btn-secondary">
            <span class="text text-1">Login</span>
            <span class="text text-2" aria-hidden="true">Login</span>
        </a>

        <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
            <span class="line line-1"></span>
            <span class="line line-2"></span>
            <span class="line line-3"></span>
        </button>

        <div class="overlay" data-nav-toggler data-overlay></div>

    </div>
</header>
