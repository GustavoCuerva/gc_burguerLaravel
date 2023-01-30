<?php

namespace App\Http\Controllers;


use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function edit(){

        if (auth()->user()->permission != 1) {
            // Usuario
            return redirect('/');
        }

        $information = Information::findOrFail(1);

        if ($information->count() == 0) {
        
            $information = new Information;

            $information->open     = '18:00:00';
            $information->close    = '00:00:00';
            $information->address  = 'Avenida Paulista 2222';
            $information->capacity = 50;
            $information->tables    = 12;

            $information->save();
            $information = Information::findOrFail(1);
        }

        return view('information.information', ['info' => $information]);
    }

    public function update(Request $request){

        if (auth()->user()->permission != 1) {
            // Usuario
            return redirect('/');
        }

        Information::findOrFail(1)->update([
            "open"     => $request->open,
            "close"    => $request->cloes,
            "address"  => $request->address,
            "capacity" => $request->capacity,
            "tables"   => $request->tables
        ]);

        return redirect('/dashboard')->with('msg', 'Dados da empresa alterados com sucesso')->with('class', 'success');
    }
}
