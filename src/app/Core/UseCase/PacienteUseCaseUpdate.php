<?php

namespace App\Core\UseCase;

use App\Core\Dto\PacienteDto;
use App\Core\Port\IPacienteRepository;

class PacienteUseCaseUpdate
{
    public function __construct(
        protected IPacienteRepository $repository
    ) {
    }

    public function execute(PacienteDto $dto): bool {

        return true;
    }
}
