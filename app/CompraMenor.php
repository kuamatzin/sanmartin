<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PartidaCompraMenor;
use App\Dependencia;
use App\OfertaCompraMenor;

class CompraMenor extends Model
{
    protected $table = 'compras_menores';

    protected $guarded = [];

    protected $dates = ['fecha'];

    public function partidas()
    {
        return $this->hasMany(PartidaCompraMenor::class, 'compra_menor_id');
    }

    public function dependencia()
    {
        return $this->belongsTo(Dependencia::class);
    }

    public function proveedores_cotizando()
    {
        return $this->hasMany(ProveedorCotizandoCompraMenor::class);
    }

    public function proveedores_ganadores()
    {
        return $this->proveedores_cotizando()->where('seleccionado', 1);
    }

    public function ofertas()
    {
        return $this->hasManyThrough(OfertaCompraMenor::class, PartidaCompraMenor::class, 'compra_menor_id', 'partida_id');
    }

    public function proveedorToQuote($proveedor_id)
    {
        if ($this->proveedores_cotizando()->where('proveedor_id', $proveedor_id)->count() == 0) {
            $this->proveedores_cotizando()->create(['proveedor_id' => $proveedor_id]);
        }
    }
}
