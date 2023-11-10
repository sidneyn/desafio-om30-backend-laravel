<?php

namespace App\Core\UseCase;

use App\Core\Dto\PacienteDto;
use App\Core\Port\IPacienteRepository;

class PacienteUseCaseSelect
{
    public function __construct(
        protected IPacienteRepository $repository
    ) {
    }

    public function execute(int $id): PacienteDto|null {

        return null;
    }
}
