<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ADM extends Model
{
    use HasFactory;
    use HasApiTokens;
    use Notifiable;

    protected $fillable = [
        'nome',
        'email',
        'cpf',
        'password'
    ];
}