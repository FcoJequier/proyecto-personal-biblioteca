<?php

namespace App\Http\Controllers;

use App\Models\Editoriales;
use Illuminate\Http\Request;

class EditorialesController extends Controller
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
        $datos['editoriales']=Editoriales::paginate(6);
        return view('editorial.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('editorial.create');
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
            'Telefono'=>'required|string|max:100',
            'Correo'=>'required|email'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'

        ];

        $this->validate($request,$campos,$mensaje);

        //Pedir Datos formulario y quitarle el campo "token"
        $datosEditoriales = request()->except('_token');


        //Con el modelo "Usuario" inserta los datos obtenidos en el formulario a la base de datos
        Editoriales::insert($datosEditoriales);

        //return response()->json($datosUsuario);
        return redirect('editorial')->with('mensaje','Editorial agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Editoriales  $editoriales
     * @return \Illuminate\Http\Response
     */
    public function show(Editoriales $editoriales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Editoriales  $editoriales
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //Buscamos la informacion a partir del ID
        $editorial=Editoriales::findOrFail($id);

        //Retornamos a la vista de editar pasandole la informacion de la editorial
        return view('editorial.edit', compact('editorial') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Editoriales  $editoriales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Telefono'=>'required|string|max:100',
            'Correo'=>'required|email'
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido'

        ];

        //Se unen los campos con los mensajes
        $this->validate($request,$campos,$mensaje);

        //
        //Pedir Datos formulario y quitarle los campos "token", method
        $datosEditoriales = request()->except(['_token','_method']);

        //Buscamos el registro que tenga el id igual al id que nos estan pasando y lo actualizamos
        Editoriales::where('id','=',$id)->update($datosEditoriales);

        //Buscamos la informacion a partir del ID
        $editorial=Editoriales::findOrFail($id);

        return redirect('editorial')->with('mensaje','Editorial Modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Editoriales  $editoriales
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Editoriales::destroy($id);
        return redirect('editorial')->with('mensaje','Editorial Borrada');
    }
}
