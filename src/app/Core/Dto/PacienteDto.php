<?php

namespace App\Core\Dto;

use Illuminate\Http\Request;

class PacienteDto
{
    public function __construct(
        public int $id,
        public string $foto_paciente,
        public string $nome,
        public string $nome_mae,
        public string $data_nascimento,
        public string $cpf,
        public string $cns,
    ) {
    }

    public static function makeDtoFromArray(array $array): self
    {
        return new self(
            $array['id'] ?? 0,
            $array['foto_paciente'] ?? "",
            $array['nome'] ?? "",
            $array['nome_mae'] ?? "",
            $array['data_nascimento'] ?? "",
            $array['cpf'] ?? "",
            $array['cns'] ?? "",
        );
    }

    public static function makeDtoFromRequest(Request $request): self
    {
        return new self(
            $request->id ?? 0,
            $request->foto_paciente ?? "",
            $request->nome ?? "",
            $request->nome_mae ?? "",
            $request->data_nascimento ?? "",
            $request->cpf ?? "",
            $request->cns ?? "",
        );
    }
}
