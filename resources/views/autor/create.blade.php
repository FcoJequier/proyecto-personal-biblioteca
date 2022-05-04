@extends('layouts.app')

@section('content')
    <div class="container">

        <!--Encriptacion de una foto => enctype="multipart/form-data" -->
        <form action="{{ url('/autor')  }}" method="post">
            @csrf
            @include('autor.form',
                    ['modo'=>'Registrar',
                    'labelPass'=>'Contraseña',
                    'typePass'=>'password',
                    'labelCorreo'=>'Correo',
                    'typeCorreo'=>'text'])

        </form>

    </div>
@endsection
