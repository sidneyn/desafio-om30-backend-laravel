<?php

namespace App\Core\UseCase;

use App\Core\Port\IEnderecoRepository;

class EnderecoUseCaseAll
{
    public function __construct(
        protected IEnderecoRepository $repository
    ) {
    }

    public function execute(array $filter = null): array|null
    {
        return $this->repository->all($filter);
    }
}
?>