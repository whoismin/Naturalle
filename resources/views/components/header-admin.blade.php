@if (isset($message))
    @foreach ($message as $msg)
        <div class="message">
            <span>{{ $msg }}</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
    @endforeach
@endif

<header class="header">
    <div class="flex">
        <a href="{{ url('admin_page.php') }}" class="logo">Painel de Admin<span>el</span></a>

        <nav class="navbar">
            <a href="{{ url('admin') }}">Início</a>
            <a href="{{ url('admin/products') }}">Produtos</a>
            <a href="{{ url('admin/orders') }}">Pedidos</a>
            <a href="{{ url('admin/users') }}">Usuários</a>
            <a href="{{ url('admin/messages') }}">Mensagens</a>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
        </div>

        @if (isset($user))
            <div class="profile">
                <img src="{{ asset('uploaded_img/' . $user->image) }}" alt="">
                <p>{{ $user->name }}</p>
                <a href="{{ route('profile.edit') }}" class="btn">Atualizar perfil</a>
                <a href="{{ route('logout') }}" class="delete-btn">Sair</a>
                <div class="flex-btn">
                    <a href="{{ route('login') }}" class="option-btn">Entrar</a>
                    <a href="{{ route('register') }}" class="option-btn">Registrar</a>
                </div>
            </div>
        @endif
    </div>
</header>
