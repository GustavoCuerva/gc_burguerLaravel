@extends('layouts.dashboard_layout')

@section('title', 'Categorias')
    
@section('content')

    <a href="painel.php"><img src="/icons/backward-svgrepo-com.svg" style="margin-top: 30px; margin-left:30px;" width="25px"></a>
    <section class="add_categoria">
        <form action="{{ route('store.category') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="itens_form_categoria">
                <label for="categoria">Categoria: </label>
                <input type="text" name="category" placeholder="Categoria" value="" required/>
            </div>
            
            {{-- <div class="itens_form_categoria">
                <label for="img" style="cursor:pointer;"> <img src="" style="width: 150px; margin-right: 10px;"> Alterar a imagem: </label>
                <input type="file" name="img" id="img">
            </div> --}}

            <div class="itens_form_categoria">
                <label for="img">Adicione uma imagem: </label>
                <input type="file" name="img" id="img" required>
            </div>

            <input type="submit" name="add" style="background-color: ;" value="Adicionar" class="itens_form_categoria">
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
                        <a href="" class="botao editar">Editar</a>
                        <a href="" class="botao excluir">Excluir</a>
                    </div>
                    <div>
                        <h2>{{ $category->category }}</h2>
                    </div>
                </div>
            @endforeach
            
    </section>

@endsection