@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif


<form action="{{ route('pedido-produto.store', ['pedido' => $pedido]) }}" method="post">
    @csrf

    <select name="produto_id" >
        <option value="">-- Selecione um Produto --</option>
            @foreach($produtos as $produto)
                <option value="{{ $produto->id }}" {{ old('produto_id') == $produto->id ? 'selected' : ''}}>{{ $produto->nome }}</option>
            @endforeach
    </select>

    <input type="number" name="quantidade" value="{{old('quantidade') ? old('quantidade') : ''}}" placeholder="Quantidade" class="borda-preta">

    <button type="submit" class="borda-preta">Criar</button>
</form>