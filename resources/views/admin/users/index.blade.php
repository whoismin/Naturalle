@extends('layouts.app')

@section('content')

    @include('components.header-admin')

    <section class="user-accounts">
        <h1 class="title">Contas cadastradas</h1>

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        <div class="box-container">
            @forelse ($users as $user)
                @if ($user->id != auth()->id()) <!-- Ocultar o próprio usuário -->
                    <div class="box">
                        <img src="{{ asset('uploaded_img/' . $user->image) }}" alt="">
                        <p>ID do usuário: <span>{{ $user->id }}</span></p>
                        <p>Nome: <span>{{ $user->name }}</span></p>
                        <p>E-mail: <span>{{ $user->email }}</span></p>
                        <p>Tipo de usuário: <span style="color:{{ $user->user_type == 'admin' ? 'orange' : 'inherit' }}">{{ $user->user_type }}</span></p>
                        <a href="{{ route('admin.users.delete', $user->id) }}" onclick="return confirm('Excluir este usuário?');" class="delete-btn">Excluir</a>
                    </div>
                @endif
            @empty
                <p class="empty">Nenhum usuário cadastrado ainda!</p>
            @endforelse
        </div>
    </section>


@endsection
