
@extends('layouts.app')
@section('content')
<section class="wishlist">
    <h1 class="title">Meus Produtos</h1>
    <div class="box-container">
        @if($wishlist_items->count() > 0)
            @foreach($wishlist_items as $item)
            <form action="{{ route('wishlist.addToCart') }}" method="POST" class="box">
                @csrf
                <a href="{{ route('wishlist.delete', $item->id) }}" class="fas fa-times" onclick="return confirm('delete this from wishlist?');"></a>
                <a href="{{ url('view_page', $item->pid) }}" class="fas fa-eye"></a>
                <img src="{{ asset('uploaded_img/' . $item->image) }}" alt="">
                <div class="name">{{ $item->name }}</div>
                <div class="price">${{ $item->price }}/-</div>
                <input type="number" min="1" value="1" class="qty" name="p_qty">
                <input type="hidden" name="pid" value="{{ $item->pid }}">
                <input type="hidden" name="p_name" value="{{ $item->name }}">
                <input type="hidden" name="p_price" value="{{ $item->price }}">
                <input type="hidden" name="p_image" value="{{ $item->image }}">
                <input type="submit" value="add to cart" name="add_to_cart" class="btn">
            </form>
            @endforeach
        @else
            <p class="empty">Não há nada aqui</p>
        @endif
    </div>
    <div class="wishlist-total">
        <p>Total : <span>${{ $grand_total }}/-</span></p>
        <a href="{{ url('shop') }}" class="btn">Continue a compra</a>
        <a href="{{ route('wishlist.deleteAll') }}" class="btn {{ $grand_total > 1 ? '' : 'disabled' }}">Deletar produto</a>
    </div>
</section>
@endsection
