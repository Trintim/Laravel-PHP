@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

@if(isset($produto->id))
    <form action="{{route('produto.update', ['produto' => $produto->id])}}" method="post">
        @csrf
        @method('PUT')
@else
    <form action="{{ route('produto.store') }}" method="post">
        @csrf
@endif
    <select name="fornecedor_id" >
        <option value="">-- Selecione um Fornecedor --</option>
            @foreach($fornecedores as $fornecedor)
                <option value="{{ $fornecedor->id }}" {{ ( $produto->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : ''}}>{{ $fornecedor->nome }}</option>
            @endforeach
    </select>

    <input type="text" name="nome" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">

    <input type="text" name="descricao" value="{{ $produto->descricao ?? old('descricao') }}" placeholder="Descrição" class="borda-preta">

    <input type="text" name="peso" value="{{ $produto->peso ?? old('peso') }}" placeholder="Peso" class="borda-preta">

    <select name="unidade_id" >
        <option value="">-- Selecione a Unidade de Medida --</option>
            @foreach($unidades as $unidade)
                <option value="{{ $unidade->id }}" {{ ( $produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''}}>{{ $unidade->descricao }}</option>
            @endforeach
    </select>

            <button type="submit" class="borda-preta">Criar</button>
    </form>