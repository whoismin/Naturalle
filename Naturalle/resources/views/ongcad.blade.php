<html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- 
    - TAGS META
  -->
    <title>Naturalle</title>
    <meta name="title" content="Naturalle- restaurante vegano e vegetariano">
    <meta name="description" content="This is a Restaurant html template made by codewithsadee">

    <!-- 
    - ICON DA PÁGINA
  -->
    <link rel="shortcut icon" href="./assets/images/logo.png" type="image/svg+xml">

    <!-- 
    - FONTES
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Forum&display=swap"
        rel="stylesheet">

    <!-- 
    - LINK CSS
  -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="script.js"></script>

    <!-- 
    - PRÉ IMAGENS ANTES DE CARREGAR
  -->
    <link rel="preload" as="image" href="./assets/images/hero-slider-1.jpg">
    <link rel="preload" as="image" href="./assets/images/hero-slider-2.jpg">
    <link rel="preload" as="image" href="./assets/images/hero-slider-3.jpg">

</head>

<body id="top">

    <!-- 
    - #PRELOADER
  -->

    <div class="preload" data-preaload>
        <div class="circle"></div>
        <p class="text">Naturalle</p>
    </div>





    <!-- 
    - #TOP BAR
  -->

    <div class="topbar">
        <div class="container">

            <address class="topbar-item">
                <div class="icon">
                    <ion-icon name="location-outline" aria-hidden="true"></ion-icon>
                </div>

                <span class="span">
                    Restaurante Naturalle, São Paulo 123
                </span>
            </address>

            <div class="separator"></div>

            <div class="topbar-item item-2">
                <div class="icon">
                    <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                </div>

                <span class="span">Funcionamento : 11:00 às 21:00 </span>
            </div>

            <a href="tel:+11234567890" class="topbar-item link">
                <div class="icon">
                    <ion-icon name="call-outline" aria-hidden="true"></ion-icon>
                </div>


                <div class="separator"></div>

                <a href="mailto:booking@restaurant.com" class="topbar-item link">
                    <div class="icon">
                        <ion-icon name="mail-outline" aria-hidden="true"></ion-icon>
                    </div>

                    <span class="span">naturalle@gmail.com</span>
                </a>

        </div>
    </div>





    <!-- 
    - #HEADER
  -->

    <header class="header" data-header>
        <div class="container">

            <a href="#" class="logo">
                <img src="assets/images/LogoBrancaNaturalle.png" width="200" height="50" alt="Grilli - Home">
            </a>

            <nav class="navbar" data-navbar>

                <button class="close-btn" aria-label="close menu" data-nav-toggler>
                    <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
                </button>

                <a href="#" class="logo">
                    <img src="./assets/images/LogoBrancaNaturalle.png" width="160" height="50" alt="Grilli - Home">
                </a>

                <ul class="navbar-list">

                    <li class="navbar-item">
                        <a href="#home" class="navbar-link hover-underline active">
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
                        <a href="{{ url('saborsolidario') }}" class="navbar-link hover-underline">
                            <div class="separator"></div>

                            <span class="span">Nosso Projeto</span>
                        </a>
                    </li>

                    <li class="navbar-item">
                        <a href="home.php" class="navbar-link hover-underline">
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



            <a href="{{ url('login') }}" id="login-btn" class="btn btn-secondary">
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

    <main>
        <section class="section testi text-center has-bg-image"
            style="background-image: url('{{ asset('assets/images/Salada3.png') }}')" aria-label="testimonials">
            <div class="container">
                <div class="quote"></div>

                <p class="headline-2 testi-text"></p>

                <div class="wrapper">
                    <div class="separator"></div>
                    <div class="separator"></div>
                    <div class="separator"></div>
                </div>
            </div>
        </section>

        <br>

        <h2 class="headline-1 text-center">ONGS Cadastradas no Projeto</h2>
        <div class="container2">
            <div class="card">
                <div class="img">
                    <img src="{{ asset('assets/images/MUNDOSEMFOME.png') }}" width="200" height="205">
                </div>
                <div class="content">
                    <p>A ONG "Mundo Sem Fome" tem como missão combater a fome e insegurança alimentar. Seu propósito é
                        fornecer
                        alimentos, educação nutricional e apoio a comunidades carentes, visando eliminar a fome e
                        garantir que
                        todas as pessoas tenham acesso a alimentos nutritivos. Eles impactam a vida de milhões de
                        pessoas,
                        combatendo a fome de maneira direta e eficaz.</p>
                    <div class="marmitas-doadas">
                        <div class="circle">80%</div>
                        MARMITAS DOADAS
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="img">
                    <img src="{{ asset('assets/images/CRIANCASFELIZES.png') }}" width="210">
                </div>
                <div class="content">
                    <p>A ONG "Crianças Felizes" visa assegurar um futuro promissor para crianças em situações
                        vulneráveis. Seu
                        compromisso é oferecer acesso a educação de qualidade, cuidados de saúde e um ambiente seguro e
                        afetuoso, com o propósito de possibilitar a todas as crianças a oportunidade de crescer,
                        aprender e
                        prosperar, independentemente de suas circunstâncias.</p>
                    <div class="marmitas-doadas">
                        <div class="circle">90%</div>
                        MARMITAS DOADAS
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="img">
                    <img src="{{ asset('assets/images/AMORECURA.png') }}" width="200" height="205">
                </div>
                <div class="content">
                    <p>A ONG "Amor e Cura" se dedica a apoiar indivíduos enfrentando desafios de saúde física e mental,
                        oferecendo amor, compreensão e recursos. Eles desempenham um papel vital na promoção da saúde
                        mental e
                        no suporte a pacientes com doenças graves, proporcionando esperança e assistência a pessoas
                        frequentemente isoladas e desamparadas.</p>
                    <div class="marmitas-doadas">
                        <div class="circle">70%</div>
                        MARMITAS DOADAS
                    </div>
                </div>
            </div>
        </div>

        <div class="form-right text-center"
            style="background-image: url('{{ asset('assets/images/form-pattern.png') }}')">
            <h2 class="headline-1 text-center">Contate-nos</h2>

            <p class="contact-label">Telefone:</p>
            <a href="tel:+88123123456" class="body-1 contact-number hover-underline">(11)981765432</a>

            <div class="separator"></div>

            <p class="contact-label">Localização:</p>
            <address class="body-4">
                Restaurant Naturalle, São Paulo, <br>
                123, SP
            </address>

            <p class="contact-label">Almoço:</p>
            <p class="body-4">
                Terça à Domingo<br>
                11:00h - 16:30h
            </p>

            <p class="contact-label">Jantar:</p>
            <p class="body-4">
                Terça à Domingo <br>
                17:00h - 23:30h
            </p>
        </div>

        <script src="{{ asset('assets/js/scripts.js') }}"></script>

    </main>

    <footer class="footer section has-bg-image text-center"
        style="background-image: url('{{ asset('assets/images/Footer2.jpg') }}')">
        <div class="container">

            <div class="footer-top grid-list">

                <div class="footer-brand has-before has-after">

                    <a href="#" class="logo">
                        <img src="{{ asset('assets/images/LogoBrancaNaturalle.png') }}" width="270" height="80"
                            loading="lazy" alt="grilli home">
                    </a>

                    <address class="body-4">
                        Restaurante Naturalle, São Paulo 123
                    </address>

                    <a href="mailto:booking@grilli.com" class="body-4 contact-link">naturalle@gmail.com</a>

                    <a href="tel:+000000000" class="body-4 contact-link">Telefone: (11)981765432</a>

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
                        <a href="#" class="label-2 footer-link hover-underline">Menu</a>
                    </li>
                    <li>
                        <a href="{{ url('sobrenos') }}" class="label-2 footer-link hover-underline">Sobre nós</a>
                    </li>
                    <li>
                        <a href="{{ url('SaborSolidario') }}" class="label-2 footer-link hover-underline">Nosso
                            Projeto</a>
                    </li>
                    <li>
                        <a href="{{ url('delivery') }}" class="label-2 footer-link hover-underline">Delivery</a>
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

            <div class="footer-bottom">

            </div>

        </div>
    </footer>


    <!-- Scripts -->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>