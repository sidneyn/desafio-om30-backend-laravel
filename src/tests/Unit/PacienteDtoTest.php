<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Core\Dto\PacienteDto;

class PacienteDtoTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_make_dto_from_array(): void
    {
        $array = [];
        $array['id'] = 1;
        $array['foto_paciente'] = 'http://fotos.com/1.png';
        $array['nome'] = 'Sidney';
        $array['nome_mae'] = 'Mae de Sidney';
        $array['data_nascimento'] = '1982-01-01';
        $array['cpf'] = '90809823';
        $array['cns'] = '09234039';

        $dto = PacienteDto::makeDtoFromArray($array);

        $this->assertNotEmpty($dto->id);
        $this->assertEquals($array['nome'], $dto->nome);
        $this->assertEquals($array['nome_mae'], $dto->nome_mae);
        $this->assertEquals($array['data_nascimento'], $dto->data_nascimento);
        $this->assertEquals($array['cpf'], $dto->cpf);
        $this->assertEquals($array['cns'], $dto->cns);
    }
}
