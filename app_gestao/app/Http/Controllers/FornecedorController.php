<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public  function index(){
        $fornecedores = [
            0 => [
                'nome' => 'fornecedor 1',
                'status' => 'N',
                'cnpj' => '000.000.000-00'
            ],
            1 => [
                'nome' => 'fornecedor 2',
                'status' => 'S',
            ],
        ];

        $msg = isset($fornecedores[0]['cnpj']) ? "CNPJ informado!" : "CNPJ não informado!";
        echo  $msg;

        /*
        condicao ? se verdadeiro : se falso;
        condicao ? se verdadeiro : (condicao ? se verdadeiro : se falso);
        */
        return view('app.fornecedor.index', compact('fornecedores'));
        //return view('app.fornecedor.index');
    }
}
