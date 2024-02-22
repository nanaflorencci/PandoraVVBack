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

//ADM-----------------------------------------------------------------------------------------------------------------------------------
Route::post('adm/cadastro', [ADMController::class, 'CadastroADM']);
Route::post('adm/pesquisar/nome', [ADMController::class, 'PesquisarPorNomeADM']);
Route::delete('adm/delete/{id}', [ADMController::class, 'DeletarADM']);
Route::post('adm/redefinir/senha',[ADMController::class, 'RedefinirSenhaADM']);
Route::get('adm/visualizar', [ADMController::class, 'VisualizarADM']);
Route::put('adm/update', [ADMController::class, 'UpdateADM']);
Route::post('/create', [ADMController::class, 'store']);
Route::post('/login', [ADMController::class, 'login']);
Route::get('adm/logado', [ADMController::class, 'verificaUsuarioLogado'])
    ->middleware(
        'auth:sanctum',
        SetSanctumGuard::class,
        IsAuthenticated::class
    );

Route::post('adm/cliente/cadastro', [ClienteController::class, 'CadastroCliente']);
Route::post('adm/cliente/pesquisar/nome', [ClienteController::class, 'PesquisarPorNomeCliente']);
Route::delete('adm/cliente/delete/{id}', [ClienteController::class, 'DeletarCliente']);
Route::post('adm/cliente/redefinir/senha',[ClienteController::class, 'RedefinirSenhaCliente']);
Route::get('adm/cliente/visualizar', [ClienteController::class, 'VisualizarCliente']);
Route::put('adm/cliente/update', [ClienteController::class, 'UpdateCliente']);

Route::post('adm/profissional/cadastro',[ProfissionalController::class, 'CadastroProfissional']);
Route::post('adm/profissional/pesquisar/nome', [ProfissionalController::class, 'PesquisarPorNomeProfissional']);
Route::delete('adm/profissional/delete/{id}', [ProfissionalController::class, 'DeletarProfissional']);
Route::post('adm/profissional/redefinir/senha',[ProfissionalController::class, 'RedefinirSenhaProfissional']);
Route::get('adm/profissional/visualizar',[ProfissionalController::class, 'VisualizarProfissional']);
Route::put('adm/profissional/update', [ProfissionalController::class, 'UpdateProfissional']);

Route::post('adm/servico/cadastro',[ServicoController::class, 'CadastroServico']);
Route::post('adm/servico/pesquisar/nome',[ServicoController::class, 'PesquisarPorNomeServico']);
Route::delete('adm/servico/delete/{id}',[ServicoController::class, 'DeletarServico']);
Route::get('adm/servico/visualizar',[ServicoController::class, 'VisualizarServico']);
Route::put('adm/servico/update',[ServicoController::class, 'UpdateServico']);

Route::post('adm/agenda/cadastro',[AgendaController::class, "CadastroAgenda"]);
Route::post('adm/agenda/criar/horario',[AgendaController::class,"CriarHorarioProfissional"]);
Route::post('adm/agenda/pesquisar/data/hora',[AgendaController::class, 'PesquisarPorDataHoraProfissional']);
Route::delete('adm/agenda/delete/{id}',[AgendaController::class, 'DeletarAgenda']);
Route::get('adm/agenda/visualizar', [AgendaController::class, 'VisualizarAgenda']);
Route::put('adm/agenda/update', [AgendaController::class, 'UpdateAgenda']);

Route::post('adm/pagamento/cadastro', [PagamentoController::class,'CadastroPagamento']);
Route::post('adm/pagamento/pesquisar/nome', [PagamentoController::class,'PesquisarPorPagamento']);
Route::delete('adm/pagamento/delete/{id}', [PagamentoController::class, 'DeletarPagamento']);
Route::get('adm/pagamento/visualizar', [PagamentoController::class,'VisualizarPagamento']);
Route::get('adm/pagamento/habilitado/visualizar', [PagamentoController::class, 'VisualizarPagamentoHabilitado']);
Route::get('adm/pagamento/desabilitado/visualizar', [PagamentoController::class, 'VisualizarPagamentoDesabilitado']);
Route::put('adm/pagamento/update', [PagamentoController::class,  'UpdatePagamento']);
//Clientes-------------------------------------------------------------------------------------------------------------------------------
Route::post('cliente/cadastro', [ClienteController::class, 'CadastroCliente']);
Route::post('cliente/pesquisar/nome', [ClienteController::class, 'PesquisarPorNomeCliente']);
Route::delete('cliente/delete/{id}', [ClienteController::class, 'DeletarCliente']);
Route::post('cliente/redefinir/senha',[ClienteController::class, 'RedefinirSenhaCliente']);
Route::get('cliente/visualizar', [ClienteController::class, 'VisualizarCliente']);
Route::put('cliente/update', [ClienteController::class, 'UpdateCliente']);
//Profissional---------------------------------------------------------------------------------------------------------------------------
Route::post('profissional/cadastro',[ProfissionalController::class, 'CadastroProfissional']);
Route::post('profissional/pesquisar/nome', [ProfissionalController::class, 'PesquisarPorNomeProfissional']);
Route::delete('profissional/delete/{id}', [ProfissionalController::class, 'DeletarProfissional']);
Route::post('profissional/redefinir/senha',[ProfissionalController::class, 'RedefinirSenhaProfissional']);
Route::get('profissional/visualizar',[ProfissionalController::class, 'VisualizarProfissional']);
Route::put('profissional/update', [ProfissionalController::class, 'UpdateProfissional']);

Route::post('profissional/cliente/cadastro', [ClienteController::class, 'CadastroCliente']);
Route::post('profissional/cliente/pesquisar/nome', [ClienteController::class, 'PesquisarPorNomeCliente']);
Route::delete('profissional/cliente/delete/{id}', [ClienteController::class, 'DeletarCliente']);
Route::post('profissional/cliente/redefinir/senha',[ClienteController::class, 'RedefinirSenhaCliente']);
Route::get('profissional/cliente/visualizar', [ClienteController::class, 'VisualizarCliente']);
Route::put('profissional/cliente/update', [ClienteController::class, 'UpdateCliente']);

Route::post('profissional/agenda/cadastro',[AgendaController::class, "CadastroAgenda"]);
Route::post('profissional/agenda/criar/horario',[AgendaController::class,"CriarHorarioProfissional"]);
Route::post('profissional/agenda/pesquisar/data/hora',[AgendaController::class, 'PesquisarPorDataHoraProfissional']);
Route::delete('profissional/agenda/delete/{id}',[AgendaController::class, 'DeletarAgenda']);
Route::get('profissional/agenda/visualizar', [AgendaController::class, 'VisualizarAgenda']);
Route::put('profissional/agenda/update', [AgendaController::class, 'UpdateAgenda']);
//Serviços-------------------------------------------------------------------------------------------------------------------------------
Route::post('servico/cadastro',[ServicoController::class, 'CadastroServico']);
Route::post('servico/pesquisar/nome',[ServicoController::class, 'PesquisarPorNomeServico']);
Route::delete('servico/delete/{id}',[ServicoController::class, 'DeletarServico']);
Route::get('servico/visualizar',[ServicoController::class, 'VisualizarServico']);
Route::put('servico/update',[ServicoController::class, 'UpdateServico']);
//Agenda----------------------------------------------------------------------------------------------------------------------------------
Route::post('agenda/cadastro',[AgendaController::class, "CadastroAgenda"]);
Route::post('agenda/criar/horario',[AgendaController::class,"CriarHorarioProfissional"]);
Route::post('agenda/pesquisar/data/hora',[AgendaController::class, 'PesquisarPorDataHoraProfissional']);
Route::delete('agenda/delete/{id}',[AgendaController::class, 'DeletarAgenda']);
Route::get('agenda/visualizar', [AgendaController::class, 'VisualizarAgenda']);
Route::put('agenda/update', [AgendaController::class, 'UpdateAgenda']);
//Pagamento------------------------------------------------------------------------------------------------------------------------------
Route::post('pagamento/cadastro', [PagamentoController::class,'CadastroPagamento']);
Route::post('pagamento/pesquisar/nome', [PagamentoController::class,'PesquisarPorPagamento']);
Route::delete('pagamento/delete/{id}', [PagamentoController::class, 'DeletarPagamento']);
Route::get('pagamento/visualizar', [PagamentoController::class,'VisualizarCadastroPagamento']);
Route::get('pagamento/habilitado/visualizar', [PagamentoController::class, 'VisualizarCadastroPagamentoHabilitado']);
Route::get('pagamento/desabilitado/visualizar', [PagamentoController::class, 'VisualizarCadastroPagamentoDesabilitado']);
Route::put('pagamento/update', [PagamentoController::class,  'UpdatePagamento']);