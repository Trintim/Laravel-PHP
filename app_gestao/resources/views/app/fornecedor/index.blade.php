<body style="background-color: rgba(133, 28, 124, 0.514);">

<h3>Fornecedor</h3>

{{-- Fica o comentario que será descartado pelo interpretador do blade --}}

{{--Teste comentario--}}

{{--comentarios para php--}}
@php
    /*
    if(!<condição>){} // enquanto executa se o retorno for TRUE
    if(isset($variavel)){} // retornar TRUE se a variavel estiver definida
    if(empty($variavel)){} // retornar TRUE se a variavel estiver vazia
    -''
    - 0
    - 0.00
    - '0'
    - null
    - false
    - array()
    - $var - existe mas n possui valor

    */
@endphp



{{--
@isset($fornecedores)
    Fornecedores: {{$fornecedores[0]['nome']}}
    <br>
    Status: {{$fornecedores[0]['status']}}
    <br>
    @isset($fornecedores[0]['cnpj'])
        CNPJ: {{$fornecedores[0]['cnpj']}}
        @empty($fornecedores[0]['cnpj'])
            - Vazio
        @endempty
    @endisset
    <br>
    Fornecedores: {{$fornecedores[1]['nome']}}
    <br>
    Status: {{$fornecedores[1]['status']}}
    <br>
    @isset($fornecedores[1]['cnpj'])
        CNPJ: {{$fornecedores[1]['cnpj']}}
    @endisset
    <br>
@endisset--}}

{{--
@if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h2>Existem fornecedores cadastrados</h2>
@elseif(count($fornecedores) > 10)
    <h2>Existem varios fornecedores cadastrados</h2>
@else
    <h2>Ainda não existem fornecedores</h2>
@endif
--}}
{{--
Fornecedores: {{$fornecedores[0]['nome']}}
<br>
Status: {{$fornecedores[0]['status']}}
<br>
@if( !($fornecedores[0]['status'] == 'S'))
    Fornecedor inativo
@endif
<br>
@unless ($fornecedores[0]['status'] == 'S')
    Inativaço
@endunless
--}}


@isset($fornecedores)

    @forelse ($fornecedores as $fornecedor)
        Interação Atual: {{ $loop->iteration }}
        <br>
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? '' }}
        <br>
        Telefone: ({{ $fornecedor['ddd'] ?? '' }}) {{ $fornecedor['telefone'] ?? '' }}
        <br>
        @if ($loop->first)
            This is the first iteration
        @endif
        @if ($loop->last)
            This is the last iteration
            <br>
            Total de registros: {{$loop->count}}
        @endif
        <hr>
        @empty
            Não Existem fornecedores cadastrados
    @endforelse
@endisset


</body>

