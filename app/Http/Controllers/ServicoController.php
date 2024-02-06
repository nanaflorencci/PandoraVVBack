<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoFormRequest;
use App\Http\Requests\ServicoFormRequestUpdate;
use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function CadastroServico(ServicoFormRequest $request)
    {
        $servico = Servico::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'duracao' => $request->duracao,
            'preco' => $request->preco,
        ]);
        return response()->json([
            'sucess' => true,
            'message' => "Servico Cadastrado com êxit.",
            'data' => $servico
        ]);
    }

    public function PesquisarPorNomeServico(Request $request)
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
    
    public function DeletarServico($id)
    {
        $servico = Servico::find($id);
        if (!isset($servico)) {
            return response()->json([
                'status' => false,
                'message' => "Serviço não encontrado."
            ]);
        }
        $servico->delete();
        return response()->json([
            'status' => true,
            'message' => "Servico excluído com êxito."
        ]);
    }

    public function VisualizarServico(){
        $servico = Servico::all();
        if(count($servico)==0){
            return response()->json([
                'status'=> false,
                'message'=> "Não há registros no sistema."
            ]);
        }
        return response()->json([
            'status'=> true,
            'data' => $servico
        ]);
    }

    public function UpdateServico(ServicoFormRequestUpdate $request){
        $servico = Servico::find($request->id);
        if(!isset($servico)){
            return response()->json([
                'status' => false,
                'message' => "Serviço não encontrado."
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
            'message' => "Serviço atualizado com êxito."
        ]);
    }
}