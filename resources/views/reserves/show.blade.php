@extends('layouts.main')

@section('title', 'Reservas')

@section('styles')
    <link rel="stylesheet" href="{{asset('/css/reservas.css')}}">
@endsection

@section('content')
    <section class="filtrar">
        <div class="busca_data">
            <form action="{{route('reserves')}}" method="get">
                <label for="data_inicial">Data inicial: </label>
                <input type="date" name="data_inicial" required>

                <label for="data_final">Data final: </label>
                <input type="date" name="data_final" required>

                <input type="submit" value="Buscar">
            </form>
        </div>
    </section><!--Filtrar-->
    @if (session('msg'))
        <div class="container">
            <div class="alert alert-{{session('class')}}" role="alert">
                {{ session('msg') }}
            </div>
        </div>
    @endif
    <section class="proximas">
        <h2>Próximas Reservas</h2>
        @foreach ($next_reserves as $reserve)
        <div class="proxima_reservas">

            <h3>{{date("d/m/Y", strtotime($reserve->date_reservation))}} - {{date("H:i", strtotime($reserve->hour))}}</h3>

            <div class="informacoes_reserva">
                <div class="info">
                    <p><strong>Status:</strong> <span class="status">{{$status[$reserve->status]}}</span></p>
                    <p><strong>Detalhes:</strong> <span class="detalhes">{{$reserve->table}}</span> | <span class="detalhes"> {{$reserve->amount}} Pessoas</p>
                </div>

                <div class="btns">
                    @if ($reserve->status != 1)
                    <form action="{{route('reserve.confirm')}}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name='id' value="{{$reserve->id}}">
                        <button style="background-color: rgba(2, 2, 203, 0.685);">Confirmar</button>
                    </form>
                    @endif
                    <form action="{{route('reserve.cancel')}}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name='id' value="{{$reserve->id}}">
                    <button style="background-color: rgba(209, 7, 7, 0.836);">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        
    </section><!--Próximas Reservas-->

    <section class="historico proximas">
        <h2>Histórico</h2>
        @foreach ($historic as $reserve)
        <div class="historico_reservas proxima_reservas">

            <h3>{{date("d/m/Y", strtotime($reserve->date_reservation))}} - {{date("H:i", strtotime($reserve->hour))}}</h3>

            <div class="informacoes_reserva">
                <div class="info">
                    <p><strong>Status:</strong> <span class="status">{{$status[$reserve->status]}}</span></p>
                    <p><strong>Detalhes:</strong> <span class="detalhes">{{$reserve->table}}</span> | <span class="detalhes"> {{$reserve->amount}} Pessoas</p>
                </div>
            </div>
        </div>
        @endforeach
    </section><!--Histórico Reservas-->
@endsection