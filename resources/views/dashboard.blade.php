@extends('layouts.dashboard_layout')

@section('title', 'Painel Admin')

@section('content')
    <a href="../index.php"><img src="{{asset('/icons/home-svgrepo-com.svg')}}" width="20px" style="margin: 10px 0 0 10px;"></a>

    <!--Dados principais-->
    <section class="dados_principais">
      <div>
        <h3></h3>
        <p>Reservas Totais</p>
      </div>

      <div>
        <h3>0/0</h3>
        <p>Capacidade esperada para hoje</p>
      </div>
    </section>
    <!--Dados principais-->

    <!--Produtos-->
    <section class="produtos">

    
      <a href="admin_produtos.php?c=" style="background-image: url('{{asset('/img/categoria/combos.jpg')}}');">
        <div>
          <h2>Teste</h2>
        </div>
      </a>
    
      <a href="admin_produtos.php?c=" style="background-image: url('{{asset('/img/categoria/combos.jpg')}}');">
        <div>
          <h2>Teste</h2>
        </div>
      </a>
      <a href="admin_produtos.php?c=" style="background-image: url('{{asset('/img/categoria/combos.jpg')}}');">
        <div>
          <h2>Teste</h2>
        </div>
      </a>
      <a href="admin_produtos.php?c=" style="background-image: url('{{asset('/img/categoria/combos.jpg')}}');">
        <div>
          <h2>Teste</h2>
        </div>
      </a>
      <a href="admin_produtos.php?c=" style="background-image: url('{{asset('/img/categoria/combos.jpg')}}');">
        <div>
          <h2>Teste</h2>
        </div>
      </a>

      <a href="{{ route('admin.category') }}" style="background-image: url('{{asset('../img/template_hamburguer1.png')}}');">
        <div>
          <h2>Categorias</h2>
        </div>
      </a>
    </section>
    <!--Produtos-->

    <!--Informações da empresa-->
    <section class="informacoes_empresa">
      <div>
        <p><strong>Horário:</strong> 18:00 ás 19:00</p>

        <p><strong>Localização: </strong></p>
        <p></p>

        <p><strong>Capacidade: </strong> 25 Pessoas</p>

        <p><strong>Mesas:</strong> 5</p>
      </div>

      <div>
        <a href="admin_info.php">Editar</a>
      </div>
    </section>
    <!--Informações da empresa-->

    <section class="secao_reservas">
        <h2 class="h2-reservas">Reservas</h2>
            <div class="reservas">
              <div class="box-reserva">
                          <h2>19/11 - 20:00</h2>
                          <p><strong>Status:</strong> <span class="status">Confirmada</span></p>
                          <p><strong>Detalhes:</strong> <span class="detalhes">12</span> | <span class="detalhes"> 5 Pessoas</span></p>
                          <p><strong>Nome:</strong> <span class="detalhes">Gustavo</span></p>
                  </div>
              </div>
            </div>

        <div class="reservas">
            <div class="box-reserva">
                        <h2>14/10 - 18:00</h2>
                        <p><strong>Status:</strong> <span class="status">Confirmada</span></p>
                        <p><strong>Detalhes:</strong> <span class="detalhes">Mesa 2</span> | <span class="detalhes">6 Pessoas</span></p>
                        <p><strong>Nome:</strong> <span class="detalhes">Gustavo Candido Cuerva</span></p>
                </div>
            </div>
        </div>
        <a href="admin_reservas.php">Ver mais</a>
    </section><!--Reservas-->
@endsection