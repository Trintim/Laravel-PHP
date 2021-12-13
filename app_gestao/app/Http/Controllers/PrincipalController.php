<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal(){
        //echo 'Olá sejam bem-vindos!';
        return view('site.principal');
    }
}
