<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\CompraMenor;
use App\Dependencia;
use App\PartidaCompraMenor;
use App\Exports\RequisicionExport;

class ComprasMenoresController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $compras_menores = CompraMenor::all();
        return view('compras_menores.index', compact('compras_menores'));
    }

    public function show($compra_id)
    {
        $compra = CompraMenor::findOrFail($compra_id);

        return view('compras_menores.show', compact('compra'));
    }

    public function create()
    {
        $dependencias = Dependencia::select('nombre', 'id')->get();

        return view('compras_menores.create', compact('dependencias'));
    }

    public function store(Request $request)
    {
        $partida = new PartidaCompraMenor([
            'descripcion' => $request->descripcion,
            'cantidad_solicitada' => $request->cantidad_solicitada
        ]);

        if ($request->headers->get('referer') == "https://sanmartin.reqsiaa.com" . "/compras_menores/create") {
            $compra_menor = CompraMenor::create([
                'dependencia_id' => $request->dependencia_id,
                'fecha' => Carbon::now()
            ]);

            $compra_menor->partidas()->save($partida);

            return $compra_menor;
        } else {
            $compra_id = explode('/', $request->headers->get('referer'))[5];
            $compra_menor = CompraMenor::findOrFail($compra_id);

            $compra_menor->partidas()->save($partida);

            return $partida;
        }
    }

    public function enviarCompraMenor($compra_id)
    {
        $compra = CompraMenor::findOrFail($compra_id);

        $compra->status = 2;
        $compra->save();
    }

    public function downloadfile($compra_menor_id)
    {
        $compra = CompraMenor::findOrFail($compra_menor_id);

        RequisicionExport::getFile($compra);
    }

    public function cotizar($compra_menor_id)
    {
        $compra = CompraMenor::findOrFail($compra_menor_id);

        return view('compras_menores.cotizar', compact('compra'));
    }

    public function getProveedoresCotizando($compra_id)
    {
        $compra = CompraMenor::findOrFail($compra_id);
        return $compra->proveedores_cotizando()->with(['proveedor'])->get();
    }

    public function agregarProveedorCotizar($compra_menor_id, $proveedor_id)
    {
        $compra = CompraMenor::findOrFail($compra_menor_id);
        $compra->proveedorToQuote($proveedor_id);
    }

    public function getOfertasProveedor($compra_id, $proveedor_id)
    {
        $compra = CompraMenor::findOrFail($compra_id);

        return $compra->ofertas()->where('proveedor_id', $proveedor_id)->get();
    }

    public function storeOfertaPartida(Request $request, $partida_id)
    {
        $partida = PartidaCompraMenor::findOrFail($partida_id);
        $oferta = $partida->ofertas()->where(['proveedor_id' => $request->proveedor_id, 'partida_id' => $partida_id])->first();
        if ($oferta) {
            $oferta->update($request->all());
        } else {
            $partida->ofertas()->create($request->all());
        }
    }

    public function showCantidadesAutorizadas($compra_id)
    {
        $compra = CompraMenor::findOrFail($compra_id);
        
        return view('compras_menores.cantidad_autorizada', compact('compra'));
    }

    public function storeCantidadesAutorizadas(Request $request, $compra_id)
    {
        $compra = CompraMenor::findOrFail($compra_id);
        
        foreach ($compra->partidas as $key => $partida) {
            $partida->cantidad_autorizada = $request->cantidad[$key];
            $partida->save();
        }

        $success = true;

        return view('compras_menores.cantidad_autorizada', compact('compra', 'success'));
    }

    public function selectProveedores($compra_id)
    {
        $compra = CompraMenor::findOrFail($compra_id);

        return view('compras_menores.seleccionar_proveedores', compact('compra'));
    }

    public function storeSelectedProveedores(Request $request, $compra_id)
    {
        $compra = CompraMenor::findOrFail($compra_id);

        $compra->proveedores_cotizando()->update(['seleccionado' => 0]);

        $updated = true;

        if (!$request->seleccionados) {
            return view('compras_menores.seleccionar_proveedores', compact('compra', 'updated'));
        }

        $request->validate([
            'seleccionados' => 'required|array|between:2,2'
        ]);

        foreach ($request->seleccionados as $key => $proveedor_id) {
            $proveedor_seleccionado = $compra->proveedores_cotizando()->where('proveedor_id', $proveedor_id)->first();
            $proveedor_seleccionado->seleccionado = 1;
            $proveedor_seleccionado->save();
        }

        return view('compras_menores.seleccionar_proveedores', compact('compra', 'updated'));
    }

    public function eliminarProveedorCompraMenor($compra_id, $proveedor_id)
    {
        $compra = CompraMenor::findOrFail($compra_id);

        $compra->ofertas()->where('proveedor_id', $proveedor_id)->delete();

        $compra->proveedores_cotizando()->where('proveedor_id', $proveedor_id)->delete();
    }

    public function eliminar($compra_id)
    {
        $compra = CompraMenor::findOrFail($compra_id);
        $compra->partidas()->delete();
        $compra->ofertas()->delete();
        $compra->proveedores_cotizando()->delete();

        $compra->delete();
    }
}
