<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ReportePDF extends Controller
{
    public function createPDF(){

        $datosProducto = DB::table('productos')
        ->join('categorias', 'productos.categoria_id', '=', 'categorias.id')
        ->join('sucursales', 'productos.sucursal_id', '=', 'sucursales.id')
        ->join('estados', 'productos.estado_id', '=', 'estados.id')
        ->select(
            'productos.id',
            'productos.nombre',
            'productos.descripcion',
            'categorias.nombre_categoria',
            'sucursales.nombre_sucursal',
            'estados.nombre_estado',
            'productos.precio',
            'productos.fecha_compra',
            'productos.comentarios',
            'productos.created_at',
            'productos.updated_at'
        )
        ->where('productos.id', '=' ,2)
        ->get();

        $pdf = PDF::loadView(
            'PDF/reporte-pdf',
            compact(
                "datosProducto",
            )
        );
        return $pdf->stream('colaboradores.pdf');
    }
}
