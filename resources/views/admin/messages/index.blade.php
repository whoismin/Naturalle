@extends('layouts.app')

@section('content')

    @include('components.header-admin')

    <section class="messages">
        <h1 class="title">Mensagens</h1>

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="box-container">
            @forelse ($messages as $message)
                <div class="box">
                    <p> ID do usuário: <span>{{ $message->user_id }}</span> </p>
                    <p> Nome: <span>{{ $message->name }}</span> </p>
                    <p> Número: <span>{{ $message->number }}</span> </p>
                    <p> E-mail: <span>{{ $message->email }}</span> </p>
                    <p> Mensagem: <span>{{ $message->message }}</span> </p>
                    <a href="{{ route('admin.contacts.delete', $message->id) }}" onclick="return confirm('Apagar esta mensagem?');" class="delete-btn">Excluir</a>
                </div>
            @empty
                <p class="empty">Você não tem mensagens!</p>
            @endforelse
        </div>
    </section>

@endsection
