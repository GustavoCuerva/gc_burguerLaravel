@extends('layouts.main')

@section('Title', 'Nome produto')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/produto.css') }}">
@endsection

@section('content')
    <section class="box-produto">
        <div class="info-produto">
            <div class="img">
                <img src="{{ asset('img/produtos/2hambuguer.jpg') }}" alt="">
            </div>
            <div class="descricao">
                <h2>Compre 1 e Leve 2</h2>
                <p>Na compra de um xBacon escolha entre um xPicanha, xSalada ou Chiquem Junior para levar de graça</p>
                <p>Acompanhamentos: Sem acompanhamento</p>
            </div>
            <div class="comprar">
                <p class="valor">R$30,58</p>
                <button class="salvar">Salvar</button>
                <button class="pedir">Pedir</button>
            </div>
        </div>
    </section><!--Informações do produto-->

    <section class="itens_semelhantes destaque">
        <h2>Semelhantes</h2>

        <div class="produtos produtos_menu ">
            <a href="produto.php">
                <div class="produto produto_menu ">
                    <img src="{{ asset('img/produtos/2hambuguer.jpg') }}" alt="">
                    <h3>Peça 1 Coma 2</h3>
                    <p class="preco">R$ 30,58</p>
                </div>
            </a>

            <div class="produto produto_menu ">
                <img src="{{ asset('img/produtos/combo.jpg') }}" alt="">
                <h3>Combo Hambuguer + Batata + Refri</h3>
                <p class="preco">R$ 30,58</p>
            </div>

            <div class="produto produto_menu ">
                <img src="{{ asset('img/produtos/combo2.jpg') }}" alt="">
                <h3>Combo Hambuguer + Batata + Refri</h3>
                <p class="preco">R$ 30,58</p>
            </div>

            <div class="produto produto_menu ">
                <img src="{{ asset('img/produtos/2hambuguer.jpg') }}" alt="">
                <h3>Peça 1 Coma 2</h3>
                <p class="preco">R$ 30,58</p>
            </div>

    </section><!--Semelhantes-->

    <section class="para_voce destaque">
        <h2>Sugestões para você</h2>

        <div class="produtos produtos_menu ">
            <a href="produto.php">
                <div class="produto produto_menu ">
                    <img src="{{ asset('img/produtos/2hambuguer.jpg') }}" alt="">
                    <h3>Peça 1 Coma 2</h3>
                    <p class="preco">R$ 30,58</p>
                </div>
            </a>

            <div class="produto produto_menu ">
                <img src="{{ asset('img/produtos/combo.jpg') }}" alt="">
                <h3>Combo Hambuguer + Batata + Refri</h3>
                <p class="preco">R$ 30,58</p>
            </div>

            <div class="produto produto_menu ">
                <img src="{{ asset('img/produtos/combo2.jpg') }}" alt="">
                <h3>Combo Hambuguer + Batata + Refri</h3>
                <p class="preco">R$ 30,58</p>
            </div>

            <div class="produto produto_menu ">
                <img src="{{ asset('img/produtos/2hambuguer.jpg') }}" alt="">
                <h3>Peça 1 Coma 2</h3>
                <p class="preco">R$ 30,58</p>
            </div>

    </section><!--Para você-->
@endsection