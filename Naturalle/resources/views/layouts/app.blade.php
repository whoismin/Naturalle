<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Naturalle')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Seção para CSS adicional -->
    @yield('additional-css')
</head>
<body>

    <!-- Incluir o Header -->
    @include('layouts.header')

    <!-- Conteúdo Principal com classe de escopo -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Incluir o Footer -->
    @include('layouts.footer')

    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
