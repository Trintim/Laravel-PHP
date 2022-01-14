<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoDetalheRequest;
use App\Models\ItemDetalhe;
use App\Models\ProdutoDetalhe;
use App\Models\Unidade;

use Illuminate\Http\Request;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();

        return view('app.produto_detalhe.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoDetalheRequest $request)
    {
        //
        ProdutoDetalhe::create($request->all());
        echo 'cadastro realiazdo com sucesso!';
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\ProdutoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\ProdutoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $produtoDetalhe = ItemDetalhe::find($id);
        $unidades = Unidade::all();
        return view('app.produto_detalhe.edit', ['produto_detalhe' => $produtoDetalhe, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ProdutoDetalheRequest  $request
     * @param  App\Models\ProdutoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutoDetalheRequest $request, ProdutoDetalhe $produtoDetalhe)
    {
        //
        $produtoDetalhe->update($request->all());
        echo 'Atualização realizada!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\ProdutoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
