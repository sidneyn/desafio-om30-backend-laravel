<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Core\Dto\PacienteDto;

use App\Core\Service\PacienteService;
use App\Repository\PacienteRepository;

class PacienteController extends Controller
{
    public function __construct(
        protected PacienteService $service,
        //protected PacienteRepository $repositorio
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /*
        $array = $this->repositorio->find(1);
        $array['nome']  = 'asdasdas';
        $this->repositorio->update($array);
        */
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dto = PacienteDto::makeDtoFromRequest($request);
        return response()->json($this->service->create($dto,201));

        //$this->service->delete(1007);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
