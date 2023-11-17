<?php

namespace App\core\UseCase;

use App\Core\Port\IEnderecoRepository;

class EnderecoUseCaseSelect
{
    public function __construct(
        protected IEnderecoRepository $repository
    ) {
    }

    public function execute (int $id): array|null {
        $array = $this->repository->find($id);
        if ($array){
            return $array;
        }
        return null;
    }
}
?>