<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Mail\ReserveConfirm;
use App\Mail\ReserveData;
use App\Models\Information;
use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail()
   {    
        if (Auth::check()) {
            Mail::to(auth()->user()->email)->send(new OrderShipped());
            return back();    
        }

        return redirect('/');
   }

   public function mailConfirmReserve(){
        
        $reserve = Reserve::where('user_id', auth()->user()->id)
                    ->orderBy('id', 'desc')
                    ->limit(1)
                    ->get();

        $user = auth()->user()->name;
        $email = auth()->user()->email;
        Mail::to($email)->send(new ReserveConfirm($user, $reserve));


        return redirect(route('reserve'))->with('msg', 'Reserva efetuada com sucesso, apenas a confirme em suas reservas ou em seu email')->with('class', 'success');
   }

   public function mailDataReserve($id){
        
    $reserve = Reserve::findOrFail($id);
    $info    = Information::findOrFail(1);

    $user = auth()->user()->name;
    $email = auth()->user()->email;
    Mail::to($email)->send(new ReserveData($user, $reserve, $info));


    return redirect(route('reserves'))->with('msg', 'Seus os dados da reserva foram enviados ao seu email')->with('class', 'success');
}
}
