<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @yield('styles')

    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <title>@yield('title')</title>
</head>
<body class="@yield('class_body')">
    <div class="fechar" onclick="mostrar_opc_usuario()" style="display: none;"></div>
    <header class="cabecalho">
        <nav class="menu">
            
            <img src="{{ asset('/img/Logo2.png') }}" class="logo">
            <ul>
                <a href="{{route('index')}}"><li>INICIO</li></a>
                <a href="{{route('reserve')}}"><li>RESERVAR</li></a>
            </ul>
            <ul>
                <a href="{{route('menu')}}"><li>MENU</li></a>
                <a href="{{route('about')}}"><li>SOBRE NÓS</li></a>
            </ul>
        </nav><!--Menu-->

        <div class="menu-inferior">
            <div class="endereco">
                <img src="{{ asset('/icons/location-svgrepo-com.svg') }}" class="localizacao_img">
                <div class="endereco_rua">
                    <p>Avenida Paulista 2222 </p>
                    <p>São Paulo-SP</p>
                    <p><strong>CEP:</strong> 00000000000</p>
                </div><!--Endereco-->
            </div>

            <div class="menu-usuario">
                <form action="pesquisa.php" method="post" class="pesquisar">
                    <input type="search" placeholder="Pesquisar" name="pesquisa">
                    <button><img src="{{ asset('/icons/search-svgrepo-com.svg') }}" alt=""></button>
                </form>
                <a><img src="{{ asset('/icons/search-svgrepo-com.svg') }}" class="lupa" alt=""></a>
                <a href="favoritos.php"><img src="{{ asset('/icons/favorite-svgrepo-com.svg') }}" alt=""></a>
                    <a onclick="mostrar_opc_usuario()"><img src="{{ asset('/icons/user-svgrepo-com.svg') }}" alt=""></a>
                    <div class="opc_usuario" style="display: none;">
                        <a href="admin/painel.php">Painel admin</a>
                        <a href="meus_dados.php">Meus dados</a>
                        <a href="processos/sair.php">Sair</a>
                    </div>
                <a href="minhas_reservas.php"><img src="{{ asset('/icons/menu-svgrepo-com.svg') }}" alt=""></a>
            </div>
        </div><!--Menu inferior-->
    </header><!--Cabeçalho-->


    @yield('content')


    <footer>
        <div class="itens-rodape">
            <div class="endereco">
                <img src="{{ asset('/icons/location-svgrepo-com.svg') }}" class="localizacao_img">
                <div class="endereco_rua">
                    <p>Avenida Paulista 2222 </p>
                    <p>São Paulo-SP</p>
                    <p><strong>CEP:</strong> 00000000000</p>
                </div><!--Endereco-->
            </div>
                <div class="sobre-nos">
                    <a href="">Sobre Nós</a>
                    <div class="social-midia">
                        <a href=""><img src="{{ asset('/icons/whatsapp-svgrepo-com.svg') }}" alt=""></a>
                        <a href=""><img src="{{ asset('/icons/facebook-svgrepo-com.svg') }}" alt=""></a>
                        <a href=""><img src="{{ asset('/icons/instagram-svgrepo-com.svg') }}" alt=""></a>
                        <a href=""><img src="{{ asset('/icons/email-svgrepo-com.svg') }}" alt=""></a>
                    </div>
                </div>
        </div>
        <p class="copy">Gustavo Candido Cuerva &copy 2022</p>
    </footer>

    <script src="{{ asset('/js/script.js') }}"></script>

    @yield('scripts')
</body>
</html>