@extends('layouts.app')

@section('content')

@include('components.header-admin')

<section class="add-products">

    <h1 class="title">Adicione novos produtos</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
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
                <input type="number" min="0" name="price" class="box" required placeholder="Digite o preço do produto">
                <input type="file" name="image" required class="box" accept="image/jpg, image/jpeg, image/png">
            </div>
        </div>
        <textarea name="details" class="box" required placeholder="Descrição do produto" cols="30" rows="10"></textarea>
        <input type="submit" class="btn" value="Adicionar produto">
    </form>

</section>

@endsection
