<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }

    public function listar(){
        return view('app.fornecedor.listar');
    }

    public function adicionar(Request $request){

        $msg = '';

        if($request->input('_token') != ''){


            $request->validate([

                'nome' => 'required|min:3|max:30',
                'site' => 'required',
                'uf' =>'required|min:2|max:2',
                'email' => 'required|email'
            ], [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no minimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no maximo 30 caracteres',
                'uf.min' => 'O campo Uf deve ter no minimo 2 caracteres',
                'uf.max' => 'O campo Uf deve ter no minimo 2 caracteres',
                'email.email' => 'O campo E-mail não foi preenchido corretamente',
            ]);
            //validando
            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());
            // redirect

            //dados view
            $msg = 'Cadastro realizado com sucesso';

        }
        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }
}
