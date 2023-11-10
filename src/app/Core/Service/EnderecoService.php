<?php

namespace App\Core\Service;

use stdClass;
use App\Core\Dto\EnderecoDto;
use App\Core\UseCase\EnderecoUseCaseAll;
use App\Core\UseCase\EnderecoUseCaseCreate;
use App\Core\UseCase\EnderecoUseCaseDelete;
use App\Core\UseCase\EnderecoUseCaseSelect;
use App\Core\UseCase\EnderecoUseCaseUpdate;

class EnderecoService
{
    public function __construct(
        protected EnderecoUseCaseAll $UCEnderecoSelectAll,
        protected EnderecoUseCaseCreate $UCEnderecoCreate,
        protected EnderecoUseCaseDelete $UCEnderecoDelete,
        protected EnderecoUseCaseSelect $UCEnderecoSelect,
        protected EnderecoUseCaseUpdate $UCEnderecoUpdate,
    ) {
    }
    /**
     * @param string filter
     * @return array
     * 
     **/

    public function create(EnderecoDto $dto): array
    {
        return $this->UCEnderecoCreate->execute($dto);
    }

    public function update(EnderecoDto $dto): void
    {
        $this->UCEnderecoUpdate->execute($dto);
    }

    public function delete(int $id = null): void
    {
        $this->UCEnderecoDelete->execute($id);
    }

    public function find(int $id = null): array|null
    {
        return $this->UCEnderecoSelect->execute($id);
    }
    
    public function all(string $filter = null): array|null
    {
        return $this->UCEnderecoSelectAll->execute($filter);
    }

}
