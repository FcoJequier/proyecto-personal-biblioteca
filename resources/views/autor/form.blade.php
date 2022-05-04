
<h1> {{ $modo }} Autor</h1>

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
    <input type="text" class="form-control" name="Nombre" value="{{ isset($autor->nombre)?$autor->nombre:old('Nombre') }}" id="Nombre">
</div>

<div class="form-group">
    <label for="Apellido"> Apellido </label>
    <input type="text" class="form-control" name="Apellido" value="{{ isset($autor->apellido)?$autor->apellido:old('Apellido') }}" id="Apellido">
</div>

<div class="form-group">
    <label for="Edad"> Edad </label>
    <input type="text" class="form-control" name="Edad" value="{{ isset($autor->edad)?$autor->edad:old('Edad') }}" id="Edad">
</div>


<!--
<label for="Foto"> Foto </label>
@--if(isset($usuario->Foto))
<img src="{{-- asset('storage').'/'.$usuario->Foto --}}" alt="">
@--endif
<input type="text" name="Foto" value="" id="Foto">
-->
<br>
<input class="btn btn-success" type="submit" value="{{ $modo }}">

<a class="btn btn-primary" href="{{ url('autor/') }}">Regresar</a>
