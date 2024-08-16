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
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Forum&display=swap" rel="stylesheet">

  <!-- 
    - LINK CSS
  -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <script src="script.js"></script>

  <!-- 
    - PRÉ IMAGENS ANTES DE CARREGAR
  -->
  <link rel="preload" as="image" href="./assets/images/hero-slider-1.jpg">
  <link rel="preload" as="image" href="./assets/images/hero-slider-2.jpg">
  <link rel="preload" as="image" href="./assets/images/hero-slider-3.jpg">

</head>

<section class="section testi text-center has-bg-image" style="background-image: url('{{ asset('assets/images/login1.svg') }}')" aria-label="testimonials">
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

<article>
    <br>
    <br>
    <img src="{{ asset('img/shape-6.png') }}" class="image img-1 show" alt="" />
    
    <section class="container">
        <div class="form reservation-form bg-black-10">
            <div>
                <br>
                <h1 class="headline-1 text-center">Login</h1>
            </div>
            <br>
            <form action="{{ route('login') }}" method="POST" class="form-left">
                @csrf
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="input-field" placeholder="nome@email.com" autocomplete="off" value="{{ old('email') }}" required>
                <label for="pass" class="form-label">Senha</label>
                <input type="password" name="password" id="pass" class="input-field" placeholder="No mínimo 8 caracteres" autocomplete="off" required>
                <div class="input-wrapper">
                    <a href="{{ url('password/reset') }}" class="body-1 esqueci-senha hover-underline">Esqueci minha senha</a>
                </div>
                <br>
                <button type="submit" class="btn btn-secondary">
                    <span class="text text-1">Login</span>
                    <span class="text text-2" aria-hidden="true">Login</span>
                </button>
            </form>
            <div class="form-right text-center">
                <h2 class="headline-1 text-center">Ainda não tem uma conta?</h2>
                <p class="contact-label">Crie uma agora.</p>
                <a href="{{ url('register') }}" class="body-1 contact-number hover-underline">Criar uma conta.</a>
                <div class="separator"></div>
                @if ($errors->any())
                    <div class="message">
                        @foreach ($errors->all() as $error)
                            <span>{{ $error }}</span>
                        @endforeach
                        <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <br>
</article>
</html>
