<?php

namespace Database\Factories;

use App\Models\paciente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'foto_paciente' =>fake()->imageUrl(),
            'nome' => fake()->name(),
            'nome_mae' => fake()->name(),
            'data_nascimento' => fake()->date,
            'cpf' => fake()->numerify,
            'cns' => fake()->name,
            'created_at' => fake()->dateTime(),            
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
