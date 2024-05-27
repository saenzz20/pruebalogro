<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;
use App\Http\Requests\EntradaRequest;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //dd($request);
        $texto=trim($request->get('texto'));
        $registros=Entrada::where('placa', 'like', '%' . $texto . '%')->paginate(10);
        return view('entrada.index',compact('registros','texto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $entrada= new Entrada();
        return view('entrada.action',['entrada'=>new Entrada()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EntradaRequest $request)
    {
        $registro = new Entrada;
        $registro->placa = $request->input('placa');
        $registro->fecha_entrada = $request->input('fecha_entrada');
        $registro->fecha_salida = $request->input('fecha_salida');
        $registro->save();
    
        return response()->json([
            'status' => 'success',
            'message' => 'Registro creado satisfactoriamente'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Entrada $entrada)
    {
        return "Mostrar";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $entrada=Entrada::findOrFail($id);
        return view('entrada.action',compact('entrada'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EntradaRequest $request, $id)
    {
        $entrada = Entrada::findOrFail($id);
        $entrada->placa = $request->placa;
        $entrada->fecha_entrada = $request->fecha_entrada;
        $entrada->fecha_salida = $request->fecha_salida;
        $entrada->save();
    
        return response()->json([
            'status' => 'success',
            'message' => 'Actualización de datos satisfactoria'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $registro = Entrada::findOrFail($id);
        $registro->delete();

        return response()->json([
            'status' => 'success',
            'message' => $registro->nombre . ' Eliminado'
        ]);
    }
}
