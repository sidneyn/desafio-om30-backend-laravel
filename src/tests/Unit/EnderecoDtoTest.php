<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Core\Dto\EnderecoDto;

class EnderecoDtoTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_make_dto_from_array(): void
    {
        $array = [];
        $array['id'] = 1;
        $array['cep'] = '456463434';
        $array['bairro'] = 'Broklin';
        $array['cidade'] = 'New York';
        $array['estado'] = 'New York';
        $array['endereco'] = 'Rua';
        $array['complemento'] = 'Casa';

        $dto = EnderecoDto::makeDtoFromArray($array);

        $this->assertNotEmpty($dto->id);
        $this->assertEquals($array['cep'], $dto->cep);
        $this->assertEquals($array['bairro'], $dto->bairro);
        $this->assertEquals($array['cidade'], $dto->cidade);
        $this->assertEquals($array['estado'], $dto->estado);
        $this->assertEquals($array['endereco'], $dto->endereco);
        $this->assertEquals($array['complemento'], $dto->complemento);
    }
}
