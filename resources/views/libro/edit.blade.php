@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{ url('/autor/'.$autor->id)  }}" method="post">
            @csrf
            {{ method_field('PATCH') }}

            @include('autor.form',
                    ['modo'=>'Editar',
                    'labelPass'=>'',
                    'typePass'=>'hidden',
                    'labelCorreo'=>'',
                    'typeCorreo'=>'hidden'])

        </form>

    </div>
@endsection
