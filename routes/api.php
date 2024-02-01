<?php

use App\Http\Controllers\ADMController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Controllers\ServicoController;
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
Route::post('adm/cadastro', [ADMController::class, 'ADMcadastro']);
Route::delete('adm/delete/{id}', [ADMController::class, 'excluir']);
Route::put('adm/update', [ADMController::class, 'update']);
Route::post('adm/nome', [ADMController::class, 'pesquisarPorNome']);
Route::post('adm/senha/redefinir',[ADMController::class, 'redefinirSenha']);

//Clientes
Route::post('clientes/cadastro', [ClienteController::class, 'clientes']);
Route::delete('clientes/delete/{id}', [ClienteController::class, 'excluir']);
Route::put('clientes/update', [ClienteController::class, 'update']);
Route::post('clientes/nome', [ClienteController::class, 'pesquisarPorNome']);
Route::post('clientes/senha/redefinir',[ClienteController::class, 'redefinirSenha']);

//Profissional
Route::post('Profissional/cadastro',[ProfissionalController::class, 'profissional']);
Route::post('Profissional/nome', [ProfissionalController::class, 'pesquisarPorNome']);
Route::delete('Profissional/delete/{id}', [ProfissionalController::class, 'excluir']);
Route::put('Profissional/update', [ProfissionalController::class, 'update']);
Route::post('Profissional/senha/redefinir',[ProfissionalController::class, 'redefinirSenha']);

//Serviços
Route::post('servico/cadastro',[ServicoController::class, 'servico']);
Route::post('servico/nome',[ServicoController::class, 'pesquisarPorNome']);
Route::delete('servico/delete/{id}',[ServicoController::class, 'excluir']);
Route::put('servico/update',[ServicoController::class, 'update']);

//Agenda
Route::post('agenda/agendamento',[AgendaController::class, "criarAgenda"]);
Route::post('agenda/criarhorario',[AgendaController::class,"criarHorarioProfissional"]);
Route::post('agenda/pesquisahorario',[AgendaController::class, 'pesquisarPorDataDoProfissional']);
Route::get('agenda/retornaTodos', [AgendaController::class, 'retornarTudo']);
Route::delete('agenda/delete/{id}',[AgendaController::class, 'excluiAgenda']);
Route::put('agenda/update', [AgendaController::class, 'updateAgenda']);


//Forma de pagamento
Route::put('editar/pagamento', [PagamentoController::class,  'updatepagamento']);
Route::post('cadastro/pagamento', [PagamentoController::class,'cadastroTipoPagamento']);
Route::post('pesquisar/nome/pagamento', [PagamentoController::class,'pesquisarPorTipoPagamento']);
Route::delete('delete/pagamento/{id}', [PagamentoController::class, 'deletarPagamento']);
Route::get('visualizar/pagamento', [PagamentoController::class,'visualizarCadastroTipoPagamento']);
Route::get('visualizar/pagamento/habilitado', [PagamentoController::class, 'visualizarCadastroPagamentoHabilitado']);
Route::get('visualizar/pagamento/desabilitado', [PagamentoController::class, 'visualizarCadastroPagamentoDesabilitado']);