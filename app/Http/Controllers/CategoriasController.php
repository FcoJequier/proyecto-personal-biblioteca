<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
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
        $datos['categorias']=Categorias::paginate(5);
        return view('categoria.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categoria.create');
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
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'

        ];

        $this->validate($request,$campos,$mensaje);

        //Pedir Datos formulario y quitarle el campo "token"
        $datosCategorias = request()->except('_token');


        //Con el modelo "Usuario" inserta los datos obtenidos en el formulario a la base de datos
        Categorias::insert($datosCategorias);

        //return response()->json($datosUsuario);
        return redirect('categoria')->with('mensaje','Categoría agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function show(Categorias $categorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //Buscamos la informacion a partir del ID
        $categoria=Categorias::findOrFail($id);

        //Retornamos a la vista de editar pasandole la informacion de la categoria
        return view('categoria.edit', compact('categoria') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $campos=[
            'Nombre'=>'required|string|max:100',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido'

        ];

        //Se unen los campos con los mensajes
        $this->validate($request,$campos,$mensaje);

        //
        //Pedir Datos formulario y quitarle los campos "token", method
        $datosCategoria = request()->except(['_token','_method']);

        //Buscamos el registro que tenga el id igual al id que nos estan pasando y lo actualizamos
        Categorias::where('id','=',$id)->update($datosCategoria);

        //Buscamos la informacion a partir del ID
        $categoria=Categorias::findOrFail($id);

        return redirect('categoria')->with('mensaje','Categoría Modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Categorias::destroy($id);
        return redirect('categoria')->with('mensaje','Categoría Borrada');
    }
}
