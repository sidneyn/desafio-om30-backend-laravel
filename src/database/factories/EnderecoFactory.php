<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EnderecoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cep' => fake()->numerify,
            'endereco' => fake()->streetAddress,
            'numero' => fake()->numerify,
            'complemento' => fake()->randomElement(['Casa','Apt','Cond','Sitio','Kitnet']),
            'bairro' => fake()->randomElement(['Casa','Apt','Cond','Sitio','Kitnet']),
            'cidade' => fake()->randomElement(['Olinda', 'Recife', 'Jaboatão', 'Paulista', 'Igarassu', 'Camaragibe']),
            'estado' => fake()->randomElement(['Pernmabuco','Alagoas','Fortaleza','Rio Grande do Norte','Aracaju']),
        ];
    }
}
