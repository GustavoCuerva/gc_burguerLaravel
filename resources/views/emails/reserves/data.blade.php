@php
    echo $reserve->amount;
@endphp

<x-mail::message>
<div style="width: 100%; display: flex; justify-content:center;">
    <img src="{{asset('/img/Logo2.png')}}" style="height: 150px;">
</div>
<h2>Dados de sua reserva</h2>

<strong>Proprietário da reserva:</strong> {{$user}}<br>
<strong>Data da reserva:</strong> {{date('d/m/Y', strtotime($reserve->date_reservation))}}<br>
<strong>Horário:</strong> {{date('H:i', strtotime($reserve->hour))}}<br>
<strong>Para</strong> {{$reserve->amount}} pessoas<br>
<strong>Mesa:</strong> {{$reserve->table}}
<hr>
<strong>Endereço: </strong>{{$info->address}}
<br>
<br>
Obrigado,<br>
{{ config('app.name') }}
</x-mail::message>
