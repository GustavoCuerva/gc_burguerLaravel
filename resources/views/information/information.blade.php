@extends('layouts.dashboard_layout')

@section('title', 'Dados')
    
@section('content')
        <section class="info_empresa">
        <a href="{{ route('dashboard') }}"><img src="{{asset('/icons/backward-svgrepo-com.svg')}}" style="margin-top: 30px; margin-left:30px;" width="25px"></a>
            <form action="{{ route('information') }}" method="POST">
                @csrf
                @method('PUT')
                <h2>--Informações da Hamburgueria--</h2>
                <div>
                    <label for="horario_inicio">Aberto das </label>
                    <input type="time" name="open" placeholder="00:00" value="{{ $info->open }}">
                    <span> ás </span>
                    <input type="time" name="cloes" placeholder="00:00" value="{{ $info->close }}">
                </div>

                <div>
                    <label for="endereco">Endereço: </label>
                    <input type="text" name="address" placeholder="Avenida Paulista 2222" value="{{ $info->address }}">
                </div>

                <div>
                    <label for="capacidade">Capacidade</label>
                    <input type="number" placeholder="50" name="capacity" value="{{ $info->capacity }}"> <span>Pessoas</span>
                </div>

                <div>
                    <label for="mesas">Mesas</label>
                    <input type="number" placeholder="12" name="tables" value="{{ $info->tables }}"> <span>Mesas</span>
                </div>

                <div>
                    <input type="submit" name="editar" value="Editar">
                </div>
            </form>
        </section>
@endsection