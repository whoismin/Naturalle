@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Marmita para Doação</h1>
            @foreach ($cart_items as $index => $item)
                <div class="box">
                    <h2>Marmita {{ $index + 1 }}</h2>
                    <p>{{ $item->name }}</p>
                    <p>Ao comprar uma refeição em nosso restaurante, automaticamente você contribui para o nosso projeto social.</p>
                    <br>
                </div>
            @endforeach
        </div>

        <div class="col-md-6">
            <h1>Seu Carrinho de Compras</h1>
            @if ($total_products_in_cart > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Produto</th>
                            <th>Preço Unitário</th>
                            <th>Quantidade</th>
                            <th>Subtotal</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart_items as $item)
                            <tr>
                                <td><img src="{{ asset('uploaded_img/' . $item->image) }}" alt="{{ $item->name }}" style="max-width: 100px;"></td>
                                <td>{{ $item->name }}</td>
                                <td>R$ {{ $item->price }}</td>
                                <td>
                                    <form method="POST" action="{{ route('cart.update') }}">
                                        @csrf
                                        <input type="number" name="p_qty" value="{{ $item->quantity }}">
                                        <input type="hidden" name="cart_id" value="{{ $item->id }}">
                                        <button type="submit">Atualizar</button>
                                    </form>
                                </td>
                                <td>R$ {{ $item->price * $item->quantity }}</td>
                                <td><a href="{{ route('cart.delete', $item->id) }}" class="btn">Remover</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="actions mt-3 d-flex justify-content-between">
                    <a href="{{ route('shop') }}" class="btn mr-2">Continuar Comprando</a>
                    <a href="{{ route('cart.deleteAll') }}" class="btn mr-2">Limpar Carrinho</a>
                    <a href="{{ route('checkout') }}" class="btn btn-success">Finalizar Compra</a>
                </div>
            @else
                <p class="empty-cart">Seu carrinho está vazio.</p>
                <a href="{{ route('shop') }}" class="btn">Continuar Comprando</a>
            @endif
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: black;">
                <h2 class="modal-title" id="infoModalLabel">Bem-vindo ao Carrinho!</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background: black;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center" style="background: black;">
                <lord-icon src="https://cdn.lordicon.com/gqjpawbc.json" trigger="hover" colors="primary:#9cf4a7,secondary:#ffffff" style="width:140px;height:140px"></lord-icon>
                <p>Ao comprar uma refeição em nosso restaurante, automaticamente você contribui para o nosso projeto social.</p>
                <p>Confira as marmitas para doação disponíveis no carrinho.</p>
            </div>
            <div class="modal-footer" style="background: black;">
                <button type="button" class="btn" data-dismiss="modal">Entendi</button>
                <button type="button" class="btn" data-dismiss="modal" onclick="window.location.href='{{ route('sabor_solidario') }}'">Saiba mais</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#infoModal').modal('show');
    });
</script>
@endsection
