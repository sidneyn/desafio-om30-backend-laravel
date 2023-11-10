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

    public function all(string $filter = null): array
    {
        return $this->UCPacientSelectAll->execute($filter);
    }

    public function find(int $id = null): stdClass|null
    {
        return $this->UCPacientSelect->execute($id);
    }

    public function update (PacienteDto $dto):void {

        $this->UCPacientUpdate->execute($dto);
    }

    public function create(PacienteDto $dto):void {

        $this->UCPacientCreate->execute($dto);
    }

    public function delete(int $id):void {

        $this->UCPacientDelete->execute($id);
    }

}
