<!DOCTYPE html>
<html lang="pt  ">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="{{asset('/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/menu.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Hamburgueria GC - @yield('title')</title>
  </head>
  <body>
    <main class="corpo">
        <a href="{{ route('dashboard') }}"><img src="{{asset('/icons/backward-svgrepo-com.svg')}}" style="margin-top: 30px; margin-left:30px;" width="25px"></a>
        <div class="cabecalho_produtos">
            <a href="{{ route('create.products', ['id' => $id]) }}"><img src="{{asset('/icons/add-svgrepo-com.svg')}}" class="add_imagem"></a>

            <form class="filtro">
                <select name="filtro" id="filtro" onchange="filtro_categorias()">
                    <option value="tudo">Tudo</option>

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
            </form>
        </div>
        
        @if (session('msg'))
            <br>
            <div class="container">
                <div class="alert alert-{{session('class')}}" role="alert">
                    {{ session('msg') }}
                </div>
            </div>
        @endif
        
        <section class="destaque populares">

            <div class="produtos_populares produtos">
                @foreach ($products as $product)
                    <a href="{{ route('edit.products', ['id' => $product->id]) }}">
                        <div class="produto produto_popular">
                            <img src="{{asset($product->path_image)}}" alt="">
                            <h3>{{ $product->name }}</h3>
                            <p class="preco">R${{ $product->value }}</p>
                        </div>
                    </a>
                @endforeach
            </div>

        </section>
    </main>
    
    <script src="{{asset('/js/script.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
    </body>
</html>