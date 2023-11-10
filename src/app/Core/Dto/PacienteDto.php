<?php

namespace App\Core\Dto;
use Illuminate\Http\Request;

class PacienteDto
{
    public function __construct(
        public string $foto_paciente,
        public string $nome,
        public string $nome_mae,
        public string $data_nascimento,
        public string $cpf,
        public string $cns,
    ) {
    }

    public static function makeDtoFromRequest(Request $request): self {

        return new self(
            $request->foto_paciente ?? "",
            $request->nome ?? "",
            $request->nome_mae ?? "",
            $request->data_nascimento ?? "",
            $request->cpf ?? "",
            $request->cns ?? "",
        );
    }
    
}
