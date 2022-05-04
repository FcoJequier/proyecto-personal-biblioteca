@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{ url('/editorial/'.$editorial->id)  }}" method="post">
            @csrf
            {{ method_field('PATCH') }}

            @include('editorial.form',
                    ['modo'=>'Editar',
                    'labelPass'=>'',
                    'typePass'=>'hidden',
                    'labelCorreo'=>'',
                    'typeCorreo'=>'hidden'])

        </form>

    </div>
@endsection
