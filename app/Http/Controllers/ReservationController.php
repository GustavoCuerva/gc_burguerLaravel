<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create(){
        return view('reserves.reserve');
    }

    public function show(){
        return view('reserves.show');
    }
}
