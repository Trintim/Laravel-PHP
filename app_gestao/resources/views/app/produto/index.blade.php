@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Criar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 80%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Fornecedor</th>
                            <th>Site do Fornecedor</th>
                            <th>peso</th>
                            <th>Unidade ID</th>
                            <th>Comprimento</th>
                            <th>Largura</th>
                            <th>Altura</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </head>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{$produto->nome}}</td>
                                <td>{{$produto->descricao}}</td>
                                <td>{{$produto->fornecedor->nome}}</td>
                                <td>{{$produto->fornecedor->site}}</td>
                                <td>{{$produto->peso}}</td>
                                <td>{{$produto->unidade_id}}</td>
                                <th>{{$produto->itemDetalhe->comprimento ?? ''}}</th>
                                <th>{{$produto->itemDetalhe->largura ?? ''}}</th>
                                <th>{{$produto->itemDetalhe->altura ?? ''}}</th>
                                <td><a href="{{route('produto.show',['produto' => $produto->id])}}">Exibir</a></td>
                                <td>
                                    <form id="form_{{$produto->id}}" action="{{route('produto.destroy', ['produto' => $produto->id])}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                       <!--  <button type="submit">Excluir</button> -->
                                       <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                    </form>
                                    <!--<a href="">Excluir</a>-->
                                </td>
                                <td><a href="{{route('produto.edit', ['produto' => $produto->id]) }}">Editar</a></td>
                            </tr>
                            <tr>
                                <td colspan="12">
                                    <p>Pedidos</p>
                                    @foreach($produto->pedidos as $pedido)
                                        <a href="{{route('pedido-produto.create', ['pedido' => $pedido->id])}}">
                                            Pedido: {{$pedido->id}},
                                        </a>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pagination">
                    <ul>
                        <li>
                            <!--
                            {{$produtos->appends($request)->links()}}
                            <br>
                            {{$produtos->count()}} - Total de registros da pagina
                            <br>
                            {{$produtos->total()}} - Total de registros da consulta
                            <br>
                            {{$produtos->firstItem()}} - Primeiro registro da página
                            <br>
                            {{$produtos->lastItem()}} - Ultimo registro da página -->
                            {{$produtos->appends($request)->links()}}
                            <br>
                            Exibindo {{$produtos->total()}} produtos de {{$produtos->total()}} ({{$produtos->firstItem()}} a {{$produtos->lastItem()}})
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>


@endsection