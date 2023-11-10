<?php

namespace App\Core\UseCase;

use App\Core\Dto\PacienteDto;
use App\Core\Port\IPacienteRepository;

class PacienteUseCaseCreate
{
    public function __construct(
        protected IPacienteRepository $repository
    ) {
    }

    public function execute(PacienteDto $dto):void {

        if ($dto->nome == 'Beltrano') {
            die('Beltrano está proibido de se cadastrar!');
        }

        $this->repository->create($dto);
    }
}
