@extends('layouts.main')

@section('title', 'Favoritos')

@section('styles')
    <link rel="stylesheet" href="{{asset('/css/menu.css')}}">
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

    <h2 style="text-align: center; font-size: 30px; color: #787878; font-weight: 900;">MEUS FAVORITOS</h2>

    <section class="destaque destaque_menu">
        @forelse ($categories as $category)
            <h2>{{$category->category}}</h2>
            
            <div class="produtos produtos_menu">
                @foreach ($products as $product)
                    @if ($product->category_id == $category->id)
                        <a href="{{route('product', ['id' => $product->id])}}">
                            <div class="produto produto_menu ">
                                <img src="{{asset($product->path_image)}}" alt="">
                                <h3>{{$product->name}}</h3>
                                <p class="preco">R$ {{$product->value}}</p>
                            </div>
                        </a>   
                    @endif
                @endforeach
            </div>
            <p class="mostrar_mais"><span onclick="mostrar({{$loop->index}})">Mostrar Mais</span></p>
            <br>
            <hr>
        @empty
            <div style="margin: 10px 50px; text-align: center; display: flex; height: 50vh; flex-direction: column; justify-content: center;">
                <div class="alert alert-secondary container" role="alert" style="font-size: 20px;">
                    Produtos não encontrados
                </div>
            </div>
        @endforelse
    </section>
    
@endsection