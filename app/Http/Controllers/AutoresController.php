<?php

namespace App\Http\Controllers;

use App\Models\Autores;
use Illuminate\Http\Request;

class AutoresController extends Controller
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
        $datos['autores']=Autores::paginate(5);
        return view('autor.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('autor.create');
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
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'Edad'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Edad.required'=>'La edad es requerida'

        ];

        $this->validate($request,$campos,$mensaje);

        //Pedir Datos formulario y quitarle el campo "token"
        $datosAutores = request()->except('_token');


        //Con el modelo "Usuario" inserta los datos obtenidos en el formulario a la base de datos
        Autores::insert($datosAutores);

        //return response()->json($datosUsuario);
        return redirect('autor')->with('mensaje','Autor agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Autores  $autores
     * @return \Illuminate\Http\Response
     */
    public function show(Autores $autores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Autores  $autores
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //Buscamos la informacion a partir del ID
        $autor=Autores::findOrFail($id);

        //Retornamos a la vista de editar pasandole la informacion del autor
        return view('autor.edit', compact('autor') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Autores  $autores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'Edad'=>'required|string|max:100'
        ];

            $mensaje=[
                'required'=>'El :attribute es requerido',
                'Edad.required'=>'La edad es requerida'

            ];

        //Se unen los campos con los mensajes
        $this->validate($request,$campos,$mensaje);

        //
        //Pedir Datos formulario y quitarle los campos "token", method
        $datosAutor = request()->except(['_token','_method']);

        //Buscamos el registro que tenga el id igual al id que nos estan pasando y lo actualizamos
        Autores::where('id','=',$id)->update($datosAutor);

        //Buscamos la informacion a partir del ID
        $autor=Autores::findOrFail($id);

        return redirect('autor')->with('mensaje','Autor Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Autores  $autores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //$autor=Autores::findOrFail($idAutores);

        Autores::destroy($id);
        return redirect('autor')->with('mensaje','Autor Borrado');
    }
}
