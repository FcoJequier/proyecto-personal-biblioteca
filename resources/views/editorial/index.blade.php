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






        <a href="{{ url('editorial/create') }}" class="btn btn-success">Registrar nueva Editorial</a>
        <table class="table table-hover table-light">
            <thead class="thead-light">
            <tr>
                <!-- <th>#</th> -->
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($editoriales as $editorial)
                <tr>
                    <!-- <td>{{-- $editorial->id --}}</td> -->

                    <td>{{ $editorial->nombre }}</td>
                    <td>{{ $editorial->telefono }}</td>
                    <td>{{ $editorial->correo }}</td>
                    <td>

                        <a href="{{ url('/editorial/'.$editorial->id.'/edit')}}" class="btn btn-warning">
                            Editar
                        </a>

                        |

                        <!-- Se envia el "$editorial->id" del editorial a ser borrado y se recepciona en el metodo destroy del controlador -->
                        <form action="{{ url('/editorial/'.$editorial->id)}}" method="post" class="d-inline">

                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" onclick="return confirm('Quiere borrar?')" value="Borrar" class="btn btn-danger">

                        </form>

                    </td>
                    <!--
            <td>
                 Sirve para mostrar una foto guardada en la carpeta storage, obteniendo la ruta desde una base de datos
                 **Escribir en consola "php artisan storage:link"** => abre un enlace para poder comunicarse con esa carpeta
                <img src="{{-- asset('storage').'/'.$editorial->Foto --}}" alt="">

            </td>
        -->
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $editoriales->links() !!}

    </div>
@endsection
