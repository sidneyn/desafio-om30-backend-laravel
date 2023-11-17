<?php

namespace App\Jobs;

use App\Core\Dto\PacienteDto;
use App\Models\Paciente;
use App\Repository\PacienteRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PacienteJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public array $header,
        public array $data
    ) {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $repo = new PacienteRepository(new Paciente());

        $header = explode(',',$this->header[0]);
        foreach ($header as $key => $value) {
            $header[$key] = str_replace('"','',$value);
        }

        sleep(10);

        foreach ($this->data as $data) {
            
            $array_values = explode(',', $data);
            foreach ($array_values as $key => $value) {
                $array_values[$key] = trim(str_replace('"','',$value));
            }

            $array = array_combine($header, $array_values);
            $array['id'] = 0;
            $dto = PacienteDto::makeDtoFromArray($array);

            $repo->create($dto);
        }
    }
}
