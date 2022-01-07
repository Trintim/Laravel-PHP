<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutenticarRequest;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){

        return view('site.login', ['Title' => 'login']);
    }

    public function autenticar(AutenticarRequest $request){

        $email = $request->get('usuario');
        $password = $request->get('senha');

        echo "Usuário: $email | Senha: $password";
        echo '<br>';

        //iniciar o model User
        $user = User::all();
        $usuario = $user->where('email', $email)->where('password', $password)->first();

        if(isset($usuario->name)){
            echo 'Usuario existe';
        }else{
            echo 'Usuario não existe';
        }

    }
}
