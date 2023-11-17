<?php

namespace App\Core\UseCase;

use App\Core\Dto\EnderecoDto;
use App\Core\Port\IEnderecoRepository;

class EnderecoUseCaseCreate
{
    public function __construct(
        protected IEnderecoRepository $repository
    ) {
    }

    public function execute(EnderecoDto $dto): array
    {
        return $this->repository->create($dto);
    }
}
