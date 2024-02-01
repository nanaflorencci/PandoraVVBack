<?php

namespace App\Http\Controllers;

use App\Http\Requests\PagamentoFormRequest;
use App\Http\Requests\PagamentoFormRequestUpdate;
use App\Models\Pagamento;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function cadastroTipoPagamento(PagamentoFormRequest $request)
    {
        $pagamento = Pagamento::create([
            'nome' => $request->nome,
            'taxa' => $request->taxa,
            'status' => $request->status
        ]);

        return response()->json([
            "success" => true,
            "message" => "Pagamento cadastrado com êxito",
            "data" => $pagamento
        ], 200);
    }

    public function pesquisarPorTipoPagamento(Request $request)
    {
        $pagamento = Pagamento::where('nome', 'like', '%' . $request->nome . '%')->get();

        if (count($pagamento)) {
            return response()->json([
                'status' => true,
                'data' => $pagamento
            ]);
        }

        return response()->json([
            'status' => false,
            'data' => "Pagamento não encontrado"
        ]);
    }

    public function deletarpagamento($pagamento)
    {
        $pagamento = Pagamento::find($pagamento);

        if (!isset($pagamento)) {
            return response()->json([
                'status' => false,
                'message' => "Pagamento não encontrado"
            ]);
        }

        $pagamento->delete();

        return response()->json(([
            'status' => true,
            'message' =>  "Pagamento excluído com êxito"
        ]));
    }
    
    public function updatepagamento(PagamentoFormRequestUpdate $request)
    {
        $pagamento = Pagamento::find($request->id);

        if (!isset($pagamento)) {

            return response()->json([

                'status' => false,

                'message' => 'Pagamento não encontrado'

            ]);
        }

        if (isset($request->nome)) {

            $pagamento->nome = $request->nome;
        }

        if (isset($request->taxa)) {

            $pagamento->taxa = $request->taxa;
        }

        $pagamento->update();

        return response()->json([

            'status' => true,

            'message' => 'Tipo de pagamento atualizado'
        ]);
    }

    public function visualizarCadastroTipoPagamento() 
    { 
        $pagamento = Pagamento::all(); 

        if (!isset($pagamento)) { 

            return response()->json([ 

                'status' => false, 

                'message' => 'Não há registros no sistema' 

            ]); 

        } 

        return response()->json([ 

            'status' => true, 

            'data' => $pagamento 

        ]); 
    } 

    public function visualizarCadastroPagamentoHabilitado()
    {
        $pagamento = Pagamento::where('status', 'habilitado')->get();
        if ($pagamento->count() > 0) {
            return response()->json([
                'status' => true,
                'data' => $pagamento
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Não há registros no sistema'
        ]);
    }

    public function visualizarCadastroPagamentoDesabilitado()
    {
        $pagamento = Pagamento::where('status', 'desabilitado')->get();
        if ($pagamento->count() > 0) {
            return response()->json([
                'status' => true,
                'data' => $pagamento
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Não há registros no sistema'
        ]);
    }
}