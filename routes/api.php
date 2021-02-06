<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\SemanaController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('users', [UserController::class, 'store'])->name('users');
Route::post('login', [UserController::class, 'login'])->name('login');


Route::group(['middleware' => 'auth:api'], function () {
    Route::apiResource('horarios', HorarioController::class);
    Route::apiResource('cursos', CursoController::class);
    Route::apiResource('semanas', SemanaController::class);
});
