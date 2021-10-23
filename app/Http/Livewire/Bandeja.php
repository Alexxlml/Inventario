<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class Bandeja extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    public $search, $perPage = '5';
    public $producto_id;

    public function render()
    {
        return view('livewire.bandeja', [
            'productos' => DB::table('productos')
                ->join('categorias', 'productos.categoria_id', '=', 'categorias.id')
                ->join('sucursales', 'productos.sucursal_id', '=', 'sucursales.id')
                ->select('productos.id', 'productos.nombre', 'productos.estado_id','categorias.nombre_categoria', 'sucursales.nombre_sucursal')
                ->where('productos.nombre', 'LIKE', "%{$this->search}%")
                ->orWhere('categorias.nombre_categoria', 'LIKE', "%{$this->search}%")
                ->orWhere('sucursales.nombre_sucursal', 'LIKE', "%{$this->search}%")
                ->orderBy('id', 'DESC')
                ->paginate($this->perPage),
        ]);
    }

    public function eliminar($id)
    {
        $this->producto_id = Producto::find($id);

        DB::transaction(function () {
            $this->producto_id->delete();
        });

        return redirect()->route('bandeja');
    }

    public function descargaReporte($id)
    {
        $this->producto_id = DB::table('productos')
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
        ->where('productos.id', '=', $id)
        ->get();
        
        $viewData = [
            'datosProducto' => $this->producto_id,
        ];

        $pdfContent = PDF::loadView('pdf.reporte-pdf', $viewData)->output();
        return response()->streamDownload(
            fn () => print($pdfContent),
            $id . '-' . $this->producto_id[0]->nombre . ".pdf"
        );
    }
}
