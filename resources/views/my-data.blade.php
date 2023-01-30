@extends('layouts.main')

@section('title', 'Meus dados')

@section('styles')
    <link rel="stylesheet" href="{{asset('/css/login.css')}}">
@endsection

@section('class_body', 'body_login')

@section('content')
    <!-- Modal excluir -->
    <div class="div_excluir" style="display: none;">
        <div class="box-excluir">
            <form action="{{route('delete.user')}}" method="POST">
                @csrf
                @method('delete')
                <div>
                    <h3 style="color: red">Tem certeza que deseja excluir sua conta permanentemente?</h3>
                </div>

                <div>
                    <p style="color: red">ESSA AÇÃO NÃO PODERÁ SER DESFEITA</p>
                </div>

                <div>
                    <input type="password" placeholder="Digite sua senha para confirmar essa ação" name="senha" required>
                </div>

                <div>
                    <a class="botoes_excluir" onclick="mostrar_excluir()" style="background-color: #0000ff9c;">Cancelar</a>
                    <input class="botoes_excluir" type="submit" value="Excluir" style="background-color: #ff0000d9;" name="excluir">
                </div>
            </form>
        </div>
    </div><!-- Modal excluir -->

    <section class="login meus_dados_box">
            <h2>MEUS DADOS</h2>
            @if (session('msg'))
                <div class="container">
                    <div class="alert alert-{{session('class')}}" role="alert">
                        {{ session('msg') }}
                    </div>
                </div>
            @endif
            <form action="{{route('my-data.update')}}" method="post" class="meus_dados">
                @csrf
                @method('put')
                <div>
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" placeholder="Nome" value="{{$user->name}}" required>
                </div>

                <div>
                    <label for="telefone">Celular:</label>
                    <input type="tel" name="telefone" id="telefone" value="{{$user->tel}}" placeholder="(11) 911111111" required>
                </div>

                <div>
                    <label for="email">Email: </label>
                    <input type="email" placeholder="exemplo@email.com" value="{{$user->email}}" name="email" required>
                </div>

                <div>
                    <label for="senha">Senha Atual:</label>
                    <input type="password" placeholder="Senha" name="senha" required>
                </div>

                <div>
                    <label for="nova_senha"> Nova senha:</label>
                    <input type="password" placeholder="Nova Senha" name="nova_senha" id="newPass" minlength="8" onchange="campoSenha(this.value)">
                </div>

                <div>
                    <label for="conf_senha">Confirme a senha:</label>
                    <input type="password" placeholder="Confirme a senha" name="conf_senha" minlength="8" id="confPass">
                </div>
                <input type="submit" name="alterar" value="Alterar">
                <a onclick="mostrar_excluir()" style="cursor: pointer;">Excluir conta</a>
            </form>
        </section>
@endsection

@section('scripts')
    <script>
        function campoSenha(v) {
            if (v != '') {
                document.getElementById('confPass').required = true;
            }else{
                document.getElementById('confPass').required = false;
            }
        }
    </script>
@endsection