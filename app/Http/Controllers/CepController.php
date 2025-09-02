<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CepController extends Controller
{
    public function show(string $cep)
    {
        $clean = preg_replace('/\D/', '', $cep);
        if (strlen($clean) !== 8) {
            return response()->json(['error' => 'CEP inválido'], 422);
        }

        $resp = Http::timeout(5)->get("https://viacep.com.br/ws/{$clean}/json/");
        if ($resp->failed()) {
            return response()->json(['error' => 'Falha ao consultar CEP'], 502);
        }

        $data = $resp->json();
        if (isset($data['erro']) && $data['erro'] === true) {
            return response()->json(['error' => 'CEP não encontrado'], 404);
        }

        return response()->json($data);
    }
}
