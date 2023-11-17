<?php

namespace App\Core\Port;
use App\Core\Dto\EnderecoDto;

interface IEnderecoRepository
{
    public function create (EnderecoDTO $dto):array|null;

    public function update (EnderecoDTO $dto): bool;

    public function delete (int $id): bool;

    public function find (int $id): array|null;

    public function all(): array|null;
}