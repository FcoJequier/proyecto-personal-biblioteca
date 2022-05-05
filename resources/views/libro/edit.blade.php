@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{ url('/libro/'.$libro->id)  }}" method="post">
            @csrf
            {{ method_field('PATCH') }}

            @include('libro.form',
                    ['modo'=>'Editar',
                    'labelPass'=>'',
                    'typePass'=>'hidden',
                    'labelCorreo'=>'',
                    'typeCorreo'=>'hidden'])

        </form>

    </div>
@endsection
