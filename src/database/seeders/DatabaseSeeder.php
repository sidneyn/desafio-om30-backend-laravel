<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $records = 1000;

        \App\Models\Paciente::factory($records)->create();

        \App\Models\Paciente::each(function ($paciente) {

            $endereco = \App\Models\Endereco::factory(1)->definition();

            $endereco['id_paciente'] = $paciente->id;

            \App\Models\Endereco::create($endereco);
        });
    }
}
