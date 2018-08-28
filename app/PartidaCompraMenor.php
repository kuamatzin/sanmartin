<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CompraMenor;
use App\OfertaCompraMenor;

class PartidaCompraMenor extends Model
{
    protected $table = 'partidas_compras_menores';

    protected $guarded = [];

    public function compra_menor()
    {
        return $this->belongsTo(CompraMenor::class, 'compra_menor_id');
    }

    public function ofertas()
    {
        return $this->hasMany(OfertaCompraMenor::class, 'partida_id');
    }
}
