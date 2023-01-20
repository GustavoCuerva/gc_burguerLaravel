@extends('layouts.main')

@section('Title', 'Nome produto')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/produto.css') }}">
@endsection

@section('content')
    <section class="box-produto">
        <div class="info-produto">
            <div class="img">
                <img src="{{ asset($product->path_image) }}" alt="">
            </div>
            <div class="descricao">
                <h2>{{$product->name}}</h2>
                <p>{{$product->description}}</p>
            </div>
            <div class="comprar">
                <p class="valor">R${{$product->value}}</p>
                <button class="salvar">Salvar</button>
                <button class="pedir">Pedir</button>
            </div>
        </div>
    </section><!--Informações do produto-->

    <section class="itens_semelhantes destaque">
        <h2>Semelhantes</h2>

        <div class="produtos produtos_menu ">
            @foreach ($suggestions as $product)
                <a href="{{route('product', ['id' => $product->id])}}">
                    <div class="produto produto_menu ">
                        <img src="{{ asset($product->path_image) }}" alt="">
                        <h3>{{$product->name}}</h3>
                        <p class="preco">R$ {{ $product->value }}</p>
                    </div>
                </a>
            @endforeach

    </section><!--Semelhantes-->
@endsection