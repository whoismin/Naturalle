<!-- resources/views/checkout.blade.php -->
@extends('layouts.app')

@section('content')
@if (session('message'))
    <p>{{ session('message') }}</p>
@endif

<section class="display-orders">
   @if($cartItems->isNotEmpty())
       @foreach($cartItems as $item)
           <p> {{ $item->name }} <span>( {{ 'R$' . $item->price . ',00/' . $item->quantity }} )</span> </p>
       @endforeach
   @else
       <p class="Vazio">Seu carrinho está vazio</p>
   @endif
   <div class="grand-total">Total geral :<span>R${{ $cartGrandTotal }},00</span></div>
</section>

<section class="checkout-orders">
<br>
<h2 class="headline-1 text-center">Pagamento</h2>
<form action="{{ url('/checkout') }}" method="POST">
    @csrf
    <!-- Form fields here -->
    <!-- Use Blade syntax for values and errors -->
    <input type="submit" name="order" class="btn {{ ($cartGrandTotal > 1) ? '' : 'disabled' }}" value="Faça seu pedido">
</form>
</section>
@endsection
