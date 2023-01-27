@extends('layouts.main')

@section('title', 'Menu')

@section('styles')
    <link rel="stylesheet" href="{{ asset('/css/menu.css') }}">
@endsection

@section('content')

<form action="#" method="post" class="filtro">
    <select name="filtro" id="filtro" onchange="filtro_categorias()">
        <option value="tudo">Tudo</option>
        @foreach ($cats as $category)
            @php
            $selected = "";
            if ($category->id == $id){
                $selected = 'selected';
            }
            @endphp
            <option value="{{ $category->id }}" {{ $selected }}>{{ $category->category }}</option>
        @endforeach
    </select>
</form>

    @foreach ($categories as $key => $category)
        <section class="destaque destaque_menu">
            <h2>{{$category->category}}</h2>
            
            <div class="produtos produtos_menu ">
            @php $cont=0; @endphp
            @foreach ($products as $product)
                @if ($product->category_id == $category->id)
                    <a href="{{ route('product', ['id' => $product->id]) }}">
                        <div class="produto produto_menu ">
                            <img src="{{ asset($product->path_image) }}" alt="">
                            <h3>{{$product->name}}</h3>
                            <p class="preco">R$ {{$product->value}}</p>
                        </div>
                    </a>
                    @php $cont=1; @endphp
                @endif
            @endforeach
            
            @if ($cont == 0)
            <div class="alert alert-light" role="alert">
                Sem produtos cadastrados na cartegoria
            </div>
            @endif

            </div>
            <p class="mostrar_mais"><span onclick="mostrar({{$key}})">Mostrar Mais</span></p>
            <br>
        <hr>
    @endforeach
@endsection