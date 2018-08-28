<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Proveedor;

class ProveedorCotizandoCompraMenor extends Model
{
    protected $table = 'proveedores_compras_menores';

    protected $guarded = [];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
}
