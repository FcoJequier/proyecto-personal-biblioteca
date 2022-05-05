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




        <h1 align="center"> Categorías </h1>

        <table class="table table-hover table-light">
            <thead class="thead-light">
            <tr>
                <!-- <th>#</th> -->
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <!-- <td>{{-- $categoria->id --}}</td> -->

                    <td>{{ $categoria->nombre }}</td>
                    <td>

                        <a href="{{ url('/categoria/'.$categoria->id.'/edit')}}" class="btn btn-warning">
                            Editar
                        </a>

                        |

                        <!-- Se envia el "$categoria->id" del categoria a ser borrado y se recepciona en el metodo destroy del controlador -->
                        <form action="{{ url('/categoria/'.$categoria->id)}}" method="post" class="d-inline">

                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" onclick="return confirm('Quiere borrar?')" value="Borrar" class="btn btn-danger">

                        </form>

                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $categorias->links() !!}
            <a href="{{ url('categoria/create') }}" class="btn btn-success">Registrar nueva Categoría</a>

    </div>
@endsection
