<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function store(Request $request)
    {

        try {

            $input = $request->all();
            $input['password'] = Hash::make($request->password);

            User::create($input);
            return response()->json([
                'res' => true,
                'message' => 'usuario creado correctamente'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'res' => false,
                'message' => $e->getMessage()
            ], 406);
        }
    }

    public function login(Request $request)
    {

        try {

            $user = User::whereEmail($request->email)->first();
            if (!is_null($user) && Hash::check($request->password, $user->password)) {
                $token = $user->createToken('horario')->accessToken;

                return response()->json([
                    'res' => true,
                    'token' => $token,
                    'message' => 'acceso correcto'
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'res' => false,
                'message' => $e->getMessage()
            ], 406);
        }
    }
}
