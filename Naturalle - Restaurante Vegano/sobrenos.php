<!DOCTYPE html>
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
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - FONTES
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Forum&display=swap" rel="stylesheet">

  <!-- 
    - LINK
  -->
  <link rel="stylesheet" href="./assets/css/style3.css">

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
    <p class="text">Naturealle</p>
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
          Restaurant St, São Paulo 123
        </span>
      </address>

      <div class="separator"></div>

      <div class="topbar-item item-2">
        <div class="icon">
          <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
        </div>

        <span class="span">funcionamento : 11:00 às 21:00 </span>
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
            <a href="#menu" class="navbar-link hover-underline">
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
            <a href="#" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span">Nosso Projeto</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="#" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span">Delivery</span>
            </a>
          </li>

        </ul>

        <div class="text-center">
          <p class="headline-1 navbar-title"></p>

          <address class="body-4">
            Restaurant St, São Paulo 123
            <br>
          </address>

          <p class="body-4 navbar-text">funcionamento : 11:00 às 21:00</p>

          <a href="mailto:booking@grilli.com" class="body-4 sidebar-link">naturalle@gmail.com</a>

          <div class="separator"></div>

          <p class="contact-label">Booking Request</p>

          <a href="tel:+88123123456" class="body-1 contact-number hover-underline">
            12 23123456
          </a>
        </div>

      </nav>

      <a href="login.html" class="btn btn-secondary">
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
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero text-center" aria-label="home" id="home">

        <ul class="hero-slider" data-hero-slider>

          <li class="slider-item active" data-hero-slider-item>

            <div class="slider-bg">
              <img src="./assets/images/Salada.png" width="1880" height="950" alt="" class="img-cover">
            </div>

            <p class="label-2 section-subtitle slider-reveal">Tradicional e Seguro</p>

            <h1 class="display-1 hero-title slider-reveal">
              Por amor à <br>
              comida deliciosa
            </h1>

            <p class="body-2 hero-text slider-reveal">
              Venha com a família e experimente a alegria de uma comida de deixar água na boca
            </p>

            <a href="#" class="btn btn-primary slider-reveal">
              <span class="text text-1">Veja o nosso menu</span>

              <span class="text text-2" aria-hidden="true">Veja o nosso menu</span>
            </a>

          </li>

          <li class="slider-item" data-hero-slider-item>

            <div class="slider-bg">
              <img src="./assets/images/Salada2.png" width="1880" height="950" alt="" class="img-cover">
            </div>

            <p class="label-2 section-subtitle slider-reveal">Coma bem e viva melhor</p>

            <h1 class="display-1 hero-title slider-reveal">
              Menos impacto <br>
              mais sabor
            </h1>

            <p class="body-2 hero-text slider-reveal">
              Venha com a família e experimente a alegria de uma comida de deixar água na boca
            </p>

            <a href="#" class="btn btn-primary slider-reveal">
              <span class="text text-1">Veja o nosso menu</span>

              <span class="text text-2" aria-hidden="true">Veja o nosso menu</span>
            </a>

          </li>

          <li class="slider-item" data-hero-slider-item>

            <div class="slider-bg">
              <img src="./assets/images/Salada3.png" width="1880" height="950" alt="" class="img-cover">
            </div>

            <p class="label-2 section-subtitle slider-reveal">Fantástico e delicioso</p>

            <h1 class="display-1 hero-title slider-reveal">
              Sabores frescos <br>
              escolhas conscientes.
            </h1>

            <p class="body-2 hero-text slider-reveal">
              Venha com a família e experimente a alegria de uma comida de deixar água na boca
            </p>

            <a href="#" class="btn btn-primary slider-reveal">
              <span class="text text-1">Veja o nosso menu</span>

              <span class="text text-2" aria-hidden="true">Veja o nosso menu</span>
            </a>

          </li>

        </ul>

        <button class="slider-btn prev" aria-label="slide to previous" data-prev-btn>
          <ion-icon name="chevron-back"></ion-icon>
        </button>

        <button class="slider-btn next" aria-label="slide to next" data-next-btn>
          <ion-icon name="chevron-forward"></ion-icon>
        </button>

        <a href="#" class="hero-btn has-after">
          <img src="./assets/images/VeganIcon.png" width="75" height="75" alt="booking icon">

          <span class="label-2 text-center span"></span>
        </a>

      </section>





      <!-- 
        - #SERVICE
      -->

      



      <!-- 
        - #ABOUT
      -->

      <section class="section about text-center" aria-labelledby="about-label" id="about">
        <div class="container">

          <div class="about-content">

            <p class="label-2 section-subtitle" id="about-label">Nossa Historia</p>

            <h2 class="headline-1 section-title">O que Somos?</h2>

            <p class="section-text">
              A Naturalle é um restaurante vegano e vegetariano que não apenas oferece alimentos de qualidade e confiáveis, mas também contém um projeto socioambiental chamado 'Sabor Solidário' em parceria com diversas ONGs            </p>


            <a href="#" class="btn btn-primary">
              <span class="text text-1">Ver mais</span>

              <span class="text text-2" aria-hidden="true">ver mais</span>
            </a>

          </div>

          <figure class="about-banner">

            <img src="./assets/images/about-banner.jpg" width="570" height="570" loading="lazy" alt="about banner"
              class="w-100" data-parallax-item data-parallax-speed="1">

            <div class="abs-img abs-img-1 has-before" data-parallax-item data-parallax-speed="1.75">
              <img src="./assets/images/about-abs-image.jpg" width="285" height="285" loading="lazy" alt=""
                class="w-100">
            </div>

          </figure>

          <img src="./assets/images/shape-3.png" width="197" height="194" loading="lazy" alt="" class="shape">

        </div>
      </section>





      <!-- 
        - #SPECIAL DISH
      -->

      <section class="special-dish text-center" aria-labelledby="dish-label">

        <div class="special-dish-banner">
          <img src="./assets/images/Voluntario.jpeg" width="940" height="900" loading="lazy" alt="special dish"
            class="img-cover">
        </div>

        <div class="special-dish-content bg-black-10">
          <div class="container">

            <img src="./assets/images/badge-1.png" width="28" height="41" loading="lazy" alt="badge" class="abs-img">

            <p class="section-subtitle label-2">Nosso Projeto</p>

            <h2 class="headline-1 section-title">Sabor Soloidário</h2>

            <p class="section-text">
              O projeto tem um impacto ambiental positivo ao fornecer refeições veganas e vegetarianas para pessoas em situações de vulnerabilidade. Isso não apenas melhora a qualidade de vida dos indivíduos em vários aspectos, mas também beneficia o meio ambiente, uma vez que tanto o veganismo quanto o vegetarianismo compartilham o objetivo comum de melhorar a qualidade de vida sem prejudicar o ecossistema.
            </p>

            <a href="#" class="btn btn-primary">
              <span class="text text-1">Conheça mais nosso Projeto</span>

              <span class="text text-2" aria-hidden="true">Conheça mais nosso Projeto</span>
            </a>

          </div>
        </div>

        <img src="./assets/images/shape-4.png" width="179" height="359" loading="lazy" alt="" class="shape shape-1">

        <img src="./assets/images/shape-9.png" width="351" height="462" loading="lazy" alt="" class="shape shape-2">

      </section>





      <!-- 
        - #MENU
      -->

      <section class="section service bg-White text-center" aria-label="menu">
        <div class="container">

          <p class="section-subtitle label-2">Pratos que alimentam corpo e alma</p>

          <h2 class="headline-1 section-title">Oferecemos serviços de alto nível</h2>

          <p class="section-text">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry lorem Ipsum has been the industrys
            standard dummy text ever.
          </p>

          <ul class="grid-list">

            <li>
              <div class="service-card">

                <a href="#" class="has-before hover:shine">
                  <figure class="card-banner img-holder" style="--width: 285; --height: 336;">
                    <img src="./assets/images/Sobremesa1" width="285" height="336" loading="lazy" alt="Breakfast"
                      class="img-cover">
                  </figure>
                </a>

                <div class="card-content">

                  <h3 class="title-4 card-title">
                    <a href="#">Sobremesas</a>
                  </h3>

                  <a href="#" class="btn-text hover-underline label-2">Ver Menu</a>

                </div>

              </div>
            </li>

            <li>
              <div class="service-card">

                <a href="#" class="has-before hover:shine">
                  <figure class="card-banner img-holder" style="--width: 285; --height: 336;">
                    <img src="./assets/images/prato1.jpg" width="285" height="336" loading="lazy" alt="Appetizers"
                      class="img-cover">
                  </figure>
                </a>

                <div class="card-content">

                  <h3 class="title-4 card-title">
                    <a href="#">Pratos Principais</a>
                  </h3>

                  <a href="#" class="btn-text hover-underline label-2">Ver Menu</a>

                </div>

              </div>
            </li>

            <li>
              <div class="service-card">

                <a href="#" class="has-before hover:shine">
                  <figure class="card-banner img-holder" style="--width: 285; --height: 336;">
                    <img src="./assets/images/service-3.jpg" width="285" height="336" loading="lazy" alt="Drinks"
                      class="img-cover">
                  </figure>
                </a>

                <div class="card-content">

                  <h3 class="title-4 card-title">
                    <a href="#">Bebidas</a>
                  </h3>

                  <a href="#" class="btn-text hover-underline label-2">Ver Menu</a>

                </div>

              </div>
            </li>

          </ul>

          <img src="./assets/images/shape-1.png" width="246" height="412" loading="lazy" alt="shape"
            class="shape shape-1 move-anim">
          <img src="./assets/images/shape-2.png" width="343" height="345" loading="lazy" alt="shape"
            class="shape shape-2 move-anim">

        </div>
      </section>







      <!-- 
        - #TESTIMONIALS
      -->

      <section class="section testi text-center has-bg-image"
        style="background-image: url('./assets/images/Fotter3.jpeg')" aria-label="testimonials">
        <div class="container">

          <div class="quote">”</div>

          <p class="headline-2 testi-text">
            Inspire-se com nossos pratos, inspire mudanças positivas
          </p>

          <div class="wrapper">
            <div class="separator"></div>
            <div class="separator"></div>
            <div class="separator"></div>
          </div>

  

        </div>
      </section>

      <!-- 
        - #FEATURES
      -->

      <section class="section features text-center" aria-label="features">
        <div class="container">

          <p class="section-subtitle label-2">Por que Escolher Nosso Restaurante</p>

          <h2 class="headline-1 section-title">Nossa força</h2>

          <ul class="grid-list">

            <li class="feature-item">
              <div class="feature-card">

                <div class="card-icon">
                  <img src="./assets/images/NGOIcon.png" width="100" height="80" loading="lazy" alt="icon">
                </div>

                <h3 class="title-2 card-title">Impacto Social Positivo</h3>

                <p class="label-1 card-text">Lorem Ipsum is simply dummy printing and typesetting.</p>

              </div>
            </li>

            <li class="feature-item">
              <div class="feature-card">

                <div class="card-icon">
                  <img src="./assets/images/Saladaicon.png" width="100" height="80" loading="lazy" alt="icon">
                </div>

                <h3 class="title-2 card-title">Ingredientes Frescos e Naturais</h3>

                <p class="label-1 card-text">Lorem Ipsum is simply dummy printing and typesetting.</p>

              </div>
            </li>

            <li class="feature-item">
              <div class="feature-card">

                <div class="card-icon">
                  <img src="./assets/images/SustentavelIcon.png" width="100" height="80" loading="lazy" alt="icon">
                </div>

                <h3 class="title-2 card-title">Compromisso com a Sustentabilidade</h3>

                <p class="label-1 card-text">Lorem Ipsum is simply dummy printing and typesetting.</p>

              </div>
            </li>

            <li class="feature-item">
              <div class="feature-card">

                <div class="card-icon">
                  <img src="./assets/images/ChefIcon.png" width="100" height="80" loading="lazy" alt="icon">
                </div>

                <h3 class="title-2 card-title">Inovação Gastronômica</h3>

                <p class="label-1 card-text">Lorem Ipsum is simply dummy printing and typesetting.</p>

              </div>
            </li>

          </ul>

          <img src="./assets/images/shape-7.png" width="208" height="178" loading="lazy" alt="shape"
            class="shape shape-1">

          <img src="./assets/images/shape-8.png" width="120" height="115" loading="lazy" alt="shape"
            class="shape shape-2">

        </div>
      </section>

  <!-- 
    - #FOOTER
  -->

  <footer class="footer section has-bg-image text-center"
    style="background-image: url('./assets/images/Fotter2.jpeg')">
    <div class="container">

      <div class="footer-top grid-list">

        <div class="footer-brand has-before has-after">

          <a href="#" class="logo">
            <img src="./assets/images/LogoBrancaNaturalle.png" width="270" height="80" loading="lazy" alt="grilli home">
          </a>

          <address class="body-4">
            Restaurant St, São Paulo 123
          </address>

          <a href="emailto:booking@grilli.com" class="body-4 contact-link">naturalle@gmail.com</a>

          <a href="tel:+000000000" class="body-4 contact-link">Telefone: 00 0123455</a>

          <p class="body-4">
            funcionamento: 11:00 às 21:00 
          </p>

          <div class="wrapper">
            <div class="separator"></div>
            <div class="separator"></div>
            <div class="separator"></div>
          </div>

          <p class="title-1">Cadastra-se e ganhe</p>

          <p class="label-1">
            Cadastra-se e Ganhe <span class="span">25% Off</span>
          </p>

        </div>

        <ul class="footer-list">

          <li>
            <a href="#" class="label-2 footer-link hover-underline">Home</a>
          </li>

          <li>
            <a href="#" class="label-2 footer-link hover-underline">Menu</a>
          </li>

          <li>
            <a href="#" class="label-2 footer-link hover-underline">Sobre nós</a>
          </li>

          <li>
            <a href="#" class="label-2 footer-link hover-underline">Nosso Projeto</a>
          </li>

          <li>
            <a href="#" class="label-2 footer-link hover-underline">Delivery</a>
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
            <a href="#" class="label-2 footer-link hover-underline">Google Map</a>
          </li>

        </ul>

      </div>

      <div class="footer-bottom">

    

      </div>

    </div>
  </footer>





  <!-- 
    - #BACK TO TOP
  -->

  <a href="#top" class="back-top-btn active" aria-label="back to top" data-back-top-btn>
    <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script1.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>