<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil)
    {
        //verifica se o usuario possui acesso a rota
        echo $metodo_autenticacao.' - '.$perfil.'<br>';
        if($metodo_autenticacao == 'padrao'){
            echo 'verificar usuario e senha no banco de dados!'.$perfil.'<br>';
        }

        if($metodo_autenticacao == 'ldap'){
            echo 'verificar usuario e senha no AD!'.$perfil.'<br>';
        }

        if($perfil == 'visitante'){
            echo 'Exibir apenas alguns recursos'.'<br>';
        }else{
            echo 'carregar perfil do banco de dados'.'<br>';
        }

        if(false){
            return $next($request);
        }
        else{
            return response('Acesso negado! Rota exige autenticação!!!');
        }
        //return $next($request);
    }
}
