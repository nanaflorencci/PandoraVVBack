<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $fillable = [
        'cliente_Id',
        'profissional_Id',
        'data_Hora',
        'servico_Id',
        'pagamento',
        'valor',
    ];
}
