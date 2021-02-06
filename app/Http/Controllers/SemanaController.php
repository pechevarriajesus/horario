<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSemanaRequest;
use App\Http\Requests\UpdateSemanaRequest;
use Illuminate\Http\Request;
use App\Models\Semana;

class SemanaController extends Controller
{
    //GET listar registros
    public function index(Request $request)
    {
        if ($request->has('search')) {

            $semana = Semana::where('id', $request->search)->get();
        } else {

            $semana = Semana::all();
        }



        return $semana;
    }

    //POST insertar datos
    public function store(StoreSemanaRequest $request)
    {
        try {

            $input = $request->all();
            Semana::create($input);
            return response()->json([
                'res' => true,
                'message' => 'registro grabado correctamente'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'res' => false,
                'message' => $e->getMessage()
            ], 406);
        }
    }

    //GET Buscar por id
    public function show(Semana $semana)
    {
        return $semana;
    }

    //PUT actualizar registros
    public function update(UpdateSemanaRequest $request, Semana $semana)
    {
        try {
            $input = $request->all();
            $semana->update($input);
            return response()->json([
                'res' => true,
                'message' => 'registro actualizado correctamente'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'res' => false,
                'message' => $e->getMessage()
            ], 406);
        }
    }

    //DELETE eliminar registros
    public function destroy($id)
    {
        try {
            Semana::destroy($id);
            return response()->json([
                'res' => true,
                'message' => 'registro eliminado correctamente'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'res' => false,
                'message' => $e->getMessage()
            ], 406);
        }
    }
}
