<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function store(Request $request){
        $assessment = new Assessment;

        $assessment->user_id = auth()->user()->id;
        $assessment->note    = $request->estrela;
        $assessment->comment = $request->comentario;

        $assessment->save();

        return redirect('/#comentario')->with('msg', 'Agradecemos sua avaliação')->with('class', 'success');
    }

    public function update(Request $request){

        return "Olá";
    }
}
