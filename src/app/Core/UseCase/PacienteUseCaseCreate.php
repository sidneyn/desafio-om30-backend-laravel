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

    public function execute(PacienteDto $dto): array
    {
        return $this->repository->create($dto);
    }
}
