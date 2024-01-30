<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfissionalFormRequest;
use App\Models\Profissional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfissionalController extends Controller
{
    public function Profissional(ProfissionalFormRequest $request)
    {
        $Profissional = Profissional::create([
            'nome' => $request->nome,
            'celular' => $request->celular,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'dataNascimento' => $request->dataNascimento,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'pais' => $request->pais,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cep' => $request->cep,
            'complemento' => $request->complemento,
            'password' => Hash::make($request->senha),
            'salario' => $request->salario,
        ]);
        return response()->json([
            'success' => true,
            'message' => "Profissional cadastrado com sucesso",
            'data' => $Profissional
        ], 200);
    }
    public function redefinirSenha(Request $request)
    {
        $Profissional =  Profissional::where('email', $request->email)->first();
        
        if (!isset($Profissional)) {
            return response()->json([
                'status' => false,
                'message' => "Profissional não encontrado"
            ]);
        }

        $Profissional->password = Hash::make($Profissional->cpf);
        $Profissional->update();    

        return response()->json([
            'status' => false,
            'message' => "Sua senha foi atualizada"
        ]);
    }

}