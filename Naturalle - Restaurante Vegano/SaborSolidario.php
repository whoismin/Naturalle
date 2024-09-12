<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- 
    - TAGS META
  -->
  <title>Sabor Solidário</title>
  <meta name="title" content="Naturalle- restaurante vegano e vegetariano">
  <meta name="description" content="This is a Restaurant html template made by codewithsadee">

  <!-- 
    - ICON DA PÁGINA
  -->
  <link rel="shortcut icon" href="./LOGOPROJETO.svg" type="image/svg+xml">

  <!-- 
    - FONTES
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Forum&display=swap" rel="stylesheet">

  <!-- 
    - LINK CSS
  -->
  
  <link rel="stylesheet" href="./assets/css/projeto.css">

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

        <span class="span">saborsolidario@gmail.com</span>
      </a>

    </div>
  </div>





  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <a href="#" class="logo">
        <img src="./LOGOPROJETO.svg" width="50" height="50" alt="Grilli - Home">
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
            <a href="index.php" class="navbar-link hover-underline active">
              <div class="separator"></div>

              <span class="span">Home</span>
            </a>
          </li>          

          <li class="navbar-item">
            <a href="#about" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span">Nossa Historia</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="ongs.php" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span">Ongs Cadastradas</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="index.php" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span">Restaurante</span>
            </a>
          </li>

        </ul>

        <div class="text-center">
          <p class="headline-1 navbar-title"></p>

          <address class="body-4">
            Restaurante Naturalle, São Paulo 123
            <br>
          </address>

          <p class="body-4 navbar-text">Funcionamento : 11:00 às 21:00</p>

          <a href="mailto:booking@grilli.com" class="body-4 sidebar-link">saborsolidario@gmail.com</a>

          <div class="separator"></div>

          <p class="contact-label">Contato</p>

          <a href="tel:+88123123456" class="body-1 contact-number hover-underline">
            12 23123456
          </a>
        </div>

      </nav>

      <a href="cadastrarONG.php" class="btn btn-secondary">
        <span class="text text-1">Cadastrar Ong</span>

        <span class="text text-2" aria-hidden="true">Cadastrar Ong</span>
      </a>

      <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
        <span class="line line-1"></span>
        <span class="line line-2"></span>
        <span class="line line-3"></span>
      </button>

      <div class="overlay" data-nav-toggler data-overlay></div>

    </div>
  </header>
 
      <!-- 
        - FOTO HOME
      -->
      <section class="hero" id="home">
        <div class="container">

          <p class="section-subtitle">
            <img src="./assets/images/subtitle-img-white.png" width="32" height="7" alt="Wavy line">

            <span>Sabor Solidário</span>
          </p>

          <h2 class="h2 hero-title">
          Alimentando corações <strong>uma marmita de cada vez</strong>
          </h2>

          <p class="hero-text">
           Junte-se a nós no Projeto Sabor Solidário e ajude a criar um mundo mais justo e nutritivo para todos.
          </p>



        </div>
      </section>

      

      <br>
      <br>
      <br>
      <br>
    


      <section class="special-dish text-center" aria-labelledby="dish-label">
        

        <div class="special-dish-banner">
          <img src="./assets/images/Voluntario.jpg" width="940" height="900" loading="lazy" alt="special dish"
            class="img-cover">
        </div>

        <div class="special-dish-content bg-black-10">
          <div class="container">

            <img src="./assets/images/badge-1.png" width="28" height="41" loading="lazy" alt="badge" class="abs-img">

            <p class="section-subtitle">
              <img src="./assets/images/subtitle-img-green.png" width="32" height="7" alt="Wavy line">
      
              <span>Como Funciona</span>
            </p>
      
            <h2 class="h2 section-title">
              Alimentando Esperanças:<strong> Junte-se ao Sabor Solidário! </strong>
            </h2>
      
            <ul class="tab-nav">
      
              
            </ul>
      
            <div class="tab-content active" id="mission">
              <p class="section-text">
                O "Sabor Solidário" é mais do que um projeto, é uma missão de amor e compaixão que acontece no coração do nosso restaurante. Aqui está como isso funciona:
              </p>
              <ul class="tab-list">
      
                <li class="tab-item">
                  <div class="item-icon">
                    <ion-icon name="checkmark-circle"></ion-icon>
                  </div>
      
                  <p class="tab-text">Doação de marmitas a cada marmita que comprada</p>
                  
                </li>
      
                <li class="tab-item">
                  <div class="item-icon">
                    <ion-icon name="checkmark-circle"></ion-icon>
                  </div>
      
                  <p class="tab-text">Marmitas para Famílias em Vulnerabilidade</p>
                </li>
      
                <li class="tab-item">
                  <div class="item-icon">
                    <ion-icon name="checkmark-circle"></ion-icon>
                  </div>
      
                  <p class="tab-text">Equidade na Distribuição</p>
                </li>
      
                <li class="tab-item">
                  <div class="item-icon">
                    <ion-icon name="checkmark-circle"></ion-icon>
                  </div>
      
                  <p class="tab-text">Solidariedade em Cada Mordida</p>
                </li>
      
              </ul>
            </div>
      
            <div class="tab-content" id="vision">
              <p class="section-text">
                Nossa visão é tornar o mundo um lugar melhor através da alimentação saudável e solidariedade.
              </p>
            </div>
      
            <div class="tab-content" id="plan">
              <p class="section-text">
                Nosso próximo plano é expandir o projeto "Sabor Solidário" para ajudar ainda mais pessoas em necessidade.
              </p>
            </div>
      
            
            <a href="SaborSolidario.html" class="btn btn-primary">
              <span class="text text-1">Conheça mais nosso Projeto</span>

              <span class="text text-2" aria-hidden="true">Conheça mais nosso Projeto</span>
            </a>

          </div>
        </div>

        <img src="./assets/images/shape-4.png" width="179" height="359" loading="lazy" alt="" class="shape shape-1">

        <img src="./assets/images/shape-9.png" width="351" height="462" loading="lazy" alt="" class="shape shape-2">

      </section>



      <script>
        document.addEventListener("DOMContentLoaded", function () {
          const tabButtons = document.querySelectorAll(".tab-btn");
          const tabContents = document.querySelectorAll(".tab-content");
      
          tabButtons.forEach((button) => {
            button.addEventListener("click", function () {
              const targetId = button.getAttribute("data-target");
              tabContents.forEach((content) => {
                content.classList.remove("active");
              });
              document.getElementById(targetId).classList.add("active");
              tabButtons.forEach((btn) => {
                btn.classList.remove("active");
              });
              button.classList.add("active");
            });
          });
      
          // Adicione um evento de clique para o botão "Saiba Mais"
          const saibaMaisButton = document.getElementById("saibaMaisButton");
          saibaMaisButton.addEventListener("click", function () {
            const missionTabButton = document.querySelector(".tab-btn[data-target='mission']");
            missionTabButton.click(); // Simula o clique no botão "Our Mission"
          });
        });
      </script>
      
      





      <!-- 
        - #CTA
      -->

      <section class="section cta">
        <div class="container">

          <div class="cta-content">
            <h2 class="h2 section-title">O Projeto 'Sabor Solidário' já ajudou mais de 100 famílias e pessoas em estado de vulnerabilidade</h2>
            
            </button>
          </div>

          <figure class="cta-banner">
            <img src="./assets/images/CRIANCAS-FAMILIAAJUDADAS.jpg" width="520" height="228" loading="lazy" alt="Fox"
              class="img-cover">
          </figure>

        </div>
      </section>
      <section class="testi">

        <div class="testi-content">

          <p class="section-subtitle">
            <img src="./assets/images/subtitle-img-green.png" width="32" height="7" alt="Wavy line">

            <span>Como Participar do projeto?</span>
          </p>

          <h2 class="h2 section-title">
            Para participar do Projeto<strong>Sabor Solidário</strong>
          </h2>
          <h3 class="testi-name">Sendo Cliente</h3>

          <p class="testi-title"> É simples participar do nosso projeto. Basta comprar uma refeição em nosso restaurante, e automaticamente uma marmita será adicionada ao seu carrinho de compras. Essa marmita não é apenas uma refeição adicional para você; é também uma forma de ajudar aqueles que mais precisam.</p>
           <br>
            
                <h3 class="testi-name">Sendo Ong</h3>

<p class="testi-title"> O processo de inscrição é simples e rápido. Basta preencher um formulário online com informações sobre a sua organização, sua missão e como você planeja utilizar as marmitas doadas. Quando um cliente comprar uma refeição em nosso restaurante e optar por doar uma marmita, você será automaticamente selecionado como uma das ONGs beneficiárias. Receberá as marmitas doadas de acordo com as escolhas dos clientes.</p>
<div class="testi-card">

            <figure class="card-avatar">
            </figure>

            <div>
              <blockquote class="testi-text">
               
              </blockquote>

    
            </div>

          </div>

        </div>

        <figure class="testi-banner">
          <img src="./assets/images/Ong.jpg" width="960" height="846" loading="lazy" alt="Rhinoceros"
            class="img-cover">
        </figure>

      </section>





      <!-- 
        - #PARTNER
      -->

      <section class="section partner">
        <div class="container">

          <a href="ongs.php" class="partner-logo">
            <img src="./assets/images/MUNDOSEMFOME.png" width="157" height="55" loading="lazy" alt="Children Fund"
              class="gray">

            <img src="./assets/images/MUNDOSEMFOME.png" width="157" height="55" loading="lazy" alt="Children Fund"
              class="color">
          </a>

          <a href="ongs.php" class="partner-logo">
            <img src="./assets/images/CRIANCASFELIZES.png" width="163" height="55" loading="lazy" alt="Non Profit Agency"
              class="gray">

            <img src="./assets/images/CRIANCASFELIZES.png" width="163" height="55" loading="lazy"
              alt="Non Profit Agency" class="color">
          </a>

          <a href="ongs.php" class="partner-logo">
            <img src="./assets/images/AMORECURA.png" width="149" height="55" loading="lazy" alt="Rise Hand Help Us"
              class="gray">

            <img src="./assets/images/AMORECURA.png" width="149" height="55" loading="lazy"
              alt="Rise Hand Help Us" class="color">
          </a>


        </div>
      </section>





      <!-- 
        - #EVENT
      -->

    

    <section class="section about text-center" aria-labelledby="about-label" id="about">
      <div class="container">

        <div class="about-content">


          <h2 class="headline-1 section-title">Nossa Historia</h2>
    

<p class="section-text">
  A Naturalle é um restaurante vegano e vegetariano que não apenas oferece alimentos de qualidade e confiáveis, mas também contém um projeto socioambiental chamado 'Sabor Solidário' em parceria com diversas ONGs            </p>

          <p class="section-text">
            </p>


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
        - #SERVIÇOS
      -->

      <section class="section service" id="service" style="background-image: url('./assets/images/service-map.png')">
        <div class="container">

          <p class="section-subtitle">
            <img src="./assets/images/subtitle-img-green.png" width="32" height="7" alt="Wavy line">

            <span>O QUE NÓS FAZEMOS</span>
          </p>

          <h2 class="h2 section-title">
            Trabalhamos de forma diferente <strong>para mante o mundo melhor</strong>
          </h2>

          <ul class="service-list">

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <ion-icon name="leaf-outline"></ion-icon>
                </div>

                <h3 class="h3 card-title">Salvando a natureza</h3>

                <p class="card-text">
                  Tempor incididunt ut labores
                  dolore magna suspene
                </p>

                <a href="https://www.iberdrola.com/sustentabilidade/desperdicio-de-alimentos#:~:text=Os%20dados%20anteriores%20correspondem%20aos,gases%20respons%C3%A1veis%20pelo%20aquecimento%20global." class="btn-link">
                  <span>Leia mais</span>

                  <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                </a>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <ion-icon name="earth-outline"></ion-icon>
                </div>

                <h3 class="h3 card-title">Parceria com ONGs</h3>

                <p class="card-text">
                  Tempor incididunt ut labores
                  dolore magna suspene
                </p>

                <a href="#" class="btn-link">
                  <span>Leia mais</span>

                  <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                </a>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <ion-icon name="flower-outline"></ion-icon>
                </div>

                <h3 class="h3 card-title">Sustentabilidade Ambiental</h3>

                <p class="card-text">
                  Tempor incididunt ut labores
                  dolore magna suspene
                </p>

                <a href="#" class="btn-link">
                  <span>Leia mais</span>

                  <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                </a>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <ion-icon name="boat-outline"></ion-icon>
                </div>

                <h3 class="h3 card-title">Origem do Projeto</h3>

                <p class="card-text">
                  Tempor incididunt ut labores
                  dolore magna suspene
                </p>

                <a href="#" class="btn-link">
                  <span>Leia mais</span>

                  <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                </a>

              </div>
            </li>

          </ul>

        </div>
      </section>

      

      

     <!-- 
- #FOOTER
-->

<?php
include ('footer.php');
      ?>

      
      
      
      <!-- 
      - VOLTAR PARA O ÍNICIO
      -->
      
      <a href="#top" class="back-top-btn active" aria-label="back to top" data-back-top-btn>
      <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
      </a>
      
      
      
      
      
      <!-- 
      - LINK JS
      -->
      <script src="./assets/js/script.js"></script>
      
      
      
      <!-- 
      - LINKS
      -->
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
      
      </body>
      
      </html>