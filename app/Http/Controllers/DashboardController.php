<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Information;
use App\Models\Reserve;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $categories = Category::all();
        $reserves   = Reserve::all();
        $reserves_destaque = Reserve::where('date_reservation', '>=', date('Y-m-d'))
                                ->join('users', 'users.id', '=', 'reserves.user_id')
                                ->orderBy('date_reservation')
                                ->limit(3)
                                ->get();
        $reservas_total = $reserves->count();
        $information = Information::findOrFail(1);
        $reserves_today = Reserve::where('date_reservation', date('Y-m-d'))->get();
        $quant = 0;

        foreach ($reserves_today as $value) {
            // Pegando quantidade de pessoas agendadas para o dia
            $quant += $value->amount;
        }

        $status = ['A confirmar', 'Confirmada', 'Cancelada', 'Vencida'];

        return view('dashboard', [
            'categories' => $categories, 
            'total' => $reservas_total, 
            'info' => $information, 
            'reserves' => $reserves_destaque,
            'quant' => $quant,
            'status' => $status
        ]);
    }
}
