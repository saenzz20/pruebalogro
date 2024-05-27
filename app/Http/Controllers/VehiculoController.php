<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;
use App\Http\Requests\VehiculoRequest;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $registros=Vehiculo::where('placa', 'like', '%' . $texto . '%')->paginate(10);
        return view('vehiculo.index',compact('registros','texto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehiculo= new Vehiculo();
        return view('vehiculo.action',['vehiculo'=>new Vehiculo()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehiculoRequest $request)
    {
        $registro = new Vehiculo;
        $registro->placa=$request->input('placa');
        $registro->modelo=$request->input('modelo');
        $registro->propietario=$request->input('propietario');
        $registro->save();
        return response()->json([
            'status'=> 'success',
            'message'=>'Registro creado satisfactoriamente'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehiculo $vehiculo)
    {
        return "Mostrar";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vehiculo=Vehiculo::findOrFail($id);
        return view('vehiculo.action',compact('vehiculo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehiculoRequest $request, $id)
    {
        $vehiculo=Vehiculo::findOrFail($id);
        $vehiculo->placa=$request->placa;
        $vehiculo->modelo=$request->modelo;
        $vehiculo->propietario=$request->propietario;
        $vehiculo->save();

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
        $registro = Vehiculo::findOrFail($id);
        $registro->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Producto eliminado satisfactoriamente'
        ]);
    }
}