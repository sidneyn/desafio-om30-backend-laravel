<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;

class CepController extends Controller
{
    public function index(Request $request)
    {
        $cep = $request->cep;
        $endereco = Redis::get('cep:'.$cep);

        if (empty($endereco)) {
            $endereco = Http::get('https://viacep.com.br/ws/'.$cep.'/json/')->__toString();
            Redis::set('cep:'.$cep, $endereco);
        }

        return response($endereco, 200, ['Content-Type' => 'application/json']);
    }
}
