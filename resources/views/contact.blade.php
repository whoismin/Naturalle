<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/delivery.css') }}">
</head>
<body>
   
@include('delivery_header')

<section class="contact">
    <h1 class="title">Entrar em contato</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sendMessage') }}" method="POST">
        @csrf
        <input type="text" name="name" class="box" required placeholder="Digite seu nome">
        <input type="email" name="email" class="box" required placeholder="Digite seu email">
        <input type="number" name="number" min="0" class="box" required placeholder="Digite seu número de celular">
        <textarea name="msg" class="box" required placeholder="Digite sua mensagem" cols="30" rows="10"></textarea>
        <input type="submit" value="Enviar mensagem" class="btn" name="send">
    </form>

    @if (session('message'))
        <p class="message">{{ session('message') }}</p>
    @endif
</section>

@include('footer')

<script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
