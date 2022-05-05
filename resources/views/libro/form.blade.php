<h1> {{ $modo }} Libro</h1>

<!-- Se muestran los errores -->
@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>

@endif



<div>
    <label for="Titulo"> Ttulo </label>
    <input type="text" class="form-control" name="Titulo" value="{{ isset($libro->titulo)?$libro->titulo:old('Titulo') }}" id="Titulo">
</div>

<div class="form-group">
    {{ Form::label('Autores') }}
    {{ Form::select('idAutores', $autores, $libro->idAutores, ['class' => 'form-control' . ($errors->has('idAutores') ? ' is-invalid' : '')/*, 'placeholder' => 'idAutores'*/]) }}
    {!! $errors->first('idAutores', '<div class="invalid-feedback">:message</p>') !!}
</div>

<div class="form-group">
    {{ Form::label('Categorias') }}
    {{ Form::select('idCategorias', $categorias, $libro->idCategorias, ['class' => 'form-control' . ($errors->has('idCategorias') ? ' is-invalid' : '')/*, 'placeholder' => 'idAutores'*/]) }}
    {!! $errors->first('idCategorias', '<div class="invalid-feedback">:message</p>') !!}
</div>

<div class="form-group">
    {{ Form::label('Editoriales') }}
    {{ Form::select('idEditoriales', $editoriales, $libro->idEditoriales, ['class' => 'form-control' . ($errors->has('idEditoriales') ? ' is-invalid' : '')/*, 'placeholder' => 'idAutores'*/]) }}
    {!! $errors->first('idAutores', '<div class="invalid-feedback">:message</p>') !!}
</div>

<br>
<input class="btn btn-success" type="submit" value="{{ $modo }}">

<a class="btn btn-primary" href="{{ url('libro/') }}">Regresar</a>
