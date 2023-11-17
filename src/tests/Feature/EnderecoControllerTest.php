<?php

namespace Tests\Feature;

use Tests\TestCase;

class EnderecoControllerTest extends TestCase
{
    public function test_endereco_show(): void
    {
        $response = $this->get('/api/endereco/1');
        $response->assertStatus(200);
    }

    public function test_endereco_store(): void
    {
        $array = [];
        $array['id_paciente'] = 2;
        $array['cep'] = '456463434';
        $array['numero'] = '160';
        $array['bairro'] = 'Cond';
        $array['cidade'] = 'Recife';
        $array['estado'] = 'Alagoas';
        $array['endereco'] = 'Endereco Teste Store';
        $array['complemento'] = 'Kitnet';

        $response1 = $this->postJson('/api/endereco', $array);
        $response1->assertStatus(201);

        $response2 = $this->get('/api/endereco/2');
        $this->assertEquals('Endereco Teste', $response2->json('endereco'));
    }

    public function test_endereco_update(): void
    {
        $array = [];
        $array['id'] = 2;
        $array['id_paciente'] = 2;
        $array['cep'] = '456463434';
        $array['numero'] = '160';
        $array['bairro'] = 'Cond';
        $array['cidade'] = 'Recife';
        $array['estado'] = 'Alagoas';
        $array['endereco'] = 'Endereco Teste';
        $array['complemento'] = 'Kitnet';

        $response1 = $this->putJson('/api/endereco/2', $array);
        $response1->assertStatus(201);

        $response2 = $this->get('/api/endereco/2');
        $this->assertEquals('Endereco Teste', $response2->json('endereco'));
    }
}
