@extends('layouts.main')

@section('title', 'Reservas')

@section('styles')
    <link rel="stylesheet" href="{{asset('/css/reservas.css')}}">
@endsection

@section('content')
    <section class="filtrar">
        <div class="busca_data">
            <form action="#" method="post">

                <label for="data_inicial">Data inicial: </label>
                <input type="date" name="data_inicial" required>

                <label for="data_final">Data final: </label>
                <input type="date" name="data_final" required>

                <input type="submit" value="Buscar">
            </form>
        </div>
    </section><!--Filtrar-->

    <section class="proximas">
        <h2>Próximas Reservas</h2>
        <div class="proxima_reservas">

            <h3>11/10 - 22:00</h3>

            <div class="informacoes_reserva">
                <div class="info">
                    <p><strong>Status:</strong> <span class="status">Confirmada</span></p>
                    <p><strong>Detalhes:</strong> <span class="detalhes">Mesa 2</span> | <span class="detalhes">6 Pessoas</span></p>
                </div>

                <div class="btns">
                    <button style="background-color: rgba(2, 2, 203, 0.685);">Reenviar informarções por email</button>
                    <button style="background-color: rgba(209, 7, 7, 0.836);">Cancelar</button>
                </div>
            </div>
        </div>
    </section><!--Próximas Reservas-->

    <section class="historico proximas">
        <h2>Histórico</h2>
        <div class="historico_reservas proxima_reservas">

            <h3>11/10 - 22:00</h3>

            <div class="informacoes_reserva">
                <div class="info">
                    <p><strong>Status:</strong> <span class="status">Cancelada</span></p>
                    <p><strong>Detalhes:</strong> <span class="detalhes">Mesa 2</span> | <span class="detalhes">6 Pessoas</span></p>
                </div>
            </div>
        </div>
    </section><!--Histórico Reservas-->
@endsection