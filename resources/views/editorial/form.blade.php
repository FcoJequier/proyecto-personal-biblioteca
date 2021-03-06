
<h1> {{ $modo }} Editorial</h1>

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
    <label for="Nombre"> Nombre </label>
    <input type="text" class="form-control" name="Nombre" value="{{ isset($editorial->nombre)?$editorial->nombre:old('Nombre') }}" id="Nombre">
</div>

<div class="form-group">
    <label for="Apellido"> Teléfono </label>
    <input type="text" class="form-control" maxlength="8" name="Telefono" value="{{ isset($editorial->telefono)?$editorial->telefono:old('Telefono') }}" id="Telefono">
</div>

<div class="form-group">
    <label for="Edad"> Correo </label>
    <input type="text" class="form-control" name="Correo" value="{{ isset($editorial->correo)?$editorial->correo:old('Correo') }}" id="Correo">
</div>

<br>
<input class="btn btn-success" type="submit" value="{{ $modo }}">

<a class="btn btn-primary" href="{{ url('editorial/') }}">Regresar</a>
