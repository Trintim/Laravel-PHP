{{ $slot }}

<form action="{{ route('site.contact') }}" method="post">
    @csrf
    <input name="name" value="{{old('name')}}" type="text" placeholder="Nome" class="{{ $classe }}">
    <br>
    <input name="telefone" value="{{old('telefone')}}" type="text" placeholder="Telefone" class="{{ $classe }}">
    <br>
    <input name="email" value="{{old('email')}}" type="text" placeholder="E-mail" class="{{ $classe }}">
    <br>
    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo as $motivo)
            <option value="{{$motivo->id}}" {{old('motivo_contatos_id') == $motivo->id ? 'selected' : ''}}>{{ $motivo->motivo_contato }}</option>
        @endforeach
    </select>
    <br>
    <textarea name="message" class="{{ $classe }}">{{ (old('message') != '') ? old('message') : 'Preencha aqui a sua mensagem' }}
    </textarea>
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>


<div style="position: absolute; top:0px; left:0px; width:100%; background: green">
    <pre>
        {{print_r($errors)}}
    </pre>
</div>
