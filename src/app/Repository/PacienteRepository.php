<?php

namespace App\Repository;

use App\Core\Dto\PacienteDto;
use App\Core\Port\IPacienteRepository;
use App\Models\Paciente;

class PacienteRepository implements IPacienteRepository
{
    public function __construct(protected Paciente $model)
    {
        $this->model = $model;
    }

    public function create(PacienteDTO $dto): array
    {
        $paciente = $this->model->create((array) $dto);
        return $paciente->toArray();
    }

    public function update(PacienteDTO $dto): bool
    {
        if (!$paciente = $this->model->find($dto->id)) {
            return false;
        }
        $paciente->fill((array) $dto);
        return $paciente->save();
    }

    public function delete(int $id): bool
    {
        $object = $this->model->findOrFail($id);
        return $object->delete();
    }

    public function find($id): array|null
    {
        $paciente = $this->model->findOrFail($id);
        if (!$paciente) {
            return null;
        }
        return (array) $paciente->toArray();
    }
     
    public function all(array $filter = null): array|null
    {
        return $this->model->where($filter[0], $filter[1])->get()->toArray();
    }
}
