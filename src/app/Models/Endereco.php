<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $table = 'endereco';

    protected $fillable = [
        'id_paciente',
        'cep',
        'endereco',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'created_at',
        'updated_at',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }    
}
