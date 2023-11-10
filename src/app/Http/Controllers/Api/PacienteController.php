<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Core\Dto\PacienteDto;

use App\Core\Service\PacienteService;
use App\Repository\PacienteRepository;

class PacienteController extends Controller
{
    protected $repository;

    public function __construct(PacienteRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json($this->repository->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dto = PacienteDto::makeDtoFromRequest($request);
        return response()->json($this->repository->create($dto), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {        
        $dto = $this->repository->find($id);                
        return response()->json($dto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dto = PacienteDto::makeDtoFromRequest($request);
        $dto->id = $id;
        $success = $this->repository->update($dto);
        response(null, ($success ? 200 : 400));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $success = $this->repository->delete($id);
        response(null, ($success ? 200 : 400));
    }
}
