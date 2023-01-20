@extends('layouts.dashboard_layout')

@section('title', 'Painel Admin')

@section('content')
    <a href="/"><img src="{{asset('/icons/home-svgrepo-com.svg')}}" width="20px" style="margin: 10px 0 0 10px;"></a>

    @if (session('msg'))
        <div class="container">
            <div class="alert alert-{{session('class')}}" role="alert">
                {{ session('msg') }}
            </div>
        </div>
    @endif

    <!--Dados principais-->
    <section class="dados_principais">
      <div>
        <h3>{{ $total }}</h3>
        <p>Reservas Totais</p>
      </div>

      <div>
        <h3>{{$quant}}/{{$info->capacity}}</h3>
        <p>Capacidade esperada para hoje</p>
      </div>
    </section>
    <!--Dados principais-->

    <!--Produtos-->
    <section class="produtos">

      @foreach ($categories as $category)
        <a href="{{ route('admin.products', ['id' => $category->id]) }}" style="background-image: url('{{asset($category->path_image)}}');">
          <div>
            <h2>{{ $category->category }}</h2>
          </div>
        </a>
      @endforeach

      <a href="{{ route('admin.category')}}" style="background-image: url('{{asset('../img/template_hamburguer1.png')}}');">
        <div>
          <h2>Categorias</h2>
        </div>
      </a>
    </section>
    <!--Produtos-->

    <!--Informações da empresa-->
    <section class="informacoes_empresa">
      <div>
        <strong>Horário:</strong> {{ date("H:i", strtotime($info->open))}} ás {{ date("H:i", strtotime($info->close))}}<br>

        <strong>Localização: </strong><br>
        {{$info->address}}<br>

        <strong>Capacidade: </strong> {{$info->capacity}} Pessoas<br>

        <strong>Mesas:</strong> {{$info->tables}}<br>
      </div>

      <div>
        <a href="{{ route('information') }}">Editar</a>
      </div>
    </section>
    <!--Informações da empresa-->

    <section class="secao_reservas">
        <h2 class="h2-reservas">Reservas</h2>
            <div class="reservas">
              @foreach ($reserves as $reserve)
                <div class="box-reserva">
                  <h2>{{date("d/m/Y", strtotime($reserve->date_reservation))}} - {{date("H:i", strtotime($reserve->hour))}}</h2>
                  <p><strong>Status:</strong> <span class="status">{{$status[$reserve->status]}}</span></p>
                  <p><strong>Detalhes:</strong> <span class="detalhes">{{$reserve->table}}</span> | <span class="detalhes"> {{$reserve->amount}} Pessoas</span></p>
                  <p><strong>Nome:</strong> <span class="detalhes">{{$reserve->name}}</span></p>
                </div>
              @endforeach
              
            </div>
        <a href="{{route('reserves.admin', ['id' => 0])}}">Ver mais</a>
    </section><!--Reservas-->
@endsection