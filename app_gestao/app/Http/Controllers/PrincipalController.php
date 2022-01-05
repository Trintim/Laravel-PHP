<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotivoContato;

class PrincipalController extends Controller
{
    public function principal(){
        //echo 'Olá sejam bem-vindos!';
        $motivo = MotivoContato::all();

        return view('site.principal', ['motivo' => $motivo]);
    }

}
