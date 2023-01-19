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
        $reservas_total = $reserves->count();
        $information = Information::findOrFail(1);

        return view('dashboard', ['categories' => $categories, 'total' => $reservas_total, 'info' => $information, 'reserves' => $reserves]);
    }
}
