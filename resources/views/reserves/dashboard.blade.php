@extends('layouts.dashboard_layout')

@section('title', 'Reservas')

@section('content')
<a href="{{route('dashboard')}}"><img src="{{asset('/icons/backward-svgrepo-com.svg')}}" style="margin-top: 30px; margin-left:30px;" width="25px"></a>
<main class="corpo">
    @php
        $selected = ['', '', '', ''];
        $selected[$id] = 'Selected';
    @endphp
    <form action="#" method="post" class="filtro">
        <select name="filtro" id="filtro" onchange="filtro_reservas(this.value)">
            <option value="0" {{$selected[0]}}>Tudo</option>
            <option value="1" {{$selected[1]}}>Hoje</option>
            <option value="2" {{$selected[2]}}>Essa Semana</option>
            <option value="3" {{$selected[3]}}>Esse Mês</option>
        </select>
    </form>

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
    </section><!--Reservas-->

    </main>
@endsection