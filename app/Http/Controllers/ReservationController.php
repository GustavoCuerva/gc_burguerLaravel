<?php

namespace App\Http\Controllers;

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
        

        return view('reservations.dashboard', ['reserves' => $reserves, 'id' => $id]);
    }
}
