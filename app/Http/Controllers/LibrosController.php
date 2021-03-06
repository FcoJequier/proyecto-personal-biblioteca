<?php

namespace App\Http\Controllers;

use App\Models\Libros;
use App\Models\Categorias;
use App\Models\Autores;
use App\Models\Editoriales;
use Illuminate\Http\Request;

class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //Consultar informacion de la base de datos
        $datos['libros']=Libros::paginate(6);
        return view('libro.index',$datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $libro = new Libros();

        $autores = Autores::pluck('nombre','id');
        $categorias = Categorias::pluck('nombre','id');
        $editoriales = Editoriales::pluck('nombre','id');

        return view('libro.create', compact('libro','autores','categorias','editoriales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[
            'Titulo'=>'required|string|max:100'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Edad.required'=>'La edad es requerida'

        ];

        $this->validate($request,$campos,$mensaje);

        //Pedir Datos formulario y quitarle el campo "token"
        $datosLibros = request()->except('_token');


        //Con el modelo "Libros" inserta los datos obtenidos en el formulario a la base de datos
        Libros::insert($datosLibros);

        return redirect('libro')->with('mensaje','Libro agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libros  $libros
     * @return \Illuminate\Http\Response
     */
    public function show(Libros $libros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libros  $libros
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //Buscamos la informacion a partir del ID
        $libro=Libros::findOrFail($id);

        $autores = Autores::pluck('nombre','id');
        $categorias = Categorias::pluck('nombre','id');
        $editoriales = Editoriales::pluck('nombre','id');

        //Retornamos a la vista de editar pasandole la informacion del libro
        return view('libro.edit', compact('libro','autores','categorias','editoriales') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libros  $libros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'Titulo'=>'required|string|max:100'
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Edad.required'=>'La edad es requerida'

        ];

        //Se unen los campos con los mensajes
        $this->validate($request,$campos,$mensaje);

        //
        //Pedir Datos formulario y quitarle los campos "token", method
        $datosLibros = request()->except(['_token','_method']);

        //Buscamos el registro que tenga el id igual al id que nos estan pasando y lo actualizamos
        Libros::where('id','=',$id)->update($datosLibros);

        //Buscamos la informacion a partir del ID
        $libro=Libros::findOrFail($id);

        return redirect('libro')->with('mensaje','Libro Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libros  $libros
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Libros::destroy($id);
        return redirect('libro')->with('mensaje','Libro Borrado');
    }
}
