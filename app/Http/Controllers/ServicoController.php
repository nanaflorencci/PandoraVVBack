<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoFormRequest;
use App\Http\Requests\ServicoFormRequestUpdate;
use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function Servico(ServicoFormRequest $request)
    {
        $servico = Servico::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'duracao' => $request->duracao,
            'preco' => $request->preco,

        ]);
        return response()->json([
            'sucess' => true,
            'message' => "Servico Cadastrado com sucesso",
            'data' => $servico
        ]);
    }
    public function pesquisarPorNome(Request $request)
    {
        $servico = Servico::where('nome', 'like', '%' . $request->nome . '%')->get();

        if (count($servico) > 0) {

            return response()->json([
                'status' => true,
                'data' => $servico
            ]);
        }
        

        return response()->json([
            'status' => false,
            'message' => 'Não há resultados para pesquisa.'
        ]);
    }
    

    public function excluir($id)
    {
        $servico = Servico::find($id);
        if (!isset($servico)) {
            return response()->json([
                'status' => false,
                'message' => "Servico não encontrado"
            ]);
        }

        $servico->delete();

        return response()->json([
            'status' => true,
            'message' => "servico excluído com sucesso"
        ]);
    }

    public function update(ServicoFormRequestUpdate $request){
        $servico = Servico::find($request->id);
    
        if(!isset($servico)){
            return response()->json([
                'status' => false,
                'message' => "Servico não encontrado"
            ]);
        }
    
        if(isset($request->nome)){
            $servico->nome = $request->nome;
        }
        if(isset($request->descricao)){
            $servico->descricao = $request->descricao;
        }
        if(isset($request->duracao)){
            $servico->duracao = $request->duracao;
        }
        if(isset($request->preco)){
            $servico->preco = $request->preco;
        }
    
        $servico->update();
    
        return response()->json([
            'status' => false,
            'message' => "Servico atualizado"
        ]);
    
    }
}