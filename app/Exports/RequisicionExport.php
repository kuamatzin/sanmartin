<?php

namespace App\Exports;

use Maatwebsite\Excel\Facades\Excel;

class RequisicionExport
{
    protected $sheet;
    protected $requisicion;

    public static function getFile($requisicion)
    {
        Excel::load('public/sanmartin/excel/req.xlsx', function ($reader) use ($requisicion) {
            $that = (new self);
            $that->sheet = $reader->setActiveSheetIndex(0);

            $that->setDependencia('MUNICIPIO DE SAN MARTIN TEXMELUCAN, PUEBLA');
            $that->setDependenciaSolicitante($requisicion->dependencia->nombre);
            $that->setTelefono('109 53 00 EXT. 142 -143');
            $that->setFecha($requisicion->fecha);
            //$that->setFolioRecepcion($requisicion->id);
            $that->setPartidas($requisicion->partidas);
            $that->setProveedores($requisicion);
        })->export('xlsx');
    }

    public function setDependencia($dependencia)
    {
        $this->sheet->setCellValue('D8', strtoupper($dependencia));
    }

    public function setDependenciaSolicitante($dependencia_solicitante)
    {
        $this->sheet->setCellValue('D9', strtoupper($dependencia_solicitante));
    }

    public function setTelefono($telefono)
    {
        $this->sheet->setCellValue('D10', strtoupper($telefono));
    }

    public function setFecha($fecha)
    {
        $this->sheet->setCellValue('M7', strtoupper($fecha));
    }

    public function setFolioRecepcion($folio_recepcion)
    {
        $this->sheet->setCellValue('M8', strtoupper($folio_recepcion));
    }

    public function setPartidas($partidas)
    {
        $start_row = 13;
        
        foreach ($partidas as $key => $partida) {
            $this->sheet->setCellValue('A' . $start_row, $key + 1);
            $this->sheet->setCellValue('B' . $start_row, strtoupper('123'));
            $this->sheet->setCellValue('C' . $start_row, strtoupper($partida->descripcion));
            $this->sheet->setCellValue('F' . $start_row, strtoupper($partida->cantidad_solicitada));
            $this->sheet->setCellValue('G' . $start_row, strtoupper($partida->cantidad_autorizada));

            $start_row = $start_row + 1;
        }
    }

    public function setProveedores($compra)
    {
        $proveedores = $compra->proveedores_ganadores;

        $this->sheet->setCellValue('H11', $proveedores[0]->proveedor->nombre);
        $this->sheet->setCellValue('J11', $proveedores[1]->proveedor->nombre);

        //Ofertas proveedor 1
        $start_row = 13;
        foreach ($compra->partidas as $key => $partida) {
            $oferta = $compra->ofertas()->where(['proveedor_id' => $proveedores[0]->proveedor->id, 'partida_id' => $partida->id])->first();

            $this->sheet->setCellValue('H' . $start_row, $oferta->precio_unitario);
            $this->sheet->setCellValue('I' . $start_row, $oferta->total);

            $start_row = $start_row + 1;
        }

        //Ofertas proveedor 2
        $start_row = 13;
        foreach ($compra->partidas as $key => $partida) {
            $oferta = $compra->ofertas()->where(['proveedor_id' => $proveedores[1]->proveedor->id, 'partida_id' => $partida->id])->first();

            $this->sheet->setCellValue('J' . $start_row, $oferta->precio_unitario);
            $this->sheet->setCellValue('K' . $start_row, $oferta->total);

            $start_row = $start_row + 1;
        }
    }
}
