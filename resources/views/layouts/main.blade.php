<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @yield('styles')

    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}
    <title>GC Burguer - @yield('title')</title>
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
                <a href="{{route('menu', ['id'=>'tudo'])}}"><li>MENU</li></a>
                <a href="{{route('about')}}"><li>SOBRE NÓS</li></a>
            </ul>
        </nav><!--Menu-->

        <div class="menu-inferior">
            <div class="endereco">
                <img src="{{ asset('/icons/location-svgrepo-com.svg') }}" class="localizacao_img">
                <div class="endereco_rua">
                    Avenida Paulista 2222<br>
                    São Paulo-SP<br>
                    <strong>CEP:</strong> 00000000000<br>
                </div><!--Endereco-->
            </div>

            <div class="menu-usuario">
                <form action="pesquisa.php" method="post" class="pesquisar">
                    <input type="search" placeholder="Pesquisar" name="pesquisa">
                    <button><img src="{{ asset('/icons/search-svgrepo-com.svg') }}" alt=""></button>
                </form>
                <a><img src="{{ asset('/icons/search-svgrepo-com.svg') }}" class="lupa" alt=""></a>
                <a href="{{ route('favorites') }}"><img src="{{ asset('/icons/favorite-svgrepo-com.svg') }}" alt=""></a>
                    @if (Auth::check())
                        <a onclick="mostrar_opc_usuario()"><img src="{{ asset('/icons/user-svgrepo-com.svg') }}" alt=""></a>
                            <div class="opc_usuario" style="display: none;">
                                <a href="{{ route('dashboard') }}">Painel admin</a>
                                <a href="{{--route('my-data')--}}">Meus dados</a>
                                <form action="/logout" method="post">
                                    @csrf
                                    <a href="/logout" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
                                </form>
                            </div>
                    @else
                        <a href="{{ route('login') }}"><img src="{{ asset('/icons/user-svgrepo-com.svg') }}" alt=""></a>
                    @endif
                    
                <a href="{{route('reserves')}}"><img src="{{ asset('/icons/menu-svgrepo-com.svg') }}" alt=""></a>
            </div>
        </div><!--Menu inferior-->
    </header><!--Cabeçalho-->

    <main class="corpo">
        @yield('content')
    </main>

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