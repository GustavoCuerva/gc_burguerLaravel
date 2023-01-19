<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Reserve;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $categories = Category::all();
        $reservas   = Reserve::all();
        $reservas_total = $reservas->count();

        return view('dashboard', ['categories' => $categories, 'total' => $reservas_total]);
    }
}
