<body style="background-color: rgb(112, 5, 103);">

<h3>Fornecedor</h3>

{{-- Fica o comentario que será descartado pelo interpretador do blade --}}

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


@isset($fornecedores)

    @forelse ($fornecedores as $fornecedor)
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? '' }}
        <br>
        Telefone: ({{ $fornecedor['ddd'] ?? '' }}) {{ $fornecedor['telefone'] ?? '' }}
        <hr>
    @empty
        Não Existem fornecedores cadastrados
    @endforelse ($fornecedores as $item => $fornecedor)
@endisset



</body>

