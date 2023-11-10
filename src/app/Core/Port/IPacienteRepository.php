<?php

namespace App\Core\Port;
use App\Core\Dto\PacienteDto;
use stdClass;

interface IPacienteRepository
{
    public function create(PacienteDTO $dto): array;

    public function update(PacienteDTO $dto): bool;

    public function delete(int $id): bool;

    public function find(int $id): array|null;

    public function all(): array|null;
}
