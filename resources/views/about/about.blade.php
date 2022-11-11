@extends('layouts.main')

@section('title', 'Sobre nós')

@section('styles')
<link rel="stylesheet" href="{{ asset('/css/sobre.css')}} ">
@endsection

@section('content')
<main class="corpo">
        <section class="informacoes">

            <div class="img">
                <img src="{{ asset('/img/Logo1.png') }}" alt="">
            </div>

            <div class="historia">
                <h2>GC Burguer</h2>
                <p> <strong>TEXTO ILUSTRATIVO</strong> Lorem ipsum dolor sit amet. Et aliquid necessitatibus aut dolorum ducimus et minus laudantium non corrupti quasi aut earum enim est obcaecati omnis! Et quibusdam vitae et nihil autem ut illo consectetur cum facere cupiditate ut repudiandae distinctio nam animi officiis! Aut mollitia optio in sequi excepturi ut perspiciatis aperiam est rerum natus qui saepe harum ab voluptatum natus. Ut voluptas culpa ad ratione galisum  explicabo repudiandae eos nihil dicta. Est nostrum quia eum nemo iure vel soluta rerum est consequatur itaque. Sit veritatis veniam ut harum dicta et adipisci delectus et dolores dolorem. Ea molestiae nobis aut deserunt libero ex quis eaque. In exercitationem laborum aut nobis necessitatibus  placeat provident et quod temporibus sed repudiandae magni et internos facilis aut dolorum itaque. Qui aperiam distinctio quo nobis provident 33 laborum accusamus sed officiis quidem? Est voluptatem magni aut unde consequatur nam iure blanditiis! Sit rerum veniam id expedita consequatur in voluptates magnam qui sequi dolor qui veniam reiciendis sit similique dolorum est optio nobis. </p><p>Non labore quis cum voluptas velit rem voluptas omnis et esse omnis. Id consequuntur maiores eos delectus mollitia vel accusantium nihil est ducimus consectetur rem unde libero qui voluptatem facere! Et porro alias eos recusandae nulla ut excepturi beatae non itaque quia qui reprehenderit optio cum vitae nisi ut error neque. Aut facere mollitia est repellat rerum aut repellendus ipsum? Sed dolores sint ut eligendi totam et eligendi ullam At quam delectus a veniam consectetur ad totam libero qui totam libero. Sed dolor facilis et cumque dignissimos nam magnam tempora sit fugiat animi ea ipsam rerum. Id enim asperiores est reiciendis molestiae quo quia saepe et nihil eveniet. Et accusantium saepe et quasi ipsum aut commodi quia 33 quibusdam facilis sit voluptas corrupti qui tenetur velit ut consectetur culpa. </p><p>Non voluptas corporis aut velit exercitationem qui ullam ullam sed facilis ipsum in deserunt officia nam porro repudiandae. Ut unde amet est galisum internos ut beatae voluptate At internos galisum non vero amet? Ut possimus quae qui enim obcaecati aut odio voluptates est sunt veniam est rerum asperiores non consequuntur assumenda. Qui voluptatem rerum nam omnis voluptatem in fugit saepe. Est assumenda dolor  optio fuga non labore fugiat sit quisquam aliquam est facere provident qui minima reprehenderit hic sunt odio. Rem sapiente quia eos quia nemo et nostrum tenetur ut enim omnis ut neque exercitationem. Est esse similique a impedit assumenda ad perferendis numquam. Qui deserunt quidem non quidem sequi est fuga illum. </p>
            </div><!--Historia-->
        </section><!--Informações-->
        <hr>
        <section>
            <div class="contato">
                <h2>Fale conosco</h2>
                <div class="midias-sociais">
                        <a href="">
                            <img src="{{ asset('/icons/whatsapp-svgrepo-com.svg') }}" alt="">
                            <span>(11) 900900121</span> 
                        </a>
                        <a href="">
                            <img src="{{ asset('/icons/facebook-svgrepo-com.svg') }}" alt="">
                            <span>GC Burguer</span>
                        </a>
                        <a href="">
                            <img src="{{ asset('/icons/instagram-svgrepo-com.svg') }}" alt="">
                            <span>@gcburguer</a></span>
                        </a>
                        <a href="">
                            <img src="{{ asset('/icons/email-svgrepo-com.svg') }}" alt="">
                            <span>gcburguer@gmail.com</span>
                        </a>
                </div>
            </div>
        </section><!--Contato-->
    </main><!--Corpor-->
@endsection