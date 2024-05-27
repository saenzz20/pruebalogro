<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioRequest;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //dd($request);
        $texto=trim($request->get('texto'));
        $registros=Usuario::where('nombre', 'like', '%' . $texto . '%')->paginate(10);
        return view('usuario.index',compact('registros','texto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuario= new Usuario();
        return view('usuario.action', ['usuario' => $usuario]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuarioRequest $request)
    {
        $registro = new Usuario;
        $registro->nombre=$request->input('nombre');
        $registro->apellidos=$request->input('apellidos');
        $registro->imagen="";
        $registro->save();
        return response()->json([
            'status'=> 'success',
            'message'=>'Registro creado satisfactoriamente'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        return view('usuario.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usuario=Usuario::findOrFail($id);
        return view('usuario.action',compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsuarioRequest $request, $id)
    {
        $usuario=Usuario::findOrFail($id);
        $usuario->nombre=$request->nombre;
        $usuario->apellidos=$request->apellidos;
        $usuario->imagen=$request->imagen;
        $usuario->save();

        return response()->json([
            'status'=> 'success',
            'message'=> 'Actualización de datos satisfactoria'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $registro = Usuario::findOrFail($id);
        $registro->delete();

        return response()->json([
            'status' => 'success',
            'message' => $registro->nombre . ' Eliminado'
        ]);
    }
}