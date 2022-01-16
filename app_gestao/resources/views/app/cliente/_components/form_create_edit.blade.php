@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

@if(isset($cliente->id))
    <form action="{{route('cliente.update', ['cliente' => $cliente->id])}}" method="post">
        @csrf
        @method('PUT')
@else
    <form action="{{ route('cliente.store') }}" method="post">
        @csrf
@endif
    <input type="text" name="nome" value="{{ $cliente->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">

    <button type="submit" class="borda-preta">Criar</button>
</form>