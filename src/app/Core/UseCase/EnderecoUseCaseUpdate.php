<?php

namespace App\Core\UseCase;

use App\Core\Dto\EnderecoDto;
use App\Core\Port\IEnderecoRepository;

class EnderecoUseCaseUpdate
{
    public function __construct(
        protected IEnderecoRepository $repository
    ) {
    }

    public function execute(EnderecoDto $dto): bool
    {
        return $this->repository->update($dto);
    }
}
