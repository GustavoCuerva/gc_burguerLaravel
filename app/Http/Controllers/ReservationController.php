<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create(){
        return view('reservations.reserve');
    }

    public function show(){
        return view('reservations.show');
    }
}
