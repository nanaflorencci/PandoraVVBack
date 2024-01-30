<?php

use App\Http\Controllers\ADMController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfissionalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//ADM
Route::post('adm/cadastroclientes', [ADMController::class, 'clientescadastro']);
Route::delete('adm/clientes/delete/{id}', [ADMController::class, 'excluir']);
Route::put('adm/clientes/update', [ADMController::class, 'update']);

//Clientes
Route::post('clientes', [ClienteController::class, 'clientes']);

//Profissional
Route::post('Profissional/senha/redefinir',[ProfissionalController::class, 'redefinirSenha']);

//Serviço
