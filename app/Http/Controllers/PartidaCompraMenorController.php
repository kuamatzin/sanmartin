<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PartidaCompraMenor;

class PartidaCompraMenorController extends Controller
{
    public function update($partida_id, Request $request)
    {
        $partida = PartidaCompraMenor::findOrFail($partida_id);
        $partida->update($request->all());

        return $partida;
    }

    public function delete($partida_id)
    {
        $partida = PartidaCompraMenor::findOrFail($partida_id);

        $partida->delete();
    }
}
