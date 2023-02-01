<style>
    .link{
    box-sizing: border-box;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
    position: relative;
    -webkit-text-size-adjust: none;
    border-radius: 4px;
    color: #fff;
    display: inline-block;
    overflow: hidden;
    text-decoration: none;
    background-color: #2d3748;
    border-bottom: 8px solid #2d3748;
    border-left: 18px solid #2d3748;
    border-right: 18px solid #2d3748;
    border-top: 8px solid #2d3748;
    }
</style>

<x-mail::message>
<div style="width: 100%; display: flex; justify-content:center;">
    <img src="{{asset('/img/Logo2.png')}}" style="height: 150px;">
</div>
CONFIRME SUA RESERVA

Olá {{$user}},

@foreach ($reserve as $r)
você realizou uma reserva no dia {{date('d/m/Y', strtotime($r->date_reservation))}} para {{$r->amount}} pessoas<br>
Caso deseje confirmar sua reserva acesse o link a baixo.

<div style="text-align: center;">
<a href="{{route('reserve.confirmMail', ['id' => $r->id])}}" class="link" style="color: #fff; text-decoration:none;">
    Confirma Reserva
</a>
</div>
    
@endforeach

Obrigado,<br>
{{ config('app.name') }}
</x-mail::message>
