<?php

namespace App\Http\Controllers;

use App\Http\Requests\ADMFormRequest;
use App\Http\Requests\ADMFormRequestUpdate;
use App\Models\ADM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ADMController extends Controller
{
    public function Clientescadastro(ADMFormRequest $request)
    {
        $ADM = ADM::create([
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
        ]);

        return response()->json([
            'success' => true,
            'message' => "Cliente cadastrado com êxito",
            'data' => $ADM
        ], 200);
    }
    public function excluir($id)
    {
        $ADM  = ADM ::find($id);
        if (!isset($ADM )) {
            return response()->json([
                'status' => false,
                'message' => "Cliente não encontrado"
            ]);
        }
        $ADM ->delete();

        return response()->json([
            'status' => false,
            'message' => 'Cliente excluído com êxito'
        ]);
    }

    public function update(ADMFormRequestUpdate $request)
    {
        $ADM  = ADM::find($request->id);

        if (!isset($ADM )) {
            return response()->json([
                'status' => false,
                'message' => "Cliente não encontrado"
            ]);
        }

        if (isset($request->nome)) {
            $ADM ->nome = $request->nome;
        }
        if (isset($request->celular)) {
            $ADM ->celular = $request->celular;
        }
        if (isset($request->email)) {
            $ADM ->email = $request->email;
        }
        if (isset($request->cpf)) {
            $ADM ->cpf = $request->cpf;
        }
        if (isset($request->dataNascimento)) {
            $ADM ->dataNascimento = $request->dataNascimento;
        }
        if (isset($request->cidade)) {
            $ADM ->cidade = $request->cidade;
        }
        if (isset($request->estado)) {
            $ADM ->estado = $request->estado;
        }
        if (isset($request->pais)) {
            $ADM ->pais = $request->pais;
        }
        if (isset($request->rua)) {
            $ADM ->rua = $request->rua;
        }
        if (isset($request->numero)) {
            $ADM ->numero = $request->numero;
        }
        if (isset($request->bairro)) {
            $ADM->bairro = $request->bairro;
        }
        if (isset($request->cep)) {
            $ADM->cep = $request->cep;
        }
        if (isset($request->complemento)) {
            $ADM->complemento = $request->complemento;
        }
        if (isset($request->password)) {
            $ADM->senha = $request->senha;
        }

        $ADM->update();

        return response()->json([
            'status' => false,
            'message' => "Cliente atualizado"
        ]);
    }
}