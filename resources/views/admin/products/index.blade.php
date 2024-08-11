@extends('layouts.app')

@section('content')

    @include('components.header-admin')

    <section class="add-products">

        <h1 class="title">Adicione novos produtos</h1>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="flex">
                <div class="inputBox">
                    <input type="text" name="name" class="box" required placeholder="Digite o nome do produto">
                    <select name="category" class="box" required>
                        <option value="" selected disabled>Selecione a categoria</option>
                        <option value="vegitables">Pratos</option>
                        <option value="fruits">Sobremesas</option>
                        <option value="meat">Bebidas</option>

                    </select>
                </div>
                <div class="inputBox">
                    <input type="number" min="0" name="price" class="box" required
                        placeholder="Digite o preço do produto">
                    <input type="file" name="image" required class="box" accept="image/jpg, image/jpeg, image/png">
                </div>
            </div>
            <textarea name="details" class="box" required placeholder="Descrição do produto" cols="30" rows="10"></textarea>
            <input type="submit" class="btn" value="Adicionar produto" name="add_product">
        </form>

    </section>

    <section class="show-products">

        <h1 class="title">Produtos adicionados</h1>

        <div class="box-container">
            @if ($products->count() > 0)
                @foreach ($products as $product)
                    <div class="box">
                        <div class="price">${{ $product->price }}/-</div>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="">
                        <div class="name">{{ $product->name }}</div>
                        <div class="cat">{{ $product->category }}</div>
                        <div class="details">{{ $product->details }}</div>
                        <div class="flex-btn">
                            <a href="{{ route('products.edit', $product->id) }}" class="option-btn">Atualizar</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                onsubmit="return confirm('Tem certeza de que deseja deletar este produto?');">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="delete-btn" value="Deletar">
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="empty">Nenhum produto adicionado ainda!</p>
            @endif
        </div>

    </section>

@endsection
