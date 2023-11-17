<?php

namespace App\Core\UseCase;

use App\Core\Port\IPacienteRepository;

class PacienteUseCaseSelect
{
    public function __construct(
        protected IPacienteRepository $repository
    ) {
    }

    public function execute(int $id): array|null {

        $array = $this->repository->find($id);       
        if ($array){           
            return $array;
        }
        return null;
    }
}
