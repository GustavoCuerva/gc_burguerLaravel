<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{

    // Formulário para reserva
    public function create(){
        return view('reserves.reserve');
    }

    // Lista de suas reservas
    public function show(){
        /* It's updating the status of the reserves that are in the past to 3, which means that the
        reserve is expired. */
        // Comando altomatico programado, retirar esse trecho ao colocar no servidor e configurar.
        Reserve::where('date_reservation', '<', date('Y-m-d'))
        ->where('status', '<>', '3')
        ->update([
            'status' => 3
        ]);

        $next_reserves = Reserve::where('status', '<', 2)
                                ->where('user_id', auth()->user()->id)
                                ->orderBy('date_reservation')->get();
        $historic = Reserve::where('status', '>', 1)
                            ->where('user_id', auth()->user()->id)
                            ->orderBy('date_reservation')->get();

        $data_inicial = request('data_inicial');
        $data_final = request('data_final');

        if ($data_inicial) {
            $next_reserves = Reserve::where('status', '<', 2)
                                ->whereBetween('date_reservation', [$data_inicial, $data_final])
                                ->where('user_id', auth()->user()->id)
                                ->orderBy('date_reservation')->get();
            $historic = Reserve::where('status', '>', 1)
                                ->whereBetween('date_reservation', [$data_inicial, $data_final])
                                ->where('user_id', auth()->user()->id)
                                ->orderBy('date_reservation')->get();   
        }

        $status = ['A confirmar', 'Confirmada', 'Cancelada', 'Vencida'];
        
        return view('reserves.show', ['next_reserves' => $next_reserves, 'historic' => $historic,'status' => $status]);
    }

    // Salvar reserva
    public function store(Request $request){
        
        $data = date("Y-m-d", strtotime($request->data));

        /* Checking if the date is available. */
        $reserves = Reserve::where('date_reservation', $data);
        $quant = 0;

        foreach ($reserves as $key => $reserve) {
             $quant += $reserve->amount;   
        }

        $info = Information::findOrFail(1);

        $restante = $info->capacity - $quant;
        $quant += $request->pessoas;
        $hora_fim = date("H:i", strtotime($info->close) - (60*60));
        $dia_semana = date("w" , strtotime($data));
        $hora = date('H:i', strtotime($request->hora));

        if ($quant > $info->capacity) {
            /* Checking if the amount of people is greater than the capacity of the restaurant. */
            return back()
                    ->with('msg', 'Sem disponibilidade para essa quantidade de pessoas nesse dia, capacidade restante de '.$restante.' pressoas')
                    ->with('class', 'danger');
        }else if (($request->hora < $info->open) || ($request->hora > $hora_fim)) {
            /* Checking if the time is between the open and close time of the restaurant. */
            return back()
                    ->with('msg', 'Estamos abertos apenas das '.date("H:i", strtotime($info->open)).' as '.date("H:i", strtotime($info->close)))
                    ->with('class', 'danger');
        }else if ($dia_semana == 1){
            /* It's checking if the day of the week is Monday. */
            return back()
                    ->with('msg', 'Não abrimos as segundas')
                    ->with('class', 'danger');
        }else if ($data < date('Y-m-d')) {
            /* It's checking if the date is in the past. */
            return back()
                    ->with('msg', 'Essa data já passou')
                    ->with('class', 'danger');
        }else if ($data == date("Y-m-d") && date("H:i") >= $hora) {
            /* It's checking if the date is today and the time is in the past. */
            return back()
                    ->with('msg', 'Essa hora já passou')
                    ->with('class', 'danger');
        }else{
            /* Sucesso */

            $reserve = new Reserve;

            $reserve->user_id = auth()->user()->id;
            $reserve->date_reservation = $data;
            $reserve->hour = $request->hora;
            $reserve->amount = $request->pessoas;
            $reserve->table = 'Aguardando confirmação';
            $reserve->status = 0;

            $reserve->save();

            return redirect(route('reserve'))->with('msg', 'Reserva efetuada com sucesso, apenas a confirme em suas reservas')->with('class', 'success');

        }

    }

    // Confirmar Reserva
    public function confirm(Request $request){

        $reserve = Reserve::findOrFail($request->id);

        if ($reserve->user_id != auth()->user()->id) {
            // Usuario não é dono da reserva
            return back();
        }

        // Buscando mesa disponivel
        $tables = Reserve::where('status', 1)->where('date_reservation', $reserve->date_reservation)->get();
        $mesa = 1;

        foreach ($tables as $key => $value) {
            if (intval($value->table) == $mesa) {
                $mesa++;
            }
        }

        $reserve->update([
            'status' => 1,
            'table' => $mesa
        ]);

        return back()->with('msg', 'Reserva confirmada')->with('class', 'success');
    }

    // Cancelar Reserva
    public function cancel(Request $request){

        $reserve = Reserve::findOrFail($request->id);

        if ($reserve->user_id != auth()->user()->id) {
            // Usuario não é dono da reserva
            return back();
        }

        $reserve->update([
            'status' => 2,
            'table' => 'Cancelada'
        ]);

        return back()->with('msg', 'Reserva cancelada')->with('class', 'secondary');
    }

    // Listar reservas no painel admin
    public function showAdmin($id){
        
        /* It's updating the status of the reserves that are in the past to 3, which means that the
        reserve is expired. */
        // Comando altomatico programado, retirar esse trecho ao colocar no servidor e configurar.
        Reserve::where('date_reservation', '<', date('Y-m-d'))
        ->where('status', '<>', '3')
        ->update([
            'status' => 3
        ]);

        $reserves = Reserve::join('users', 'users.id', '=', 'reserves.user_id')
                        ->orderBy('date_reservation', 'desc')
                        ->get();
        $hoje = date("Y-m-d");
        if ($id == 1) { 
            //Hoje
            $reserves = Reserve::where('date_reservation', $hoje)
                        ->join('users', 'users.id', '=', 'reserves.user_id')
                        ->orderBy('date_reservation', 'desc')
                        ->get();
        }else if ($id == 2) { 
            //Essa semana
            $sete_dias = date("Y-m-d", strtotime($hoje) + (7*24*60*60));
            $reserves = Reserve::whereBetween('date_reservation', [$hoje, $sete_dias])
                        ->join('users', 'users.id', '=', 'reserves.user_id')
                        ->orderBy('date_reservation', 'desc')
                        ->get();
        }else if($id == 3){
            //Esse mês
            $mes = date("Y-m-d", strtotime($hoje) + (30*24*60*60));
            $reserves = Reserve::whereBetween('date_reservation', [$hoje, $mes])
                        ->join('users', 'users.id', '=', 'reserves.user_id')
                        ->orderBy('date_reservation', 'desc')
                        ->get();
        }
        
        $status = ['A confirmar', 'Confirmada', 'Cancelada', 'Vencida'];
        return view('reserves.dashboard', ['reserves' => $reserves, 'id' => $id, 'status' => $status]);
    }
}
