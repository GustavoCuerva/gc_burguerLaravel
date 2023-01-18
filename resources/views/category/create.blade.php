@extends('layouts.dashboard_layout')

@section('title', 'Categorias')
    
@section('content')

    <a href="painel.php"><img src="/icons/backward-svgrepo-com.svg" style="margin-top: 30px; margin-left:30px;" width="25px"></a>
    <section class="add_categoria">

        <form action="{{ route('store.category') }}" method="post" enctype="multipart/form-data">
            @csrf
        
            @if (isset($cat))

                {{-- EDITAR --}}
                @method('put')
                
                <div class="itens_form_categoria">
                    <label for="categoria">Categoria: </label>
                    <input type="text" name="category" placeholder="Categoria" value="{{ $cat->category }}" required/>
                </div>
                
                <div class="itens_form_categoria">
                    <label for="img" style="cursor:pointer;"> <img src="{{ $cat->path_image }}" style="width: 150px; margin-right: 10px;"> Alterar a imagem: </label>
                    <input type="file" name="img" id="img">
                </div>

                <input type="hidden" name="id" value="{{ $cat->id }}">

                <input type="submit" name="add" value="Editar" class="itens_form_categoria">

            @else

                {{-- CRIAR --}}
                <div class="itens_form_categoria">
                    <label for="categoria">Categoria: </label>
                    <input type="text" name="category" placeholder="Categoria" value="" required/>
                </div>

                <div class="itens_form_categoria">
                    <label for="img">Adicione uma imagem: </label>
                    <input type="file" name="img" id="img" required>
                </div>

                <input type="submit" name="add" value="Adicionar" class="itens_form_categoria">

            @endif

        </form>
    </section>

    @if (session('msg'))
        <div class="container">
            <div class="alert alert-{{session('class')}}" role="alert">
                {{ session('msg') }}
            </div>
        </div>
    @endif
    
    <section class="produtos categorias">
            @foreach ($categories as $category)
                <div class="categoria" style="background-image: url({{ $category->path_image }});">
                    <div class="botoes">
                        <a href="{{ route('edit.category', ['id' => $category->id]) }}" class="botao editar">Editar</a>
                        <a href="" class="botao excluir">Excluir</a>
                    </div>
                    <div>
                        <h2>{{ $category->category }}</h2>
                    </div>
                </div>
            @endforeach
            
    </section>

@endsection