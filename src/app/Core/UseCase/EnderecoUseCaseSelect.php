<?php

namespace App\core\UseCase;

use App\Core\Dto\EnderecoDto;
use App\Core\Port\IEnderecoRepository;

class EnderecoUseCaseSelect
{
    public function __construct(
        protected IEnderecoRepository $repository
    ) {

    }

    public function execute (int $id): EnderecoDto|null {
        $array = $this->repository->find($id);
        if ($array){
            return EnderecoDto::makeDtoFromArray($array);
        }
        return null;
    }
}
?>