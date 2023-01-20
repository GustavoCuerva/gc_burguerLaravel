<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Models\Reserve;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create(){
        return view('reserves.reserve');
    }

    public function show(){
        return view('reserves.show');
    }

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

    public function showAdmin($id){
        
        $reserves = Reserve::all();
        $hoje = date("Y-m-d");
        if ($id == 1) { 
            //Hoje
            $reserves = Reserve::where('date_reservation', $hoje);
        }else if ($id == 2) { 
            //Essa semana
            $sete_dias = date("Y-m-d", strtotime($hoje) + (7*24*60*60));
            $reserves = Reserve::whereBetween('date_reservation', [$hoje, $sete_dias]);
        }else if($id == 3){
            //Esse mês
            $mes = date("Y-m-d", strtotime($hoje) + (30*24*60*60));
            $reserves = Reserve::whereBetween('date_reservation', [$hoje, $mes]);
        }
        

        return view('reserves.dashboard', ['reserves' => $reserves, 'id' => $id]);
    }
}
