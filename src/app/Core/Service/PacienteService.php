<?php

namespace App\Core\Service;

use stdClass;
use App\Core\Dto\PacienteDto;
use App\Core\UseCase\PacienteUseCaseAll;
use App\Core\UseCase\PacienteUseCaseCreate;
use App\Core\UseCase\PacienteUseCaseDelete;
use App\Core\UseCase\PacienteUseCaseSelect;
use App\Core\UseCase\PacienteUseCaseUpdate;

class PacienteService
{
    public function __construct(
        protected PacienteUseCaseAll $UCPacientSelectAll,
        protected PacienteUseCaseCreate $UCPacientCreate,
        protected PacienteUseCaseDelete $UCPacientDelete,
        protected PacienteUseCaseSelect $UCPacientSelect,
        protected PacienteUseCaseUpdate $UCPacientUpdate,
    ) {
    }
    /**
     * @param string filter
     * @return array
     * 
     **/

    public function create(PacienteDto $dto): array
    {
        return $this->UCPacientCreate->execute($dto);
    }

    public function update(PacienteDto $dto): bool
    {
        return $this->UCPacientUpdate->execute($dto);
    }

    public function delete(int $id): void
    {
        $this->UCPacientDelete->execute($id);
    }

    public function find(int $id):array|null
    {        
        return $this->UCPacientSelect->execute($id);
    }
    
    public function all(array $filter = null): array|null
    {
        return $this->UCPacientSelectAll->execute($filter);
    }
}
