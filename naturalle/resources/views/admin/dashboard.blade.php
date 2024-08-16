@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/admin_style.css') }}">
@endpush

@section('content')

    @include('components.header-admin')

    <section class="dashboard">
        <h1 class="title">Painel de Controle</h1>
        <div class="box-container">
            <div class="box">
                <h3>${{ $total_pendings }} /-</h3>
                <p>Total de Pendentes</p>
                <a href="{{ url('admin_orders') }}" class="btn">Ver Pedidos</a>
            </div>
            <div class="box">
                <h3>${{ $total_completed }} /-</h3>
                <p>Pedidos Concluídos</p>
                <a href="{{ url('admin_orders') }}" class="btn">Ver Pedidos</a>
            </div>
            <div class="box">
                <h3>{{ $number_of_orders }}</h3>
                <p>Pedidos Realizados</p>
                <a href="{{ url('admin_orders') }}" class="btn">Ver Pedidos</a>
            </div>
            <div class="box">
                <h3>{{ $number_of_products }}</h3>
                <p>Produtos Adicionados</p>
                <a href="{{ url('admin_products') }}" class="btn">Ver Produtos</a>
            </div>
            <div class="box">
                <h3>{{ $number_of_users }}</h3>
                <p>Total de Usuários</p>
                <a href="{{ url('admin_users') }}" class="btn">Ver Contas</a>
            </div>
            <div class="box">
                <h3>{{ $number_of_admins }}</h3>
                <p>Total de Administradores</p>
                <a href="{{ url('admin_users') }}" class="btn">Ver Contas</a>
            </div>
            <div class="box">
                <h3>{{ $number_of_accounts }}</h3>
                <p>Total de Contas</p>
                <a href="{{ url('admin_users') }}" class="btn">Ver Contas</a>
            </div>
            <div class="box">
                <h3>{{ $number_of_messages }}</h3>
                <p>Total de Mensagens</p>
                <a href="{{ url('admin_contacts') }}" class="btn">Ver Mensagens</a>
            </div>
        </div>
    </section>


@endsection
