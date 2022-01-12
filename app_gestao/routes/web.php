<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\TesteController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;



Route::get('/', [PrincipalController::class, 'principal'])->name('site.index')->middleware('log.acesso');
Route::get('/aboutus', [SobreNosController::class, 'sobrenos'])->name('site.aboutus');
Route::get('/contact', [ContatoController::class, 'contato'])->name('site.contact');
Route::post('/contact', [ContatoController::class, 'salvar'])->name('site.contact');
Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');
    Route::get('/cliente', [ClienteController::class, 'index'])->name('app.cliente');

    Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::post('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', [FornecedorController::class, 'editar'])->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}/{msg?}', [FornecedorController::class, 'excluir'])->name('app.fornecedor.excluir');


    Route::resource('/produto',  ProdutoController::class);

});

Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('teste');

Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para ir para a página inicial';
});



/*
Route::get('/rota1', function () {
    echo 'Rota 1';
})->name('site.rota1');

Route::get('/rota2', function () {
    return redirect()->route('site.rota1');
})->name('site.rota2');
*/

//Route::redirect('/rota2', '/rota1');

// nome, categoria, assunto, mensagem

//envia parametros
/*Route::get('contact/{nome}/{categoria_id}', //select id
    function(
        string $name = 'Desconhecido',
        int $categoria_id = 1, // 1 - 'Informação'
    ){
    echo 'Estamos aqui: '. $name . ' - categoria: ' . $categoria_id;}
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
