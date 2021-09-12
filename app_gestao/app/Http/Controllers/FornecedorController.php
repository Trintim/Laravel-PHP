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
                'cnpj' => '0',
                'ddd' => '11', //São paulo (SP)
                'telefone' => '99999-9999'
            ],
            1 => [
                'nome' => 'fornecedor 2',
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '85', //Fortaleza (CE)
                'telefone' => '00000-9999'
            ],
            2 => [
                'nome' => 'fornecedor 3',
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '33', //Minas Gerais (MG)
                'telefone' => '99999-0000'
            ],
        ];

        /*
        $msg = isset($fornecedores[0]['cnpj']) ? "CNPJ informado!" : "CNPJ não informado!";
        echo  $msg;
        condicao ? se verdadeiro : se falso;
        condicao ? se verdadeiro : (condicao ? se verdadeiro : se falso);
        */
        return view('app.fornecedor.index', compact('fornecedores'));
        //return view('app.fornecedor.index');
    }
}
