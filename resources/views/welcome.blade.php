@extends("layouts.main")

@section('styles')
    <!-- Arquivo das estrelas -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- SWIPER Carrocel -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
@endsection

@section('title', 'Dashboard')

@section('content')

        <div class="banner">
                <h2>COMBOS A PARTIR DE <br>R$29,99</h2>
                <hr style="width: 0;">
                <img src="{{ asset('/icons/hamburger-svgrepo-com.svg') }}" alt="">
        </div>

        <section class="destaque populares">
            <h2>Nosso lanches favoritos</h2>
            <div class="produtos_populares produtos">
                @forelse ($favoritos as $product)
                <a href="{{ route('product', ['id' => $product->id]) }}">
                    <div class="produto produto_menu ">
                        <img src="{{asset($product->path_image)}}" alt="">
                        <h3>{{$product->name}}</h3>
                        <p class="preco">R$ {{$product->value}}</p>
                    </div>
                </a>
                @empty
                    @foreach ($products as $product)
                    <a href="{{ route('product', ['id' => $product->id]) }}">
                        <div class="produto produto_menu ">
                            <img src="{{asset($product->path_image)}}" alt="">
                            <h3>{{$product->name}}</h3>
                            <p class="preco">R$ {{$product->value}}</p>
                        </div>
                    </a>
                    @endforeach
                @endforelse
            </div>
        </section><!--Itens mais populares-->

        <hr>

        <section class="destaque promoções">
            <h2>Melhores preços</h2>
            <div class="produtos_populares produtos">
            @foreach ($baratos as $product)
                <a href="{{ route('product', ['id' => $product->id]) }}">
                    <div class="produto produto_menu ">
                        <img src="{{asset($product->path_image)}}" alt="">
                        <h3>{{$product->name}}</h3>
                        <p class="preco">R$ {{$product->value}}</p>
                    </div>
                </a>
            @endforeach
            </div>
        </section><!--Itens Em promoção-->

        <section class="reserva">
            <div>
                <h2>Faça sua reserva</h2>
                <p>Terça a Domingo</p>
                <p>{{date('H:i', strtotime($info->open))}} ás {{date('H:i', strtotime($info->close))}}</p>
            </div>
            <a href="{{ route('reserve') }}">RESERVAR</a>
        </section><!--Baner do meio Reserva-->

        <section class="novidades destaque">
            <h2>Novidades</h2>
            <div class="produtos_novos produtos">
                @foreach ($news as $product)
                <a href="{{ route('product', ['id' => $product->id]) }}">
                    <div class="produto produto_novo ">
                        <img src="{{asset($product->path_image)}}" alt="">
                        <h3>{{$product->name}}</h3>
                        <p class="preco">R$ {{$product->value}}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </section><!--Novidades-->

        <section class="avaliacoes destaque">
            <h2>Avaliações</h2>

            <section class="secao_slide">
            <div style="max-width: 1200px;" class="swiper mySwiper container depoimentos lista-avaliacoes">
                <div class="swiper-wrapper content">

                    @forelse ($assessments as $assessment)

                    <div class="swiper-slide card">
                        <div class="card-content">
                        <!-- ESTRLAS -->
                        <div class="estrelas" style="cursor: default; display:flex; justify-content: center;">
                            @for ($i = 1; $i <= 5; $i++)

                                @if ($i<= $assessment->note)
                                    <label><i class="fa" style="cursor: default; color: #FC0;"></i></label>
                                @else
                                    <label><i class="fa" style="cursor: default; color: #ccc;"></i></label>
                                @endif

                                
                            @endfor
                        </div>
                        <p class="username"><strong>{{$assessment->name}}</strong></p>
                        <p class="comentario">{{$assessment->comment}}</p>
                        </div>
                    </div>
                    @empty
                    <div class="alert alert-light" role="alert">
                        Sem avaliações no momento
                    </div>
                    @endforelse
            </div><!--Avaliações-->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
            </section>
        </section><!--Avaliações-->

        <section class="avaliar destaque" id="avaliacao">
            <h2>Envie-nos sua opnião</h2>

            {{-- Já existe uma avaliação --}}
            @php
                $check_av = array("","", "", "", "", "");
                $rota = route('store.assessments');
                $comment = "";

                if ($my_assessment->count() > 0){
                    $check_av[$my_assessment[0]->note] = "checked";
                    $rota = route('update.assessments');
                    $comment = $my_assessment[0]->comment;
                }
            @endphp
            
            

            <form action="{{$rota}}" method="post">
                @csrf

                @if ($my_assessment->count() > 0)
                    @method('PUT')
                @endif

                @if (session('msg'))
                <div class="container">
                    <div class="alert alert-{{session('class')}}" role="alert">
                        {{ session('msg') }}
                    </div>
                </div>
                @endif
                <div class="estrelas">
                    <input type="radio" id="vazio" name="estrela" value="" checked>
                        @for ($i = 1; $i <= 5; $i++)
                            <label for="estrela_{{$i}}"><i class="fa check"></i></label>
                            <input type="radio" id="estrela_{{$i}}" name="estrela" value="{{$i}}" {{$check_av[$i]}}>
                        @endfor
                    <br><br>
                </div><!-- ESTRELAS -->
                
                <textarea name="comentario" id="comentario" placeholder="Digite aqui seu comentário...">{{$comment}}</textarea>
                <input type="submit" value="ENVIAR" class="enviar">
            </form>
        </section><!--Avaliar-->

@endsection


@section('scripts')
<!-- SWIPER CARROCEL -->
<script src="{{ asset('https://unpkg.com/swiper/swiper-bundle.min.js') }}"></script>

<script>
    var swiper = new Swiper(".mySwiper", {
    slidesPreview: 1,
    spaceBetween:30,
    slidesPerGroup: 1,
    loop: true,
    speed:1000,
    autoplay: true,
    autoplaySpeed: 3000,
    loopFillGroupWithBlank: true,
        pagination:{
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        effect: "coverflow", 
        grabCursor: false,
        centeredSlides: true, 
        coverflowEffect: {
            rotate: 0,
            stretch: 0,
            depth: 0,
            modifier: 0,
            slideShadows: true
        },
    });
</script>
@endsection