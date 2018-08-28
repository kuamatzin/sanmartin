<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PartidaCompraMenor;

class OfertaCompraMenor extends Model
{
    protected $table = 'cotizaciones_compras_menores';

    protected $guarded = [];

    public function partida()
    {
        $this->belongsTo(PartidaCompraMenor::class);
    }
}
