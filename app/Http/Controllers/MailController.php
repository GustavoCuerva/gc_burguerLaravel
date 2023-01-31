<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
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
}
