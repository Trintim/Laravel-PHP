<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Models\Fornecedor;
use App\Models\Item;
use App\Models\Produto;
use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //tecnica eager loading
        $produtos = Item::with(['itemDetalhe', 'fornecedor'])->paginate(10);


        /* foreach($produtos as $key => $produto){
            //print_r($produto->getAttributes());
            //echo '<br><br>';
            $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();
            //sem o first retorna a Collection
            //com first retorna unico elemento relacionado ao id
            if(isset($produtoDetalhe)){
                //print_r($produtoDetalhe->getAttributes());

                $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
                $produtos[$key]['largura'] = $produtoDetalhe->largura;
                $produtos[$key]['altura'] = $produtoDetalhe->altura;
            }
            //echo '<hr>';
        } */

        return view('app.produto.index', ['produtos' => $produtos, 'request' =>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fornecedores = Fornecedor::all();
        $unidades = Unidade::all();

        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoRequest $request)
    {
        $request->validated();
        Item::create($request->all());

        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //

        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        //
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
        //return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutoRequest $request, Item $produto)
    {
        //
        $request->validated();
        //dd($request->all());
        $produto->update($request->all());

        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
       $produto->delete();
       return redirect()->route('produto.index');
    }
}
