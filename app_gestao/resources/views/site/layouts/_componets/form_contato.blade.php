{{ $slot }}

<form action="{{ route('site.contact') }}" method="post">
    @csrf
    <input name="name" value="{{old('name')}}" type="text" placeholder="Nome" class="{{ $classe }}">
    @if($errors->has('name'))
        {{$errors->first('name')}}
    @endif
    <br>
    <input name="telefone" value="{{old('telefone')}}" type="text" placeholder="Telefone" class="{{ $classe }}">
    {{$errors->has('telefone') ? $errors->first('telefone') : ''}}
    <br>
    <input name="email" value="{{old('email')}}" type="text" placeholder="E-mail" class="{{ $classe }}">
    <br>
    {{$errors->has('email') ? $errors->first('email') : ''}}
    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo as $motivo)
            <option value="{{$motivo->id}}" {{old('motivo_contatos_id') == $motivo->id ? 'selected' : ''}}>{{ $motivo->motivo_contato }}</option>
        @endforeach
    </select>
    {{$errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : ''}}
    <br>
    <textarea name="message" class="{{ $classe }}">{{ (old('message') != '') ? old('message') : 'Preencha aqui a sua mensagem' }}
    </textarea>
    {{$errors->has('message') ? $errors->first('message') : ''}}
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

<!--@if($errors->any())
    <div style="position:absolute; top:0px; left:0px; width:100%; background: red; text-align:center">
        @foreach ($errors->all() as $erro)
            {{$erro}}
            <br>
        @endforeach
    </div>
@endif-->
