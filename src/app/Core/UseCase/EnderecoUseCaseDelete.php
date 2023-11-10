<?php

namespace App\Core\UseCase;

use App\Core\Port\IEnderecoRepository;

class EnderecoUseCaseDelete
{
    public function __construct(
        protected IEnderecoRepository $repository
    ) {
    }

    public function execute(int $id): bool {

        return $this->repository->delete($id);
    }
}
