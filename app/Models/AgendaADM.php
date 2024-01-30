<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaADM extends Model
{
    use HasFactory;
    protected $fillable = [
        'adm_Id',
        'cliente_Id',
        'profissional_Id',
        'data_Hora',
        'servico_Id',
        'pagamento',
        'valor',
    ];
}
