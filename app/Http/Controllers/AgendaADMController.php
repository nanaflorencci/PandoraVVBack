<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaADMFormRequest;
use App\Http\Requests\AgendaFormRequest;
use App\Models\AgendaADM;
use Illuminate\Http\Request;

class AgendaADMController extends Controller
{
    public function criarAgenda(AgendaADMFormRequest $request)
    {
        $agenda = AgendaADM::create([
            'adm_Id' => $request->adm_Id,
            'cliente_Id' => $request->cliente_Id,
            'profissional_Id' => $request->profissional_Id,
            'data_Hora' => $request->data_Hora,
            'servico_Id' => $request->servico_Id,
            'pagamento' => $request->pagamento,
            'valor' => $request->valor
        ]);

        return response()->json([
            "success" => true,
            "message" => "agenda cadastrado",
            "data" => $agenda
        ], 200);
    }

    public function criarHorarioADM(AgendaFormRequest $request)
    {

        $agenda = AgendaADM::where('data_Hora', '=', $request->data_Hora)->where('adm_Id', '=', $request->adm_Id)->get();

        if (count($agenda) > 0) {
            return response()->json([
                "status" => false,
                "message" => "Horario já cadastrado",
                "data" => $agenda
            ], 200);    
        } else {

            $agenda = AgendaADM::create([
                'profissional_Id' => $request->adm_Id,
                'data_Hora' => $request->data_Hora
            ]);
            return response()->json([
                "status" => true,
                "message" => "Agendado com sucesso",
                "data" => $agenda
            ], 200);
        }
    }
}
