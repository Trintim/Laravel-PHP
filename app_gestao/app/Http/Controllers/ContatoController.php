<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContatoRequest;
use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(){

        /*
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        echo $request->input('nome');
        echo '<br>';
        echo $request->input('email');
        */

        /*$contato = new SiteContato();

        $contato->name = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo = $request->input('motivo_contato');
        $contato->message = $request->input('mensagem');

        print_r($contato->getAttributes());
        //$contato->save();*/

        //$contato = new SiteContato();
        //$contato->create($request->all());
        //$contato->save();
        //print_r($contato->getAttributes());
        $motivo = MotivoContato::all();

        return view('site.contact', ['Title' => 'Contato (Teste)', 'motivo' => $motivo]);
    }

    public function salvar(ContatoRequest $request){

        //validação dos dados di formulario recebidos no request
        //$request->all();
        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }
}
