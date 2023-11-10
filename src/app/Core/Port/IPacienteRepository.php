<?php

namespace App\Core\Port;
use App\Core\Dto\PacienteDto;
use stdClass;

interface IPacienteRepository
{
    
    public function all(string $filter = null);

    public function find(int $id);

  //  public function update(PacienteDTO $dto): stdClass|null;
    
    public function create(PacienteDTO $dto): void;
    
    public function delete(int $id): void;
}
