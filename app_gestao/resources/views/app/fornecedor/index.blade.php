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
    Fornecedor: {{ $fornecedores[0]['nome'] }}
    <br>
    Status: {{ $fornecedores[0]['status'] }}
    <br>
    @isset($fornecedores[0]['cnpj'])
        CNPJ: {{ $fornecedores[0]['cnpj'] }}
        @empty($fornecedores[0]['cnpj'])
            - Vazio
        @endempty
    @endisset
@endisset

{{--
@if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existem varios fornecedores cadastrados</h3>
@else
    <h3>Ainda não existem fornecedores cadastrados</h3>
@endif
--}}

{{-- @unless executa se o retorno for false --}}

{{--
@isset($fornecedores)

    Fornecedor: {{ $fornecedores[0]['nome'] }}
    <br>
    Status: {{ $fornecedores[0]['status'] }}
    <br>
    CNPJ: {{ $fornecedores[0]['cnpj'] }}
    <br>
    Fornecedor: {{ $fornecedores[1]['nome'] }}
    <br>
    Status: {{ $fornecedores[1]['status'] }}
    <br>
    @isset($fornecedores[1]['cnpj'])
        CNPJ: {{ $fornecedores[1]['cnpj'] }}
    @endisset

@endisset
--}}




{{--
@if( !($fornecedores[0]['status'] == 'S') )
    Fornecedor Inativo
@endif
<br>
@unless ($fornecedores[0]['status'] == 'S') se o retorno da condição for false
    Fornecedor Inativo
@endunless --}}

