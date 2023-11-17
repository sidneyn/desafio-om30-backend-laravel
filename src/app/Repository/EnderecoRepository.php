<?php

namespace App\Repository;

use App\Core\Dto\EnderecoDto;
use App\Core\Port\IEnderecoRepository;
use App\Models\Endereco;


class EnderecoRepository implements IEnderecoRepository 
{
    public function __construct(protected Endereco $model)
    {
        $this->model = $model;
    }

    public function create(EnderecoDTO $dto):array
    {
        $endereco = $this->model->create((array) $dto);
        return $endereco->toArray();
    }

    public function update(EnderecoDTO $dto) : bool {
        if (!$endereco = $this->model->find($dto->id)) {
            return false;
        }
        $endereco->fill((array) $dto);
        return $endereco->save();        
    }

    public function delete(int $id): bool
    {
        $object = $this->model->findOrFail($id);
        return $object->delete();
    }

    public function find($id):array|null
    {
        $endereco = $this->model->find($id);
        if (!$endereco){
            return null;
        }
        return (array) $endereco->toArray();
    }

    public function all(array $filter = null): array|null
    {
        return $this->model->where($filter[0], $filter[1])->get()->toArray();
    }
}
?>