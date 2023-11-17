<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'paciente';

    protected $fillable = [
        'foto_paciente',
        'nome',
        'nome_mae',
        'data_nascimento',
        'cpf',
        'cns',
    ];

    protected array $filters = [
        CreatedAfterFilter::class,
    ];

    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }
}
