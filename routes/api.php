<?php

use App\Http\Controllers\ADMController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Controllers\ServiçoController;
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
Route::post('clientes/cadastro', [ClienteController::class, 'clientes']);
Route::delete('clientes/delete/{id}', [ClienteController::class, 'excluir']);
Route::put('clientes/update', [ClienteController::class, 'update']);
Route::post('clientes/nome', [ClienteController::class, 'pesquisarPorNome']);
Route::post('clientes/senha/redefinir',[ClienteController::class, 'redefinirSenha']);

//profissionais
Route::post('profissional/criar', [ProfissionalController::class, 'CadastroProfissional']);
Route::put('profissional/esqueciSenha/{id}',[ProfissionalController::class, 'recuperarSenha']);
Route::post('profissional/pesquisarNome',[ProfissionalController::class, 'pesquisarPorNome']);
Route::delete('profissional/deletar/{id}',[ProfissionalController::class, 'exclui']);
Route::put('profissional/atualizar', [ProfissionalController::class, 'update']);
Route::post('Profissional/senha/redefinir',[ProfissionalController::class, 'redefinirSenha']);

//Serviço
Route::post('servico/store',[ServiçoController::class, 'Servico']);
Route::post('servico/nome',[ServiçoController::class, 'pesquisarPorNome']);
Route::post('servico/descricao',[ServiçoController::class, 'pesquisarPoDescricao']);
Route::delete('servico/delete/{id}',[ServiçoController::class, 'excluir']);
Route::put('servico/update',[ServiçoController::class, 'update']);
route::get('servico/visualizar', [ServiçoController::class, 'retornarTodos']);
Route::get('servico/pesquisar/{id}',[ServiçoController::class, 'pesquisarPorId']);

//Agendamento
Route::post('agenda/criar', [AgendaController::class, 'criarAgenda']);
Route::post('agenda/criar/horario', [AgendaController::class, 'criarHorarioProfissional']);
Route::post('agenda/pesquisaDataHora',[AgendaController::class, 'pesquisarPorDataDoProfissional']);

//Forma de Pagamento
Route::put('editar/pagamento', [PagamentoController::class,  'updateTipoPagamento']);
Route::post('cadastro/pagamento', [PagamentoController::class,'cadastroTipoPagamento']);
Route::post('pesquisar/nome/pagamento', [PagamentoController::class,'pesquisarPorTipoPagamento']);
Route::post('excluir/pagamento', [PagamentoController::class,'deletarTipoPagamento']);
Route::delete('delete/pagamento/{id}', [PagamentoController::class, 'deletarTipoPagamento']);
Route::get('visualizar/pagamento', [PagamentoController::class,'visualizarCadastroTipoPagamento']);