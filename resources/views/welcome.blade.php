@extends("layouts.main")

@section('styles')
    <!-- Arquivo das estrelas -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- SWIPER Carrocel -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
@endsection

@section('title', 'Home')

@section('content')


<main class="corpo">

        <div class="banner">
                <h2>COMBOS A PARTIR DE <br>R$29,99</h2>
                <hr style="width: 0;">
                <img src="{{ asset('/icons/hamburger-svgrepo-com.svg') }}" alt="">
        </div>

        <section class="destaque populares">
            <h2>Nosso lanches favoritos</h2>
            <div class="produtos_populares produtos">
                <div class="produto produto_popular">
                    <img src="{{ asset('/img/produtos/2hambuguer.jpg') }}" alt="">
                    <h3>Peça 1 Coma 2</h3>
                    <p class="preco">R$ 30,58</p>
                </div>

                <div class="produto produto_popular">
                    <img src="{{ asset('/img/produtos/combo.jpg') }}" alt="">
                    <h3>Combo Hambuguer + Batata + Refri</h3>
                    <p class="preco">R$ 30,58</p>
                </div>

                <div class="produto produto_popular">
                    <img src="{{ asset('/img/produtos/combo2.jpg') }}" alt="">
                    <h3>Combo Hambuguer + Batata + Refri</h3>
                    <p class="preco">R$ 30,58</p>
                </div>

                <div class="produto produto_popular">
                    <img src="{{ asset('/img/produtos/2hambuguer.jpg') }}" alt="">
                    <h3>Peça 1 Coma 2</h3>
                    <p class="preco">R$ 30,58</p>
                </div>
            </div>
        </section><!--Itens mais populares-->

        <hr>

        <section class="destaque promoções">
            <h2>Aproveite nossas promoções</h2>
            <div class="produtos_populares produtos">
                <div class="produto produto_promocao">
                    <img src="{{ asset('/img/produtos/2hambuguer.jpg') }}" alt="">
                    <h3>Peça 1 Coma 2</h3>
                    <p class="preco">R$ 30,58</p>
                </div>

                <div class="produto produto_promocao">
                    <img src="{{ asset('/img/produtos/combo.jpg') }}" alt="">
                    <h3>Combo Hambuguer + Batata + Refri</h3>
                    <p class="preco">R$ 30,58</p>
                </div>

                <div class="produto produto_promocao">
                    <img src="{{ asset('/img/produtos/combo2.jpg') }}" alt="">
                    <h3>Combo Hambuguer + Batata + Refri</h3>
                    <p class="preco">R$ 30,58</p>
                </div>

                <div class="produto produto_promocao">
                    <img src="{{ asset('/img/produtos/2hambuguer.jpg') }}" alt="">
                    <h3>Peça 1 Coma 2</h3>
                    <p class="preco promocao-preco">R$ 30,58</p>
                </div>
            </div>
        </section><!--Itens Em promoção-->

        <section class="reserva">
            <div>
                <h2>Faça sua reserva</h2>
                <p>Terça a Domingo</p>
                <p>18:00 ás 00:00</p>
            </div>
            <a href="{{ route('reserve') }}">RESERVAR</a>
        </section><!--Baner do meio Reserva-->

        <section class="novidades destaque">
            <h2>Novidades</h2>
            <div class="produtos_novos produtos">
                <div class="produto produto_novo">
                    <img src="{{ asset('/img/produtos/2hambuguer.jpg') }}" alt="">
                    <h3>Peça 1 Coma 2</h3>
                    <p class="preco">R$ 30,58</p>
                </div>
                <div class="produto produto_novo">
                    <img src="{{ asset('/img/produtos/2hambuguer.jpg') }}" alt="">
                    <h3>Peça 1 Coma 2</h3>
                    <p class="preco">R$ 30,58</p>
                </div>
            </div>
        </section><!--Novidades-->

        <section class="avaliacoes destaque">
            <h2>Avaliações</h2>

            <section class="secao_slide">
            <div style="max-width: 1200px;" class="swiper mySwiper container depoimentos lista-avaliacoes">
                <div class="swiper-wrapper content">

                    <div class="swiper-slide card">
                        <div class="card-content">
                        <!-- ESTRLAS -->
                        <div class="estrelas" style="cursor: default; display:flex; justify-content: center;">
                            <label><i class="fa" style="cursor: default; color: #ccc;"></i></label>
                            <label><i class="fa" style="cursor: default; color: #ccc;"></i></label>
                            <label><i class="fa" style="cursor: default; color: #ccc;"></i></label>
                            <label><i class="fa" style="cursor: default; color: #ccc;"></i></label>
                            <label><i class="fa" style="cursor: default; color: #ccc;"></i></label>
                        </div>
                        <p class="username"><strong>User 1</strong></p>
                        <p class="comentario">O hambúrguer é bom, a batata poderia ser mais crocante. Tempo de espera é de aproximadamente 15 minutos. Não verifiquei se existe estacionamento, mas na rua tem bastante espaço para parar o carro.</p>
                        </div>
                    </div>

                    <div class="swiper-slide card">
                        <div class="card-content">
                        <!-- ESTRLAS -->
                        <div class="estrelas" style="cursor: default; display:flex; justify-content: center;">
                            <label><i class="fa" style="cursor: default; color: #ccc;"></i></label>
                            <label><i class="fa" style="cursor: default; color: #ccc;"></i></label>
                            <label><i class="fa" style="cursor: default; color: #ccc;"></i></label>
                            <label><i class="fa" style="cursor: default; color: #ccc;"></i></label>
                            <label><i class="fa" style="cursor: default; color: #ccc;"></i></label>
                        </div>
                        <p class="username"><strong>User 1</strong></p>
                        <p class="comentario">O hambúrguer é bom, a batata poderia ser mais crocante. Tempo de espera é de aproximadamente 15 minutos. Não verifiquei se existe estacionamento, mas na rua tem bastante espaço para parar o carro.</p>
                        </div>
                    </div>

                    <div class="swiper-slide card">
                        <div class="card-content">
                        <!-- ESTRLAS -->
                        <div class="estrelas" style="cursor: default; display:flex; justify-content: center;">
                            <label><i class="fa" style="cursor: default; color: #ccc;"></i></label>
                            <label><i class="fa" style="cursor: default; color: #ccc;"></i></label>
                            <label><i class="fa" style="cursor: default; color: #ccc;"></i></label>
                            <label><i class="fa" style="cursor: default; color: #ccc;"></i></label>
                            <label><i class="fa" style="cursor: default; color: #ccc;"></i></label>
                        </div>
                        <p class="username"><strong>User 1</strong></p>
                        <p class="comentario">O hambúrguer é bom, a batata poderia ser mais crocante. Tempo de espera é de aproximadamente 15 minutos. Não verifiquei se existe estacionamento, mas na rua tem bastante espaço para parar o carro.</p>
                        </div>
                    </div>

                    <div class="swiper-slide card">
                        <div class="card-content">
                        <!-- ESTRLAS -->
                        <div class="estrelas" style="cursor: default; display:flex; justify-content: center;">
                            <label><i class="fa" style="cursor: default; color: #ccc;"></i></label>
                            <label><i class="fa" style="cursor: default; color: #ccc;"></i></label>
                            <label><i class="fa" style="cursor: default; color: #ccc;"></i></label>
                            <label><i class="fa" style="cursor: default; color: #ccc;"></i></label>
                            <label><i class="fa" style="cursor: default; color: #ccc;"></i></label>
                        </div>
                        <p class="username"><strong>User 1</strong></p>
                        <p class="comentario">O hambúrguer é bom, a batata poderia ser mais crocante. Tempo de espera é de aproximadamente 15 minutos. Não verifiquei se existe estacionamento, mas na rua tem bastante espaço para parar o carro.</p>
                        </div>
                    </div>
                    </div>
            </div><!--Avaliações-->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
            </section>
        </section><!--Avaliações-->

        <section class="avaliar destaque">
            <h2>Envie-nos sua opnião</h2>
            <form action="#" method="post">

                <div class="estrelas">
                    <input type="radio" id="vazio" name="estrela" value="" checked>

                        <label for="estrela_um"><i class="fa check"></i></label>
                        <input type="radio" id="estrela_um" name="estrela" value="1">
                        
                        <label for="estrela_2"><i class="fa check"></i></label>
                        <input type="radio" id="estrela_2" name="estrela" value="2">

                        <label for="estrela_3"><i class="fa check"></i></label>
                        <input type="radio" id="estrela_3" name="estrela" value="3">

                        <label for="estrela_4"><i class="fa check"></i></label>
                        <input type="radio" id="estrela_4" name="estrela" value="4">

                        <label for="estrela_5"><i class="fa check"></i></label>
                        <input type="radio" id="estrela_5" name="estrela" value="5">
                    <br><br>
                    
                </div><!-- ESTRELAS -->
                
                <textarea name="comentario" id="comentario" placeholder="Digite aqui seu comentário..."></textarea>
                <input type="button" value="ENVIAR" class="enviar">
            </form>
        </section><!--Avaliar-->
    </main><!--Corpor-->

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