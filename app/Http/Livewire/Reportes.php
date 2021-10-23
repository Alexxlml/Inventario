<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Exports\ProductosExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class Reportes extends Component
{
    public $bandera, $productos;
    public $fecha_actual, $fecha_inicio, $fecha_termino, $fecha_termino_hora;

    protected $rules = [
        'fecha_inicio' => 'required|before_or_equal:fecha_actual',
        'fecha_termino' => 'required|after_or_equal:fecha_inicio',
    ];

    protected $messages = [
        'fecha_inicio.required' => 'Este campo no puede permanecer vacío',
        'fecha_inicio.before' => 'No puedes elegir una fecha después del día de hoy',
        'fecha_termino.after_or_equal' => 'No puedes elegir una fecha menor a la de inicio',
        'fecha_termino.required' => 'Este campo no puede permanecer vacío',
    ];

    public function mount()
    {
        $this->fecha_actual = Carbon::today()->isoFormat('YYYY-MM-DD');
    }


    public function render()
    {
        return view('livewire.reportes');
    }

    public function elegirForm($id)
    {
        if ($id == 1) {
            $this->bandera = 1;
        } else {
            $this->bandera = 0;
        }
    }

    public function exportAll()
    {
        $this->fecha_actual = Carbon::now();

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
            ->orderBy('productos.id', 'desc')
            ->get();

        return Excel::download(new ProductosExport($this->productos), 'productos(' . $this->fecha_actual . ').csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function exportDate()
    {
        $this->validate();
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
            ->whereBetween('productos.created_at', [$this->fecha_inicio, $this->fecha_termino_hora])
            ->orderBy('productos.id', 'desc')
            ->get();

        return Excel::download(new ProductosExport($this->productos), 'productos(' . 'de_' . $this->fecha_inicio . '_a_' . $this->fecha_termino . ').csv', \Maatwebsite\Excel\Excel::CSV);
    }
}
