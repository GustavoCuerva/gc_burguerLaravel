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
                <div class="container">
                    @if (session('msg'))
                        <div class="container">
                            <div class="alert alert-{{session('class')}}" role="alert">
                                {{ session('msg') }}
                            </div>
                        </div>
                    @endif
                </div>
                <p class="valor">R${{$product->value}}</p>
                <form action="{{route('saved.product')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$product->id}}">
                    @if ($count>0)
                        <button class="salvar">Remover dos favoritos</button>
                    @else
                        <button class="salvar">Salvar</button>
                    @endif
                </form>
                <button class="pedir" onclick="alerta()">Pedir</button>
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