<?php

namespace App\Repository;

use App\Core\Dto\PacienteDto;
use App\Core\Port\IPacienteRepository;
use App\Models\Paciente;
use stdClass;

class PacienteRepository implements IPacienteRepository
{
    public function __construct(protected Paciente $model)
    {
        $this->model = $model;
    }
     
    public function all( string $filter = null)
    {
       return $this->model->all($filter);
    }

    
    public function find($id)
    {
        $paciente = $this->model->with('Paciente')->find($id);
        if (!$paciente) {
            return null;
        }

        return (object) $paciente->toArray();
    }
/*
    public function update(PacienteDTO $dto): stdClass|null;
    
  */

    public function create(PacienteDTO $dto): void
    {
        $this->model->create((array) $dto);
    }

    public function delete(int $id): void
    {
        $object = $this->model->findOrFail($id);
        $object->delete();
    }
}
