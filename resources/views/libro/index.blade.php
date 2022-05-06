@extends('layouts.app')

@section('content')
    <div class="container">

        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">

                {{ Session::get('mensaje') }}
                <br>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
        @endif




        <h1 align="center"> Libros </h1>


        <table class="table table-hover table-light table-responsive">
            <thead class="thead-light">
            <tr>
                <!-- <th>#</th> -->
                <th>Titulo</th>
                <th>Autor</th>
                <th>Categoria</th>
                <th>Editorial</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($libros as $libro)
                <tr>
                    <!-- <td>{{-- $libro->id --}}</td> -->

                    <td>{{ $libro->titulo }}</td>
                    <td>{{ $libro->autores->nombre.' '.$libro->autores->apellido}}</td>
                    <td>{{ $libro->categorias->nombre }}</td>
                    <td>{{ $libro->editoriales->nombre }}</td>
                    <td>

                        <a href="{{ url('/libro/'.$libro->id.'/edit')}}" class="btn btn-warning">
                            Editar
                        </a>

                        |

                        <!-- Se envia el "$libro->id" del libro a ser borrado y se recepciona en el metodo destroy del controlador -->
                        <form action="{{ url('/libro/'.$libro->id)}}" method="post" class="d-inline">

                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" onclick="return confirm('Quiere borrar?')" value="Borrar" class="btn btn-danger">

                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $libros->links() !!}
            <a href="{{ url('libro/create') }}" class="btn btn-success">Registrar nuevo Libro</a>

    </div>
@endsection
