<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiçoFormRequest;
use App\Http\Requests\ServiçoFormRequestUpdate;
use App\Models\Serviço;
use Illuminate\Http\Request;

class ServiçoController extends Controller
{
    public function Servico(ServiçoFormRequest $request)
    {
        $servico = Serviço::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'duracao' => $request->duracao,
            'preco' => $request->preco,

        ]);
        
        return response()->json([
            'sucess' => true,
            'message' => "Serviço cadastrado com êxito",
            'data' => $servico
        ]);
    }
    public function pesquisarPorNome(Request $request)
    {
        $servico = Serviço::where('nome', 'like', '%' . $request->nome . '%')->get();

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
    
    public function pesquisarPoDescricao(Request $request)
    {
        $servico = Serviço::where('descricao', 'like', '%' . $request->descricao . '%')->get();

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
    public function retornarTodos(){
        $servico = Serviço::all();
        return response()->json([
            'status'=> true,
            'data'=> $servico
        ]);
    }

    public function pesquisarPorId($id){
        $servico = Serviço::find($id);
        if($servico == null){
            return response()->json([
                'status'=> false,
                'message' => "Serviço não encontrado"
            ]);     
        }
        return response()->json([
            'status'=> true,
            'data'=> $servico
        ]);
    }

    public function excluir($id)
    {

        $servico = Serviço::find($id);
        
        if (!isset($servico)) {
            return response()->json([
                'status' => false,
                'message' => "Serviço não encontrado"
            ]);
        }

        $servico->delete();

        return response()->json([
            'status' => true,
            'message' => "serviço excluído com êxito"
        ]);
    }

    public function update(ServiçoFormRequestUpdate $request){
        $servico = Serviço::find($request->id);
    
        if(!isset($servico)){
            return response()->json([
                'status' => false,
                'message' => "Serviço não encontrado"
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
            'message' => "Serviço atualizado"
        ]);
    }
}