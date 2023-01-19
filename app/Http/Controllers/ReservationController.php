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

        return view('reservations.dashboard', ['reserves' => $reserves]);
    }
}
