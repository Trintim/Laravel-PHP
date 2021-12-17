<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(int $p1, int $p2){
        //echo "A soma de $p1 + $p2 é: ".($p1+$p2);
        $soma = $p1+$p2;
                                        //nome view, variavel controler
        return view('site.teste')->with('num1', $p1)->with('num2', $p2)->with('somatorio', $soma); // with method
        //return view('site.teste', compact('p1', 'p2', 'soma')); //-> compact method
        //return view('site.teste', ['x' => $p1, 'y' => $p2, 'soma' => $soma]); //-> array associativo
    }
}
