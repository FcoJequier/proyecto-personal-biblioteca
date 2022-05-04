
<h1> {{ $modo }} Categoría</h1>

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
    <input type="text" class="form-control" name="Nombre" value="{{ isset($categoria->nombre)?$categoria->nombre:old('Nombre') }}" id="Nombre">
</div>

<br>
<input class="btn btn-success" type="submit" value="{{ $modo }}">

<a class="btn btn-primary" href="{{ url('categoria/') }}">Regresar</a>
