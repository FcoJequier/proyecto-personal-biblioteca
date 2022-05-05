@extends('layouts.app')

@section('content')
    <div class="container">



        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">

                {{ Session::get('mensaje') }}
                <br>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif




        <h1 align="center"> Autores </h1>


        <table class="table table-hover table-light">
            <thead class="thead-light">
            <tr>
                <!-- <th>#</th> -->
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($autores as $autor)
                <tr>
                    <!-- <td>{{-- $autor->id --}}</td> -->

                    <td>{{ $autor->nombre }}</td>
                    <td>{{ $autor->apellido }}</td>
                    <td>{{ $autor->edad }}</td>
                    <td>

                        <a href="{{ url('/autor/'.$autor->id.'/edit')}}" class="btn btn-warning">
                            Editar
                        </a>

                        |

                        <!-- Se envia el "$autor->id" del autor a ser borrado y se recepciona en el metodo destroy del controlador -->
                        <form action="{{ url('/autor/'.$autor->id)}}" method="post" class="d-inline">

                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" onclick="return confirm('Quiere borrar?')" value="Borrar" class="btn btn-danger">

                        </form>

                    </td>
                    <!--
            <td>
                 Sirve para mostrar una foto guardada en la carpeta storage, obteniendo la ruta desde una base de datos
                 **Escribir en consola "php artisan storage:link"** => abre un enlace para poder comunicarse con esa carpeta
                <img src="{{-- asset('storage').'/'.$autor->Foto --}}" alt="">

            </td>
        -->
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $autores->links() !!}
            <a href="{{ url('autor/create') }}" class="btn btn-success">Registrar nuevo Autor</a>
    </div>
@endsection
