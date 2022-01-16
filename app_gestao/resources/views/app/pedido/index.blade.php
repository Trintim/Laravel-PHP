@extends('app.layouts.basico')

@section('titulo', 'Pedidos')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Pedidos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Criar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 80%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID pedido</th>
                            <th>Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </head>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->cliente_id }}</td>
                                <td><a href="{{route('pedido-produto.create', ['pedido' => $pedido->id])}}">Adicionar Produtos</a></td>
                                <td><a href="{{ route('pedido.show', ['pedido' => $pedido->id]) }}">Exibir</a></td>
                                <td>
                                    <form id="form_{{$pedido->id}}" action="{{route('pedido.destroy', ['pedido' => $pedido->id])}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                       <!--  <button type="submit">Excluir</button> -->
                                       <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>
                                    </form>
                                    <!--<a href="">Excluir</a>-->
                                </td>
                                <td><a href="{{route('pedido.edit', ['pedido' => $pedido->id]) }}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pagination">
                    <ul>
                        <li>
                            <!--
                            {{$pedidos->appends($request)->links()}}
                            <br>
                            {{$pedidos->count()}} - Total de registros da pagina
                            <br>
                            {{$pedidos->total()}} - Total de registros da consulta
                            <br>
                            {{$pedidos->firstItem()}} - Primeiro registro da página
                            <br>
                            {{$pedidos->lastItem()}} - Ultimo registro da página -->
                            {{$pedidos->appends($request)->links()}}
                            <br>
                            Exibindo {{$pedidos->total()}} pedidos de {{$pedidos->total()}} ({{$pedidos->firstItem()}} a {{$pedidos->lastItem()}})
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>


@endsection