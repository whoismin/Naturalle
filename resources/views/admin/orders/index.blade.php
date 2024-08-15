@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/admin_style.css') }}">
@endpush

@section('content')

    @include('components.header-admin')

    <section class="placed-orders">
        <h1 class="title">Pedidos Realizados</h1>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="box-container">
            @if ($orders->count())
                @foreach ($orders as $order)
                <div class="box">
                    <p>ID do usuário: <span>{{ $order->user_id }}</span></p>
                    <p>Data do Pedido: <span>{{ $order->placed_on->format('d/m/Y H:i') }}</span></p>
                    <p>Nome: <span>{{ $order->name }}</span></p>
                    <p>E-mail: <span>{{ $order->email }}</span></p>
                    <p>Número: <span>{{ $order->number }}</span></p>
                    <p>Endereço: <span>{{ $order->address }}</span></p>
                    <p>Total de Produtos: <span>{{ $order->total_products }}</span></p>
                    <p>Preço Total: <span>${{ $order->total_price }}/-</span></p>
                    <p>Marmita doada para ONG: <span>${{ $order->ong }}/-</span></p>
                    <p>Método de Pagamento: <span>{{ $order->method }}</span></p>
                    <form action="{{ route('orders.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <select name="update_payment" class="drop-down">
                            <option value="" selected disabled>{{ $order->payment_status }}</option>
                            <option value="pendente">Pendente</option>
                            <option value="completo">Realizado</option>
                        </select>
                        <div class="flex-btn">
                            <input type="submit" name="update_order" class="option-btn" value="Atualizar">
                            <a href="{{ route('orders.delete', $order->id) }}" class="delete-btn" onclick="return confirm('Excluir este pedido?');">Excluir</a>
                        </div>
                    </form>
                </div>
                @endforeach
            @else
                <p class="empty">Nenhum pedido realizado ainda!</p>
            @endif
        </div>
    </section>

@endsection
