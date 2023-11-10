<?php

namespace App\Core\UseCase;

use App\Core\Port\IPacienteRepository;

class PacienteUseCaseAll
{
    public function __construct(
        protected IPacienteRepository $repository
    ) {
    }

    public function execute(array $filter = null): array|null {

        return null;
    }
}
