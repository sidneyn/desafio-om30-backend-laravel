<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Core\Dto\EnderecoDto;

use App\Core\Service\EnderecoService;

class EnderecoController extends Controller
{
    protected $repository;

    public function __construct(
        protected EnderecoService $service
    ){
    }

    /**
     * Store a newly created resource in storage.
     */
    public function index()
    {
        return response()->json($this->service->all());
    }

    public function store (Request $request)
    {
        $dto = EnderecoDto::makeDtoFromRequest($request);
        $dados = $this->service->create($dto);
        return response()->json($dados, count($dados) ? 201 : 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $dto = $this->service->find($request->endereco);
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
        $sucess = $this->service->update($dto);
        return response(null, ($sucess ? 201 : 400));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sucess = $this->service->delete($id);
        return response(null, ($sucess ? 200 : 400));
    }
}