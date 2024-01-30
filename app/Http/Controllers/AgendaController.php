<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaFormRequest;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function criarAgenda(AgendaFormRequest $request)
    {
        $agenda = Agenda::create([
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

    public function criarHorarioProfissional(AgendaFormRequest $request)
    {

        $agenda = Agenda::where('data_Hora', '=', $request->data_Hora)->where('profissional_Id', '=', $request->profissional_Id)->get();

        if (count($agenda) > 0) {
            return response()->json([
                "status" => false,
                "message" => "Horario já cadastrado",
                "data" => $agenda
            ], 200);    
        } else {

            $agenda = Agenda::create([
                'profissional_Id' => $request->profissional_Id,
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
