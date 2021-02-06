<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHorarioRequest;
use App\Http\Requests\UpdateHorarioRequest;
use App\Models\Horario;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Validator;

class HorarioController extends Controller
{
    //GET listar registros
    public function index(Request $request)
    {
        if ($request->has('search')) {

            $horarios = Horario::where('id', $request->search)->get();
        } else {

            $horarios = Horario::all();
        }



        return $horarios;
    }

    //POST insertar datos
    public function store(StoreHorarioRequest $request)
    {
        try {
            // $validator = Validator::make($request->all(), [
            //     'hora' => 'required|unique:horarios',
            //     'dia' => 'required'
            // ]);

            // if ($validator->fails()) {
            //     return response()->json([
            //         'res' => false,
            //         'message' => $validator->errors()
            //     ], 400);
            // } else {

            //     $input = $request->all();
            //     Horario::create($input);

            //     return response()->json([
            //         'res' => true,
            //         'message' => 'registro grabado correctamente'
            //     ], 200);
            // }


            $input = $request->all();
            Horario::create($input);
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



        //return $validated;


    }

    //GET Buscar por id
    public function show(Horario $horario)
    {
        return $horario;
    }

    //PUT actualizar registros
    public function update(UpdateHorarioRequest $request, Horario $horario)
    {
        try {
            $input = $request->all();
            $horario->update($input);
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
            Horario::destroy($id);
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
