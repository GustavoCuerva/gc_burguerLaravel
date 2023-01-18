@extends('layouts.dashboard_layout')

@section('title', 'Categorias')
    
@section('content')

    {{-- <form action="{{ route('del.category')}}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" class="excluir botao" value="Excluir">
    </form> --}}

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: rgb(194, 61, 61);"></h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('del.category')}}" method="post">
                @csrf
                @method('DELETE')
                
                <input type="hidden" class="form-control" name="id" id="recipient-name" value="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-danger" value="Excluir"/>
              </form>
            </div>
          </div>
        </div>
      </div>

    <a href="{{ route('dashboard') }}"><img src="/icons/backward-svgrepo-com.svg" style="margin-top: 30px; margin-left:30px;" width="25px"></a>
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
                    <div class="botoes d-flex">
                        <a href="{{ route('edit.category', ['id' => $category->id]) }}" class="botao editar">Editar</a>
                        <button style="width: auto;" class="botao excluir" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="{{ $category->category }}" data-bs-id="{{ $category->id }}">Excluir</button>
                    </div>
                    <div>
                        <h2>{{ $category->category }}</h2>
                    </div>
                </div>
            @endforeach
            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Open modal for @mdo</button> --}}
    </section>

    <script>
        const exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', event => {
        // Button that triggered the modal
        const button = event.relatedTarget
        // Extract info from data-bs-* attributes
        const recipient = button.getAttribute('data-bs-whatever')
        const id = button.getAttribute('data-bs-id')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        const modalTitle = exampleModal.querySelector('.modal-title')
        const modalBodyInput = exampleModal.querySelector('#recipient-name')

        modalTitle.textContent = `Tem certeza que deseja excluir a categoria ${recipient} ?`
        modalBodyInput.value = id
        })
    </script>
@endsection