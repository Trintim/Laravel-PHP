@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Clientes</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Criar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 80%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </head>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{$cliente->nome}}</td>
                                <td><a href="{{route('cliente.show',['cliente' => $cliente->id])}}">Exibir</a></td>
                                <td>
                                    <form id="form_{{$cliente->id}}" action="{{route('cliente.destroy', ['cliente' => $cliente->id])}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                       <!--  <button type="submit">Excluir</button> -->
                                       <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
                                    </form>
                                    <!--<a href="">Excluir</a>-->
                                </td>
                                <td><a href="{{route('cliente.edit', ['cliente' => $cliente->id]) }}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pagination">
                    <ul>
                        <li>
                            <!--
                            {{$clientes->appends($request)->links()}}
                            <br>
                            {{$clientes->count()}} - Total de registros da pagina
                            <br>
                            {{$clientes->total()}} - Total de registros da consulta
                            <br>
                            {{$clientes->firstItem()}} - Primeiro registro da página
                            <br>
                            {{$clientes->lastItem()}} - Ultimo registro da página -->
                            {{$clientes->appends($request)->links()}}
                            <br>
                            Exibindo {{$clientes->total()}} produtos de {{$clientes->total()}} ({{$clientes->firstItem()}} a {{$clientes->lastItem()}})
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>


@endsection