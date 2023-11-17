<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\PacienteJob;
use Illuminate\Http\Request;

class PacienteCsvController extends Controller
{
    public function arquivo(Request $request) 
    {
        if ($request->hasFile('csv'))
        {
            $csv = file($request->csv);
            $header = array_shift($csv);
            $pedacos = array_chunk($csv, 15);

            foreach ($pedacos as $i => $pedaco) {
                PacienteJob::dispatch([$header], $pedaco);
            }
        }
    }
}
