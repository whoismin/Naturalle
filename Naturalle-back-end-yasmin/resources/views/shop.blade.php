<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('delivery.css') }}">
</head>
<body>
   
@include('delivery_header')

<section class="p-category">
    <a href="{{ url('category?category=fruits') }}">Pratos</a>
    <a href="{{ url('category?category=vegitables') }}">Sobremesas</a>
    <a href="{{ url('category?category=fish') }}">Bebidas</a>
</section>

<section class="products">
    <h1 class="title">Últimos pratos adicionados</h1>
    <div class="box-container">
        @forelse ($products as $product)
        <form action="{{ route('addToWishlist') }}" method="POST" class="box">
            @csrf
            <div class="price">$<span>{{ $product->price }}</span>/-</div>
            <a href="{{ url('view_page?pid=' . $product->id) }}" class="fas fa-eye"></a>
            <img src="{{ asset('uploaded_img/' . $product->image) }}" alt="">
            <div class="name">{{ $product->name }}</div>
            <input type="hidden" name="pid" value="{{ $product->id }}">
            <input type="hidden" name="p_name" value="{{ $product->name }}">
            <input type="hidden" name="p_price" value="{{ $product->price }}">
            <input type="hidden" name="p_image" value="{{ $product->image }}">
            <input type="number" min="1" value="1" name="p_qty" class="qty">
            <input type="submit" value="Adicionar a lista de desejos" class="option-btn" name="add_to_wishlist">
            <input type="submit" value="Adicionar ao carrinho" class="btn" name="add_to_cart">
        </form>
        @empty
        <p class="empty">Nenhum produto adicionado!</p>
        @endforelse
    </div>
</section>

@include('footer')

<script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
@if (session('message'))
    <p class="message">{{ session('message') }}</p>
@endif

