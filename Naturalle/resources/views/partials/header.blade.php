<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TAGS META -->
    <title>@yield('title', 'Naturalle')</title>
    <meta name="title" content="Naturalle - restaurante vegano e vegetariano">
    <meta name="description" content="This is a Restaurant html template made by codewithsadee">

    <!-- ICON DA PÁGINA -->
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/svg+xml">

    <!-- FONTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Forum&display=swap" rel="stylesheet">

    <!-- LINK CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/script.js') }}"></script>

    <!-- PRÉ IMAGENS ANTES DE CARREGAR -->
    <link rel="preload" as="image" href="{{ asset('images/hero-slider-1.jpg') }}">
    <link rel="preload" as="image" href="{{ asset('images/hero-slider-2.jpg') }}">
    <link rel="preload" as="image" href="{{ asset('images/hero-slider-3.jpg') }}">
</head>

<body id="top">

    <!-- PRELOADER -->
    <div class="preload" data-preaload>
        <div class="circle"></div>
        <p class="text">Naturalle</p>
    </div>

    <!-- TOP BAR -->
    <div class="topbar">
        <div class="container">
            <address class="topbar-item">
                <div class="icon">
                    <ion-icon name="location-outline" aria-hidden="true"></ion-icon>
                </div>
                <span class="span">Restaurante Naturalle, São Paulo 123</span>
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
            </a>
            <div class="separator"></div>
            <a href="mailto:booking@restaurant.com" class="topbar-item link">
                <div class="icon">
                    <ion-icon name="mail-outline" aria-hidden="true"></ion-icon>
                </div>
                <span class="span">naturalle@gmail.com</span>
            </a>
        </div>
    </div>

    <!-- HEADER -->
    <header class="header" data-header>
        <div class="container">
            <a href="#" class="logo">
                <img src="{{ asset('images/LogoBrancaNaturalle.png') }}" width="200" height="50" alt="Grilli - Home">
            </a>
            <nav class="navbar" data-navbar>
                <button class="close-btn" aria-label="close menu" data-nav-toggler>
                    <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
                </button>
                <a href="#" class="logo">
                    <img src="{{ asset('images/LogoBrancaNaturalle.png') }}" width="160" height="50" alt="Grilli - Home">
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
                        <a href="SaborSolidario.php" class="navbar-link hover-underline">
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
            <a href="login.php" id="login-btn" class="btn btn-secondary">
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
