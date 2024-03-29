@php
    if(!isset($search)){
        $search = "";
    }
@endphp
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @yield('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    {{-- <link href="{{asset('/css/bootstrap.css')}}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    
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
                <form action="{{route('menu', ['id' => 'tudo'])}}" method="get" class="pesquisar">
                    <input type="search" placeholder="Pesquisar" name="search" value="{{$search}}" style="border: none;">
                    <button><img src="{{ asset('/icons/search-svgrepo-com.svg') }}" alt=""></button>
                </form>
                <a><img src="{{ asset('/icons/search-svgrepo-com.svg') }}" class="lupa" alt=""></a>
                <a href="{{ route('favorites', ['id' => 'tudo']) }}"><img src="{{ asset('/icons/favorite-svgrepo-com.svg') }}" alt=""></a>
                    @if (Auth::check())
                        <a onclick="mostrar_opc_usuario()"><img src="{{ asset('/icons/user-svgrepo-com.svg') }}" alt=""></a>
                            <div class="opc_usuario" style="display: none;">
                                @if (auth()->user()->permission == 1)
                                {{-- Admin --}}
                                    <a href="{{ route('dashboard') }}">Painel admin</a>
                                @else
                                    <a href="{{ route('my-data') }}">Meus dados</a>
                                @endif
                                
                                <form action="/logout" method="post" style="margin: 10px;">
                                    @csrf
                                    <a href="/logout" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
                                </form>
                            </div>
                    @else
                        <a href="{{ route('login') }}"><img src="{{ asset('/icons/user-svgrepo-com.svg') }}" alt=""></a>
                    @endif
                    
                <a href="{{route('reserves')}}"><img src="{{ asset('/icons/menu-svgrepo-com.svg') }}" alt=""></a>
                <a href="{{route('cart')}}" style="margin-left:3px;"><i class="bi bi-cart4" style="color:white; font-size: 30px;"></i></a>
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
        <p class="copy" style="margin-bottom: 0;">Gustavo Candido Cuerva &copy 2022</p>
    </footer>
    
    <script src="{{ asset('/js/script.js') }}"></script>

    @yield('scripts')
</body>
</html>