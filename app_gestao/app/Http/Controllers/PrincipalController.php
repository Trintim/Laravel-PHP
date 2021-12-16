<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal(){
        //echo 'Olá sejam bem-vindos!';
        $salario = 8000;
        $novoSalario = NULL;

        if($salario > 0 && $salario < 2000){

            $novoSalario = $salario * 1.20;
        }
        if($salario >= 2000 && $salario < 4000){

            $novoSalario = $salario * 1.15;
        }
        if($salario >= 4000 && $salario < 7000){

            $novoSalario = $salario * 1.10;
        }
        if($salario >= 7000){

            $novoSalario = $salario * 1.05;
        }

        echo $novoSalario;



        //return view('site.principal');
    }
}
