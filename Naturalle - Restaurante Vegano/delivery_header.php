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
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Forum&display=swap" rel="stylesheet">

  <!-- 
    - LINK CSS
  -->
  <link rel="stylesheet" href="./assets/css/style.css">


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
            <a href="home.php" class="navbar-link hover-underline">
              <div class="separator"></div>
              <span class="span">Home</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="shop.php" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span">Pratos</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="contact.php" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span">Contato</span>
            </a>
          </li>

          <div class="icons" style="display: flex; align-items: center;">
            <div id="menu-btn" class="fas fa-bars" style="margin-right: 30px;"></div>
            <div id="user-btn" class="fas fa-user" style="margin-right: 55px;"></div>
            <a href="search_page.php" class="fas fa-search" style="margin-right: 30px;"></a>
          </div>

          <div id="profile" class="profile">
            <?php
            // Consulte o banco de dados para obter as informações do perfil do usuário
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            ?>

            <img src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="">
            <div class="profile-content">
              <div class="profile-info">
                <p>Bem-vindo, <?= $fetch_profile['name']; ?></p>
                <p>Pontos: <?= $fetch_profile['pontos']; ?></p>
              </div>
              <div class="profile-icons">
                <a href="user_profile_update.php">
                  <i class="fas fa-user-cog"></i>
                  <span class="icon-text">Editar Perfil</span>
                </a>
                <a href="wishlist.php">
                  <i class="fas fa-heart"></i>
                  <span class="icon-text">Favoritos</span>
                  <a href="orders.php">
                    <i class="fas fa-clipboard-list"></i><!-- Ícone de entrega (exemplo) -->
                    <span class="icon-text">Pedidos</span>
                  </a>
                </a>
                <a href="logout.php">
                  <i class="fas fa-sign-out-alt"></i>
                  <span class="icon-text">Sair</span>
                </a>
              </div>
            </div>
          </div>









          <?php
          $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
          $count_cart_items->execute([$user_id]);
          $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
          $count_wishlist_items->execute([$user_id]);
          ?>
          <a href="cart.php" class="cart-link">
            <i class="fas fa-shopping-cart"></i>
            <span class="cart-count"><?= $count_cart_items->rowCount(); ?></span>



            <style>
              .cart-link {
                text-decoration: none;
                display: flex;
                align-items: center;
                position: relative;

              }

              .fas.fa-shopping-cart {
                font-size: 24px;
                /* Ajuste o tamanho do ícone conforme necessário */
              }

              .cart-count {
                color: white;
                /* Cor do texto do contador */
                background-color: transparent;
                /* Fundo transparente */
                border-radius: 50%;
                /* Deixe o contador redondo */
                padding: 4px 8px;
                /* Espaçamento interno do contador */
                font-size: 12px;
                /* Tamanho do texto do contador */
                margin-left: 4px;
                /* Adiciona um espaçamento à esquerda do contador */
              }

              #profile {
                background-color: #212121;
                padding: 20px;
                text-align: center;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                width: 300px;
                position: absolute;
                top: 120px;
                /* Ajuste a posição vertical como desejado */
                right: 10px;
                /* Ajuste a posição horizontal como desejado */
                z-index: 999;
                /* Defina um valor alto para a propriedade z-index */
                display: none;
                /* Oculte por padrão */

              }

              .close-btn {
                position: absolute;
                top: 10px;
                right: 10px;
                font-size: 20px;
                cursor: pointer;
              }

              .profile img {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                object-fit: cover;
                margin: 0 auto 10px;
              }

              .profile p {
                font-size: 18px;
                margin: 5px;
              }

              .profile-icons {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
              }

              .profile-icons a {
                display: flex;
                align-items: center;
                margin-top: 10px;
                /* Ajuste o espaçamento entre os ícones conforme necessário */
              }

              .icon-text {
                margin-left: 5px;
                /* Ajuste o valor conforme necessário */
              }

              /* Estilize o ícone user-btn para parecer clicável */
              #user-btn {
                cursor: pointer;
              }
            </style>

            </style>



        </ul>



        <div class="text-center">
          <p class="headline-1 navbar-title"></p>

          <address class="body-4">
            Restaurante Naturalle, São Paulo 123
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



      <?php


      if (isset($_SESSION['user_id'])) {
        // O usuário está logado, então não exiba o botão de login
      } else {
        // O usuário não está logado, exiba o botão de login
        echo '<a href="login.php" class="btn btn-secondary">
                <span class="text text-1">Login</span>
                <span class="text text-2" aria-hidden="true">Login</span>
              </a>';
      }
      ?>


      <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
        <span class="line line-1"></span>
        <span class="line line-2"></span>
        <span class="line line-3"></span>
      </button>

      <div class="overlay" data-nav-toggler data-overlay></div>

    </div>
  </header>


  <script>
    const userBtn = document.getElementById('user-btn');
    const profile = document.getElementById('profile');

    userBtn.addEventListener('click', () => {
      profile.style.display = profile.style.display === 'none' ? 'block' : 'none';
    });
  </script>