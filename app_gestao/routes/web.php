<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return "Gestão de Apps!";
});*/
Route::get('/', [PrincipalController::class, 'principal']);
Route::get('/sobre-nos', [SobreNosController::class, 'sobrenos']);
Route::get('/contato', [ContatoController::class, 'contato']);
/*Route::get('/sobre-nos', function () {
    return "Sobre-Nós!";
});

Route::get('/contato', function () {
    return "Entre em contato conosco!";
});*/

//Route::get($uri/*rota*/, $callback/*ação*/);

/* verbo http
get
post
put
patch
delete
options
*/
