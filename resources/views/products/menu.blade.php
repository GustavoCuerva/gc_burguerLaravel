@extends('layouts.main')

@section('title', 'Menu')

@section('styles')
    <link rel="stylesheet" href="{{ asset('/css/menu.css') }}">
@endsection

@section('content')

<main class="corpo">

<form action="#" method="post" class="filtro">
    <select name="filtro" id="filtro">
        <option value="1">Tudo</option>
        <option value="2">Combos</option>
        <option value="3">Lanches</option>
        <option value="4">Bebidas</option>
        <option value="5">Sobremesas</option>
    </select>
</form>

<section class="destaque destaque_menu">
    <h2>Combos</h2>

    <div class="produtos produtos_menu ">
        <a href="{{ route('product', ['id' => 0]) }}">
            <div class="produto produto_menu ">
                <img src="{{ asset('/img/produtos/2hambuguer.jpg') }}" alt="">
                <h3>Peça 1 Coma 2</h3>
                <p class="preco">R$ 30,58</p>
            </div>
        </a>

        <div class="produto produto_menu ">
            <img src="{{ asset('/img/produtos/combo.jpg') }}" alt="">
            <h3>Combo Hambuguer + Batata + Refri</h3>
            <p class="preco">R$ 30,58</p>
        </div>

        <div class="produto produto_menu ">
            <img src="{{ asset('/img/produtos/combo2.jpg') }}" alt="">
            <h3>Combo Hambuguer + Batata + Refri</h3>
            <p class="preco">R$ 30,58</p>
        </div>

        <div class="produto produto_menu ">
            <img src="{{ asset('/img/produtos/2hambuguer.jpg') }}" alt="">
            <h3>Peça 1 Coma 2</h3>
            <p class="preco">R$ 30,58</p>
        </div>

        <div class="produto produto_menu ">
            <img src="{{ asset('/img/produtos/2hambuguer.jpg') }}" alt="">
            <h3>Peça 1 Coma 2</h3>
            <p class="preco">R$ 30,58</p>
        </div>

        <div class="produto produto_menu ">
            <img src="{{ asset('/img/produtos/combo.jpg') }}" alt="">
            <h3>Combo Hambuguer + Batata + Refri</h3>
            <p class="preco">R$ 30,58</p>
        </div>

        <div class="produto produto_menu ">
            <img src="{{ asset('/img/produtos/combo2.jpg') }}" alt="">
            <h3>Combo Hambuguer + Batata + Refri</h3>
            <p class="preco">R$ 30,58</p>
        </div>

        <div class="produto produto_menu ">
            <img src="{{ asset('/img/produtos/2hambuguer.jpg') }}" alt="">
            <h3>Peça 1 Coma 2</h3>
            <p class="preco">R$ 30,58</p>
        </div>
    </div>
    <p class="mostrar_mais"><span onclick="mostrar(0)">Mostrar Mais</span></p>
</section><!--Combos-->

<hr>

<section class="destaque destaque_menu">
    <h2>Lanches</h2>
    <div class="produtos produtos_menu ">
        <div class="produto produto_menu ">
            <img src="{{ asset('/img/produtos/hamburguer1.png') }}" alt="">
            <h3>Peça 1 Coma 2</h3>
            <p class="preco">R$ 30,58</p>
        </div>

        <div class="produto produto_menu ">
            <img src="{{ asset('/img/produtos/hamburguer2.png') }}" alt="">
            <h3>Combo Hambuguer + Batata + Refri</h3>
            <p class="preco">R$ 30,58</p>
        </div>

        <div class="produto produto_menu ">
            <img src="{{ asset('/img/produtos/hamburguer3.jpg') }}" alt="">
            <h3>Combo Hambuguer + Batata + Refri</h3>
            <p class="preco">R$ 30,58</p>
        </div>

        <div class="produto produto_menu ">
            <img src="{{ asset('/img/produtos/hamburguer4.png') }}" alt="">
            <h3>Peça 1 Coma 2</h3>
            <p class="preco">R$ 30,58</p>
        </div>

        <div class="produto produto_menu ">
            <img src="{{ asset('/img/produtos/hamburguer1.png') }}" alt="">
            <h3>Peça 1 Coma 2</h3>
            <p class="preco">R$ 30,58</p>
        </div>

        <div class="produto produto_menu ">
            <img src="{{ asset('/img/produtos/hamburguer2.png') }}" alt="">
            <h3>Combo Hambuguer + Batata + Refri</h3>
            <p class="preco">R$ 30,58</p>
        </div>

        <div class="produto produto_menu ">
            <img src="{{ asset('/img/produtos/hamburguer3.jpg') }}" alt="">
            <h3>Combo Hambuguer + Batata + Refri</h3>
            <p class="preco">R$ 30,58</p>
        </div>

        <div class="produto produto_menu ">
            <img src="{{ asset('/img/produtos/hamburguer4.png') }}" alt="">
            <h3>Peça 1 Coma 2</h3>
            <p class="preco">R$ 30,58</p>
        </div>

    </div>
    <p class="mostrar_mais"><span onclick="mostrar(1)">Mostrar Mais</span></p>
</section><!--Lanches-->
</main><!--Corpor-->
@endsection