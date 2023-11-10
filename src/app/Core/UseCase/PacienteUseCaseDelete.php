<?php

namespace App\Core\UseCase;

use App\Core\Port\IPacienteRepository;

class PacienteUseCaseDelete
{
    public function __construct(
        protected IPacienteRepository $repository
    ) {
    }

    public function execute(int $id): bool {

        return true;
    }
}
