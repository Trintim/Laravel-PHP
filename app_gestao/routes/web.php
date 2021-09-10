<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::get('/aboutus', [SobreNosController::class, 'sobrenos'])->name('site.aboutus');
Route::get('/contact', [ContatoController::class, 'contato'])->name('site.contact');
Route::get('/login', function(){return 'Login';})->name('site.login');

Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){return 'Clientes';})->name('app.clientes');
    Route::get('/fornecedores',  function(){return 'Fornecedores';})->name('app.fornecedores');
    Route::get('/produtos',  function(){return 'Produtos';})->name('app.produtos');
});

// nome, categoria, assunto, mensagem


/*Route::get('contact/{nome}/{categoria_id}', //select id
    function(
        string $name = 'Desconhecido',
        int $categoria_id = 1, // 1 - 'Informação'
    ){
    echo "Estamos aqui: ". $name .", categoria: " . $categoria_id;}
)->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');*/

/*Route::get('contact/{nome?}/{categoria?}/{assunto?}/{mensagem?}',
    function(
        string $name = 'Desconhecido',
        string $categorie = 'não informada',
        string $assunto = 'não informado',
        string $mensagem = 'mensagem não informada'
    ){
    echo "Estamos aqui: ". $name .", categoria: " . $categorie .", assunto: ". $assunto .", mensagem: ". $mensagem;
});*/
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
