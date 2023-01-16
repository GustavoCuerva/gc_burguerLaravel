@extends('layouts.dashboard_layout')

@section('title', 'Categorias')
    
@section('content')

<a href="painel.php"><img src="../icons/backward-svgrepo-com.svg" style="margin-top: 30px; margin-left:30px;" width="25px"></a>
<section class="add_categoria">
<form action="../processos/proc_categoria.php" method="post" enctype="multipart/form-data">

    <div class="itens_form_categoria">
        <label for="categoria">Categoria: </label>
        <input type="text" name="categoria" placeholder="Categoria" value="" >
    </div>
            <div class="itens_form_categoria">
                <label for="img" style="cursor:pointer;"> <img src="" style="width: 150px; margin-right: 10px;"> Alterar a imagem: </label>
                <input type="file" name="img" id="img">
            </div>
            <div class="itens_form_categoria">
                <label for="img">Adicione uma imagem: </label>
                <input type="file" name="img" id="img">
            </div>

    <input type="submit" name="add" style="background-color: ;" value="" class="itens_form_categoria">
</form>
</section>

<section class="produtos categorias">

        <div class="categoria" style="background-image: url('../');">

            <div class="botoes">
                <a href="" class="botao editar">Editar</a>
                <a href="" class="botao excluir">Excluir</a>
            </div>

            <div>
                <h2></h2>
            </div>
        </div>
</section>

@endsection