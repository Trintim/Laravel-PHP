<?php

namespace App\Http\Controllers;

use App\Http\Requests\FornecedorRequest;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }

    public function listar(Request $request){

        $fornecedores = Fornecedor::with(['produtos'])->where('nome', 'like', '%'.$request->input('nome').'%')
        ->where('site', 'like', '%'.$request->input('site').'%')
        ->where('uf', 'like', '%'.$request->input('uf').'%')
        ->where('email', 'like', '%'.$request->input('email').'%')->paginate(5);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' =>$request->all()]);
    }

    public function adicionar(Request $request){

        $msg = '';
        //inclusao
        if($request->input('_token') != '' && $request->input('id') == ''){


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

        //edição
        if($request->input('_token') != '' && $request->input('id') != ''){
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update){
                $msg = 'Atualização realizada com sucesso!';
            }
            else{
                $msg = 'Erro ao tentar atualizar o registro!';
            }
            return redirect()->route('app.fornecedor.editar', ['id' =>$request->input('id'), 'msg' => $msg]);
        }
        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = ''){


        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function excluir($id){

        Fornecedor::find($id)->delete();
        //Fornecedor::find($id)->ForceDelete();
        return redirect()->route('app.fornecedor');
    }
}
