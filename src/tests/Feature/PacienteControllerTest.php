<?php

namespace Tests\Feature;

use Tests\TestCase;

class PacienteControllerTest extends TestCase
{
    public function test_paciente_show(): void
    {
        $response = $this->get('/api/paciente/list/1');
        $response->assertStatus(200);
    }

    public function test_paciente_store(): void
    {
        $cpf = random_int(1000001, 1900000);
        $array = [];
        $array['foto_paciente'] = 'http://fotos.com/1.png';
        $array['nome'] = 'Sidney Store';
        $array['nome_mae'] = 'Mae de Sidney';
        $array['data_nascimento'] = '1982-01-01';
        $array['cpf'] = $cpf;
        $array['cns'] = '09234039';
                
        $response1 = $this->postJson('/api/paciente', $array);
        $response1->assertStatus(201);

        $response2 = $this->get('/api/paciente/list/'.$cpf);
        $this->assertEquals('Sidney Store', $response2->json('0.nome'));
    }
    
    public function test_paciente_update(): void
    {
        $id = 100;
        // $response2 = $this->get('/api/paciente/'.$id);
        // $id = $response2->json('id');

        $array = [];
        $array['id'] = $id;
        $array['foto_paciente'] = 'http://fotos.com/1.png';
        $array['nome'] = 'Sidney Store Update';
        $array['nome_mae'] = 'Mae de Sidney';
        $array['data_nascimento'] = '1982-01-01';
        $array['cpf'] = '90809823';
        $array['cns'] = '09234039';

        $response1 = $this->putJson('/api/paciente/'.$id, $array);
        $response1->assertStatus(200);

        $response2 = $this->get('/api/paciente/'.$id);
        $this->assertEquals('Sidney Store Update', $response2->json('nome'));
    }    
}
