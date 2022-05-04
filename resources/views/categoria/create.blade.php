@extends('layouts.app')

@section('content')
    <div class="container">

        <!--Encriptacion de una foto => enctype="multipart/form-data" -->
        <form action="{{ url('/categoria')  }}" method="post">
            @csrf
            @include('categoria.form',
                    ['modo'=>'Registrar',
                    'labelPass'=>'Contraseña',
                    'typePass'=>'password',
                    'labelCorreo'=>'Correo',
                    'typeCorreo'=>'text'])

        </form>

    </div>
@endsection
