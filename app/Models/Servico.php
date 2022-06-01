<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $casts = [
        'concluido' => 'boolean',
        'valor_receber' => 'float',
        'valor_cobrar' => 'float'
    ];

    protected $fillable = [
        'modelo',
        'marca',
        'dono',
        'valor_cobrar',
        'valor_receber',
        'concluido'
    ];
}