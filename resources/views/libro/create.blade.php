@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{ url('/libro')  }}" method="post">
            @csrf
            @include('libro.form',
                    ['modo'=>'Registrar',
                    'labelPass'=>'Contraseña',
                    'typePass'=>'password',
                    'labelCorreo'=>'Correo',
                    'typeCorreo'=>'text'])

        </form>

    </div>
@endsection
