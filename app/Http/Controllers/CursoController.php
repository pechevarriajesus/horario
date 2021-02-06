<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCursoRequest;
use App\Http\Requests\UpdateCursoRequest;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    //GET listar registros
    public function index(Request $request)
    {
        if ($request->has('search')) {

            $curso = Curso::where('id', $request->search)->get();
        } else {

            $curso = Curso::all();
        }



        return $curso;
    }

    //POST insertar datos
    public function store(StoreCursoRequest $request)
    {
        try {

            $input = $request->all();
            Curso::create($input);
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
    public function show(Curso $curso)
    {
        return $curso;
    }

    //PUT actualizar registros
    public function update(UpdateCursoRequest $request, Curso $curso)
    {
        try {
            $input = $request->all();
            $curso->update($input);
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
            Curso::destroy($id);
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
