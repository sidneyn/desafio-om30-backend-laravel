<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\Api\CepController;
use App\Http\Controllers\Api\EnderecoController;
use \App\Http\Controllers\Api\PacienteController;
use \App\Http\Controllers\Api\PacienteCsvController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

// router resource 
######  checar routes  php artisan route:list  ######

############## documentacão para implementar as rotas ##############
# https://laravel.com/docs/10.x/routing#route-group-subdomain-routing
############## 

Route::apiResource('/paciente', PacienteController::class);
Route::get('/paciente/list/{paciente}', [PacienteController::class, 'list']);
Route::get('/cep/{cep}', [CepController::class, 'index']);
Route::post('/paciente-csv', [PacienteCsvController::class,'arquivo']);

Route::apiResource('/endereco', EnderecoController::class);