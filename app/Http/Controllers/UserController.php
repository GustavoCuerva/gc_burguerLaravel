<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){

        $user = User::findOrFail(auth()->user()->id);
        // $senha = Route::has('12345678');
        return view('my-data', ['user' => $user, 'senha' => '$senha']);
    }

    public function update(Request $request){

        $user = User::findOrFail(auth()->user()->id);

        if (Hash::check($request->senha, $user->password)) {
            
            if (($request->nova_senha != '') & (strlen($request->nova_senha) > 7)) {
                // Alterar a senha
                if ($request->nova_senha == $request->conf_senha) {
                    // Senhas corretas
                    $user->update([
                        'password'  => Hash::make($request->nova_senha)
                    ]);
                }else{
                    return back()->with('msg', 'Senhas diferentes')->with('class', 'danger');            
                }
            }

            $user->update([
                'name'  => $request->nome,
                'tel'   => $request->telefone,
                'email' => $request->email
            ]);
            
            return back()->with('msg', 'Seus dados foram atualizados com sucesso')->with('class', 'success');
        }

        return back()->with('msg', 'Senha incorreta')->with('class', 'danger');            
    }

    public function destroy(Request $request){
        $user = User::findOrFail(auth()->user()->id);

        if (Hash::check($request->senha, $user->password)) {
            $user->delete();
            return redirect('/end');
        }

        return back()->with('msg', 'Senha incorreta, ação interrompida')->with('class', 'danger');
    }

    public function close(){
        return view('profile.end');
    }
}
