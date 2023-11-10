<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Core\Dto\EnderecoDto;

use App\Core\Service\EnderecoService;
use App\Repository\EnderecoRepository;

class EnderecoController extends Controller
{
    protected $repository;

    public function __construct(EnderecoRepository $repository) 
    {
        $this->repository = $repository;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function index()
    {
        return response()->json($this->repository->all());
    }

    public function store (Request $request)
    {
        $dto = EnderecoDto::makeDtoFromRequest($request);
        return response()->json($this->repository->create($dto));
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
     * @param request Request
     * @param string id
     * Update the specified resource in storage.
     */
    public function update (Request $request, string $id)
    {
        $dto = EnderecoDto::makeDtoFromRequest($request);
        $dto->id = $id;
        $sucess = $this->repository->update($dto);
        response(null, ($sucess ? 200 : 400));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sucess = $this->repository->delete($id);
        response(null, ($sucess ? 200 : 400));
    }
}