<?php

    namespace App\Core\Dto;

    use Illuminate\Http\Request;

    class EnderecoDto
    {
        public function __construct(
            public int $id,
            public string $id_paciente,
            public string $cep,
            public string $endereco,
            public string $numero,
            public string $complemento,
            public string $bairro,
            public string $cidade,
            public string $estado,
        ) {
            
        }

        public static function makeDtoFromArray(array $array): self
        {
            return new self(
                $array['id'] ?? 0,
                $array['id_paciente'] ?? 0,
                $array['cep'] ?? "",
                $array['endereco'] ?? "",
                $array['numero'] ?? "",
                $array['complemento'] ?? "",
                $array['bairro'] ?? "",
                $array['cidade'] ?? "",
                $array['estado'] ?? "",
            );
        }

        public static function makeDtoFromRequest(Request $request): self
        {
            return new self(
                $request->id ?? 0,
                $request->id_paciente ?? "",
                $request->cep ?? "",
                $request->endereco ?? "",
                $request->numero ?? "",
                $request->complemento ?? "",
                $request->bairro                                                                                                                                                      ?? "",
                $request->cidade ?? "",
                $request->estado ?? "",
            );     
        }
    }

?>