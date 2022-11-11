@extends('layouts.main')

@section('title', 'Reservar')

@section('styles')
    <link rel="stylesheet" href="{{ asset('/css/reservas.css') }}">
@endsection

@section('class_body', 'reserva_body')

@section('content')

<main class="corpo">
        <section class="reservar">
            <h2>Reservar um horário</h2>
            <div class="box-reservar">
                <div>
                    <img src="{{ asset('/img/Logo2.png') }}" alt="">
                </div>
                <div>
                    <form action="#" method="post" class="form_reserva">
                        <div>
                            <label for="unidade">Unidade:</label>
                            <input type="text" name="unidade" value="Avenida Paulista 2222 - São Paulo-SP" disabled>
                        </div>
                        <div>
                            <label for="pessoas">Pessoas:</label>
                            <select name="pessoas" id="pessoas" required>
                                <option value=""></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>

                        <div>
                            <label for="data">Data:</label>
                            <input type="date" name="data" required>
                        </div>

                        <div>
                            <label for="hora">Hora:</label>
                            <input type="time" name="hora" required>
                        </div>

                        <div>
                            <input type="submit" value="Reservar">
                        </div>
                    </form>
                </div>
            </div>
        </section><!--Reservar-->
    </main><!--Corpor-->

@endsection