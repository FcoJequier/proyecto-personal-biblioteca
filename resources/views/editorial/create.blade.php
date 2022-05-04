@extends('layouts.app')

@section('content')
    <div class="container">

        <!--Encriptacion de una foto => enctype="multipart/form-data" -->
        <form action="{{ url('/editorial')  }}" method="post">
            @csrf
            @include('editorial.form',
                    ['modo'=>'Registrar',
                    'labelPass'=>'Contraseña',
                    'typePass'=>'password',
                    'labelCorreo'=>'Correo',
                    'typeCorreo'=>'text'])

        </form>

    </div>
@endsection
