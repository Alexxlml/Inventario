<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Component;
use App\Models\Producto;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Bandeja extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    public $search, $perPage = '5';
    public $producto_id;

    //? Inicio de Alert
    protected $listeners = [
        'eliminar',
        'cancelled',
    ];

    public function cancelled()
    {
        $this->alert('info', 'Se canceló la eliminación', [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
        ]);
    }

    public function triggerConfirm($id)
    {
        $this->confirm('¿Quieres eliminar este producto?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' =>  'Si',
            'cancelButtonText' => 'No',
            'onConfirmed' => 'eliminar',
            'inputAttributes' => $id,
            'onCancelled' => 'cancelled'
        ]);
    }
    //! Fin de Alert

    public function render()
    {
        abort_if(Auth::user()->profile_id == 3, 401);
        return view('livewire.bandeja', [
            'productos' => DB::table('productos')
                ->join('categorias', 'productos.categoria_id', '=', 'categorias.id')
                ->join('sucursales', 'productos.sucursal_id', '=', 'sucursales.id')
                ->select('productos.id', 'productos.nombre', 'productos.estado_id', 'categorias.nombre_categoria', 'sucursales.nombre_sucursal')
                ->where('productos.nombre', 'LIKE', "%{$this->search}%")
                ->orWhere('categorias.nombre_categoria', 'LIKE', "%{$this->search}%")
                ->orWhere('sucursales.nombre_sucursal', 'LIKE', "%{$this->search}%")
                ->orderBy('id', 'DESC')
                ->paginate($this->perPage),
        ]);
    }

    public function eliminar($id)
    {
        try {
            $this->producto_id = Producto::find($id);

            DB::transaction(function () {
                $this->producto_id->delete();
            });

            $this->flash('success', 'Se eliminó correctamente el producto', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);

            return redirect()->route('bandeja');
        } catch (Exception $ex) {
            $this->alert('error', 'Error al eliminar el producto', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);
        }
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
