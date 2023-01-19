@extends('layouts.dashboard_layout')

@section('title', 'Adicionar Produto')
    
@section('content')

    @php
        $name = ''; $description = ''; $img = '/img/Logo2.png'; $value = ''; $required = 'required'; $route = 'store.products';
        
        if (isset($product)) {
            $name = $product->name; $description = $product->description; $img = $product->path_image; $value = $product->value; $required = ''; $route = 'update.products'; $id = $product->category_id;
        }
    @endphp

    <div class="modal_alerta" style="display: none;">
        <div>
            <form action="../processos/proc_produto.php?x=" method="post">
                <h2>Tem certeza que deseja excluir o produto?</h2>
                <p>Essa ação não poderá ser desfeita.</p>
                <p>Se desejar continuar clique em excluir.</p>
                <input type="hidden" name="excluir" value="excluir">
                <span style="background-color: blue;" onclick="alerta_excluir(1)">Cancelar</span>
                <button style="background-color: red;">Excluir</button>
            </form>
        </div>
    </div>

    <section class="admin_produto">
        <div class="form_produto">
            <div style="display: flex; width:100%;">
                <a href="{{route('admin.products', ['id' => $id])}}"><img src="{{asset('/icons/backward-svgrepo-com.svg')}}" width="25px"></a>
                <h2 style="flex: 1;">Novo produto</h2>
            </div>

            @if (session('msg'))
                <div class="container">
                    <div class="alert alert-{{session('class')}}" role="alert">
                        {{ session('msg') }}
                    </div>
                </div>
            @endif

            <form action="{{ route($route) }}" method="post" enctype="multipart/form-data">
                @csrf

                <img src="{{asset($img)}}" class="img_produto">

                <div class="container-form">
                    <div class="box-form">
                        <label for="nome">Nome: </label>
                        <input type="text" name="name" id="nome" placeholder="Nome" value="{{ $name }}" required>
                    </div>
                    <div class="box-form">
                        <label for="categoria">Categoria: </label>
                        <select name="category" id="categoria" required>
                            <option value=""></option>
                            
                            @foreach ($categories as $category)
                                @php
                                    $selected = "";
                                    if ($category->id == $id){
                                        $selected = 'selected';
                                    }
                                @endphp
                                <option value="{{ $category->id }}" {{ $selected }}>{{ $category->category }}</option>
                            @endforeach

                        </select>
                    </div>
                    
                    <div class="box-form">
                        <label for="valor">Valor: R$</label>
                        <input type="text" name="value" id="valor" placeholder="00,00" value="{{ $value }}" required>
                    </div>

                    <div class="box-form">
                        <label for="descricao">Descrição: </label>
                        <textarea name="description" id="descricao" placeholder="Descrição" required>{{ $description }}</textarea>
                    </div>

                    <div class="box-form">
                        <label for="imagem">Adicione uma imagem</label>
                        <input type="file" name="image" id="imagem" style="display: none;" onchange="nova_preview();" {{ $required }}>
                    </div>
                                    
                    <div>
                        <input type="submit" name="enviar" value="Salvar" class="enviar" style="color: white;">
                    </div>

                    @if (isset($product))
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <div>
                            <a onclick="alerta_excluir(3)" class="btn del w-100 br-20" style="color: white; cursor: pointer; background-color: #ff0000d9;">Excluir</a>
                        </div>
                    @endif
                    
                </div>
            </form>
        </div>
    </section>
@endsection