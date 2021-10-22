<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Exports\ProductosExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class Reportes extends Component
{
    public $bandera = 1, $productos;
    public $fecha_inicio, $fecha_termino, $fecha_termino_hora;


    public function render()
    {
        return view('livewire.reportes');
    }

    public function elegirForm($id){
        if($id == 1){
            $this->bandera = 1;
        }else{
            $this->bandera = 0;
        }
    }

    public function exportAll(){
        $this->fecha_actual = Carbon::now();

        $this->productos = DB::table('productos')
            ->join('categorias', 'productos.categoria_id', '=', 'categorias.id')
            ->join('sucursales', 'productos.sucursal_id', '=', 'sucursales.id')
            ->join('estados', 'productos.estado_id', '=', 'estados.id')
            ->select('productos.id', 'productos.nombre', 'productos.descripcion',
            'categorias.nombre_categoria', 'sucursales.nombre_sucursal', 'estados.nombre_estado', 'productos.precio', 
            'productos.fecha_compra', 'productos.comentarios', 'productos.created_at', 'productos.updated_at')
            ->orderBy('productos.id', 'desc')
            ->get();
            
        return Excel::download(new ProductosExport($this->productos), 'productos(' . $this->fecha_actual . ').csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function exportDate()
    {
        $this->fecha_termino_hora = $this->fecha_termino . ' 23:59:59';

        $this->productos = DB::table('productos')
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
        ->whereBetween('productos.created_at', [$this->fecha_inicio, $this->fecha_termino_hora ])
        ->orderBy('productos.id', 'desc')
        ->get();

        return Excel::download(new ProductosExport($this->productos), 'productos('.'de_' . $this->fecha_inicio . '_a_'. $this->fecha_termino.').csv', \Maatwebsite\Excel\Excel::CSV);
    }


}
