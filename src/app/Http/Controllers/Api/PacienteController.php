<?php

namespace App\Http\Controllers\Api;

use App\Core\Dto\EnderecoDto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Core\Dto\PacienteDto;

use App\Core\Service\PacienteService;
use App\Core\Service\EnderecoService;

class PacienteController extends Controller
{
    public function __construct(
        protected PacienteService $service,
        protected EnderecoService $serviceEndereco
    ){
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->service->all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->toArray();
        $dtoPaciente = PacienteDto::makeDtoFromArray($data);
        $paciente = (array) $this->service->create($dtoPaciente);

        if (!empty($data['endereco'])) {
            $dtoEndereco = EnderecoDto::makeDtoFromArray($data['endereco']);
            $dtoEndereco->id_paciente = $paciente['id'];
            $endereco = (array) $this->serviceEndereco->create($dtoEndereco);
            $paciente['endereco'] = $endereco;
        }

        return response()->json($paciente, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $dto = $this->service->find($request->paciente);
        return response()->json($dto, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dto = PacienteDto::makeDtoFromRequest($request);
        $dto->id = $id;
        $success = $this->service->update($dto);
        response(null, ($success ? 201 : 400));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $endereco = $this->serviceEndereco->all(['id_paciente', $id]);
        if (!empty($endereco)){
            $this->serviceEndereco->delete($endereco[0]['id']);
        }
        $success = $this->service->delete($id);
        response(null, ($success ? 201 : 400));
    }


    public function list(Request $request)
    {
        $filter = [];
        if (!empty($request->paciente)) {
            if (is_numeric($request->paciente)) {
                $filter = ['cpf', $request->paciente];
            } else {
                $filter = ['nome', $request->paciente];
            }
        }
        return response()->json($this->service->all($filter), 200);
    }
}
