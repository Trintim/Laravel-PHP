<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutenticarRequest;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request){

        $erro = '';
        if($request->get('erro') == 1){
            $erro = 'Usuario ou senha não existe';
        }
        if($request->get('erro') == 2){
            $erro = 'Necesasrio realizar login para ter acesso a pagina';
        }

        return view('site.login', ['Title' => 'login', 'erro' => $erro]);
    }

    public function autenticar(AutenticarRequest $request){

        $email = $request->get('usuario');
        $password = $request->get('senha');

        //iniciar o model User
        $user = User::all();
        $usuario = $user->where('email', $email)->where('password', $password)->first();

        if(isset($usuario->name)){

            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            return redirect()->route('app.home');
        }else{
            return redirect()->route('site.login', ['erro' => 1]);
        }

    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
